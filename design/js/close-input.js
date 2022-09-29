// open inputs on the page with results

let openArrow1 = document.getElementById('arrow1');
let hiddenInput1 = document.getElementById('hidden-input1');

openArrow1.onclick = function() {
    openArrow1.classList.toggle('transform_arrow');
    hiddenInput1.classList.toggle('open-input1');

};
let openArrow2 = document.getElementById('arrow2');
let hiddenInput2 = document.getElementById('hidden-input2');
let window2 = document.getElementById("window2");

openArrow2.onclick = function() {
    openArrow2.classList.toggle('transform_arrow');
    hiddenInput2.classList.toggle('open-input2');
    window2.classList.toggle('wa-window_results_open');
};