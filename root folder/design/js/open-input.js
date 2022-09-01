let openButton = document.getElementById('open-arrow');
let hiddenInput = document.getElementById('hidden-input');

openButton.onclick = function() {
    hiddenInput.classList.toggle('open-input');
    openButton.classList.toggle('transform_arrow');
}

let openButton2 = document.getElementById('open-arrow2');
let hiddenInput2 = document.getElementById('hidden-input2');

openButton2.onclick = function() {
    hiddenInput2.classList.toggle('open-input2');
    openButton2.classList.toggle('transform_arrow');
}



function openArea() {
    let openArrow1 = document.getElementById('arrow1');
    let hiddenInput1 = document.getElementById('open-input1');

    openArrow1.classList.toggle('transform_arrow');
    hiddenInput1.classList.toggle('open-input');

};