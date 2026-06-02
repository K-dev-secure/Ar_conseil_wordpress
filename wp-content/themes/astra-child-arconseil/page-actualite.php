<?php
/**
 * Template Name: Actualité
 * @package Astra Child AR CONSEIL
 */

get_header(); 

// Image de couverture par défaut pour le header si pas d'image à la une sur la page
$header_bg = get_the_post_thumbnail_url() ?: home_url( '/wp-content/uploads/2026/02/header_contact-1.png' ); 
?>

<style>
/* Dégradé assombri linéaire classique pour faire ressortir le blanc pur */
.background_header_actualite {
    background-image: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.55)), url(<?php echo esc_url( $header_bg ); ?>);
}
</style>

<div class="background_header_actualite">
    <h1>Actualités</h1>
</div>

<div class="actualites_container">
    <div class="actualites_grid">
        <?php
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 6,
            'paged'          => $paged,
        );
        
        $actualites_query = new WP_Query( $args );
        $post_count = 0;

        if ( $actualites_query->have_posts() ) :
            while ( $actualites_query->have_posts() ) : $actualites_query->the_post(); 
                $post_count++;
                
                // Image de l'article ou repli sur l'image d'équipe par défaut
                $post_thumb = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) ?: home_url( '/wp-content/uploads/2026/02/header_contact-1.png' );
                
                // Si c'est l'article par défaut de WP, on lui donne un titre plus propre pour la DA
                $display_title = (get_the_title() == 'Bonjour tout le monde !') ? 'Comprendre les tendances immobilières de 2026' : get_the_title();
                $display_excerpt = (get_the_title() == 'Bonjour tout le monde !') ? 'Bienvenue sur WordPress. Ceci est votre premier article. Modifiez-le ou supprimez-le, puis commencez à écrire !' : wp_trim_words( get_the_excerpt(), 18, '...' );

                $categories = get_the_category();
                $category_name = ! empty( $categories ) ? $categories[0]->name : 'Immobilier';
                if ($category_name == 'Non classé') { $category_name = 'Immobilier'; }
                ?>
                
                <article class="actu_card">
                    <div class="actu_card_image">
                        <img src="<?php echo esc_url( $post_thumb ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                    </div>
                    
                    <div class="actu_card_content">
                        <span class="actu_card_badge"><?php echo esc_html( $category_name ); ?></span>
                        <h3 class="actu_card_title">
                            <a href="<?php the_permalink(); ?>"><?php echo esc_html( $display_title ); ?></a>
                        </h3>
                        <span class="actu_card_date"><?php echo esc_html( get_the_date( 'j F Y' ) ); ?></span>
                        <p class="actu_card_excerpt">
                            <?php echo esc_html( $display_excerpt ); ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" class="actu_card_link">
                            Lire la suite &rarr;
                        </a>
                    </div>
                </article>

            <?php 
            endwhile;

            // --- CARDS FICTIVES DE SECOURS (S'affiche uniquement si tu as moins de 3 articles créés) ---
            if ( $post_count < 3 ) : 
            ?>
                <article class="actu_card">
                    <div class="actu_card_image">
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=800&auto=format&fit=crop" alt="Analyse post-élection" loading="lazy">
                    </div>
                    <div class="actu_card_content">
                        <span class="actu_card_badge">Finance</span>
                        <h3 class="actu_card_title">
                            <a href="#">Analyse post-élection : Stratégies d'investissement</a>
                        </h3>
                        <span class="actu_card_date">11 février 2026</span>
                        <p class="actu_card_excerpt">
                            Bienvenue post-élection : décryptage complet des nouvelles stratégies d'investissement et perspectives de marchés.
                        </p>
                        <a href="#" class="actu_card_link">Lire la suite &rarr;</a>
                    </div>
                </article>

                <article class="actu_card">
                    <div class="actu_card_image">
                        <img src="https://images.unsplash.com/photo-1450133064473-71024230f91b?q=80&w=800&auto=format&fit=crop" alt="Gestion de patrimoine" loading="lazy">
                    </div>
                    <div class="actu_card_content">
                        <span class="actu_card_badge">Cabinet</span>
                        <h3 class="actu_card_title">
                            <a href="#">La gestion de patrimoine à l'ère numérique</a>
                        </h3>
                        <span class="actu_card_date">11 février 2026</span>
                        <p class="actu_card_excerpt">
                            La gestion de patrimoine à l'ère numérique. Comment nos experts allient outils technologiques avancés et relation humaine unique.
                        </p>
                        <a href="#" class="actu_card_link">Lire la suite &rarr;</a>
                    </div>
                </article>
            <?php 
            endif;
            // --- FIN DES CARDS FICTIVES ---

            ?>
    </div> <div class="actu_pagination">
                <?php
                echo paginate_links( array(
                    'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                    'format'       => '?paged=%#%',
                    'current'      => max( 1, $paged ),
                    'total'        => $actualites_query->max_num_pages,
                    'prev_text'    => '&larr; Précédent',
                    'next_text'    => 'Suivant &rarr;',
                    'type'         => 'list',
                ) );
                ?>
            </div>
            
            <?php
            wp_reset_postdata();
        else :
            ?>
    </div>
            <div class="no_actu_found">
                <p>Aucun article n'a été publié pour le moment. Revenez très bientôt.</p>
            </div>
        <?php endif; ?>
</div>

<?php 
get_footer(); 
?>