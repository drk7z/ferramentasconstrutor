document.addEventListener('DOMContentLoaded', function() {
    const emailInput = document.getElementById('email');
    const recoverBtn = document.getElementById('recoverBtn');
    const form = document.getElementById('recoverForm');

    // Regex patterns
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    function checkFields() {
        const email = emailInput.value.trim();

        const isEmailValid = emailRegex.test(email);

        if (email !== '' && isEmailValid) {
            recoverBtn.disabled = false;
        } else {
            recoverBtn.disabled = true;
        }
    }

    emailInput.addEventListener('input', checkFields);

    form.addEventListener('submit', function(e) {
        // Let it submit to PHP
    });
});
