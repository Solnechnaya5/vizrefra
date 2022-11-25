const host = 'https://viz.qadan.com.au/api/';
const token = '89d91bc7-3df1-4582-aafa-1faf363d81b9';
let setInterValForNews;
$(function () {
  const requestType = localStorage.getItem('type');
  if (!requestType) {
    window.open(window.location.origin + '/text_analyze_4.html', '_self');
  }
  loadNewsData();
  // setInterValForNews = setInterval(function () {
  //   loadNewsData();
  // }, 50000000000)
})

$(window).on("beforeunload", function() {
  console.log('asdasfahjkfsdhj')
  setInterValForNews.clearInterval();
});

async function google() {
  try {
    const response = await apiCall(host + 'google/news', {
      language: "English",
      location: "United States",
      topic: "World",
      max_results: 20,
      ignore_overlap: true
    });
    if (response) {
      localStorage.setItem('typeresponse', JSON.stringify(response));
      loadChart();
    }
  } catch (error) {
    console.error(error)
  }
}

async function twitter() {
  try {
    const response = await apiCall(host + 'twitter/trend', {
      topic_id : 23424977,
      ignore_overlap : true
    });
    if (response) {
      localStorage.setItem('typeresponse', JSON.stringify(response));
      loadChart();
    }
  } catch (error) {
    console.error(error)
  }
}

async function loadChart() {
  document.getElementById("#frame2").setAttribute("src", window.location.origin + "/charts/newsmonitor/piechart.html");
  document.getElementById('#frame1').setAttribute("src", window.location.origin + '/charts/newsmonitor/2d-chart.html');
  document.getElementById('#frame3').setAttribute("src", window.location.origin + '/charts/newsmonitor/barchart.html');
  deactiveLoader();
}

$('#refresh').on('click', function () {
  activeLoader();
  loadNewsData();
})

function activeLoader() {
  const getLoader = document.getElementById('loading');
  const refreshText = document.getElementById('refreshText');
  const refreshBtn = document.getElementById('refresh');
  getLoader.style.display = 'block';
  refreshText.style.display = 'none';
  refreshBtn.disabled = true;
  refreshBtn.style.cursor = 'not-allowed';
}

function deactiveLoader() {
  const getLoader = document.getElementById('loading');
  const refreshText = document.getElementById('refreshText');
  const refreshBtn = document.getElementById('refresh');
  getLoader.style.display = 'none';
  refreshText.style.display = 'block';
  refreshBtn.disabled = false;
  refreshBtn.style.cursor = 'pointer';
}

function loadNewsData() {
  const requestType = localStorage.getItem('type');
  if (requestType === 'google') {
    google();
  } else {
    twitter();
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