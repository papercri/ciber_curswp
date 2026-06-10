p<?php
/**
 * Plugin Name: Meuplugin Afegir Missatge Peu
 * Description: Plugin per afegir un missatge al peu de pàgina.
 * Version: 1.0.0
 * Author: Cris
 * License: GPL2
 * Text Domain: missatge-peu
 */

//Sistema de seguretat anti access directo con la url 
if(!defined('ABSPATH')) {
    exit;
}   

//Funcion para mostrar un mensaje en el pie de pagina
function mostrar_mensaje_pie() {
    echo '<p style="text-align: center; color: #888;">'
   . esc_html__('Aquest és un missatge al peu de pàgina afegit pel meu plugin.', 'missatge-peu')
   . '</p>';
}

add_action('wp_footer', 'mostrar_mensaje_pie');