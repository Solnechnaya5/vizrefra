const container = document.getElementById('dialog-container');
const CustomAlert = new function(msg) {
    this.show = function(msg) {
        let content = document.getElementById('dialog-body');
        container.style.top = '50%';
        container.style.opacity = 1;
        content.textContent = msg;
    }

    this.close = function() {
        container.style.top = '-50%';
        container.style.opacity = 0;
    }
}