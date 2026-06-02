/**
 * Premium Animations for AR Conseil - All Pages
 * Uses GSAP + ScrollTrigger for luxury scroll animations
 * Supports both data-animate attributes and CSS classes (.fade-up, .fade-left, .fade-right)
 */

(function() {
    'use strict';

    // Ensure GSAP & ScrollTrigger are available
    if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
        console.warn('GSAP or ScrollTrigger not loaded');
        return;
    }

    // Register ScrollTrigger plugin
    gsap.registerPlugin(ScrollTrigger);

    // ============================================
    // 1. FADE UP Animation - CSS Classes & Data Attributes
    // ============================================
    gsap.utils.toArray('.fade-up, [data-animate="fade-up"]').forEach(function(element, index) {
        const delay = (element.style.getPropertyValue('--animation-delay') || element.dataset.delay || '0s');
        const delayMs = parseFloat(delay) / 1000;
        
        gsap.set(element, {
            opacity: 0,
            y: 30
        });

        gsap.to(element, {
            opacity: 1,
            y: 0,
            duration: 1.0,
            delay: delayMs,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: element,
                start: 'top 85%',
                end: 'top 50%',
                toggleActions: 'play none none none'
            }
        });
    });

    // ============================================
    // 2. STAGGERED LIST ITEMS Animation
    // ============================================
    gsap.utils.toArray('.unified_cards_container .unified_card').forEach(function(card, index) {
        const delay = card.dataset.delay ? parseFloat(card.dataset.delay) / 1000 : 0;
        
        gsap.set(card, {
            opacity: 0,
            y: 40
        });

        gsap.to(card, {
            opacity: 1,
            y: 0,
            duration: 0.9,
            delay: delay,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: '.unified_cards_container',
                start: 'top 75%',
                end: 'top 40%',
                toggleActions: 'play none none none'
            }
        });
    });

    // ============================================
    // 3. LIGHT PARALLAX on Section Backgrounds
    // ============================================
    gsap.utils.toArray('[data-animate*="fade"], .fade-up, .fade-left, .fade-right').forEach(function(section) {
        if (section.classList.contains('section_chiffres_cles') ||
            section.classList.contains('second_section_cabinet') ||
            section.classList.contains('section_equipe') ||
            section.classList.contains('section_carrousel') ||
            section.classList.contains('premiere_section_service') ||
            section.classList.contains('section_simulateurs_services')) {
            
            gsap.to(section, {
                y: -20,
                ease: 'none',
                scrollTrigger: {
                    trigger: section,
                    start: 'top center',
                    end: 'bottom center',
                    scrub: 0.5,
                    markers: false
                }
            });
        }
    });

    // ============================================
    // 4. FADE LEFT Animation - CSS Classes & Data Attributes
    // ============================================
    gsap.utils.toArray('.fade-left, [data-animate="fade-left"]').forEach(function(element) {
        const delay = (element.style.getPropertyValue('--animation-delay') || element.dataset.delay || '0s');
        const delayMs = parseFloat(delay) / 1000;
        
        gsap.set(element, {
            opacity: 0,
            x: -50
        });

        gsap.to(element, {
            opacity: 1,
            x: 0,
            duration: 1.1,
            delay: delayMs,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: element,
                start: 'top 80%',
                end: 'top 50%',
                toggleActions: 'play none none none'
            }
        });
    });

    // ============================================
    // 5. FADE RIGHT Animation - CSS Classes & Data Attributes
    // ============================================
    gsap.utils.toArray('.fade-right, [data-animate="fade-right"]').forEach(function(element) {
        const delay = (element.style.getPropertyValue('--animation-delay') || element.dataset.delay || '0s');
        const delayMs = parseFloat(delay) / 1000;
        
        gsap.set(element, {
            opacity: 0,
            x: 50
        });

        gsap.to(element, {
            opacity: 1,
            x: 0,
            duration: 1.1,
            delay: delayMs,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: element,
                start: 'top 80%',
                end: 'top 50%',
                toggleActions: 'play none none none'
            }
        });
    });

})();
