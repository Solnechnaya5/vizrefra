// this js reload iframes in Mozilla browser
document.getElementById('rcp_login_form').addEventListener('submit',function reloadAllPages() {
    setTimeout(function () {
                parent.location.reload();
            }, 3000);
        });


// this js reload iframes in Mozilla browser
let iframes = window.parent.document.querySelectorAll('.iframe-restrict')
function iframesReload(){
	iframes.forEach((iframes) => iframes.contentWindow.location.reload());
}

function reloadPage() {
           
            setTimeout(function () {
                parent.location.reload();
				iframesReload();
            }, 3000);
        };
