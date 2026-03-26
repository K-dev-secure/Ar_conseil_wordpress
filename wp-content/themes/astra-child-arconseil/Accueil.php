<?php
/**
 * template name: Accueil
 */

get_header(); ?>

<style>
.background_header_accueil {
    background-color: #1A2A44;
}
</style>

<div class="background_header_accueil">
    <video class="video_banniere_accueil" autoplay muted loop playsinline preload="metadata"
        aria-hidden="true">
        <source
            src="https://arconseils-patrimoine.com/wp-content/uploads/2026/03/456879_River_Tiber_Palace_Of_Justice_3840x2160-2.mp4"
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
            <div class="service_ligne">
                <div class="service_texte">
                    <h3>Ingénierie patrimoniale</h3>
                    <p>Comprendre votre situation, imaginer les meilleures stratégies et avancer à vos côtés pour
                        construire un avenir patrimonial solide et serein.</p>
                </div>
                <div class="service_pastille">Service 1</div>
            </div>
            <div class="service_ligne">
                <div class="service_texte">
                    <h3>Ingénierie financière</h3>
                    <p>Observer, sélectionner, ajuster : une gestion attentive pour faire grandir votre capital en toute
                        confiance.</p>
                </div>
                <div class="service_pastille">Service 2</div>
            </div>
            <div class="service_ligne">
                <div class="service_texte">
                    <h3>Immobilier</h3>
                    <p>Transformer votre projet immobilier en une décision éclairée, sécurisée et parfaitement adaptée à
                        votre situation.</p>
                </div>
                <div class="service_pastille">Service 3</div>
            </div>
            <div class="service_ligne">
                <div class="service_texte">
                    <h3>Succession</h3>
                    <p>Vous épauler avec humanité et clarté pour sécuriser les décisions et préserver les intérêts de
                        chacun.</p>
                </div>
                <div class="service_pastille">Service 4</div>
            </div>
            <div class="service_ligne">
                <div class="service_texte">
                    <h3>Dirigeant d'entreprise</h3>
                    <p>Construire des solutions sociales durables qui protègent l'entreprise et ceux qui la font vivre.
                    </p>
                </div>
                <div class="service_pastille">Service 5</div>
            </div>
        </div>
        <div class="services_media">
            <div class="carte_media">
                <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/02/serviceARconseils-1.png' ) ); ?>"
                    alt="Accompagnement AR Conseils">
                <div class="legende_media">
                    À chaque étape clé de votre parcours patrimonial, notre équipe vous accompagne avec écoute,
                    expertise et vision stratégique afin de protéger, développer et transmettre votre patrimoine en
                    toute sérénité.
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