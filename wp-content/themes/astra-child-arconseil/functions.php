<?php
/**
 * Thème Enfant Astra - AR CONSEIL
 * 
 * @package Astra Child AR CONSEIL
 */

// Sécurité : empêcher l'accès direct au fichier
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Define Constants
 */
define( 'CHILD_THEME_AR_CONSEIL_VERSION', '1.0.0' );

/**
 * Enqueue styles (global + par page)
 */
function astra_child_arconseil_enqueue_styles() {
    
    // 1️⃣ CSS global (toujours chargé)
    wp_enqueue_style( 
        'ar-conseil-global',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'astra-theme-css' ),
        CHILD_THEME_AR_CONSEIL_VERSION
    );
    
    // 2️⃣ CSS spécifiques par page (optimisation des performances)
    
    // Page d'accueil
    if ( is_front_page() || is_page_template('front-page.php') || is_page_template('Accueil.php') || is_page_template('page-accueil.php') ) {
        wp_enqueue_style(
            'ar-conseil-accueil',
            get_stylesheet_directory_uri() . '/css/accueil.css',
            array('ar-conseil-global'),
            CHILD_THEME_AR_CONSEIL_VERSION
        );
    }
    
    // Page Services
    if ( is_page_template('page-services.php') ) {
        wp_enqueue_style(
            'ar-conseil-services',
            get_stylesheet_directory_uri() . '/css/services.css',
            array('ar-conseil-global'),
            CHILD_THEME_AR_CONSEIL_VERSION
        );
    }
    
    // Page Cabinet
    if ( is_page_template('page-cabinet.php') ) {
        wp_enqueue_style(
            'ar-conseil-cabinet',
            get_stylesheet_directory_uri() . '/css/cabinet.css',
            array('ar-conseil-global'),
            CHILD_THEME_AR_CONSEIL_VERSION
        );
    }
    
    // Page Actualité
    if ( is_page_template('page-actualite.php') ) {
        wp_enqueue_style(
            'ar-conseil-actualite',
            get_stylesheet_directory_uri() . '/css/actualite.css',
            array('ar-conseil-global'),
            CHILD_THEME_AR_CONSEIL_VERSION
        );
    }
    
    // Page Contact
    if ( is_page_template('page-contact.php') ) {
        wp_enqueue_style(
            'ar-conseil-contact',
            get_stylesheet_directory_uri() . '/css/contact.css',
            array('ar-conseil-global'),
            CHILD_THEME_AR_CONSEIL_VERSION
        );
    }
    
    // 3️⃣ CSS Animations (chargé globalement)
    wp_enqueue_style(
        'ar-conseil-animations',
        get_stylesheet_directory_uri() . '/css/animations.css',
        array('ar-conseil-global'),
        CHILD_THEME_AR_CONSEIL_VERSION
    );
    
    // 4️⃣ Fichiers JavaScript
    wp_enqueue_script(
        'ar-conseil-scroll-animations',
        get_stylesheet_directory_uri() . '/js/scroll-animations.js',
        array(),
        CHILD_THEME_AR_CONSEIL_VERSION,
        true
    );
    
    wp_enqueue_script(
        'ar-conseil-script',
        get_stylesheet_directory_uri() . '/js/custom.js',
        array( 'jquery' ),
        CHILD_THEME_AR_CONSEIL_VERSION,
        true
    );

    wp_localize_script( 'ar-conseil-script', 'arConseil', array(
        'siteUrl' => esc_url( home_url() ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'astra_child_arconseil_enqueue_styles', 15 );


/**
 * ========================================================================
 * ZONE DE PERSONNALISATION - Ajoutez vos fonctions personnalisées ici
 * ========================================================================
 */

/**
 * Exemple : Ajouter la prise en charge des images à la une
 */
add_theme_support( 'post-thumbnails' );


/**
 * Exemple : Enregistrer un menu personnalisé
 */
function astra_child_register_menus() {
    register_nav_menus( array(
        'header-menu' => __( 'Menu Header', 'astra-child-arconseil' ),
        'footer-menu' => __( 'Menu Footer', 'astra-child-arconseil' ),
    ) );
}
add_action( 'init', 'astra_child_register_menus' );


/**
 * Exemple : Enregistrer une zone de widget personnalisée
 */
function astra_child_register_sidebars() {
    register_sidebar( array(
        'name'          => __( 'Sidebar Personnalisée AR CONSEIL', 'astra-child-arconseil' ),
        'id'            => 'ar-conseil-sidebar',
        'description'   => __( 'Zone de widget personnalisée', 'astra-child-arconseil' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'astra_child_register_sidebars' );

/**
 * Ajouter vos fonctions personnalisées ci-dessous
 * ------------------------------------------------
 */

// Votre code ici...
