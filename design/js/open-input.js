// open inputs on the start page

let openButton = document.getElementById('open-arrow');
let openInput = document.getElementById('open-input1');

openButton.onclick = function() {
    openInput.classList.toggle('close-input');
    openButton.classList.toggle('transform_arrow');
};

let openButton2 = document.getElementById('open-arrow2');
let opeInput2 = document.getElementById('open-input2');

openButton2.onclick = function() {
    openInput2.classList.toggle('close-input2');
    openButton2.classList.toggle('transform_arrow');
};