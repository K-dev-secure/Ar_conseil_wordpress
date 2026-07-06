<?php
/**
 * Thème Enfant Astra - AR CONSEIL
 * @package Astra Child AR CONSEIL
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'CHILD_THEME_AR_CONSEIL_VERSION', '1.0.3' );

// 1️⃣ CHARGEMENT DES STYLES CSS
function astra_child_arconseil_enqueue_styles() {
    
    // CSS global (toujours chargé)
    wp_enqueue_style( 
        'ar-conseil-global',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'astra-theme-css' ),
        CHILD_THEME_AR_CONSEIL_VERSION
    );
    
    // CSS Scroll Animations (global, toutes pages)
    wp_enqueue_style(
        'ar-conseil-scroll-animations',
        get_stylesheet_directory_uri() . '/css/scroll-animations.css',
        array('ar-conseil-global'),
        CHILD_THEME_AR_CONSEIL_VERSION
    );

    // CSS spécifiques par page
    if ( is_front_page() || is_page('accueil') ) {
        wp_enqueue_style(
            'ar-conseil-accueil',
            get_stylesheet_directory_uri() . '/css/accueil.css',
            array('ar-conseil-global'),
            CHILD_THEME_AR_CONSEIL_VERSION
        );
    }
    
    if ( is_page('services') || is_page('nos-services') ) {
        wp_enqueue_style(
            'ar-conseil-services',
            get_stylesheet_directory_uri() . '/css/services.css',
            array('ar-conseil-global'),
            CHILD_THEME_AR_CONSEIL_VERSION
        );
        
        wp_enqueue_style(
            'ar-conseil-simulators',
            get_stylesheet_directory_uri() . '/css/simulators.css',
            array('ar-conseil-global'),
            CHILD_THEME_AR_CONSEIL_VERSION
        );
    }
    
    if ( is_page('cabinet') || is_page('le-cabinet') ) {
        wp_enqueue_style(
            'ar-conseil-cabinet',
            get_stylesheet_directory_uri() . '/css/cabinet.css',
            array('ar-conseil-global'),
            CHILD_THEME_AR_CONSEIL_VERSION
        );
    }
    
    if ( is_page('actualite') || is_page('actualites') ) {
        wp_enqueue_style(
            'ar-conseil-actualite',
            get_stylesheet_directory_uri() . '/css/actualite.css',
            array('ar-conseil-global'),
            CHILD_THEME_AR_CONSEIL_VERSION
        );
    }
    
    if ( is_page('contact') ) {
        wp_enqueue_style(
            'ar-conseil-contact',
            get_stylesheet_directory_uri() . '/css/contact.css',
            array('ar-conseil-global'),
            CHILD_THEME_AR_CONSEIL_VERSION
        );
    }
}
add_action( 'wp_enqueue_scripts', 'astra_child_arconseil_enqueue_styles', 15 );


// 2️⃣ CHARGEMENT DES SCRIPTS JAVASCRIPT (Séparé pour éviter les bugs en ligne)
function astra_child_arconseil_enqueue_scripts() {

    // GSAP Library + ScrollTrigger Plugin
    wp_enqueue_script(
        'gsap-core',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js',
        array(),
        '3.12.5',
        true
    );
    
    wp_enqueue_script(
        'gsap-scroll-trigger',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js',
        array('gsap-core'),
        '3.12.5',
        true
    );
    
    $js_dir = get_stylesheet_directory() . '/js/';

    // Fichiers JavaScript Premium Animations (dépend de GSAP)
    wp_enqueue_script(
        'ar-conseil-premium-animations',
        get_stylesheet_directory_uri() . '/js/premium-animations.js',
        array('gsap-scroll-trigger'),
        file_exists( $js_dir . 'premium-animations.js' ) ? filemtime( $js_dir . 'premium-animations.js' ) : CHILD_THEME_AR_CONSEIL_VERSION,
        true
    );

    wp_enqueue_script(
        'ar-conseil-script',
        get_stylesheet_directory_uri() . '/js/custom.js',
        array( 'jquery' ),
        file_exists( $js_dir . 'custom.js' ) ? filemtime( $js_dir . 'custom.js' ) : CHILD_THEME_AR_CONSEIL_VERSION,
        true
    );

    // Simulators JavaScript (only on services page)
    if ( is_page('services') || is_page('nos-services') ) {
        wp_enqueue_script(
            'ar-conseil-simulators',
            get_stylesheet_directory_uri() . '/js/simulators.js',
            array('jquery'),
            file_exists( $js_dir . 'simulators.js' ) ? filemtime( $js_dir . 'simulators.js' ) : CHILD_THEME_AR_CONSEIL_VERSION,
            true
        );
    }

    wp_localize_script( 'ar-conseil-script', 'arConseil', array(
        'siteUrl' => esc_url( home_url() ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'astra_child_arconseil_enqueue_scripts', 20 ); // Priorité 20 pour charger après le CSS


// Enregistrement des supports thèmes et menus
add_theme_support( 'post-thumbnails' );

function astra_child_register_menus() {
    register_nav_menus( array(
        'header-menu' => __( 'Menu Header', 'astra-child-arconseil' ),
        'footer-menu' => __( 'Menu Footer', 'astra-child-arconseil' ),
    ) );
}
add_action( 'init', 'astra_child_register_menus' );