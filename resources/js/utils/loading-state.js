document.getElementById('loginForm').addEventListener('submit', function(e) {
    const button = document.getElementById('submitBtn');
    const spinner = document.getElementById('loadingSpinner');
    const btnText = document.getElementById('btnText');

    button.disabled = true;
    spinner.classList.remove('hidden');
    btnText.textContent = 'Signing in...';
});
