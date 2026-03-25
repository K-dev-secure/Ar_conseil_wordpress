<?php
/**
 * template name: Cabinet
 */

get_header(); ?>

<style>
.background_header_cabinet {
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(<?php echo esc_url( get_the_post_thumbnail_url());
    ?>);
}
</style>

<div class="background_header_cabinet">
    <h1><?php the_title(); ?></h1>
    <h2><?php the_field('sous_titre_header_cabinet'); ?></h2>
</div>



<div class="second_section_cabinet">
    <h2 data-animate="fade-up">Cabinet</h2>

    <div class="background_blanc_cabinet">
        <div class="img_gauche" data-animate="fade-left">
            <img src="<?php the_field('image_cabinet_section_2'); ?>" alt="">
        </div>

        <div class="text" data-animate="fade-right">
            <p><?php the_field('cabinet_section_2_p'); ?></p>
        </div>
    </div>
</div>



<div class="section_equipe">
    <h2 data-animate="fade-up">Notre Équipe</h2>

    <div class="person first_person" data-animate="fade-up" data-delay="100">
        <div class="person-img">
            <img src="<?php the_field('premiere_personne'); ?>" alt="Photo de Marwane">
        </div>
        <div class="person-text">
            <h3><?php the_field('poste_premiere_personne'); ?></h3>
            <h3><?php the_field('noms_premiere_personne'); ?></h3>
            <p><?php the_field('phrase__premiere_personne_1'); ?></p>
            <p><?php the_field('phrase__premiere_personne_2'); ?></p>
            <p><?php the_field('phrase__premiere_personne_3'); ?></p>
            <p><?php the_field('phrase__premiere_personne_4'); ?></p>
        </div>
    </div>

    <?php /* -- Section Romaric : en attente des photos --
    <div class="person second_person" data-animate="fade-up" data-delay="200">
        <div class="person-img">
            <img src="romaric.jpg" alt="Photo de Romaric">
        </div>
        <div class="person-text">
            <h3><?php the_field('poste_second_personne'); ?></h3>
            <h3><?php the_field('noms_second_personne'); ?></h3>
            <p><?php the_field('description_discourd_second_personne'); ?></p>
        </div>
    </div>
    -- */ ?>
</div>

<div class="section_valeurs">
    <h2 data-animate="fade-up">Nos Valeurs</h2>

    <div class="valeurs-container">
        <div class="valeur first_valeur" data-animate="fade-up" data-delay="100">
            <h3><?php the_field('noms_valeurs_1'); ?></h3>
            <p><?php the_field('description_valeurs_1'); ?></p>
        </div>

        <div class="valeur second_valeur" data-animate="fade-up" data-delay="200">
            <h3><?php the_field('noms_valeurs_2'); ?></h3>
            <p><?php the_field('descirption_valeurs_2'); ?></p>
        </div>

        <div class="valeur third_valeur" data-animate="fade-up" data-delay="300">
            <h3><?php the_field('noms_valeurs_3'); ?></h3>
            <p><?php the_field('descirption_valeurs_3'); ?></p>
        </div>
    </div>
</div>

<div class="section_carrousel">
    <div class="text" data-animate="fade-up">
        <h2>Nos Partenaires de Confiance</h2>
        <p>Plus de 50 partenaires certifiés pour un accompagnement complet à chaque étape de votre projet
            patrimonial.</p>
        <div id="carousel-partenaires" class="js-partners-carousel" data-animate="fade-up" data-delay="200"></div>
    </div>
</div>

<div class="section_call_to_action" data-animate="fade-up">
    <h2>Être appelé par un expert ?</h2>
    <p>Découvrez nos services et prenez contact avec notre équipe pour échanger sur votre projet patrimonial.</p>
    <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'contact' ) ) ); ?>"><button>Prendre
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