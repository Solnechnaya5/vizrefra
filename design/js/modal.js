const container = document.getElementById('dialog-container');
const CustomAlert = new function(msg) {
  this.show = function(msg) {
    const getIframeSrc = document.getElementById(msg);
    if (getIframeSrc) {
      const url = getIframeSrc.getAttribute('src');
      const getPopUpIframeUrl = document.getElementById('#iframe-popup');
      getPopUpIframeUrl.setAttribute('src', url);
      container.style.top = '50%';
      container.style.opacity = 1;
    }
  }

  this.close = function() {
    container.style.top = '-50%';
    container.style.opacity = 0;
  }
}