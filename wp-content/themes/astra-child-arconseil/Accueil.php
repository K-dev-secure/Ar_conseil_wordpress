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
    
    <div class="header_accueil_content">
        <span class="header_tagline">Gestion de Patrimoine · Lyon . Macon</span>
        <h1><?php the_title(); ?></h1>
        <h2><?php the_field('sous_titre_header'); ?></h2>
        
        <div class="header_buttons">
            <a href="#" class="btn_rdv">Prendre rendez-vous</a>
            <a href="#" class="btn_services">Nos services</a>
        </div>
    </div>
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
        
        <div class="services_bloc_gauche">
            <div class="services_header_top">
                <span class="sur-titre">Nos Expertises</span>
                <h2>Une approche globale sur-mesure</h2>
            </div>
            
            <div class="services_liste">
                <?php 
                $services = [
                    ['titre' => 'Ingénierie patrimoniale', 'desc' => 'Comprendre votre situation, étudier les meilleures stratégies et avancer à vos côtés pour une performance durable.'],
                    ['titre' => 'Ingénierie financière', 'desc' => 'Sécuriser, diversifier, ajuster : gestion rigoureuse de votre capital et de votre confiance.'],
                    ['titre' => 'Immobilier', 'desc' => 'Transformer votre épargne en patrimoine avec des investissements adaptés à votre profil.'],
                    ['titre' => 'Succession', 'desc' => 'Anticiper la transmission par anticipation pour des solutions fiscales optimisées.'],
                    ['titre' => "Dirigeant d'entreprise", 'desc' => 'Sécuriser votre activité professionnelle et optimiser le passage entre votre patrimoine pro et privé.'],
                ];

                $i = 1;
                foreach ($services as $s) : 
                    $num = str_pad($i, 2, '0', STR_PAD_LEFT);
                ?>
                <div class="service_ligne" onclick="this.classList.toggle('active')">
                    <div class="service_layout">
                        
                        <div class="service_num"><?php echo $num; ?></div>
                        
                        <div class="service_corps">
                            <h3><?php echo $s['titre']; ?></h3>
                            <div class="description-detaillee">
                                <p><?php echo $s['desc']; ?></p>
                            </div>
                        </div>
                        
                        <div class="service_action">
                            <span class="txt_voir">Voir</span>
                            <div class="arrow-wrapper">
                                <span class="arrow-line"></span>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <?php 
                $i++;
                endforeach; 
                ?>
            </div>
        </div>

        <div class="services_media">
            <div class="carte_media_wrapper">
                <div class="carte_media_image">
                    <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/02/serviceARconseils-1.png' ) ); ?>" alt="Conseil AR Patrimoine">
                </div>
                <div class="legende_media_premium">
                    <p>À chaque étape clé de votre parcours patrimonial, notre équipe vous accompagne avec écoute, expertise et vision stratégique afin de protéger, développer et transmettre votre patrimoine en toute sérénité.</p>
                </div>
            </div>
        </div>

    </div>
</section>


<section class="section_cta_accueil" style="--bg-image: url('<?php the_field('image_section4'); ?>');">
    <div class="cta_accueil_inner">
        
        <span class="cta_sur_titre">Votre avenir patrimonial</span>
        
        <h2><?php 
            echo get_field('titre_section_4') ? esc_html(get_field('titre_section_4')) : "Bâtissons ensemble les fondations de votre réussite"; 
        ?></h2>
        
        <p><?php 
            echo get_field('paragraphe_section_4') ? esc_html(get_field('paragraphe_section_4')) : "Prenez de la hauteur sur vos actifs. Rencontrez un conseiller privé AR Conseil pour une étude d'organisation ou de transmission sur-mesure et confidentielle."; 
        ?></p>
        
        <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'contact' ) ) ); ?>" class="cta_premium_btn">
            <span>Prendre rendez-vous</span>
        </a>
        
    </div>
</section>
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