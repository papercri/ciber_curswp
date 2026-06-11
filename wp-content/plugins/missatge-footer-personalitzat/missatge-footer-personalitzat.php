<?php
/**
 * Plugin Name: Missatge Footer Personalitzat
 * Plugin URI: https://exemple.com/plugins/missatge-footer
 * Description: Afegeix un missatge personalitzat al peu de pàgina del lloc
 * Version: 1.0.0
 * Author: Cris
 * Author URI: https://exemple.com
 * License: GPLV2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: missatge-footer-personalitzat
 * Domain Path: /languages
 *
 * @package Missatge_Footer_Personalitzat
 * @since 1.0.0
 */

// Evita que el fitxer es carregui directament
if (!defined('ABSPATH')) {
    exit;
}

// Definir constants del plugin
define('MISSATGE_FOOTER_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('MISSATGE_FOOTER_PLUGIN_URL', plugin_dir_url(__FILE__));
define('MISSATGE_FOOTER_PLUGIN_VERSION', '1.0.0');

/**
 * Clase principal del plugin
 */
class Missatge_Footer_Personalitzat {

    /**
     * Constructor
     */
    public function __construct() {
        // Carregar els idiomes del plugin
        add_action('plugins_loaded', array($this, 'cargar_idiomas'));
        
        // Registrar el menú de configuració
        add_action('admin_menu', array($this, 'registrar_menu_admin'));
        
        // Registrar les opcions
        add_action('admin_init', array($this, 'registrar_opcions'));
        
        // Afegir el missatge al footer
        add_action('wp_footer', array($this, 'mostrar_missatge_footer'));
    }

    /**
     * Carrega els idiomes del plugin
     */
    public function cargar_idiomas() {
        load_plugin_textdomain(
            'missatge-footer-personalitzat',
            false,
            dirname(plugin_basename(__FILE__)) . '/languages'
        );
    }

    /**
     * Registra el menú en l'administració
     */
    public function registrar_menu_admin() {
        add_options_page(
            __('Missatge Footer', 'missatge-footer-personalitzat'),
            __('Missatge Footer', 'missatge-footer-personalitzat'),
            'manage_options',
            'missatge-footer-opcions',
            array($this, 'pagina_opciones')
        );
    }

    /**
     * Registra les opcions del plugin
     */
    public function registrar_opcions() {
        register_setting(
            'missatge-footer-grup',  // Grup de configuració
            'missatge_footer_text'   // Nom de l'opció
        );

        register_setting(
            'missatge-footer-grup',
            'missatge_footer_color'
        );

        register_setting(
            'missatge-footer-grup',
            'missatge_footer_tamany_text'
        );

        register_setting(
            'missatge-footer-grup',
            'missatge_footer_actiu'
        );
    }

    /**
     * Mostra la pàgina de configuració
     */
    public function pagina_opciones() {
        // Verificar permisos
        if (!current_user_can('manage_options')) {
            wp_die(__('No tens permisos per accedir a aquesta pàgina.', 'missatge-footer-personalitzat'));
        }

        // Obtenir els valors guardats
        $missatge_text = get_option('missatge_footer_text');
        $missatge_color = get_option('missatge_footer_color', '#000000');
        $missatge_tamany = get_option('missatge_footer_tamany_text', '14');
        $missatge_actiu = get_option('missatge_footer_actiu', '1');
        ?>

        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

            <?php
            // Mostrar missatge de guardatge
            if (isset($_GET['settings-updated'])) {
                add_settings_error(
                    'missatge_footer_messages',
                    'missatge_footer_message',
                    __('Configuració guardada correctament!', 'missatge-footer-personalitzat'),
                    'updated'
                );
            }
            settings_errors('missatge_footer_messages');
            ?>

            <form action="options.php" method="post">
                <?php
                settings_fields('missatge-footer-grup');
                do_settings_sections('missatge-footer-opcions');
                ?>

                <table class="form-table">
                    <tbody>
                        <!-- Activar/Desactivar el missatge -->
                        <tr>
                            <th scope="row">
                                <label for="missatge_footer_actiu">
                                    <?php _e('Activar missatge', 'missatge-footer-personalitzat'); ?>
                                </label>
                            </th>
                            <td>
                                <input type="checkbox" 
                                       id="missatge_footer_actiu" 
                                       name="missatge_footer_actiu" 
                                       value="1" 
                                       <?php checked($missatge_actiu, '1'); ?> />
                                <p class="description">
                                    <?php _e('Marca aquesta opció per mostrar el missatge al footer', 'missatge-footer-personalitzat'); ?>
                                </p>
                            </td>
                        </tr>

                        <!-- Text del missatge -->
                        <tr>
                            <th scope="row">
                                <label for="missatge_footer_text">
                                    <?php _e('Text del missatge', 'missatge-footer-personalitzat'); ?>
                                </label>
                            </th>
                            <td>
                                <textarea id="missatge_footer_text" 
                                          name="missatge_footer_text" 
                                          rows="5" 
                                          cols="50"
                                          class="large-text"><?php echo esc_textarea($missatge_text); ?></textarea>
                                <p class="description">
                                    <?php _e('Introdueix el text que vols mostrar al footer. Es permet HTML bàsic.', 'missatge-footer-personalitzat'); ?>
                                </p>
                            </td>
                        </tr>

                        <!-- Color del missatge -->
                        <tr>
                            <th scope="row">
                                <label for="missatge_footer_color">
                                    <?php _e('Color del text', 'missatge-footer-personalitzat'); ?>
                                </label>
                            </th>
                            <td>
                                <input type="color" 
                                       id="missatge_footer_color" 
                                       name="missatge_footer_color" 
                                       value="<?php echo esc_attr($missatge_color); ?>" />
                                <p class="description">
                                    <?php _e('Selecciona el color del text del missatge', 'missatge-footer-personalitzat'); ?>
                                </p>
                            </td>
                        </tr>

                        <!-- Mida del text -->
                        <tr>
                            <th scope="row">
                                <label for="missatge_footer_tamany_text">
                                    <?php _e('Mida del text (en pixels)', 'missatge-footer-personalitzat'); ?>
                                </label>
                            </th>
                            <td>
                                <input type="number" 
                                       id="missatge_footer_tamany_text" 
                                       name="missatge_footer_tamany_text" 
                                       value="<?php echo esc_attr($missatge_tamany); ?>" 
                                       min="8" 
                                       max="48" 
                                       step="1" />
                                <p class="description">
                                    <?php _e('Tria un valor entre 8 i 48 pixels', 'missatge-footer-personalitzat'); ?>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <?php submit_button(__('Guardar Configuració', 'missatge-footer-personalitzat')); ?>
            </form>

            <!-- Vista prèvia -->
            <hr>
            <h2><?php _e('Vista Prèvia', 'missatge-footer-personalitzat'); ?></h2>
            <div style="
                padding: 15px;
                background-color: #f5f5f5;
                border: 1px solid #ddd;
                border-radius: 4px;
                color: <?php echo esc_attr($missatge_color); ?>;
                font-size: <?php echo esc_attr($missatge_tamany); ?>px;
            ">
                <?php echo wp_kses_post($missatge_text); ?>
            </div>
        </div>

        <?php
    }

    /**
     * Mostra el missatge al footer del lloc
     */
    public function mostrar_missatge_footer() {
        // Comprovar si el missatge està actiu
        $missatge_actiu = get_option('missatge_footer_actiu');
        
        if ($missatge_actiu !== '1') {
            return;
        }

        // Obtenir els valors guardats
        $missatge_text = get_option('missatge_footer_text');
        $missatge_color = get_option('missatge_footer_color', '#000000');
        $missatge_tamany = get_option('missatge_footer_tamany_text', '14');

        // Si no hi ha missatge, no mostrar res
        if (empty($missatge_text)) {
            return;
        }

        // Mostrar el missatge amb estils personalitzats
        ?>
        <div class="missatge-footer-personalitzat" style="
            margin-top: 20px;
            padding: 15px;
            text-align: center;
            color: <?php echo esc_attr($missatge_color); ?>;
            font-size: <?php echo esc_attr($missatge_tamany); ?>px;
            border-top: 1px solid #e0e0e0;
        ">
            <?php echo wp_kses_post($missatge_text); ?>
        </div>
        <?php
    }
}

// Instanciar la clase del plugin
if (class_exists('Missatge_Footer_Personalitzat')) {
    new Missatge_Footer_Personalitzat();
}

/**
 * Funcio per desactivar el plugin
 */
function desactivar_missatge_footer() {
    // Aquí pots netejar base de dades si ho necessites
    delete_option('missatge_footer_text');
    delete_option('missatge_footer_color');
    delete_option('missatge_footer_tamany_text');
    delete_option('missatge_footer_actiu');
}

// Hook de desactivació
register_deactivation_hook(__FILE__, 'desactivar_missatge_footer');
