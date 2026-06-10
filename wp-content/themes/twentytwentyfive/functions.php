<?php
/**
 * Twenty Twenty-Five functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

if ( ! function_exists( 'twentytwentyfive_post_format_setup' ) ) :
	/**
	 * Adds theme support for post formats.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_post_format_setup() {
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );
	}
	function registrar_menus() {
		register_nav_menus([
				'menu-principal' => 'Menu principal (header)',
				'menu-legal'     => 'Menu legal (footer)',
			]);
	}
	add_action( 'init', 'registrar_menus' );

	// Crear shortcut
	function shortcode_any_actual() {
		//return date("Y-m-d");
		return '
		<div class="contenedor-chistes">
			<p id="chiste">¡Cargando el mejor humor!</p>
			<button id="btn-chiste">¡Otro chiste!</button>
			</div>
			
			<script>

			const listaChistes = [

				"¿Qué le dice una farola a otra? ¡Oye, estás muy sola! Y la otra le responde: Sí, es que me da vergüenza hablar.",

				"— Papá, papá, ¿qué se siente tener un hijo tan guapo? — No sé, hijo, pregúntale a tu abuelo.",

				"¿Por qué las focas miran tanto hacia arriba? Porque arriba están sus focas.",

				"— ¿Cómo te llamas? — Lamento. — ¡Qué nombre tan raro! — Lo siento.",

				"¿Qué le dice un pez a otro? ¡Nada!"

			];
			
			const textoChiste = document.getElementById("chiste");

			const botonChiste = document.getElementById("btn-chiste");
			
			function obtenerChisteAleatorio() {

				const indice = Math.floor(Math.random() * listaChistes.length);

				textoChiste.textContent = listaChistes[indice];

			}
			
			// Muestra un chiste al cargar la página

			obtenerChisteAleatorio();
			
			// Cambia el chiste al hacer clic en el botón

			botonChiste.addEventListener("click", obtenerChisteAleatorio);
			</script>
			
			<style>

			.contenedor-chistes {

				background-color: #f9f9f9;

				border: 2px solid #ddd;

				border-radius: 8px;

				padding: 20px;

				text-align: center;

				max-width: 400px;

				margin: 20px auto;

				font-family: Arial, sans-serif;

			}

			#chiste {

				font-size: 1.1em;

				color: #333;

				margin-bottom: 15px;

			}
			
			#btn-chiste {

				background-color: #4CAF50;

				color: white;

				border: none;

				padding: 10px 15px;

				border-radius: 4px;

				cursor: pointer;

				font-size: 1em;

			}
			
			#btn-chiste:hover {

				background-color: #45a049;

			}
			</style>

			
		';
	}
	add_shortcode( 'any_actual', 'shortcode_any_actual' );
	
endif;
add_action( 'after_setup_theme', 'twentytwentyfive_post_format_setup' );

if ( ! function_exists( 'twentytwentyfive_editor_style' ) ) :
	/**
	 * Enqueues editor-style.css in the editors.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_editor_style() {
		add_editor_style( 'assets/css/editor-style.css' );
	}
endif;
add_action( 'after_setup_theme', 'twentytwentyfive_editor_style' );

if ( ! function_exists( 'twentytwentyfive_enqueue_styles' ) ) :
	/**
	 * Enqueues the theme stylesheet on the front.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_enqueue_styles() {
		$suffix = SCRIPT_DEBUG ? '' : '.min';
		$src    = 'style' . $suffix . '.css';

		wp_enqueue_style(
			'twentytwentyfive-style',
			get_parent_theme_file_uri( $src ),
			array(),
			wp_get_theme()->get( 'Version' )
		);
		wp_style_add_data(
			'twentytwentyfive-style',
			'path',
			get_parent_theme_file_path( $src )
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'twentytwentyfive_enqueue_styles' );

if ( ! function_exists( 'twentytwentyfive_block_styles' ) ) :
	/**
	 * Registers custom block styles.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_block_styles() {
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'twentytwentyfive' ),
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_block_styles' );

if ( ! function_exists( 'twentytwentyfive_pattern_categories' ) ) :
	/**
	 * Registers pattern categories.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_pattern_categories() {

		register_block_pattern_category(
			'twentytwentyfive_page',
			array(
				'label'       => __( 'Pages', 'twentytwentyfive' ),
				'description' => __( 'A collection of full page layouts.', 'twentytwentyfive' ),
			)
		);

		register_block_pattern_category(
			'twentytwentyfive_post-format',
			array(
				'label'       => __( 'Post formats', 'twentytwentyfive' ),
				'description' => __( 'A collection of post format patterns.', 'twentytwentyfive' ),
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_pattern_categories' );

if ( ! function_exists( 'twentytwentyfive_register_block_bindings' ) ) :
	/**
	 * Registers the post format block binding source.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_register_block_bindings() {
		register_block_bindings_source(
			'twentytwentyfive/format',
			array(
				'label'              => _x( 'Post format name', 'Label for the block binding placeholder in the editor', 'twentytwentyfive' ),
				'get_value_callback' => 'twentytwentyfive_format_binding',
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_register_block_bindings' );

if ( ! function_exists( 'twentytwentyfive_format_binding' ) ) :
	/**
	 * Callback function for the post format name block binding source.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return string|void Post format name, or nothing if the format is 'standard'.
	 */
	function twentytwentyfive_format_binding() {
		$post_format_slug = get_post_format();

		if ( $post_format_slug && 'standard' !== $post_format_slug ) {
			return get_post_format_string( $post_format_slug );
		}
	}
endif;
