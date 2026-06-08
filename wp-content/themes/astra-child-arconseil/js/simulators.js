/**
 * SIMULATEURS FINANCIERS - AR CONSEIL
 * GFI (Groupement Forestier d'Investissement) & Assurance-Vie
 * Calculs conformes aux règles fiscales françaises en vigueur (2025)
 */

(function () {
    'use strict';

    /* ------------------------------------------------------------------ */
    /*  Utilitaires                                                         */
    /* ------------------------------------------------------------------ */

    var fmtEur = new Intl.NumberFormat('fr-FR', {
        style: 'currency',
        currency: 'EUR',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    });

    function eur(n) { return fmtEur.format(Math.round(n)); }

    function pct(n) {
        return n.toFixed(2).replace('.', ',') + ' %';
    }

    function plural(n, word) {
        return n + ' ' + word + (n > 1 ? 's' : '');
    }

    function row(label, value, cls) {
        return '<div class="bd-row' + (cls ? ' ' + cls : '') + '">' +
            '<span class="bd-label">' + label + '</span>' +
            '<span class="bd-val">' + value + '</span>' +
            '</div>';
    }

    function divider() {
        return '<div class="bd-divider"></div>';
    }

    function note(text, cls) {
        return '<p class="bd-note' + (cls ? ' ' + cls : '') + '">' + text + '</p>';
    }

    function showError(containerId, msg) {
        var el = document.getElementById(containerId);
        if (!el) return;
        el.textContent = msg;
        el.classList.add('visible');
    }

    function clearError(containerId) {
        var el = document.getElementById(containerId);
        if (!el) return;
        el.textContent = '';
        el.classList.remove('visible');
    }

    function val(id) {
        var el = document.getElementById(id);
        return el ? parseFloat(el.value) : NaN;
    }

    /* ------------------------------------------------------------------ */
    /*  1. SIMULATEUR GFI                                                   */
    /*                                                                      */
    /*  Règles appliquées :                                                 */
    /*  - Valorisation capital : intérêts composés annuels                  */
    /*  - Réduction IR : 18 % du montant investi, plafonnée à 5 700 €/an   */
    /*    (art. 199 decies H CGI) — valable si détention ≥ 5 ans           */
    /*  - Exonération IFI : 75 % de la valeur forestière (art. 976 CGI)    */
    /* ------------------------------------------------------------------ */

    function initGFI() {
        var btn = document.getElementById('gfi-button');
        if (!btn) return;

        btn.addEventListener('click', function () {
            clearError('gfi-error');

            var capital  = val('gfi-capital');
            var duree    = val('gfi-duration');
            var tauxBrut = val('gfi-rate');

            /* Validation */
            if (isNaN(capital) || capital < 1000) {
                showError('gfi-error', 'Le versement initial doit être d\'au moins 1 000 €.');
                return;
            }
            if (isNaN(duree) || duree < 1 || duree > 50 || !Number.isInteger(duree)) {
                showError('gfi-error', 'La durée doit être un nombre entier entre 1 et 50 ans.');
                return;
            }
            if (isNaN(tauxBrut) || tauxBrut < 0 || tauxBrut > 30) {
                showError('gfi-error', 'Le rendement doit être compris entre 0 % et 30 %.');
                return;
            }

            var taux = tauxBrut / 100;

            /* Valorisation forestière */
            var capitalFinal = capital * Math.pow(1 + taux, duree);
            var plusValue    = capitalFinal - capital;

            /* Réduction IR — art. 199 decies H CGI */
            /* Plafond : 5 700 € (célibataire) / 11 400 € (couple) */
            var PLAFOND_IR   = 5700;
            var reductionIR  = Math.min(capital * 0.18, PLAFOND_IR);
            var eligible5ans = duree >= 5;

            /* Exonération IFI — art. 976 CGI : 75 % de la valeur */
            var exemptionIFI = capitalFinal * 0.75;

            /* Gain total (valorisation + économie fiscale IR) */
            var gainTotal         = plusValue + (eligible5ans ? reductionIR : 0);
            var rendementReel     = (gainTotal / capital) * 100;
            var rendementAnnualise = (Math.pow(capitalFinal / capital, 1 / duree) - 1) * 100;

            /* ---- Affichage ---- */
            var res      = document.getElementById('gfi-result');
            var labelEl  = res.querySelector('.result-label');
            var valueEl  = res.querySelector('.result-value');
            var brkEl    = res.querySelector('.result-breakdown');

            labelEl.innerHTML = 'Capital valorisé après <strong class="result-duration">' +
                plural(duree, 'an') + '</strong>';
            valueEl.textContent = eur(capitalFinal);

            var html = '';
            html += row('Capital investi',                eur(capital));
            html += row('Valorisation forestière (' + pct(tauxBrut) + '/an)', '+ ' + eur(plusValue), 'positive');
            html += divider();
            html += row('Capital forestier final',        eur(capitalFinal), 'subtotal');

            if (eligible5ans) {
                html += row('Réduction IR 18 % *',  '+ ' + eur(reductionIR),  'fiscal');
                html += row('Gain total (valorisation + fiscalité)',
                            '+ ' + eur(gainTotal), 'total');
                html += row('Rendement réel (avec fiscalité)', '+ ' + pct(rendementReel), 'total');
                html += note('✦ Exonération IFI estimée : ' + eur(exemptionIFI) + ' (75 % de la valeur)', 'highlight');
                html += note('* Plafond annuel : 5 700 € (célibataire) — 11 400 € (couple)');
            } else {
                html += row('Gain brut (sans avantage fiscal)', '+ ' + eur(plusValue), 'total');
                html += note('⚠ Conservez au moins 5 ans pour bénéficier de la réduction IR de 18 %.');
            }

            brkEl.innerHTML = html;
            res.classList.add('active');
        });
    }

    /* ------------------------------------------------------------------ */
    /*  2. SIMULATEUR ASSURANCE-VIE                                         */
    /*                                                                      */
    /*  Règles appliquées :                                                 */
    /*  - Taux net = taux brut − frais de gestion                          */
    /*  - Futur capital initial   : FV = C × (1 + taux_net)^n              */
    /*  - Futur versements mensuels : annuité ordinaire (fin de période)   */
    /*      FV = M × [(1 + r)^N − 1] / r  (r = taux mensuel, N = mois)    */
    /*  - Fiscalité sur plus-values :                                       */
    /*    • < 8 ans  : PFU 30 % (12,8 % IR + 17,2 % PS) sur 100 %         */
    /*    • ≥ 8 ans  : abattement 4 600 € (célibataire) / 9 200 € (couple) */
    /*                 puis PFU 7,5 % + 17,2 % PS = 24,7 %                 */
    /*                 (pour primes versées avant 70 ans)                   */
    /* ------------------------------------------------------------------ */

    function initAssuranceVie() {
        var btn = document.getElementById('life-insurance-button');
        if (!btn) return;

        btn.addEventListener('click', function () {
            clearError('life-error');

            var capitalInitial    = val('life-capital')  || 0;
            var versementMensuel  = val('life-monthly')  || 0;
            var duree             = val('life-duration');
            var tauxBrut          = val('life-rate');
            var fraisGestion      = val('life-fees');

            /* Si le champ frais est vide, défaut 0,75 % */
            if (isNaN(fraisGestion)) fraisGestion = 0.75;

            /* Validation */
            if (capitalInitial < 0 || versementMensuel < 0) {
                showError('life-error', 'Les montants ne peuvent pas être négatifs.');
                return;
            }
            if (capitalInitial === 0 && versementMensuel === 0) {
                showError('life-error', 'Saisissez un capital initial et/ou un versement mensuel.');
                return;
            }
            if (isNaN(duree) || duree < 1 || duree > 50 || !Number.isInteger(duree)) {
                showError('life-error', 'La durée doit être un entier entre 1 et 50 ans.');
                return;
            }
            if (isNaN(tauxBrut) || tauxBrut < 0 || tauxBrut > 30) {
                showError('life-error', 'Le rendement brut doit être compris entre 0 % et 30 %.');
                return;
            }
            if (fraisGestion < 0 || fraisGestion > 5) {
                showError('life-error', 'Les frais de gestion doivent être entre 0 % et 5 %.');
                return;
            }

            /* Taux net annuel et mensuel */
            var tauxNet     = Math.max(0, (tauxBrut - fraisGestion) / 100);
            var tauxMensuel = tauxNet / 12;
            var nbMois      = duree * 12;
            var totalVerse  = capitalInitial + versementMensuel * nbMois;

            /* Futur capital initial */
            var futurCapital = capitalInitial * Math.pow(1 + tauxNet, duree);

            /* Futur versements (annuité ordinaire — fin de période) */
            var futurVersements;
            if (tauxMensuel > 0) {
                futurVersements = versementMensuel *
                    (Math.pow(1 + tauxMensuel, nbMois) - 1) / tauxMensuel;
            } else {
                futurVersements = versementMensuel * nbMois;
            }

            var capitalBrut = futurCapital + futurVersements;
            var plusValue   = capitalBrut - totalVerse;

            /* Impact frais : comparer capital au taux brut vs taux net */
            var tauxBrutDec     = tauxBrut / 100;
            var tauxBrutMensuel = tauxBrutDec / 12;
            var futurCapBrut    = capitalInitial * Math.pow(1 + tauxBrutDec, duree);
            var futurVerBrut    = tauxBrutMensuel > 0
                ? versementMensuel * (Math.pow(1 + tauxBrutMensuel, nbMois) - 1) / tauxBrutMensuel
                : versementMensuel * nbMois;
            var capitalSansFrais = futurCapBrut + futurVerBrut;
            var impactFrais      = capitalSansFrais - capitalBrut;

            /* Fiscalité sur les plus-values */
            var capitalNet, impot, abattement;

            if (duree >= 8) {
                /* ≥ 8 ans : abattement 4 600 € (célibataire) puis taux réduit 24,7 % */
                abattement = 4600;
                var pvImposable = Math.max(0, plusValue - abattement);
                /* Taux après abattement : 7,5 % IR + 17,2 % PS = 24,7 % */
                impot      = pvImposable * 0.247;
            } else {
                /* < 8 ans : PFU 30 % (12,8 % IR + 17,2 % PS) */
                abattement = 0;
                impot      = plusValue > 0 ? plusValue * 0.30 : 0;
            }
            capitalNet = capitalBrut - impot;

            /* ---- Affichage ---- */
            var res     = document.getElementById('life-insurance-result');
            var labelEl = res.querySelector('.result-label');
            var valueEl = res.querySelector('.result-value');
            var brkEl   = res.querySelector('.result-breakdown');

            labelEl.innerHTML = 'Capital brut estimé après <strong class="result-duration">' +
                plural(duree, 'an') + '</strong>';
            valueEl.textContent = eur(capitalBrut);

            var html = '';
            html += row('Total versé',          eur(totalVerse));
            html += row('Plus-value brute',      '+ ' + eur(plusValue), 'positive');
            if (impactFrais > 1) {
                html += row('Impact frais de gestion (' + fraisGestion.toFixed(2).replace('.', ',') + ' %/an)',
                            '− ' + eur(impactFrais), 'negative');
            }
            html += divider();
            html += row('Capital brut',          eur(capitalBrut), 'subtotal');

            if (duree >= 8) {
                html += row('Abattement fiscal (≥ 8 ans)',
                            '+ ' + eur(abattement), 'fiscal');
                html += row('Impôt estimé (7,5 % IR + 17,2 % PS)*',
                            '− ' + eur(impot), 'negative');
                html += row('Capital net d\'impôt',  eur(capitalNet), 'total');
                html += note('✦ Avantage fiscal activé — abattement de 4 600 €/an (célibataire)', 'highlight');
                html += note('* Taux réduit applicable aux primes versées avant 70 ans.');
            } else {
                var ansMissing = 8 - duree;
                html += row('Impôt estimé (PFU 30 %)',
                            '− ' + eur(impot), 'negative');
                html += row('Capital net d\'impôt',  eur(capitalNet), 'total');
                html += note('Conseil : encore ' + plural(ansMissing, 'an') +
                             ' pour bénéficier du taux réduit (24,7 %) et de l\'abattement de 4 600 €/an.');
            }

            brkEl.innerHTML = html;
            res.classList.add('active');
        });
    }

    /* ------------------------------------------------------------------ */
    /*  Init                                                                */
    /* ------------------------------------------------------------------ */
    function init() {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', init);
            return;
        }
        initGFI();
        initAssuranceVie();
    }

    init();

})();
