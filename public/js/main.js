$(document).ready(function() {
    $('.group').toArray().forEach(element => {
        let randomColors = Math.floor(Math.random() * 16777215).toString(16);
        let color = '#' + randomColors;
        element.style.backgroundColor = color;
        element.style.border = "1px solid " + color;
    });
});