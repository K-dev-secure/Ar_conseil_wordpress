/**
 * Fichier JavaScript personnalisé - AR CONSEIL
 * 
 * Ajoutez vos scripts personnalisés ici
 */

(function($) {
    'use strict';

    function initPartnersCarousel() {
        const carousel = document.querySelector('.js-partners-carousel');

        if (!carousel) {
            return;
        }

        const base = (typeof arConseil !== 'undefined' && arConseil.siteUrl) ? arConseil.siteUrl : '';

        const partnerLogos = [
            base + '/wp-content/uploads/2026/02/mma_asssu.png',
            base + '/wp-content/uploads/2026/02/natixis_logo.png',
            base + '/wp-content/uploads/2026/02/cardif-bnp-paribas-group.png',
            base + '/wp-content/uploads/2026/02/abeille-assurances-.png',
            base + '/wp-content/uploads/2026/02/JPMorgan_logo-scaled.png',
            base + '/wp-content/uploads/2026/02/logo_nortia-scaled.png',
            base + '/wp-content/uploads/2026/02/Amundi_logo-scaled.png',
            base + '/wp-content/uploads/2026/02/Swiss_Life_logo.png',
            base + '/wp-content/uploads/2026/02/Rothschild_logo.png'
        ];

        const filteredLogos = partnerLogos.filter((url) => url && !url.startsWith('COLLEZ_ICI_URL'));

        if (!filteredLogos.length) {
            carousel.innerHTML = '<p class="partner-fallback-text">Ajoutez vos URLs de logos dans js/custom.js</p>';
            return;
        }

        // Création du conteneur de la piste de défilement
        const track = document.createElement('div');
        track.className = 'carousel-track';

        // Pour un défilement infini parfait sans saccade sur grand écran, 
        // on duplique la série de logos 3 fois plutôt que 2.
        const duplicationCount = 3; 
        
        for (let i = 0; i < duplicationCount; i++) {
            filteredLogos.forEach((logoSrc) => {
                // Extraction d'un nom propre par défaut basé sur le nom du fichier image
                const fileName = logoSrc.substring(logoSrc.lastIndexOf('/') + 1);
                let cleanName = fileName.split(/[-_\.]/)[0];
                cleanName = cleanName.charAt(0).toUpperCase() + cleanName.slice(1);

                const slide = document.createElement('div');
                slide.className = 'partner-slide';

                const img = document.createElement('img');
                img.src = logoSrc;
                img.alt = `Logo ${cleanName}`;
                img.className = 'partner-logo';
                img.setAttribute('loading', 'lazy');

                // Gestion premium des images cassées (Fallback)
                img.addEventListener('error', function() {
                    this.style.display = 'none';
                    const fallbackBadge = document.createElement('div');
                    fallbackBadge.className = 'partner-name-fallback';
                    fallbackBadge.textContent = cleanName;
                    slide.appendChild(fallbackBadge);
                });

                slide.appendChild(img);
                track.appendChild(slide);
            });
        }

        carousel.innerHTML = '';
        carousel.appendChild(track);
    }

    /**
     * Quand le document est prêt
     */
    $(document).ready(function() {
        
        console.log('Thème AR CONSEIL chargé avec succès !');
        
        // Smooth scroll pour les ancres
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if(target.length) {
                e.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 100
                }, 1000);
            }
        });

        initPartnersCarousel();
        
    });
    
})(jQuery);