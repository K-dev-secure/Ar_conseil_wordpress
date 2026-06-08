<?php
/**
 * The footer for Astra Child Theme - AR CONSEIL
 *
 * @package Astra Child AR CONSEIL
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>
<?php astra_content_bottom(); ?>
</div></div><?php astra_content_after(); ?>

<?php
$resolve_page_url = static function ( array $slugs, string $fallback = '/' ) : string {
    foreach ( $slugs as $slug ) {
        $page = get_page_by_path( $slug, OBJECT, 'page' );
        if ( $page instanceof WP_Post ) {
            return get_permalink( $page );
        }
    }

    return home_url( $fallback );
};

$resolve_template_page_url = static function ( string $template_file ) use ( $resolve_page_url ) : string {
    $pages = get_pages(
        array(
            'meta_key'   => '_wp_page_template',
            'meta_value' => $template_file,
            'number'     => 1,
        )
    );

    if ( ! empty( $pages ) && $pages[0] instanceof WP_Post ) {
        return get_permalink( $pages[0] );
    }

    return $resolve_page_url(
        array( 'mentions-legales', 'mentions-legales-et-confidentialite', 'politique-de-confidentialite' ),
        '/mentions-legales/'
    );
};

$footer_links = array(
    'accueil'   => $resolve_page_url( array( 'accueil', 'home' ), '/' ),
    'cabinet'   => $resolve_page_url( array( 'cabinet' ), '/cabinet/' ),
    'services'  => $resolve_page_url( array( 'services', 'nos-services' ), '/services/' ),
    'actualite' => $resolve_page_url( array( 'actualite', 'actualites' ), '/actualite/' ),
    'contact'   => $resolve_page_url( array( 'contact', 'nous-contacter' ), '/contact/' ),
    'mentions'  => $resolve_template_page_url( 'page-mentions-legales.php' ),
);
?>

<footer class="site_premium_footer">
    <div class="background_footer">
        <div class="footer_container">
            
            <div class="colonne_first">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Accueil" class="footer_logo_link">
                    <?php if ( has_custom_logo() ) : ?>
                        <?php echo get_custom_logo(); ?>
                    <?php else : ?>
                        <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/02/Plan-de-travail-1.png' ) ); ?>" alt="Logo AR Conseil">
                    <?php endif; ?>
                </a>
                <p class="footer_tagline">Conseil en stratégie financière et immobilière.</p>
            </div>

            <div class="colonne_second">
                <h4>Navigation</h4>
                <ul>
                    <li><a href="<?php echo esc_url( $footer_links['accueil'] ); ?>">Accueil</a></li>
                    <li><a href="<?php echo esc_url( $footer_links['cabinet'] ); ?>">Cabinet</a></li>
                    <li><a href="<?php echo esc_url( $footer_links['services'] ); ?>">Nos services</a></li>
                    <li><a href="<?php echo esc_url( $footer_links['actualite'] ); ?>">Actualité</a></li>
                    <li class="btn_contact_container">
                        <a href="<?php echo esc_url( $footer_links['contact'] ); ?>" class="btn_contact_footer">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="colonne_third">
                <h4>Contact</h4>
                <div class="contact_info_list">
                    <p class="contact_item contact_address">
                        <svg class="footer_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        <a href="https://maps.google.com/?q=19+Rue+de+Bonnel+Lyon+69003" target="_blank" rel="noopener noreferrer">19 Rue de Bonnel, Lyon 69003</a>
                    </p>
                    <p class="contact_item contact_email">
                        <svg class="footer_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        <a href="mailto:contact@arconseil.fr">contact@arconseil.fr</a>
                    </p>
                    <p class="contact_item contact_phone">
                        <svg class="footer_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        <a href="tel:+33609709721">06 09 70 97 21</a>
                    </p>
                </div>
            </div>

            <div class="colonne_fourth">
                <h4>Disponibilité</h4>
                <div class="horaires_wrapper">
                    <svg class="footer_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    <p class="horaires_text">Lundi au Vendredi<br><span class="hours_highlight">9h00 - 19h00</span></p>
                </div>
                <div class="social_icons">
                    <ul>
                        <li>
                            <a href="https://www.instagram.com/arconseil/" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                                <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/02/InstagramLogo.png' ) ); ?>" alt="Instagram AR Conseil">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/company/ar-conseils-patrimoine/posts/?feedView=all" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                                <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/02/LinkedinLogo.png' ) ); ?>" alt="LinkedIn AR Conseil">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="separation"></div>
        
        <div class="mentions_legales">
            <p class="copyright_text">© <?php echo esc_html( date( 'Y' ) ); ?> AR Conseil - Tous droits réservés</p>
            <p class="legal_links"><a href="<?php echo esc_url( $footer_links['mentions'] ); ?>">Mentions légales & Politique de confidentialité</a></p>
        </div>
    </div>
</footer>

</div><?php
astra_body_bottom();
wp_footer();
?>
</body>
</html>