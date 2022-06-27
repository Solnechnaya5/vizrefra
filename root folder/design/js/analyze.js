const host = 'http://18.210.65.15/api/';
const token = '89d91bc7-3df1-4582-aafa-1faf363d81b9';

const apiCalled = [
  {
    key: 'predict',
    api: 'class/predict',
  },
  {
    key: 'summarize',
    api: 'content/summarize',
  },
  {
    key: 'raw',
    api: 'entity/raw', // bar chart
  },
  {
    key: 'analyse',
    api: 'sentiment/analyse', // pie chart
  },
  {
    key: 'refine',
    api: 'entity/refine',
  }
];

$(document).ready(() => {
  closeButtonEvent()
})

async function submitAnalyzeButton() {
  const button = document.getElementById('analyze'); // button
  const loader = document.getElementById('loader'); // loader
  const success = document.getElementById('success-response'); // success message
  const dragDrop = document.getElementById('drag-drop'); // drag and drop
  const textArea = document.getElementById('text-area'); // textarea
  try {
    const query = $('#data').val();
    if (query !== '') {
      button.classList.add('disable-button')
      button.disabled = true;
      loader.style.display = 'block';
      const apiCalledLength = apiCalled.length;
      let successCounter = 0;
      for (let i = 0; i < apiCalledLength; i++) {
        const data = apiCalled[i];
        const url = host + data.api;
        const apiData = {
          query: query,
          salience: 0.0019,
          limit: 20,
        }
        const response = await apiCall(url, apiData);
        console.log('response -->', response)
        if (response) {
          successCounter++
          localStorage.setItem(data.key, JSON.stringify(response))
        }
      }
      if (successCounter !== apiCalledLength) {
        closeButtonEvent()
        swal("Error!!", "Oops! Something went wrong", "error");
      } else {
        dragDrop.style.display = 'none';
        textArea.style.display = 'none';
        success.style.display = 'flex';
        button.style.display = 'none';
        setTimeout(() => {
          let clientUrl = window.location.href;
          const staticPageName = 'text_analyze_1.html';
          const nextPageName = 'text_analyze_4.html';
          localStorage.setItem('original_text', query)
          if (clientUrl.includes(staticPageName)) {
            clientUrl = clientUrl.replace(staticPageName, nextPageName)
          }
          location.href = clientUrl;
        }, 2000)
      }
    } else {
      swal("Error!!", "Please enter a string", "error");
    }
  } catch (error) {
    closeButtonEvent()
    swal("Error!!", "Oops! Something went wrong", "error");
    console.error('error --->', error);
  }
}

async function closeButtonEvent() {
  const button = document.getElementById('analyze'); // button
  const loader = document.getElementById('loader'); // loader
  apiCalled.forEach((apiData) => {
    const checkKeyIsExistOrNot = localStorage.getItem(apiData.key)
    if (checkKeyIsExistOrNot) {
      localStorage.removeItem(apiData.key)
    }
  })
  if (localStorage.getItem('tabName')) {
    localStorage.removeItem('tabName')
  }

  loader.style.display = 'none';
  button.disabled = false;
  button.classList.remove('disable-button')
}

async function apiCall(url, data) {
  return $.ajax({
    url: url,
    type: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'token': token,
    },
    data: JSON.stringify(data),
  });
}