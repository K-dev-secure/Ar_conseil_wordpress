<?php
/**
 * template name: Accueil
 */

get_header(); ?>

<?php $header_bg = get_the_post_thumbnail_url() ?: home_url( '/wp-content/uploads/2026/02/header_contact-1.png' ); ?>
<style>
.background_header_accueil {
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(<?php echo esc_url( $header_bg ); ?>);
}
</style>

<div class="background_header_accueil">
    <video class="video_banniere_accueil" autoplay muted loop playsinline preload="metadata"
        poster="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" aria-hidden="true">
        <source
            src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/02/456879_River_Tiber_Palace_Of_Justice_3840x2160.mp4' ) ); ?>"
            type="video/mp4">
    </video>
    <h1><?php the_title(); ?></h1>
    <h2><?php the_field('sous_titre_header'); ?></h2>
</div>



<div class="first_section_accueil">
    <h2>Nos Services</h2>

    <div class="background_blanc_accueil">
        <div class="img_gauche">
            <img src="<?php the_field('image_section_2_accueil'); ?>" alt="">
        </div>
        <div class="text">
            <h3><?php the_field('titre_section_2_accueil'); ?></h3>
            <p><?php the_field('paragraphe_section_2_accueil'); ?></p>
        </div>
    </div>
</div>

<section class="section_services">
    <div class="services_contenu">
        <div class="services_liste">
            
            <?php 
            $services = [
                ['titre' => 'Ingénierie patrimoniale', 'desc' => 'Une organisation intelligente de vos biens pour protéger votre famille et réduire vos impôts durablement.'],
                ['titre' => 'Ingénierie financière', 'desc' => 'Une sélection rigoureuse de placements sur-mesure pour faire grandir votre capital en toute sécurité.'],
                ['titre' => 'Immobilier', 'desc' => 'Conseil en investissement locatif ou résidence principale pour bâtir un patrimoine tangible et rentable.'],
                ['titre' => 'Succession', 'desc' => 'Anticiper la transmission de vos actifs pour garantir la paix familiale et optimiser les frais de vos héritiers.'],
                ['titre' => "Dirigeant d'entreprise", 'desc' => 'Sécuriser votre activité professionnelle et optimiser le passage entre votre patrimoine pro et privé.'],
            ];

            foreach ($services as $s) : ?>
            <div class="service_ligne" onclick="this.classList.toggle('active')">
                <div class="service_header">
                    <h3><?php echo $s['titre']; ?></h3>
                    <div class="icon-wrapper">
                        <span class="plus-icon">+</span>
                    </div>
                </div>
                <div class="description-detaillee">
                    <p><?php echo $s['desc']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>

        </div>

        <div class="services_media">
            <div class="carte_media">
                <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/02/serviceARconseils-1.png' ) ); ?>" alt="Conseil AR">
                <div class="legende_media">
                    <span class="gold-line"></span>
                    <p>À chaque étape clé de votre parcours patrimonial, notre équipe vous accompagne avec écoute, expertise et vision stratégique afin de protéger, développer et transmettre votre patrimoine en toute sérénité.
.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="section_cta_accueil" style="background-image: linear-gradient(rgba(2, 2, 2, 0.45), rgba(2, 2, 2, 0.45)), url('<?php echo esc_url( get_field('image_section4') ); ?>');">
    <h2><?php the_field('titre_section_4'); ?></h2>
    <p><?php the_field('paragraphe_section_4'); ?></p>
    <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'contact' ) ) ); ?>"> <button>Prendre
            rendez-vous</button></a>
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




<?php  get_footer(); ?>