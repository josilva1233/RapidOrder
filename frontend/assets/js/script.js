document.addEventListener('DOMContentLoaded', function() {
    // Função para confirmar a ação de deletar
    function confirmDelete(event) {
        event.preventDefault(); // Evita que o link seja seguido imediatamente
        if (confirm('Are you sure you want to delete this user?')) {
            window.location.href = this.href; // Segue o link se o usuário confirmar
        }
    }

    // Adiciona o evento de clique para os links de deletar
    const deleteLinks = document.querySelectorAll('.btn-danger');
    deleteLinks.forEach(function(link) {
        link.addEventListener('click', confirmDelete);
    });

    // Função para mostrar o carregamento da página
    function showLoading() {
        const loadingElement = document.createElement('div');
        loadingElement.id = 'loading';
        loadingElement.style.position = 'fixed';
        loadingElement.style.top = '0';
        loadingElement.style.left = '0';
        loadingElement.style.width = '100%';
        loadingElement.style.height = '100%';
        loadingElement.style.backgroundColor = 'rgba(255, 255, 255, 0.7)';
        loadingElement.style.display = 'flex';
        loadingElement.style.alignItems = 'center';
        loadingElement.style.justifyContent = 'center';
        loadingElement.style.zIndex = '9999';
        loadingElement.innerHTML = '<div>Loading...</div>';
        document.body.appendChild(loadingElement);
    }

    // Adiciona o evento para mostrar o carregamento ao clicar em qualquer link
    const allLinks = document.querySelectorAll('a');
    allLinks.forEach(function(link) {
        link.addEventListener('click', showLoading);
    });

    // Remove o carregamento da página quando o conteúdo estiver totalmente carregado
    window.addEventListener('load', function() {
        const loadingElement = document.getElementById('loading');
        if (loadingElement) {
            loadingElement.remove();
        }
    });
});
