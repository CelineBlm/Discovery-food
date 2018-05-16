<?php

/**
 * Activation de fonctionnalités dans le thème
 */
add_theme_support('post-thumbnails');
add_theme_support('html5');
add_theme_support('custom-background');
add_theme_support('custom-logo');
add_theme_support('custom-header');

/**
 * Actualisation des permaliens sur changement de thème
 */
add_action( 'after_switch_theme', 'flush_rewrite_rules' );

/**
 * Chargement des CSS
 */
add_action('wp_enqueue_scripts', 'discovery_enqueue_style');
function discovery_enqueue_style() {
    wp_enqueue_style('normalize', get_template_directory_uri() . '/normalize.css', false);
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/bootstrap.css', false);
    wp_enqueue_style('core', get_template_directory_uri() . '/style.css', false, array('normalize', 'bootstrap'));
}

/**
 * Chargement des JavaScripts
 */
add_action('wp_enqueue_scripts', 'discovery_enqueue_script');
function discovery_enqueue_script() {
    wp_enqueue_script('script', 'slider.js', array('jquery'));
}

/**
 * Création d'une sidebar dans l'administration
 * 
 * @link https://codex.wordpress.org/Sidebars
 */
add_action( 'widgets_init', 'discovery_widgets_init' );
function discovery_widgets_init() {                                                                                                                     
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'discovery' ),
        'id' => 'right-sidebar',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'discovery' ),
        'before_widget' => '<div id="%1$s" class="panel panel-default widget %2$s">',
	    'before_title'  => '<div class="panel-heading"><h3 class="panel-title">',
        'after_title'   => '</h3></div><div class="panel-body"><ul>',
        'after_widget'  => '</ul></div></div>',
    ) );
}   

/**
 * Création d'un menu dans l'administration
 * 
 * @link https://codex.wordpress.org/Navigation_Menus
 */
add_action('after_setup_theme', 'register_discovery_menu');
function register_discovery_menu() {
    register_nav_menu('menu-top', __('Menu Principal', 'recette'));
    register_nav_menu('menu-left', __('Menu Secondaire', 'recette'));
}


add_action( 'init', 'recettes_cpt_init' );
/**
 * Ajouter nouveau module dans le tableau de bord
 * Register a Portfolio custom post type.
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function recettes_cpt_init() {
	$labels = array(
		'name'               => _x( 'Recettes', 'post type general name', 'recette' ),
		'singular_name'      => _x( 'Recette', 'post type singular name', 'recette' ),
		'menu_name'          => _x( 'Recette', 'admin menu', 'recette'),
		'name_admin_bar'     => _x( 'Recette', 'add new on admin bar', ''),
		'add_new'            => _x( 'Ajouter Nouvelle', 'recette', 'recette' ),
		'add_new_item'       => __( 'Ajouter Nouvelle Recette', 'recette'),
		'new_item'           => __( 'Nouvelle Recette', 'recette' ),
		'edit_item'          => __( 'Modifier Recette', 'recette' ),
		'view_item'          => __( 'Afficher Recette', 'recette' ),
		'all_items'          => __( 'Toutes les Recettes', 'recette' ),
		'search_items'       => __( 'Rechercher Recettes', 'recette' ),
		'parent_item_colon'  => __( 'Parent Recettes:', 'recette' ),
		'not_found'          => __( 'Aucune recettes trouvées.', 'recette'),
		'not_found_in_trash' => __( 'Aucune recettes trouvé dans la corbeille.', 'recette' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'recette' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'recette' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 2,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'          => 'dashicons-admin-customizer' //https://developer.wordpress.org/resource/dashicons/#admin-customizer
	);

	register_post_type( 'recette', $args );
    
    if( function_exists('acf_add_local_field_group') ) {
        acf_add_local_field_group(array(
            'key' => 'infos_nutritionelles',
            'title' => 'Infos nutritionelles',
            'location' => array (
                array (
                    array (
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'recette',
                    ),
                ),
            ),
            'fields' => array (
                array (
                    'key' => 'field_calories',
                    'label' => 'Calories',
                    'name' => 'calories',
                    'type' => 'number',
                ),
                array (
                    'key' => 'field_temps_prepa',
                    'label' => 'Temps préparation',
                    'instructions' => 'en minutes',
                    'name' => 'temps_prepa',
                    'type' => 'number',
                ),
            ),
        ));
    }
}

// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_recette_taxonomies', 0 );


function create_recette_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Catégories', 'taxonomy general name', 'recette' ),
		'singular_name'     => _x( 'Catégorie', 'taxonomy singular name', 'recette' ),
		'search_items'      => __( 'Rechercher Catégories', 'recette' ),
		'all_items'         => __( 'Toutes les Catégories', 'recette' ),
		'parent_item'       => __( 'Parent Catégorie', 'recette' ),
		'parent_item_colon' => __( 'Parent Catégorie:', 'recette' ),
		'edit_item'         => __( 'Modifier Catégorie', 'recette' ),
		'update_item'       => __( 'Mettre à jour Catégorie', 'recette' ),
		'add_new_item'      => __( 'Ajouter une nouvelle Catégorie', 'recette' ),
		'new_item_name'     => __( 'Nouveau nom de Catégorie', 'recette' ),
		'menu_name'         => __( 'Catégorie', 'recette' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'categorie' ),
	);

	register_taxonomy( 'categorie', array( 'recette' ), $args );
    
    
    	$labels = array(
		'name'              => _x( 'Ingrédients', 'taxonomy general name', 'ingredient' ),
		'singular_name'     => _x( 'Ingrédient', 'taxonomy singular name', 'ingredient' ),
		'search_items'      => __( 'Rechercher Ingrédients', 'ingredient' ),
		'all_items'         => __( 'Toute les Ingrédients', 'ingredient' ),
		'parent_item'       => __( 'Parent Ingrédient', 'ingredient' ),
		'parent_item_colon' => __( 'Parent Ingrédient:', 'ingredient' ),
		'edit_item'         => __( 'Modifier Ingrédient', 'ingredient' ),
		'update_item'       => __( 'Mettre à jour Ingrédient', 'ingredient' ),
		'add_new_item'      => __( 'Ajouter une nouvelle Ingrédient', 'ingredient' ),
		'new_item_name'     => __( 'Nouveau nom de Ingrédient', 'ingredient' ),
		'menu_name'         => __( 'Ingrédient', 'ingredient' ),
	);

	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'ingredient' ),
	);

	register_taxonomy( 'ingredient', array( 'recette' ), $args );
    
    $labels = array(
		'name'              => _x( 'Difficultés', 'taxonomy general name', 'difficulte' ),
		'singular_name'     => _x( 'Difficulté', 'taxonomy singular name', 'difficulte' ),
		'search_items'      => __( 'Rechercher Difficultés', 'difficulte' ),
		'all_items'         => __( 'Toute les Difficultés', 'difficulte' ),
		'parent_item'       => __( 'Parent Difficulté', 'difficulte' ),
		'parent_item_colon' => __( 'Parent Difficulté:', 'difficulte' ),
		'edit_item'         => __( 'Modifier Difficulté', 'difficulte' ),
		'update_item'       => __( 'Mettre à jour Difficulté', 'difficulte' ),
		'add_new_item'      => __( 'Ajouter une nouvelle Difficulté', 'difficulte' ),
		'new_item_name'     => __( 'Nouveau nom de Difficulté', 'difficulte' ),
		'menu_name'         => __( 'Difficulté', 'difficulte' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'difficulte' ),
	);

	register_taxonomy( 'difficulte', array( 'recette' ), $args );

}



