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
</div><!-- .ast-container -->
</div><!-- #content -->
<?php astra_content_after(); ?>

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

<footer>
    <section class="background_footer">
        <div class="colonne_first">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Accueil">
                <?php if ( has_custom_logo() ) : ?>
                <?php echo get_custom_logo(); ?>
                <?php else : ?>
                <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/02/Plan-de-travail-1.png' ) ); ?>"
                    alt="Logo AR Conseil">
                <?php endif; ?>
            </a>
            <p>Conseil en stratégie financière et immobilière</p>
        </div>

        <div class="colonne_second">
            <h4>Navigation</h4>
            <ul>
                <li><a href="<?php echo esc_url( $footer_links['accueil'] ); ?>">Accueil</a></li>
                <li><a href="<?php echo esc_url( $footer_links['cabinet'] ); ?>">Cabinet</a></li>
                <li><a href="<?php echo esc_url( $footer_links['services'] ); ?>">Nos services</a></li>
                <li><a href="<?php echo esc_url( $footer_links['actualite'] ); ?>">Actualité</a></li>
                <li class="btn_contact"><a href="<?php echo esc_url( $footer_links['contact'] ); ?>" class="btn-contact-link">Contact</a></li>
            </ul>
        </div>

        <div class="colonne_third">
            <h4>Contact</h4>
            <p>
                <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/02/NavigationArrow.png' ) ); ?>" alt="Adresse">
                <a href="https://www.google.com/maps/place/19+Rue+de+Bonnel,+69003+Lyon/" target="_blank"
                    rel="noopener noreferrer">19 Rue de Bonnel, Lyon 69003</a>
            </p>
            <p>
                <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/02/Envelope.png' ) ); ?>" alt="Email">
                <a href="mailto:contact@arconseil.fr">contact@arconseil.fr</a>
            </p>
            <p>
                <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/02/PhoneCall.png' ) ); ?>" alt="Téléphone">
                <a href="tel:+33609709721">06 09 70 97 21</a>
            </p>
        </div>

        <div class="colonne_fourth">
            <h4>Réseaux sociaux</h4>
            <p>Lundi au Vendredi<br>9h00 - 19h00</p>
            <div class="social_icons">
                <ul>
                    <li><a href="https://www.instagram.com/arconseil/" target="_blank" rel="noopener noreferrer"><img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/02/InstagramLogo.png' ) ); ?>"
                                alt="Instagram AR Conseil"></a></li>
                    <li><a href="https://www.linkedin.com/company/ar-conseils-patrimoine/posts/?feedView=all" target="_blank" rel="noopener noreferrer"><img
                                src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/02/LinkedinLogo.png' ) ); ?>" alt="LinkedIn AR Conseil"></a></li>
                </ul>
            </div>
        </div>

        <div class="separation"></div>
        <div class="mentions_legales">
            <p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> AR Conseil - Tous droits réservés</p>
            <p><a href="<?php echo esc_url( $footer_links['mentions'] ); ?>">Mentions légales et Politique de confidentialité</a></p>
        </div>
    </section>
</footer>

</div>

<?php
		astra_body_bottom();
		wp_footer();
	?>
</body>

</html>