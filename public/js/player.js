document.addEventListener('DOMContentLoaded', function() {
    // Éléments du lecteur
    const playPauseBtn = document.querySelector('.play-pause');
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');
    const shuffleBtn = document.querySelector('.shuffle');
    const repeatBtn = document.querySelector('.repeat');
    const progressBar = document.querySelector('.progress-bar');
    const progressFilled = document.querySelector('.progress-filled');
    const currentTimeEl = document.querySelector('.time.current');
    const totalTimeEl = document.querySelector('.time.total');
    
    // Variables d'état
    let isPlaying = false;
    let duration = 222; // 3:42 en secondes
    let currentTime = 0;
    let interval;
    
    // Fonction pour formater le temps (secondes -> MM:SS)
    function formatTime(seconds) {
        const mins = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${mins}:${secs < 10 ? '0' + secs : secs}`;
    }
    
    // Initialiser l'affichage du temps
    totalTimeEl.textContent = formatTime(duration);
    currentTimeEl.textContent = formatTime(currentTime);
    
    // Mise à jour de la barre de progression
    function updateProgress() {
        const percent = (currentTime / duration) * 100;
        progressFilled.style.width = `${percent}%`;
        currentTimeEl.textContent = formatTime(currentTime);
    }
    
    // Fonction de lecture
    function play() {
        isPlaying = true;
        playPauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
        
        // Simuler la lecture en avançant le temps
        interval = setInterval(() => {
            if (currentTime < duration) {
                currentTime++;
                updateProgress();
            } else {
                // Si la chanson est terminée
                pause();
                currentTime = 0;
                updateProgress();
            }
        }, 1000);
    }
    
    // Fonction de pause
    function pause() {
        isPlaying = false;
        playPauseBtn.innerHTML = '<i class="fas fa-play"></i>';
        clearInterval(interval);
    }
    
    // Événement pour le bouton play/pause
    playPauseBtn.addEventListener('click', function() {
        if (isPlaying) {
            pause();
        } else {
            play();
        }
    });
    
    // Événement pour le bouton précédent
    prevBtn.addEventListener('click', function() {
        pause();
        currentTime = 0;
        updateProgress();
        // Animation pour simuler le changement de piste
        animateTrackChange('prev');
    });
    
    // Événement pour le bouton suivant
    nextBtn.addEventListener('click', function() {
        pause();
        currentTime = 0;
        updateProgress();
        // Animation pour simuler le changement de piste
        animateTrackChange('next');
    });
    
    // Événement pour le clic sur la barre de progression
    progressBar.addEventListener('click', function(e) {
        const rect = this.getBoundingClientRect();
        const percent = (e.clientX - rect.left) / rect.width;
        currentTime = Math.floor(percent * duration);
        updateProgress();
    });
    
    // Toggle pour le bouton shuffle
    shuffleBtn.addEventListener('click', function() {
        this.classList.toggle('active');
        if (this.classList.contains('active')) {
            this.style.color = '#1ED760';
        } else {
            this.style.color = 'white';
        }
    });
    
    // Toggle pour le bouton repeat
    repeatBtn.addEventListener('click', function() {
        this.classList.toggle('active');
        if (this.classList.contains('active')) {
            this.style.color = '#1ED760';
        } else {
            this.style.color = 'white';
        }
    });
    
    // Animation de changement de piste
    function animateTrackChange(direction) {
        const trackArtwork = document.querySelector('.track-artwork');
        const trackInfo = document.querySelector('.track-info');
        
        // Animation de sortie
        trackArtwork.style.transition = 'transform 0.3s, opacity 0.3s';
        trackInfo.style.transition = 'transform 0.3s, opacity 0.3s';
        
        trackArtwork.style.opacity = '0';
        trackInfo.style.opacity = '0';
        
        if (direction === 'next') {
            trackArtwork.style.transform = 'translateX(-50px)';
            trackInfo.style.transform = 'translateX(-50px)';
        } else {
            trackArtwork.style.transform = 'translateX(50px)';
            trackInfo.style.transform = 'translateX(50px)';
        }
        
        // Réinitialiser et animer l'entrée après un délai
        setTimeout(() => {
            // Simuler un changement de piste (dans un vrai app, vous changeriez les infos ici)
            if (direction === 'next') {
                document.querySelector('.track-title').textContent = 'Chillhop Essentials';
                document.querySelector('.track-subtitle').textContent = 'Summer 2023';
                document.querySelector('.track-artist').textContent = 'Chillhop Music';
            } else {
                document.querySelector('.track-title').textContent = 'lofi beats';
                document.querySelector('.track-subtitle').textContent = 'to study to';
                document.querySelector('.track-artist').textContent = 'lofi girl';
            }
            
            trackArtwork.style.transform = direction === 'next' ? 'translateX(50px)' : 'translateX(-50px)';
            
            setTimeout(() => {
                trackArtwork.style.opacity = '1';
                trackInfo.style.opacity = '1';
                trackArtwork.style.transform = 'translateX(0)';
                trackInfo.style.transform = 'translateX(0)';
            }, 50);
        }, 300);
    }
});