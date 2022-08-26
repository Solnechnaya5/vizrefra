let buttonToggle = document.querySelector('.ta-top_button');
let buttonText = document.getElementById('text_btn');
let buttonWeb = document.getElementById('web_btn');
let taWindow_1 = document.getElementById('window1');

let taWindow_2 = document.getElementById('window2');

buttonWeb.onclick = function() {
    buttonWeb.classList.toggle('active_button');
    buttonText.classList.toggle('active_button');
    if (buttonWeb.classList.contains('active_button')) {
        taWindow_1.style.display = 'none';
        taWindow_2.style.display = 'block';
    }
};
buttonText.onclick = function() {
    buttonWeb.classList.toggle('active_button');
    buttonText.classList.toggle('active_button');
    if (buttonText.classList.contains('active_button')) {
        taWindow_1.style.display = 'block';
        taWindow_2.style.display = 'none';
    }
};