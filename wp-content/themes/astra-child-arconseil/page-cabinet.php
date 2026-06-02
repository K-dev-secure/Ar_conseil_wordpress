<?php
/**
 * Template Name: Cabinet
 */

get_header(); 

// Gestion de l'image de couverture par défaut ou à la une
$header_bg = get_the_post_thumbnail_url() ?: home_url( '/wp-content/uploads/2026/02/header_contact-1.png' ); 
$cta_bg    = home_url( '/wp-content/uploads/2026/02/header_contact-1.png' );
?>

<style>
.background_header_cabinet {
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(<?php echo esc_url( $header_bg ); ?>);
}
.section_call_to_action {
    background-image: linear-gradient(rgba(246, 241, 232, 0.85), rgba(246, 241, 232, 0.85)), url(<?php echo esc_url( $cta_bg ); ?>);
}
</style>

<div class="background_header_cabinet">
    <div class="header_cabinet_content">
        <span class="header_tagline">Gestion de Patrimoine · Lyon · Macon</span>
        <h1><?php the_title(); ?></h1>
        <?php if ( get_field('sous_titre_header_cabinet') ) : ?>
            <h2><?php the_field('sous_titre_header_cabinet'); ?></h2>
        <?php endif; ?>
    </div>
</div>
<div class="section_chiffres_cles">
    <div class="chiffres_container" data-animate="fade-up">
        <div class="chiffre_card_box">
            <span class="chiffre_nombre">100%</span>
            <span class="chiffre_label">Indépendant & Objectif</span>
        </div>
        <div class="chiffre_card_box">
            <span class="chiffre_nombre">+5 ans</span>
            <span class="chiffre_label">d'Expertise Cumulée</span>
        </div>
        <div class="chiffre_card_box">
            <span class="chiffre_nombre">450+</span>
            <span class="chiffre_label">Familles Accompagnées</span>
        </div>
        <div class="chiffre_card_box">
            <span class="chiffre_nombre">98%</span>
            <span class="chiffre_label">de Fidélité Client</span>
        </div>
    </div>
</div>

<div class="second_section_cabinet">
    <div class="cabinet_layout_container">
        <div class="img_gauche" data-animate="fade-left">
            <div class="img_frame_decorator">
                <?php 
                $img_cabinet = get_field('image_cabinet_section_2');
                if ( $img_cabinet ) : ?>
                    <img src="<?php echo esc_url( $img_cabinet ); ?>" alt="<?php echo esc_attr( get_post_meta( attachment_url_to_postid( $img_cabinet ), '_wp_attachment_image_alt', true ) ?: 'Notre Cabinet' ); ?>">
                <?php endif; ?>
            </div>
        </div>
        <div class="text_droite" data-animate="fade-right">
            <span class="cabinet_subtitle">Analyse & Accompagnement</span>
            <h2 class="cabinet_title">Le Cabinet</h2>
            <div class="cabinet_editorial_content">
                <?php the_field('cabinet_section_2_p'); ?>
            </div>
        </div>
    </div>
</div>

<div class="section_unified_cards">
    <div class="cards_unified_wrapper">
        <h2 data-animate="fade-up">Une Méthode Simple, Un Accompagnement Humain</h2>
        <p class="cards_unified_intro" data-animate="fade-up">Pas de jargon, pas de solutions toutes faites. Nous avançons ensemble à votre rythme à travers trois étapes clés.</p>
        
        <div class="unified_cards_container">
            <div class="unified_card" data-animate="fade-up" data-delay="100">
                <div class="step_badge">01</div>
                <div class="step_icon icon_methode_1">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0zM21.375 9.75a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0zM16.5 18.75a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0z"/></svg>
                </div>
                <h3>L'Écoute & Le Bilan</h3>
                <p>On fait le point sur votre situation actuelle, vos projets de vie et vos préoccupations, sans aucun engagement.</p>
            </div>
            
            <div class="unified_card" data-animate="fade-up" data-delay="200">
                <div class="step_badge">02</div>
                <div class="step_icon icon_methode_2">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 0 1 5.814-5.519l2.74-1.22m0 0l-5.94-2.281m5.94 2.281l-2.28 5.941"/></svg>
                </div>
                <h3>La Stratégie Sur-Mesure</h3>
                <p>Notre équipe d'experts analyse vos données pour concevoir la stratégie d'investissement et d'optimisation la plus performante pour vous.</p>
            </div>
            
            <div class="unified_card" data-animate="fade-up" data-delay="300">
                <div class="step_badge">03</div>
                <div class="step_icon icon_methode_3">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
                </div>
                <h3>Le Suivi Durable</h3>
                <p>Le patrimoine bouge, la vie aussi. Nous restons à vos côtés au fil des années pour ajuster vos placements et protéger vos intérêts.</p>
            </div>
        </div>
    </div>
</div>

<div class="section_equipe">
    <h2 data-animate="fade-up">Notre Équipe</h2>
    <?php if ( get_field('premiere_personne') ) : ?>
        <div class="person first_person" data-animate="fade-up" data-delay="100">
            <div class="person-img">
                <img src="<?php echo esc_url( get_field('premiere_personne') ); ?>" alt="Photo de <?php echo esc_attr( get_field('noms_premiere_personne') ); ?>">
            </div>
            <div class="person-text">
                <h3><?php the_field('poste_premiere_personne'); ?></h3>
                <h3><?php the_field('noms_premiere_personne'); ?></h3>
                <?php for ( $i = 1; $i <= 4; $i++ ) : 
                    $phrase = get_field("phrase__premiere_personne_{$i}");
                    if ( $phrase ) : ?>
                        <p><?php echo esc_html( $phrase ); ?></p>
                    <?php endif; 
                endfor; ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<div class="section_unified_cards engagements_special_offset">
    <div class="cards_unified_wrapper">
        <h2 data-animate="fade-up">Nos Engagements</h2>
        
        <div class="unified_cards_container">
            <div class="unified_card" data-animate="fade-up" data-delay="100">
                <div class="step_badge">01</div>
                <div class="step_icon icon_engagements_1">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.644C3.167 9.09 6.096 7.125 9.5 7.125c3.404 0 6.333 1.965 7.464 4.554a1.012 1.012 0 010 .644c-1.131 2.589-4.06 4.554-7.464 4.554-3.404 0-6.333-1.965-7.464-4.554z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h3>Transparence</h3>
                <p>Nous traitons vos informations avec la plus stricte confidentialité, assurant une relation de confiance et de discrétion.</p>
            </div>
            
            <div class="unified_card" data-animate="fade-up" data-delay="200">
                <div class="step_badge">02</div>
                <div class="step_icon icon_engagements_2">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M11 11.25a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0zM11.25 12.75a2.25 2.25 0 1 1 4.5 0 2.25 2.25 0 0 1-4.5 0zM3.75 6.75a2.25 2.25 0 1 1 4.5 0 2.25 2.25 0 0 1-4.5 0zM15.75 6.75a2.25 2.25 0 1 1 4.5 0 2.25 2.25 0 0 1-4.5 0zM11 19.5a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0zM11 19.5a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0z"/></svg>
                </div>
                <h3>Proximité</h3>
                <p>Nous bâtissons une relation durable avec nos clients, fondée sur l'écoute, la transparence et le respect mutuel.</p>
            </div>
            
            <div class="unified_card" data-animate="fade-up" data-delay="300">
                <div class="step_badge">03</div>
                <div class="step_icon icon_engagements_3">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442a.562.562 0 01.31.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.562.562 0 01.31-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/></svg>
                </div>
                <h3>Exigence</h3>
                <p>Nous visons l'excellence dans chaque aspect de notre travail, garantissant des résultats de haute qualité.</p>
            </div>
        </div>
    </div>
</div>

<div class="section_carrousel">
    <div class="text_intro_carrousel" data-animate="fade-up">
        <h2>Nos Partenaires de Confiance</h2>
        <p>Plus de 50 partenaires certifiés pour un accompagnement complet à chaque étape de votre projet patrimonial.</p>
    </div>
    <div id="carousel-partenaires" class="js-partners-carousel" data-animate="fade-up" data-delay="200"></div>
</div>

<div class="section_call_to_action" data-animate="fade-up">
    <h2>Être appelé par un expert ?</h2>
    <p>Découvrez nos services et prenez contact avec notre équipe pour échanger sur votre projet patrimonial.</p>
    <?php 
    $contact_page = get_page_by_path( 'contact' );
    $contact_url  = $contact_page ? get_permalink( $contact_page->ID ) : home_url('/contact/');
    ?>
    <a href="<?php echo esc_url( $contact_url ); ?>" class="cta-button-link">
        <button type="button" class="btn_doré">Prendre rendez-vous</button>
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

<?php get_footer(); ?>