$(document).ready(() => {
  const staticPageName = "text_analyze_4.html";
  let clientUrl = window.location.href;
  if (clientUrl.includes(staticPageName)) {
    clientUrl = clientUrl.replace(staticPageName, "");
  }
  apiCalled.forEach((data) => {
    const checkKeyIsExistOrNot = localStorage.getItem(data.key);
    if (!checkKeyIsExistOrNot) {
      location.href = clientUrl + "text_analyze_1.html";
    }
  });

  document.getElementById("#iframe1").setAttribute("src", clientUrl + "charts/piechart.html");
  document.getElementById("#iframe2").setAttribute("src", clientUrl + "charts/worldcloud.html");
  document.getElementById('#iframe3').setAttribute("src", clientUrl + 'charts/2d-chart.html');
  document.getElementById('#iframe4').setAttribute("src", clientUrl + 'charts/barchart.html');
  document.getElementById('#iframe5').setAttribute("src", clientUrl + 'charts/entityRecognition.html');
  document.getElementById('#iframe6').setAttribute("src", clientUrl + 'charts/3d-chart.html');
  document.getElementById('#iframe7').setAttribute("src", clientUrl + 'charts/force-directed.html')

  document.getElementById("#summary").textContent = JSON.parse(localStorage.getItem("summarize")).summary;

  const classification = JSON.parse(localStorage.getItem("predict"));
  const classificationData = `${classification.label}<span>${classification.confidence.toFixed(2)}% confidence</span>`;
  document.getElementById("#classification1").innerHTML = classificationData;

  const getTabName = localStorage.getItem('tabName')
  if (getTabName) {
    hideNonVisibleDivs(getTabName)
  } else {
    changeTab('#text-understanding')
  }
});

function changeTab(elementId) {
  let visibleSection = null
  if (visibleSection !== elementId) {
    visibleSection = elementId;
    localStorage.setItem('tabName', visibleSection)
    hideNonVisibleDivs(visibleSection)
  }
}

function hideNonVisibleDivs(visibleDivId) {
  const divs = ['#text-understanding', '#2d-chart', '#top-entities', '#entity-recognition', '#3d-map', '#weighted-graph']
  const buttons = ["#button1","#button2","#button3","#button4","#button5", "#button6"]
  var i
  for(i = 0; i < divs.length; i++) {
    const divId = divs[i];
    const div = document.getElementById(divId);
    const button = document.getElementById(buttons[i])
    if(visibleDivId === divId) {
      if (visibleDivId === "#text-understanding") {
        document.getElementById('#show-classification').style.display = 'flex';
        document.getElementById('#show-summary').style.display = 'block';
      } else {
        document.getElementById('#show-classification').style.display = 'none';
        document.getElementById('#show-summary').style.display = 'none';
      }
      div.style.display = "flex";
      button.classList.add('active-button')
    } else {
      div.style.display = "none";
      button.classList.remove('active-button')
    }
  }
}