<?php
/**
 * template name: Services
 * Animations : utilise premium-animations.js (chargé globalement)
 * Classes CSS : .fade-up, .fade-left, .fade-right appliquées au HTML
 */

get_header(); ?>

<?php 
// Sélection de l'image de l'en-tête (Image mise en avant ou image par défaut libre de droits sélectionnée)
$header_bg = get_the_post_thumbnail_url() ?: 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=1920&auto=format&fit=crop'; 
?>

<div class="background_header_services" style="background-image: linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.6)), url(<?php echo esc_url( $header_bg ); ?>);">
    <div class="header_services_content">
        <span class="header_tagline">Expertise & Accompagnement</span>
        <h1><?php the_title(); ?></h1>
        <h2>Conseil patrimonial et accompagnement immobilier à Lyon</h2>
    </div>
</div>

<!-- PREMIÈRE SECTION : NOTRE ENGAGEMENT (image_8d4313.jpg) -->
<div class="premiere_section_service fade-up">
    <div class="engagement_text_col fade-left">
        <span class="engagement_tagline">Notre engagement</span>
        <h2>Une expertise reconnue au service de tous</h2>
        
        <div class="engagement_paragraphs">
            <p>Implantés à Lyon, AR Conseils met à votre disposition son équipe expérimentée depuis plus de 5 ans. Nous vous proposons un panel de solutions de placement, d'investissement et de couverture.</p>
            <p><span class="mot_dore">Notre engagement</span> : offrir des solutions personnalisées, transparentes et durables, fondées sur la confiance et un accompagnement irréprochable à chaque étape.</p>
        </div>
    </div>
    
    <div class="engagement_img_col fade-right">
        <div class="img_frame_decorator"></div>
        <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/03/beautiful-architecture-office-business-building-with-glass-window-shape-1.png' ) ); ?>" alt="Une expertise reconnue au service de tous - AR Conseil">
    </div>
</div>

<!-- DEUXIÈME SECTION : GRILLE DES SERVICES (image_8d4698.png) -->
<div class="partie_service">
    <div class="partie_service_header">
        <h2>Nos Services</h2>
        <div class="divider_gold"></div>
    </div>

    <div class="services_grid_container">
        
        <!-- Service 1 -->
        <div class="service_card fade-up">
            <div class="card_img_wrapper">
                <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/03/1.png' ) ); ?>" alt="Private Equity">
            </div>
            <div class="card_content_wrapper">
                <div class="card_title_row">
                    <h3>Private Equity</h3>
                    <span class="service_number">01</span>
                </div>
                <p>Le Private Equity consiste à investir dans le capital de sociétés non cotées en bourse. Soutenez directement la croissance d'entreprises réelles (PME, startups) pour décorréler vos actifs des fluctuations boursières.</p>
            </div>
        </div>

        <!-- Service 2 -->
        <div class="service_card fade-up" style="--animation-delay: 0.1s;">
            <div class="card_img_wrapper">
                <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/03/beautiful-architecture-office-business-building-with-glass-window-shape-1.png' ) ); ?>" alt="GFI">
            </div>
            <div class="card_content_wrapper">
                <div class="card_title_row">
                    <h3>GFI</h3>
                    <span class="service_number">02</span>
                </div>
                <p>Devenez copropriétaire de parcelles de forêts françaises. Un actif refuge écoresponsable, totalement déconnecté des marchés financiers, offrant un cadre fiscal d'exception pour la transmission de votre patrimoine.</p>
            </div>
        </div>

        <!-- Service 3 -->
        <div class="service_card fade-up" style="--animation-delay: 0.2s;">
            <div class="card_img_wrapper">
                <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/03/3.png' ) ); ?>" alt="SCPI">
            </div>
            <div class="card_content_wrapper">
                <div class="card_title_row">
                    <h3>SCPI</h3>
                    <span class="service_number">03</span>
                </div>
                <p>Investissez dans la "pierre-papier" et accédez à l'immobilier professionnel dès quelques milliers d'euros. Percevez des revenus complémentaires réguliers sans aucun souci de gestion locative directe.</p>
            </div>
        </div>

        <!-- Service 4 -->
        <div class="service_card fade-up" style="--animation-delay: 0.3s;">
            <div class="card_img_wrapper">
                <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/03/4.png' ) ); ?>" alt="Immobilier">
            </div>
            <div class="card_content_wrapper">
                <div class="card_title_row">
                    <h3>Immobilier</h3>
                    <span class="service_number">04</span>
                </div>
                <p>Pilier fondamental de l'épargne. Optimisez votre fiscalité (LMNP, Malraux, Pinel) et utilisez l'effet de levier du crédit bancaire pour vous bâtir un patrimoine immobilier pérenne et sécuriser votre retraite.</p>
            </div>
        </div>

        <!-- Service 5 -->
        <div class="service_card fade-up" style="--animation-delay: 0.4s;">
            <div class="card_img_wrapper">
                <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/03/5.png' ) ); ?>" alt="Assurance vie">
            </div>
            <div class="card_content_wrapper">
                <div class="card_title_row">
                    <h3>Assurance vie</h3>
                    <span class="service_number">05</span>
                </div>
                <p>Le véritable couteau suisse fiscal. Valorisez votre capital sur des supports sécurisés ou dynamiques tout en préparant une transmission de capitaux entièrement optimisée et hors droits de succession.</p>
            </div>
        </div>

        <!-- Service 6 -->
        <div class="service_card fade-up" style="--animation-delay: 0.5s;">
            <div class="card_img_wrapper">
                <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/03/6.png' ) ); ?>" alt="Contrat de capitalisation">
            </div>
            <div class="card_content_wrapper">
                <div class="card_title_row">
                    <h3>Contrat de capitalisation</h3>
                    <span class="service_number">06</span>
                </div>
                <p>Idéal pour les personnes morales ou les stratégies familiales avancées. Permet de loger de l'épargne avec la fiscalité de l'assurance-vie, tout en offrant la possibilité d'effectuer des donations de son vivant.</p>
            </div>
        </div>

        <!-- Service 7 -->
        <div class="service_card fade-up" style="--animation-delay: 0.6s;">
            <div class="card_img_wrapper">
                <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/03/8.png' ) ); ?>" alt="Compte Titre & PEA">
            </div>
            <div class="card_content_wrapper">
                <div class="card_title_row">
                    <h3>Compte Titre & PEA</h3>
                    <span class="service_number">07</span>
                </div>
                <p>Prenez place sur les marchés financiers mondiaux. Profitez du cadre fiscal ultra-privilégié du PEA pour vos actions européennes ou de la flexibilité totale du Compte-Titres pour vos investissements internationaux.</p>
            </div>
        </div>

        <!-- Service 8 -->
        <div class="service_card fade-up" style="--animation-delay: 0.7s;">
            <div class="card_img_wrapper">
                <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/03/7.png' ) ); ?>" alt="Prévoyance">
            </div>
            <div class="card_content_wrapper">
                <div class="card_title_row">
                    <h3>Prévoyance</h3>
                    <span class="service_number">08</span>
                </div>
                <p>Le bouclier indispensable de votre vie privée et professionnelle. Protégez votre foyer et maintenez vos revenus face aux aléas de la vie (incapacité de travail, invalidité, accident ou coup dur).</p>
            </div>
        </div>

    </div>
</div>

<!-- TROISIÈME SECTION : LES SIMULATEURS EN FIN DE PAGE -->
<div class="section_simulateurs_services fade-up">
    <div class="partie_service_header">
        <h2>Outils de simulation</h2>
        <div class="divider_gold"></div>
    </div>

    <div class="simulators_flex_layout">
        <!-- Simulateur GFI -->
        <div class="simulator-container fade-left" id="simulator-gfi" data-animate>
            <h2 class="simulator-title">Simulateur GFI</h2>
            <p class="simulator-subtitle">Calculez la valorisation de votre investissement en Groupement Forestier. Saisissez vos paramètres pour obtenir une projection.</p>
            
            <form class="simulator-form" id="gfi-form">
                <div class="form-row">
                    <div class="form-group">
                        <label for="gfi-capital">Versement Initial (€)</label>
                        <input type="number" id="gfi-capital" placeholder="Ex: 50000" min="0" step="1000">
                    </div>
                    <div class="form-group">
                        <label for="gfi-duration">Durée (années)</label>
                        <input type="number" id="gfi-duration" placeholder="Ex: 10" min="1" step="1">
                    </div>
                </div>
                <div class="form-group">
                    <label for="gfi-rate">Rendement annuel estimé (%)</label>
                    <input type="number" id="gfi-rate" placeholder="Ex: 3.5" min="0" step="0.1">
                </div>
                <button type="button" class="simulator-button" id="gfi-button">Calculer la Projection</button>
            </form>

            <div class="simulator-result" id="gfi-result">
                <span class="result-label">Capital estimé après</span>
                <p class="result-value">—</p>
                <p class="result-info"></p>
            </div>
        </div>

        <!-- Simulateur Assurance-Vie -->
        <div class="simulator-container fade-right" id="simulator-life-insurance" data-animate>
            <h2 class="simulator-title">Simulateur Assurance-Vie</h2>
            <p class="simulator-subtitle">Projetez la croissance de votre contrat en combinant un capital initial et des versements mensuels réguliers.</p>
            
            <form class="simulator-form" id="life-insurance-form">
                <div class="form-row">
                    <div class="form-group">
                        <label for="life-capital">Capital Initial (€)</label>
                        <input type="number" id="life-capital" placeholder="Ex: 30000" min="0" step="1000">
                    </div>
                    <div class="form-group">
                        <label for="life-monthly">Versement Mensuel (€)</label>
                        <input type="number" id="life-monthly" placeholder="Ex: 500" min="0" step="50">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="life-duration">Durée (années)</label>
                        <input type="number" id="life-duration" placeholder="Ex: 20" min="1" step="1">
                    </div>
                    <div class="form-group">
                        <label for="life-rate">Rendement annuel estimé (%)</label>
                        <input type="number" id="life-rate" placeholder="Ex: 2.5" min="0" step="0.1">
                    </div>
                </div>
                <button type="button" class="simulator-button" id="life-insurance-button">Calculer la Projection</button>
            </form>

            <div class="simulator-result" id="life-insurance-result">
                <span class="result-label">Capital estimé après</span>
                <p class="result-value">—</p>
                <p class="result-info"></p>
            </div>
        </div>
    </div>
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