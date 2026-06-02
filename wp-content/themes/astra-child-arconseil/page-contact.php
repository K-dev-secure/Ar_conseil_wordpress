<?php
/**
 * Template Name: Contact
 */
get_header(); ?>

<?php $header_bg = get_the_post_thumbnail_url() ?: home_url( '/wp-content/uploads/2026/02/header_contact-1.png' ); ?>

<!-- Le header avec l'image et le double dégradé bleu -->
<div class="background_header_contact" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?php echo esc_url( $header_bg ); ?>');">
    <div class="header_contact_content">
        <span class="header_tagline">Gestion de Patrimoine · Lyon · Macon</span>
        <h1>Contactez AR Conseils</h1>
        <h2>Nos experts en gestion de patrimoine sont à votre écoute pour répondre à toutes vos questions et vous accompagner dans vos projets.</h2>
    </div>
</div>

<div class="second-section-btn">
    <a href="mailto:contact@arconseil.fr" class="card_mail" data-animate="fade-up" data-delay="100">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
        <p>contact@arconseil.fr</p>
    </a>
    <a href="tel:+33609709721" class="card_tel" data-animate="fade-up" data-delay="200">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        <p>06 09 70 97 21</p>
    </a>
</div>

<div class="gutenberg-content">
    <?php
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post(); 
            the_content(); 
        endwhile; 
    endif; 
    ?>
</div>

<div class="section_horaire" data-animate="fade-up">
    <h2>Horaires d'ouverture</h2>
    <div class="horaire_wrapper_cards">
        <div class="horaire_semaine_un" data-animate="fade-left" data-delay="100">
            <p><span class="days_highlight">LUNDI AU VENDREDI</span><br><span class="hours_highlight">09:00 - 18:00</span></p>
        </div>
        <div class="horaire_semaine_deux" data-animate="fade-right" data-delay="200">
            <p><span class="days_highlight">SAMEDI</span><br>Sur rendez-vous uniquement</p>
            <p class="closed_day">Dimanche : Fermé</p>
        </div>
    </div>
</div>

<?php get_footer(); ?>