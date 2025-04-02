document.addEventListener('DOMContentLoaded', function() {
    // Fonction pour afficher une notification
    window.showNotification = function(message, type = 'success') {
        const notification = document.createElement('div');
        notification.className = `spotify-notification ${type}`;
        notification.innerHTML = `
            <div class="notification-content">
                <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'}"></i>
                <p>${message}</p>
            </div>
        `;
        
        document.body.appendChild(notification);
        
        // Animation d'entrée
        setTimeout(() => notification.classList.add('show'), 10);
        
        // Disparition après 3 secondes
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }
    
    // Fonctionnalité d'ajout aux playlists (simulée)
    const addToPlaylistButtons = document.querySelectorAll('.add-to-playlist');
    if (addToPlaylistButtons) {
        addToPlaylistButtons.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const trackId = this.dataset.trackId;
                const trackName = this.dataset.trackName || 'Ce morceau';
                
                // Simuler un ajout réussi
                showNotification(`${trackName} a été ajouté à votre playlist !`);
            });
        });
    }
});