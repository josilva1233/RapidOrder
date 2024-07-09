document.addEventListener('DOMContentLoaded', function() {
    // Function to confirm the delete action
    function confirmDelete(event) {
        event.preventDefault(); // Prevents the link from being followed immediately
        if (confirm('Are you sure you want to delete this user?')) {
            window.location.href = this.href; // Follows the link if the user confirms
        }
    }

    // Adds click event for delete links
    const deleteLinks = document.querySelectorAll('.btn-danger');
    deleteLinks.forEach(function(link) {
        link.addEventListener('click', confirmDelete);
    });

    // Function to show page loading
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

    // Adds event to show loading when clicking any link
    const allLinks = document.querySelectorAll('a');
    allLinks.forEach(function(link) {
        link.addEventListener('click', showLoading);
    });

    // Removes page loading when content is fully loaded
    window.addEventListener('load', function() {
        const loadingElement = document.getElementById('loading');
        if (loadingElement) {
            loadingElement.remove();
        }
    });
});


