<?php
/**
 * Brouillon du footer personnalisé (non actif).
 * Ce fichier n'est pas chargé par WordPress tant qu'il ne s'appelle pas footer.php.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
	<footer>
		<section class="background_footer">
			<div class="colonne_first">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Accueil">
					<?php if ( has_custom_logo() ) : ?>
						<?php echo get_custom_logo(); ?>
					<?php else : ?>
						<img src="http://localhost:8000/wp-content/uploads/2026/02/Plan-de-travail-1.png" alt="Logo AR Conseil">
					<?php endif; ?>
				</a>
				<p>Conseil en investissement et gestion de patrimoine immobilier à Lyon</p>
			</div>

			<div class="colonne_second">
				<h4>Navigation</h4>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/accueil' ) ); ?>">Accueil</a></li>
					<li><a href="<?php echo esc_url( home_url( '/cabinet' ) ); ?>">Cabinet</a></li>
					<li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Nos services</a></li>
					<li><a href="<?php echo esc_url( home_url( '/actualite' ) ); ?>">Actualité</a></li>
					<li class="btn_contact"><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Contact</a></li>
				</ul>
			</div>

			<div class="colonne_third">
				<h4>Contact</h4>
				<p>
					<img src="http://localhost:8000/wp-content/uploads/2026/02/NavigationArrow.png" alt="Adresse">
					<a href="https://www.google.com/maps/search/Rue%20Vendome%20254%2C%2069003%20Lyon" target="_blank" rel="noopener noreferrer">254 rue Vendome 69003</a>
				</p>
				<p>
					<img src="http://localhost:8000/wp-content/uploads/2026/02/Envelope.png" alt="Email">
					<a href="mailto:contact@arconseil.fr">contact@arconseil.fr</a>
				</p>
				<p>
					<img src="http://localhost:8000/wp-content/uploads/2026/02/PhoneCall.png" alt="Téléphone">
					<a href="tel:+3360909709721">06 09 70 97 21</a>
				</p>
			</div>

			<div class="colonne_fourth">
				<h4>Réseaux sociaux</h4>
				<p>Lundi au Vendredi<br>9h00 - 19h00</p>
				<ul>
					<li><a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer">Instagram</a></li>
					<li><a href="https://www.linkedin.com/" target="_blank" rel="noopener noreferrer">LinkedIn</a></li>
				</ul>
			</div>
		</section>
	</footer>
