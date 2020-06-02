const Choose = document.querySelector('select');
const Display = document.querySelector('pre');
Choose.onchange = function () {
    let info = Choose.value;
    updateDisplay(verse);
};

function updateDisplay(verse) {
    let request = new XMLHttpRequest();
    request.open('GET', url, true);
    request.onload = function () {
        Display.textContent = request.response;
    };
    request.send();
};
