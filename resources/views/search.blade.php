@extends('layouts.app')

@section('content')
<div class="search-page">
    <div class="search-header">
        <h1>RECHERCHER</h1>
    </div>
    
    <div class="search-container">
        <div class="search-bar">
            <input type="text" id="search-input" placeholder="Que souhaitez-vous écouter ?">
            <button class="search-button">
                <i class="fas fa-search"></i>
            </button>
        </div>
        
        <div class="search-results" id="search-results">
            <p class="search-placeholder">Qu'aimeriez-vous écouter ?</p>
        </div>
        
        <div class="search-categories">
            <h2>Artistes du moment</h2>
            <div class="tags-container">
                <a href="#" class="tag">SDM</a>
                <a href="#" class="tag">SABRINA CARPENTER</a>
                <a href="#" class="tag">ROSÉ</a>
                <a href="#" class="tag">PLAYBOI CARTI</a>
                <a href="#" class="tag">THE WEEKND</a>
                <a href="#" class="tag">GAZO</a>
            </div>
            
            <h2>Mood</h2>
            <div class="tags-container">
                <a href="#" class="tag">ENJOUÉ</a>
                <a href="#" class="tag">ÉNERGIQUE</a>
                <a href="#" class="tag">CHILL</a>
                <a href="#" class="tag">MÉLANCOLIE</a>
                <a href="#" class="tag">PARTY</a>
                <a href="#" class="tag">SLEEPY</a>
            </div>
            
            <h2>Genre musical</h2>
            <div class="tags-container">
                <a href="#" class="tag">ELECTRO</a>
                <a href="#" class="tag">RAP</a>
                <a href="#" class="tag">METAL</a>
                <a href="#" class="tag">REGGAE</a>
                <a href="#" class="tag">JAZZ</a>
                <a href="#" class="tag">ROCK</a>
                <a href="#" class="tag">ELECTRO</a>
                <a href="#" class="tag">LOFI</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #000;
        color: #fff;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    }
    
    .search-page {
        min-height: 100vh;
        padding: 20px 16px 80px 16px;
    }
    
    .search-header {
        margin-bottom: 20px;
        display: flex;
        align-items: center;
    }
    
    .search-header h1 {
        margin: 0;
        font-size: 24px;
        font-weight: bold;
    }
    
    /* Barre de recherche */
    .search-container {
        margin-bottom: 30px;
    }
    
    .search-bar {
        position: relative;
        margin-bottom: 30px;
    }
    
    .search-bar input {
        width: 100%;
        padding: 12px 40px 12px 15px;
        background-color: #fff;
        border: none;
        border-radius: 50px;
        font-size: 16px;
        color: #333;
    }
    
    .search-bar input::placeholder {
        color: #888;
    }
    
    .search-button {
        position: absolute;
        right: 5px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #333;
        font-size: 18px;
        padding: 10px;
        cursor: pointer;
    }
    
    /* Catégories et Tags */
    .search-categories h2 {
        font-size: 18px;
        margin: 25px 0 15px 0;
        font-weight: 600;
    }
    
    .tags-container {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 10px;
    }
    
    .tag {
        display: inline-block;
        padding: 8px 16px;
        background-color: #fff;
        color: #000;
        text-decoration: none;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 500;
        text-align: center;
        transition: transform 0.2s;
    }
    
    .tag:hover {
        transform: scale(1.05);
    }
    
    /* Étoile verte décorative */
    .search-bar:after {
        content: "";
        position: absolute;
        right: -30px;
        top: 0;
        width: 60px;
        height: 60px;
        background-color: #1DB954;
        clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
        z-index: -1;
    }
    
    /* Résultats de recherche */
    .search-results {
        margin-top: 20px;
    }
    
    .search-placeholder, .no-results {
        text-align: center;
        color: #999;
        margin-top: 30px;
        font-size: 16px;
    }
    
    .results-list {
        margin-top: 20px;
    }
    
    .result-item {
        display: flex;
        align-items: center;
        padding: 12px;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.2s;
        margin-bottom: 8px;
    }
    
    .result-item:hover {
        background-color: #333;
    }
    
    .result-icon {
        width: 40px;
        height: 40px;
        background-color: #333;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 12px;
    }
    
    .result-icon i {
        color: #1DB954;
    }
    
    .result-info {
        flex: 1;
    }
    
    .result-title {
        font-weight: bold;
        margin-bottom: 2px;
    }
    
    .result-subtitle {
        font-size: 14px;
        color: #aaa;
    }
    
    .result-type {
        font-size: 12px;
        color: #888;
        text-transform: capitalize;
    }
    
    /* Responsive */
    @media (max-width: 480px) {
        .search-header h1 {
            font-size: 20px;
        }
        
        .tag {
            font-size: 12px;
            padding: 6px 12px;
        }
    }
</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');
    const searchResults = document.getElementById('search-results');
    const searchPlaceholder = document.querySelector('.search-placeholder');
    
    // Données simulées pour la recherche
    const mockData = [
        { id: 1, title: 'Shape of You', artist: 'Ed Sheeran', type: 'track' },
        { id: 2, title: 'Blinding Lights', artist: 'The Weeknd', type: 'track' },
        { id: 3, title: 'Dance Monkey', artist: 'Tones and I', type: 'track' },
        { id: 4, title: 'Drake', type: 'artist' },
        { id: 5, title: 'Billie Eilish', type: 'artist' },
        { id: 6, title: 'Summer Playlist', type: 'playlist' }
    ];
    
    // Fonction pour afficher une notification
    function showNotification(message) {
        const notification = document.createElement('div');
        notification.className = 'notification';
        notification.innerHTML = message;
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.remove();
        }, 3000);
    }
    
    // Fonction de recherche
    searchInput.addEventListener('input', function() {
        const query = this.value.toLowerCase().trim();
        
        if (query.length === 0) {
            searchResults.innerHTML = '<p class="search-placeholder">Qu\'aimeriez-vous écouter ?</p>';
            return;
        }
        
        // Filtrer les résultats
        const results = mockData.filter(item => 
            item.title.toLowerCase().includes(query) || 
            (item.artist && item.artist.toLowerCase().includes(query))
        );
        
        // Afficher les résultats
        if (results.length === 0) {
            searchResults.innerHTML = '<p class="no-results">Aucun résultat trouvé pour "' + query + '"</p>';
        } else {
            let html = '<div class="results-list">';
            
            results.forEach(item => {
                let iconClass = 'fa-music';
                if (item.type === 'artist') iconClass = 'fa-user';
                else if (item.type === 'playlist') iconClass = 'fa-list';
                
                html += `
                <div class="result-item" data-id="${item.id}">
                    <div class="result-icon">
                        <i class="fas ${iconClass}"></i>
                    </div>
                    <div class="result-info">
                        <div class="result-title">${item.title}</div>
                        ${item.artist ? `<div class="result-subtitle">${item.artist}</div>` : ''}
                        <div class="result-type">${item.type}</div>
                    </div>
                </div>`;
            });
            
            html += '</div>';
            searchResults.innerHTML = html;
            
            // Ajouter des événements de clic aux résultats
            document.querySelectorAll('.result-item').forEach(item => {
                item.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const result = mockData.find(r => r.id == id);
                    
                    if (result.type === 'track') {
                        window.location.href = `/player/${id}`;
                    } else if (result.type === 'artist') {
                        showNotification(`Affichage de l'artiste : ${result.title}`);
                    } else if (result.type === 'playlist') {
                        showNotification(`Ouverture de la playlist : ${result.title}`);
                    }
                });
            });
        }
    });
    
    // Style de notification
    const style = document.createElement('style');
    style.textContent = `
        .notification {
            position: fixed;
            bottom: 80px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #1DB954;
            color: white;
            padding: 12px 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            z-index: 1000;
            animation: fadeIn 0.3s, fadeOut 0.3s 2.7s;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translate(-50%, 20px); }
            to { opacity: 1; transform: translate(-50%, 0); }
        }
        
        @keyframes fadeOut {
            from { opacity: 1; transform: translate(-50%, 0); }
            to { opacity: 0; transform: translate(-50%, -20px); }
        }
    `;
    document.head.appendChild(style);
});
</script>
@endsection