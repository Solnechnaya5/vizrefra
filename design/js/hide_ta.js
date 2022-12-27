window.onload = function hideTA() {
    let successResponse = document.getElementById('success-response');
    let openInput = document.getElementById('open-input1');

    if (successResponse.style.display === 'flex') {
        openInput.classList.add('close-input');
    }

};