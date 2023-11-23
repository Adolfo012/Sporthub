// error-handler.js
function showErrorAlerts() {
    var errorElements = document.querySelectorAll('.error-message');
    var errorMessages = [];

    errorElements.forEach(function(element) {
        errorMessages.push(element.innerText);
    });

    if (errorMessages.length > 0) {
        alert(errorMessages.join('\n'));
    }
}

window.onload = showErrorAlerts;