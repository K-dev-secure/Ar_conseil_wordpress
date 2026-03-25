/**
 * Script d'animations au scroll pour AR Conseil
 */

(function() {
    'use strict';

    // Observer pour détecter les éléments visibles
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.15 // L'élément doit être visible à 15%
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                // Optionnel : arrêter d'observer après l'animation
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observer tous les éléments avec data-animate
    function initAnimations() {
        const animatedElements = document.querySelectorAll('[data-animate]');
        animatedElements.forEach(el => observer.observe(el));
    }

    // Initialiser quand le DOM est prêt
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAnimations);
    } else {
        initAnimations();
    }

    // Support pour Elementor (si la page est éditée avec Elementor)
    window.addEventListener('elementor/frontend/init', () => {
        initAnimations();
    });

})();
