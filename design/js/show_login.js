function showForm(){
    let restrictDivs= document.getElementsByClassName('main-part');
    let loginForm = document.getElementById('rcp_login-form');
    for (let i = 0; i < restrictDivs.length; i++) {
        if (restrictDivs[i].length != 0) {
            loginForm.style.display = 'flex';
        } else {
            loginForm.style.display = 'none';
        }
        
    }
}
showForm();