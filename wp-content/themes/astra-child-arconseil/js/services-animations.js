// Animations reveal et micro-interactions page Services AR CONSEIL
(function(){
  function loadScript(src, cb) {
    var s = document.createElement('script');
    s.src = src;
    s.onload = cb;
    document.head.appendChild(s);
  }

  function startAnimations() {
    // Reveal au scroll pour chaque bloc .services_list
    gsap.utils.toArray('.services_list').forEach(function(item, i){
      var img = item.querySelector('img');
      var txts = [item.querySelector('h3'), item.querySelector('p')];
      
      // On détecte si c'est un bloc pair (image à gauche en desktop)
      var isEven = (i + 1) % 2 === 0;

      // Image reveal (Glisse vers le haut)
      if(img){
        gsap.set(img, {opacity: 0, y: 30});
        gsap.to(img, {
          scrollTrigger: {
            trigger: item,
            start: 'top 85%',
            once: true
          },
          opacity: 1,
          y: 0,
          duration: 1,
          ease: 'power3.out'
        });
      }

      // Texte reveal (Mouvement latéral opposé à l'image)
      txts.forEach(function(txt, j){
        if(txt){
          // Si isEven est vrai, l'image est à gauche, donc le texte doit venir de la droite (+30)
          // Sinon l'image est à droite, le texte vient de la gauche (-30)
          gsap.set(txt, {opacity: 0, x: isEven ? 30 : -30});
          gsap.to(txt, {
            scrollTrigger: {
              trigger: item,
              start: 'top 85%',
              once: true
            },
            opacity: 1,
            x: 0,
            delay: 0.2 + j * 0.15,
            duration: 0.8,
            ease: 'expo.out'
          });
        }
      });
    });

    // Effet de parallaxe "soft" sur les images au mouvement de souris
    document.querySelectorAll('.services_list img').forEach(function(img){
      var container = img.closest('.services_list');
      
      container.addEventListener('mousemove', function(e){
        var rect = img.getBoundingClientRect();
        var x = (e.clientX - rect.left) / rect.width - 0.5;
        var y = (e.clientY - rect.top) / rect.height - 0.5;
        
        // Mouvement subtil de 10px max
        gsap.to(img, {
          x: x * 10,
          y: (y * 10) - 10, // -10 pour compenser le hover CSS
          scale: 1.02,
          duration: 0.5,
          ease: 'power2.out'
        });
      });

      container.addEventListener('mouseleave', function(){
        gsap.to(img, {
          x: 0,
          y: 0,
          scale: 1,
          duration: 0.8,
          ease: 'elastic.out(1, 0.5)'
        });
      });
    });
  }

  // Chargement de GSAP si absent
  if(typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined'){
    loadScript('https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', function(){
      loadScript('https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js', function(){
        gsap.registerPlugin(ScrollTrigger);
        startAnimations();
      });
    });
  } else {
    gsap.registerPlugin(ScrollTrigger);
    startAnimations();
  }
})();