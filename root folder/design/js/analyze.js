const host = 'https://viz.qadan.com.au/api/';
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
  try {
    const query = $('#data').val();
    if (query !== '') {
      closeButtonEventPlanText(false, true)
      getApiResponseAndStore(query, true)
    } else {
      swal("Error!!", "Please enter a string", "error");
      closeButtonEvent()
    }
  } catch (error) {
    closeButtonEvent()
    swal("Error!!", "Oops! Something went wrong", "error");
    console.error('error --->', error);
  }
}


document.querySelector('.ta-window_drag-drop').addEventListener("dragover",function(e){
  e = e || event;
  e.preventDefault();
})

document.querySelector('.ta-window_drag-drop').addEventListener("drop", function(e) {
  e.preventDefault();
  let selectedFile =  e.dataTransfer.files[0]

  if(selectedFile.type && selectedFile.type  === 'text/plain') {
    readTextFile(selectedFile)
  } else {{
    swal("Error!!", "Only Support plain file, Tap/Click Try Again ", "error");
  }}
})

function readTextFile(selectedFile) {
  let textBox = document.querySelector('#data')

  var reader = new FileReader();

  reader.onload = function(){
    textBox.value = reader.result
  }

  if(selectedFile) {
    reader.readAsText(selectedFile)
  }
}

function previewFile(e) {
  let selectedFile = e.files[0]

  if(selectedFile.type && selectedFile.type  === 'text/plain') {
    readTextFile(selectedFile)
  } else {{
    swal("Error!!", "Only Support plain file, Tap/Click Try Again ", "error");
  }}

  // document.querySelector('input[type=file]').files
}


async function analyzeHref() {
  try {
    closeButtonEventHref(false, true)
    const userInputLink = $('#href-input-link').val();
    const url = host + 'content/extract';
    const data = {
      url: userInputLink
    }
    const response = await apiCall(url, data);
    if (response && response.content) {
      getApiResponseAndStore(response.content)
    } else {
      swal("Error!!", "Please enter a string", "error");
      closeButtonEvent()
    }
  } catch (error) {
    closeButtonEvent()
    swal("Error!!", "Oops! Something went wrong", "error");
    console.error('error --->', error);
  }
}

async function getApiResponseAndStore(query, isPlanText = false) {
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
    if (response) {
      successCounter++
      localStorage.setItem(data.key, JSON.stringify(response))
    }
  }
  if (successCounter !== apiCalledLength) {
    closeButtonEvent()
    swal("Error!!", "Oops! Something went wrong", "error");
  } else {
    if (isPlanText) {
      closeButtonEventPlanText(true, true)
    } else {
      closeButtonEventHref(true, true)
    }
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
}

async function closeButtonEvent() {
  apiCalled.forEach((apiData) => {
    const checkKeyIsExistOrNot = localStorage.getItem(apiData.key)
    if (checkKeyIsExistOrNot) {
      localStorage.removeItem(apiData.key)
    }
  })
  if (localStorage.getItem('tabName')) {
    localStorage.removeItem('tabName')
  }
  closeButtonEventPlanText()
  closeButtonEventHref()
}

async function closeButtonEventPlanText(isDisplaySuccess = false, isLoadingBtn = false) {
  const button = document.getElementById('analyze'); // button
  const loader = document.getElementById('loader'); // loader
  const success = document.getElementById('success-response'); // success message
  const dragDrop = document.getElementById('drag-drop'); // drag and drop
  const textArea = document.getElementById('data'); // textarea

  if (isLoadingBtn) {
    if (button.classList.contains('disable-button')) {
      button.classList.remove('disable-button');
      button.disabled = false;
      loader.style.display = 'none';
    } else {
      button.classList.add('disable-button');
      button.disabled = true;
      loader.style.display = 'block';
    }

    if (isDisplaySuccess) {
      dragDrop.style.display = 'none';
      textArea.style.display = 'none';
      success.style.display = 'flex';
    }
  }
}

async function closeButtonEventHref(isDisplaySuccess = false, isLoadingBtn = false) {
  const button = document.getElementById('href-btn'); // button
  const loader = document.getElementById('href-loader'); // loader
  const success = document.getElementById('href-success-response'); // success message
  const input = document.getElementById('href-section'); // href input

  if (isLoadingBtn) {
    if (button.classList.contains('disable-button')) {
      button.classList.remove('disable-button');
      button.disabled = false;
      loader.style.display = 'none';
    } else {
      button.classList.add('disable-button');
      button.disabled = true;
      loader.style.display = 'block';
    }
  }

  if (isDisplaySuccess) {
    input.style.display = 'none';
    success.style.display = 'flex';
  }
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