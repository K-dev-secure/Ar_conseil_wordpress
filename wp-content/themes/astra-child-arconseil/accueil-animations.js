// Animation haut de gamme pour Accueil AR CONSEIL
// Utilise GSAP + ScrollTrigger si dispo, sinon Vanilla JS
// Place ce fichier dans le thème enfant, inclus-le dans functions.php ou directement dans Accueil.php

(function(){
  // Vérifie si GSAP et ScrollTrigger sont chargés
  function loadScript(src, cb) {
    var s = document.createElement('script');
    s.src = src;
    s.onload = cb;
    document.head.appendChild(s);
  }

  function startAnimations() {
    // Révélations au scroll (titres, paragraphes, etc.)
    gsap.utils.toArray('.background_header_accueil h1, .background_header_accueil h2, .first_section_accueil h2, .first_section_accueil .text h3, .first_section_accueil .text p, .services_header_top span, .services_header_top h2, .service_ligne, .section_cta_accueil h2, .section_cta_accueil p').forEach(function(el, i){
      gsap.set(el, {opacity:0, y:30});
      gsap.to(el, {
        scrollTrigger: {
          trigger: el,
          start: 'top 85%',
        },
        opacity:1,
        y:0,
        duration:0.9,
        delay: i*0.07,
        ease:'power3.out'
      });
    });

    // Parallax sur l'image de gauche
    if(document.querySelector('.img_gauche img')){
      gsap.to('.img_gauche img', {
        y: -40,
        ease: 'none',
        scrollTrigger: {
          trigger: '.first_section_accueil',
          start: 'top bottom',
          end: 'bottom top',
          scrub: 0.5
        }
      });
    }

    // Slide-in latéral sur la carte texte
    if(document.querySelector('.background_blanc_accueil .text')){
      gsap.set('.background_blanc_accueil .text', {opacity:0, x:40});
      gsap.to('.background_blanc_accueil .text', {
        scrollTrigger: {
          trigger: '.background_blanc_accueil .text',
          start: 'top 85%',
        },
        opacity:1,
        x:0,
        duration:1.1,
        ease:'expo.out'
      });
    }

    // Accordéon services : micro-animation + transition fluide
    document.querySelectorAll('.service_ligne').forEach(function(ligne){
      ligne.addEventListener('click', function(){
        var icon = this.querySelector('.plus-icon');
        if(icon){
          icon.animate([
            {transform:'rotate(0deg)'},
            {transform:'rotate(45deg)'}
          ], {
            duration: 350,
            easing: 'cubic-bezier(0.77,0,0.175,1)',
            fill:'forwards'
          });
        }
        var desc = this.querySelector('.description-detaillee');
        if(desc){
          desc.style.transition = 'max-height 0.6s cubic-bezier(0.77,0,0.175,1), opacity 0.5s';
          if(this.classList.contains('active')){
            desc.style.maxHeight = desc.scrollHeight+'px';
            desc.style.opacity = 1;
          }else{
            desc.style.maxHeight = '0px';
            desc.style.opacity = 0;
          }
        }
      });
    });

    // Hover : brillance ultra-rapide sur .gold-line
    document.querySelectorAll('.gold-line').forEach(function(line){
      line.addEventListener('mouseenter', function(){
        line.classList.add('glint');
        setTimeout(function(){line.classList.remove('glint');}, 350);
      });
    });

    // Hover : zoom lent sur image .background_blanc_accueil
    var img = document.querySelector('.background_blanc_accueil .img_gauche img');
    if(img){
      img.addEventListener('mouseenter', function(){
        img.style.transition = 'transform 1.2s cubic-bezier(0.77,0,0.175,1)';
        img.style.transform = 'scale(1.07)';
      });
      img.addEventListener('mouseleave', function(){
        img.style.transform = 'scale(1)';
      });
    }
  }

  if(typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined'){
    loadScript('https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', function(){
      loadScript('https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js', function(){
        gsap.registerPlugin(ScrollTrigger);
        startAnimations();
      });
    });
  }else{
    gsap.registerPlugin(ScrollTrigger);
    startAnimations();
  }
})();
