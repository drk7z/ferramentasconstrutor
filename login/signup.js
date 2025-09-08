ariodocument.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.getElementById('name');
    const userInput = document.getElementById('user');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    const emailInput = document.getElementById('email');
    const phoneInput = document.getElementById('phone');
    const signupBtn = document.getElementById('signupBtn');
    const form = document.getElementById('signupForm');

    // Regex patterns
    const nameRegex = /^[a-zA-Z\s']+$/;
    const userRegex = /^[a-zA-Z0-9_-]+$/;
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    const phoneRegex = /^\+?\d{1,3}[\s]?\d{1,4}[\s]?\d{4,5}[-]?\d{4}$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    function validateForm() {
        const name = nameInput.value.trim();
        const user = userInput.value.trim();
        const password = passwordInput.value.trim();
        const confirmPassword = confirmPasswordInput.value.trim();
        const email = emailInput.value.trim();
        const phone = phoneInput.value.trim();

        const isNameValid = nameRegex.test(name);
        const isUserValid = userRegex.test(user);
        const isPasswordValid = passwordRegex.test(password);
        const isPhoneValid = phoneRegex.test(phone);
        const isEmailValid = emailRegex.test(email);
        const isConfirmPasswordValid = password === confirmPassword;

        let errors = [];

        if (!isNameValid || name === '') errors.push('Nome inválido.');
        if (!isUserValid || user === '') errors.push('Usuário inválido.');
        if (!isPasswordValid || password === '') errors.push('Senha não atende aos requisitos.');
        if (!isConfirmPasswordValid) errors.push('Senhas não coincidem.');
        if (!isEmailValid || email === '') errors.push('E-mail inválido.');
        if (!isPhoneValid || phone === '') errors.push('Telefone inválido.');

        return errors;
    }

    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    form.addEventListener('submit', function(e) {
        const errors = validateForm();
        if (errors.length > 0) {
            e.preventDefault();
            alert('Erros no formulário:\n' + errors.join('\n'));
        }
        // If no errors, let it submit to PHP
    });
});
