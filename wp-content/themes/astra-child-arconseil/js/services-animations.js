// Animations reveal et micro-interactions page Services AR CONSEIL
(function(){
  function loadScript(src, cb) {
    var s = document.createElement('script');
    s.src = src;
    s.onload = cb;
    document.head.appendChild(s);
  }
  function startAnimations() {
    // Reveal au scroll pour chaque service
    gsap.utils.toArray('.services_list .service_item').forEach(function(item, i){
      var img = item.querySelector('img');
      var txts = [item.querySelector('h3'), item.querySelector('p')];
      var isRight = item.classList.contains('img-right');
      // Image mask reveal
      if(img){
        gsap.set(img, {opacity:0, y:20});
        gsap.to(img, {
          scrollTrigger: {
            trigger: item,
            start: 'top 85%',
            once: true
          },
          opacity:1,
          y:0,
          duration:0.9,
          ease:'power3.out'
        });
      }
      // Texte reveal avec stagger et mouvement latéral
      txts.forEach(function(txt, j){
        if(txt){
          gsap.set(txt, {opacity:0, x: isRight ? -30 : 30});
          gsap.to(txt, {
            scrollTrigger: {
              trigger: item,
              start: 'top 85%',
              once: true
            },
            opacity:1,
            x:0,
            delay:0.12 + j*0.09,
            duration:0.8,
            ease:'expo.out'
          });
        }
      });
    });
    // Parallaxe interne sur image au hover
    document.querySelectorAll('.services_list .service_item img').forEach(function(img){
      var parallax = function(e){
        var rect = img.getBoundingClientRect();
        var x = (e.clientX - rect.left) / rect.width - 0.5;
        var y = (e.clientY - rect.top) / rect.height - 0.5;
        img.style.transform = 'translateY(-2px) scale(1.03) translate('+(x*8)+'px,'+(y*8)+'px)';
      };
      var reset = function(){
        img.style.transform = '';
      };
      img.parentElement.addEventListener('mousemove', parallax);
      img.parentElement.addEventListener('mouseleave', reset);
    });
    // Barre dorée sous le titre : transition fluide sortie/entrée
    document.querySelectorAll('.services_list .service_item h3 .gold-bar').forEach(function(bar){
      var h3 = bar.parentElement;
      h3.addEventListener('mouseenter', function(){
        bar.style.width = '60px';
      });
      h3.addEventListener('mouseleave', function(){
        bar.style.width = '0';
      });
    });
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
