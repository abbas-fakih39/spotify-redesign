@extends('layouts.app')

@section('content')
<div class="spotify-search">
    <div class="search-header">
        <h1 class="title">Rechercher</h1>
    </div>
    
    <div class="search-container">
        <div class="search-input-container">
            <i class="fas fa-search search-icon"></i>
            <input type="text" id="search-input" class="search-input" placeholder="Artistes, titres ou podcasts">
        </div>
        
        <div class="search-results" id="search-results">
            <p class="search-placeholder">Qu'aimeriez-vous écouter ?</p>
        </div>
        
        <div class="search-categories">
            <h3>Parcourir tout</h3>
            <div class="category-grid">
                <div class="category-card" style="background-color: #E13300;">
                    <h4>Podcasts</h4>
                </div>
                <div class="category-card" style="background-color: #7358FF;">
                    <h4>Live</h4>
                </div>
                <div class="category-card" style="background-color: #1E3264;">
                    <h4>Rap</h4>
                </div>
                <div class="category-card" style="background-color: #E8115B;">
                    <h4>Pop</h4>
                </div>
            </div>
        </div>
    </div>
</div>
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
});
</script>
@endsection