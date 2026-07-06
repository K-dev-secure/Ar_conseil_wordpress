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


// 2️⃣ CHARGEMENT DES SCRIPTS JAVASCRIPT
// Les scripts locaux sont injectés inline (PHP lit les fichiers côté serveur,
// aucune requête HTTP séparée → contourne définitivement les 403 IONOS).
function astra_child_arconseil_enqueue_scripts() {

    // GSAP + ScrollTrigger via CDN (non affecté par les restrictions IONOS)
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
        array( 'gsap-core' ),
        '3.12.5',
        true
    );

    $js_dir = get_stylesheet_directory() . '/js/';

    // premium-animations.js — injecté inline juste après ScrollTrigger
    if ( file_exists( $js_dir . 'premium-animations.js' ) ) {
        wp_add_inline_script( 'gsap-scroll-trigger', file_get_contents( $js_dir . 'premium-animations.js' ) );
    }

    // custom.js — handle sans src (dépend de jquery), injecté inline en footer
    wp_register_script( 'ar-conseil-inline', false, array( 'jquery' ), null, true );
    wp_enqueue_script( 'ar-conseil-inline' );
    wp_localize_script( 'ar-conseil-inline', 'arConseil', array(
        'siteUrl' => esc_url( home_url() ),
    ) );
    if ( file_exists( $js_dir . 'custom.js' ) ) {
        wp_add_inline_script( 'ar-conseil-inline', file_get_contents( $js_dir . 'custom.js' ) );
    }

    // simulators.js — page services uniquement, injecté inline
    if ( is_page( 'services' ) || is_page( 'nos-services' ) ) {
        wp_register_script( 'ar-conseil-simulators-inline', false, array( 'jquery' ), null, true );
        wp_enqueue_script( 'ar-conseil-simulators-inline' );
        if ( file_exists( $js_dir . 'simulators.js' ) ) {
            wp_add_inline_script( 'ar-conseil-simulators-inline', file_get_contents( $js_dir . 'simulators.js' ) );
        }
    }
}
add_action( 'wp_enqueue_scripts', 'astra_child_arconseil_enqueue_scripts', 20 );


// Enregistrement des supports thèmes et menus
add_theme_support( 'post-thumbnails' );

function astra_child_register_menus() {
    register_nav_menus( array(
        'header-menu' => __( 'Menu Header', 'astra-child-arconseil' ),
        'footer-menu' => __( 'Menu Footer', 'astra-child-arconseil' ),
    ) );
}
add_action( 'init', 'astra_child_register_menus' );