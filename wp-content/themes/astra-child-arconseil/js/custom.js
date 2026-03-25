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
            carousel.innerHTML = '<p class="partner-name">Ajoutez vos URLs de logos dans js/custom.js</p>';
            return;
        }

        let carouselHTML = '<div class="carousel-track">';

        filteredLogos.forEach((logoSrc, index) => {
            carouselHTML += `
                <div class="partner-slide">
                    <img src="${logoSrc}" alt="Partenaire ${index + 1}" class="partner-logo" loading="lazy">
                </div>
            `;
        });

        filteredLogos.forEach((logoSrc, index) => {
            carouselHTML += `
                <div class="partner-slide">
                    <img src="${logoSrc}" alt="Partenaire ${index + 1}" class="partner-logo" loading="lazy">
                </div>
            `;
        });

        carouselHTML += '</div>';
        carousel.innerHTML = carouselHTML;

        const logos = carousel.querySelectorAll('.partner-logo');
        logos.forEach((logo, index) => {
            logo.addEventListener('error', function() {
                this.style.display = 'none';
                const partnerName = document.createElement('div');
                partnerName.className = 'partner-name';
                partnerName.textContent = `Partenaire ${(index % filteredLogos.length) + 1}`;
                this.parentElement.appendChild(partnerName);
            });
        });
    }

    
    /**
     * Quand le document est prêt
     */
    $(document).ready(function() {
        
        // Votre code JavaScript ici
        console.log('Thème AR CONSEIL chargé avec succès !');
        
        // Exemple : Smooth scroll pour les ancres
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
