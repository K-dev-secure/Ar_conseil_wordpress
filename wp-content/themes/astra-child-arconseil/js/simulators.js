/**
 * LOGIQUE DES SIMULATEURS FINANCIERS - AR CONSEIL
 * GFI & Assurance-Vie
 * Calculs purs JavaScript - Aucune dépendance externe
 */

(function() {
  'use strict';

  // ============================================
  // 1. CALCULATRICE GFI (Intérêts Composés Simples)
  // ============================================
  function initGFISimulator() {
    var form = document.getElementById('gfi-form');
    var button = document.getElementById('gfi-button');
    var resultContainer = document.getElementById('gfi-result');

    if (!form || !button || !resultContainer) return;

    button.addEventListener('click', function(e) {
      e.preventDefault();

      // Récupérer les valeurs
      var capitalInitial = parseFloat(document.getElementById('gfi-capital').value) || 0;
      var dureeAnnees = parseFloat(document.getElementById('gfi-duration').value) || 0;
      var tauxAnnuel = parseFloat(document.getElementById('gfi-rate').value) || 0;

      // Valider les entrées
      if (capitalInitial <= 0 || dureeAnnees <= 0 || tauxAnnuel < 0) {
        alert('Veuillez saisir des valeurs valides et positives');
        return;
      }

      // Formule intérêts composés : Capital * (1 + taux)^années
      var capitalFinal = capitalInitial * Math.pow(1 + tauxAnnuel / 100, dureeAnnees);
      var benefice = capitalFinal - capitalInitial;

      // Formater les résultats en Euros
      var formatter = new Intl.NumberFormat('fr-FR', {
        style: 'currency',
        currency: 'EUR',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
      });

      // Afficher le résultat
      var resultValue = resultContainer.querySelector('.result-value');
      var resultInfo = resultContainer.querySelector('.result-info');

      resultValue.textContent = formatter.format(capitalFinal);
      resultInfo.innerHTML = 'Capital initial : ' + formatter.format(capitalInitial) + 
                            '<br>Bénéfice généré : ' + formatter.format(benefice);

      // Montrer le bloc résultat avec animation
      resultContainer.classList.add('show');
    });
  }

  // ============================================
  // 2. CALCULATRICE ASSURANCE-VIE (Versements + Intérêts Composés)
  // ============================================
  function initLifeInsuranceSimulator() {
    var form = document.getElementById('life-insurance-form');
    var button = document.getElementById('life-insurance-button');
    var resultContainer = document.getElementById('life-insurance-result');

    if (!form || !button || !resultContainer) return;

    button.addEventListener('click', function(e) {
      e.preventDefault();

      // Récupérer les valeurs
      var capitalInitial = parseFloat(document.getElementById('life-capital').value) || 0;
      var versementMensuel = parseFloat(document.getElementById('life-monthly').value) || 0;
      var dureeAnnees = parseFloat(document.getElementById('life-duration').value) || 0;
      var tauxAnnuel = parseFloat(document.getElementById('life-rate').value) || 0;

      // Valider les entrées
      if (capitalInitial < 0 || versementMensuel < 0 || dureeAnnees <= 0 || tauxAnnuel < 0) {
        alert('Veuillez saisir des valeurs valides et positives');
        return;
      }

      // Calcul en deux parties :
      // A) Capital initial avec intérêts composés
      var capitalFinal = capitalInitial * Math.pow(1 + tauxAnnuel / 100, dureeAnnees);

      // B) Versements mensuels avec intérêts composés
      // Formule : VersementMensuel * [((1 + i)^n - 1) / i]
      // où i = taux mensuel, n = nombre de mois
      var tauxMensuel = tauxAnnuel / 100 / 12;
      var nombreMois = dureeAnnees * 12;
      var versementsTotal = 0;

      if (tauxMensuel > 0) {
        versementsTotal = versementMensuel * (Math.pow(1 + tauxMensuel, nombreMois) - 1) / tauxMensuel;
      } else {
        // Si taux = 0, simple addition
        versementsTotal = versementMensuel * nombreMois;
      }

      // Total
      var capitalTotal = capitalFinal + versementsTotal;
      var versementsTotalInvestes = versementMensuel * nombreMois;
      var benefice = capitalTotal - capitalInitial - versementsTotalInvestes;

      // Formater
      var formatter = new Intl.NumberFormat('fr-FR', {
        style: 'currency',
        currency: 'EUR',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
      });

      // Afficher
      var resultValue = resultContainer.querySelector('.result-value');
      var resultInfo = resultContainer.querySelector('.result-info');

      resultValue.textContent = formatter.format(capitalTotal);
      resultInfo.innerHTML = 'Capital initial : ' + formatter.format(capitalInitial) + 
                            '<br>Total versements : ' + formatter.format(versementsTotalInvestes) +
                            '<br>Bénéfice généré : ' + formatter.format(benefice);

      // Montrer le bloc résultat
      resultContainer.classList.add('show');
    });
  }

  // ============================================
  // 3. SYNCHRONISATION AVEC INTERSECTIONOBSERVER (data-animate)
  // ============================================
  function initIntersectionObserver() {
    var observerOptions = {
      threshold: 0.15,
      rootMargin: '0px 0px -50px 0px'
    };

    var observer = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('animate-in');
          // Observer qu'une fois
          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);

    // Observer tous les conteneurs avec data-animate
    document.querySelectorAll('[data-animate]').forEach(function(el) {
      observer.observe(el);
    });
  }

  // ============================================
  // 4. INITIALISATION AU CHARGEMENT DU DOM
  // ============================================
  function init() {
    // Attendre que le DOM soit entièrement chargé
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', init);
      return;
    }

    // Initialiser les simulateurs
    initGFISimulator();
    initLifeInsuranceSimulator();

    // Initialiser IntersectionObserver pour les animations
    initIntersectionObserver();
  }

  // Lancer
  init();
})();
