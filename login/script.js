document.addEventListener('DOMContentLoaded', function() {
    const userInput = document.getElementById('user');
    const passwordInput = document.getElementById('password');
    const loginBtn = document.getElementById('loginBtn');
    const recoverBtn = document.getElementById('recoverBtn');
    const form = document.getElementById('loginForm');

    function checkFields() {
        if (userInput.value.trim() !== '' && passwordInput.value.trim() !== '') {
            loginBtn.disabled = false;
        } else {
            loginBtn.disabled = true;
        }
    }

    userInput.addEventListener('input', checkFields);
    passwordInput.addEventListener('input', checkFields);

    recoverBtn.addEventListener('click', function() {
        window.location.href = 'recover.php';
    });

    const signupBtn = document.getElementById('signupBtn');
    signupBtn.addEventListener('click', function() {
        window.location.href = 'signup.php';
    });

    form.addEventListener('submit', function(e) {
        // Let it submit to PHP
    });
});
