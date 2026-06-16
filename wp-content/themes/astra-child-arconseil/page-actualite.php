<?php
/**
 * Template Name: Actualité
 * @package Astra Child AR CONSEIL
 */

get_header();
?>

<style>
.construction_notice {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 55vh;
    text-align: center;
    padding: 80px 24px;
    gap: 20px;
}
.construction_notice .badge {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-size: 1.05rem;
    font-weight: 700;
    color: #b91c1c;
    border: 1.5px solid #fecaca;
    background: #fef2f2;
    border-radius: 6px;
    padding: 16px 32px;
    letter-spacing: 0.03em;
}
.construction_notice .subtitle {
    font-size: 0.95rem;
    color: #6b7280;
    margin: 0;
    max-width: 420px;
    line-height: 1.7;
}
</style>

<div class="construction_notice">
    <p class="badge">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        Page en cours de construction
    </p>
    <p class="subtitle">Nous travaillons à vous proposer du contenu de qualité.<br>Revenez bientôt.</p>
</div>

<?php get_footer(); ?>
