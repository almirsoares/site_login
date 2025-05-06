document.addEventListener('DOMContentLoaded', function() {
    // Validação do formulário de login
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value;
            
            if (!username || !password) {
                e.preventDefault();
                alert('Por favor, preencha todos os campos.');
            }
        });
    }
    
    // Mostrar mensagens de erro
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('error')) {
        const errorMessage = urlParams.get('error');
        alert(errorMessage);
    }
});