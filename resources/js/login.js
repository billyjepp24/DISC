document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password');
    const toggleBtn = document.getElementById('togglePassword');
    if (toggleBtn && passwordInput) {
        toggleBtn.addEventListener('click', function() {
            passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
        });
    }
});
   

function validateLogin() {
    const inputCode = document.getElementById('code').value;
    const inputPassword = document.getElementById('password').value;

    if (inputCode === code.toString() && inputPassword === password) {
        alert('Login successful!');
        // Redirect to the dashboard or another page    
        window.location.href = '/googleform';
    } else {
        alert('Invalid code or password. Please try again.');
    }
}
