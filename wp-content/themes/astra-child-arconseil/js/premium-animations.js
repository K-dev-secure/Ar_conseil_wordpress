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

    // ============================================
    // 6. ACCUEIL — Section "Nos Services" (image + texte)
    // ============================================
    gsap.utils.toArray('.first_section_accueil h2').forEach(function(el) {
        gsap.set(el, { opacity: 0, y: 30 });
        gsap.to(el, {
            opacity: 1,
            y: 0,
            duration: 0.9,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: el,
                start: 'top 85%',
                toggleActions: 'play none none none'
            }
        });
    });

    const imgGaucheAccueil = document.querySelector('.background_blanc_accueil .img_gauche');
    if (imgGaucheAccueil) {
        gsap.set(imgGaucheAccueil, { opacity: 0, x: -60 });
        gsap.to(imgGaucheAccueil, {
            opacity: 1,
            x: 0,
            duration: 1.1,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: '.background_blanc_accueil',
                start: 'top 80%',
                toggleActions: 'play none none none'
            }
        });
    }

    const textAccueil = document.querySelector('.background_blanc_accueil .text');
    if (textAccueil) {
        gsap.set(textAccueil, { opacity: 0, x: 60 });
        gsap.to(textAccueil, {
            opacity: 1,
            x: 0,
            duration: 1.1,
            delay: 0.2,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: '.background_blanc_accueil',
                start: 'top 80%',
                toggleActions: 'play none none none'
            }
        });
    }

    // ============================================
    // 7. ACCUEIL — Section Expertises (accordéons + carte media)
    // ============================================
    gsap.utils.toArray('.services_header_top').forEach(function(el) {
        gsap.set(el, { opacity: 0, y: 25 });
        gsap.to(el, {
            opacity: 1,
            y: 0,
            duration: 0.9,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: el,
                start: 'top 85%',
                toggleActions: 'play none none none'
            }
        });
    });

    const serviceLines = gsap.utils.toArray('.service_ligne');
    const servicesList = document.querySelector('.services_liste');
    if (serviceLines.length && servicesList) {
        gsap.set(serviceLines, { opacity: 0, x: -30 });
        gsap.to(serviceLines, {
            opacity: 1,
            x: 0,
            duration: 0.7,
            stagger: 0.1,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: servicesList,
                start: 'top 80%',
                toggleActions: 'play none none none'
            }
        });
    }

    const servicesMedia = document.querySelector('.services_media');
    if (servicesMedia) {
        gsap.set(servicesMedia, { opacity: 0, x: 50 });
        gsap.to(servicesMedia, {
            opacity: 1,
            x: 0,
            duration: 1.1,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: servicesMedia,
                start: 'top 80%',
                toggleActions: 'play none none none'
            }
        });
    }

    // ============================================
    // 8. ACCUEIL — CTA finale (stagger sur les enfants)
    // ============================================
    const ctaSection = document.querySelector('.section_cta_accueil');
    if (ctaSection) {
        const ctaChildren = ctaSection.querySelectorAll('.cta_sur_titre, h2, p, .cta_premium_btn');
        if (ctaChildren.length) {
            gsap.set(ctaChildren, { opacity: 0, y: 35 });
            gsap.to(ctaChildren, {
                opacity: 1,
                y: 0,
                duration: 0.9,
                stagger: 0.15,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: ctaSection,
                    start: 'top 75%',
                    toggleActions: 'play none none none'
                }
            });
        }
    }

    // ============================================
    // 9. CABINET — Chiffres clés (scale + stagger)
    // ============================================
    const chiffreCards = gsap.utils.toArray('.chiffre_card_box');
    const chiffreSection = document.querySelector('.section_chiffres_cles');
    if (chiffreCards.length && chiffreSection) {
        gsap.set(chiffreCards, { opacity: 0, y: 30, scale: 0.95 });
        gsap.to(chiffreCards, {
            opacity: 1,
            y: 0,
            scale: 1,
            duration: 0.8,
            stagger: 0.15,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: chiffreSection,
                start: 'top 80%',
                toggleActions: 'play none none none'
            }
        });
    }

    // ============================================
    // 10. ACTUALITÉS — Cards (triggers individuels)
    // ============================================
    gsap.utils.toArray('.actu_card').forEach(function(card) {
        gsap.set(card, { opacity: 0, y: 40 });
        gsap.to(card, {
            opacity: 1,
            y: 0,
            duration: 0.8,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: card,
                start: 'top 87%',
                toggleActions: 'play none none none'
            }
        });
    });

    // ============================================
    // 11. HEADERS — Stagger des éléments au chargement (toutes pages)
    // ============================================
    const headerSelectors = [
        '.header_accueil_content .header_tagline, .header_accueil_content h1, .header_accueil_content h2, .header_accueil_content .header_buttons',
        '.header_cabinet_content .header_tagline, .header_cabinet_content h1, .header_cabinet_content h2',
        '.header_services_content .header_tagline, .header_services_content h1, .header_services_content h2',
        '.header_contact_content .header_tagline, .header_contact_content h1, .header_contact_content h2'
    ];

    headerSelectors.forEach(function(selector) {
        const els = document.querySelectorAll(selector);
        if (!els.length) return;
        gsap.set(els, { opacity: 0, y: 25 });
        gsap.to(els, {
            opacity: 1,
            y: 0,
            duration: 0.9,
            stagger: 0.18,
            delay: 0.6,
            ease: 'power2.out'
        });
    });

    const actuH1 = document.querySelector('.background_header_actualite h1');
    if (actuH1) {
        gsap.set(actuH1, { opacity: 0, y: 25 });
        gsap.to(actuH1, { opacity: 1, y: 0, duration: 0.9, delay: 0.6, ease: 'power2.out' });
    }

    // ============================================
    // 12. PAGE SERVICES — Titres de section (h2 + trait doré animé)
    // ============================================
    gsap.utils.toArray('.partie_service_header').forEach(function(header) {
        const h2 = header.querySelector('h2');
        const divider = header.querySelector('.divider_gold');

        if (h2) {
            gsap.set(h2, { opacity: 0, y: 25 });
            gsap.to(h2, {
                opacity: 1,
                y: 0,
                duration: 0.9,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: header,
                    start: 'top 85%',
                    toggleActions: 'play none none none'
                }
            });
        }

        if (divider) {
            gsap.set(divider, { scaleX: 0, transformOrigin: 'center center' });
            gsap.to(divider, {
                scaleX: 1,
                duration: 0.8,
                delay: 0.3,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: header,
                    start: 'top 85%',
                    toggleActions: 'play none none none'
                }
            });
        }
    });

    // ============================================
    // 13. GLOBAL — Zone contenu WordPress (formulaire, texte de page)
    // ============================================
    gsap.utils.toArray('.gutenberg-content').forEach(function(el) {
        if (!el.children.length) return;
        gsap.set(el, { opacity: 0, y: 30 });
        gsap.to(el, {
            opacity: 1,
            y: 0,
            duration: 0.9,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: el,
                start: 'top 85%',
                toggleActions: 'play none none none'
            }
        });
    });

    // ============================================
    // 14. PAGE ACTUALITÉS — Pagination
    // ============================================
    gsap.utils.toArray('.actu_pagination').forEach(function(el) {
        gsap.set(el, { opacity: 0, y: 20 });
        gsap.to(el, {
            opacity: 1,
            y: 0,
            duration: 0.7,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: el,
                start: 'top 90%',
                toggleActions: 'play none none none'
            }
        });
    });

    // ============================================
    // 15. PAGE MENTIONS LÉGALES — Blocs de contenu
    // ============================================
    gsap.utils.toArray('.mentions_block').forEach(function(block, i) {
        gsap.set(block, { opacity: 0, y: 30 });
        gsap.to(block, {
            opacity: 1,
            y: 0,
            duration: 0.9,
            delay: i * 0.15,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: block,
                start: 'top 85%',
                toggleActions: 'play none none none'
            }
        });
    });

})();
