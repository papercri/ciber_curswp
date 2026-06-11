# Plugin: Missatge Footer Personalitzat

## Descripció
Plugin senzill per WordPress que afegeix un missatge personalitzat al peu de pàgina (footer) del lloc amb opcions de configuració.

---

## Estructura de Carpetes

```
wp-content/plugins/
└── missatge-footer-personalitzat/
    ├── missatge-footer-personalitzat.php
    ├── README.md
    └── languages/
```

---

## Com Funciona

### Componentes del Plugin

1. Header del Plugin
   - Metadades del plugin (nom, versió, autor)
   - WordPress les llegeix per mostrar el plugin al panell d'admin

2. Classe Principal (Missatge_Footer_Personalitzat)
   - Constructor: inicialitza els hooks
   - cargar_idiomas(): carrega idiomes
   - registrar_menu_admin(): crea el menú
   - registrar_opciones(): guarda les opcions
   - pagina_opciones(): mostra el formulari
   - mostrar_missatge_footer(): afegeix el missatge

3. Hooks Utilitzats
   - plugins_loaded: carrega idiomas
   - admin_menu: crea el menú
   - admin_init: registra les opcions
   - wp_footer: mostra el missatge

---

## Com Usar-lo

### Configurar el Plugin

1. Vés a: Configuració > Missatge Footer
2. Ompleix els camps:
   - Text del missatge
   - Color del text
   - Mida del text
3. Fes clic en: Guardar Configuració

### Veure el Resultat

Vés a la web pública i desplaça't al footer.

---

## Funcions Clau

registrar_opciones()
- Registra on es guarden les opcions a wp_options

pagina_opciones()
- Crea el formulari al panell d'administració

mostrar_missatge_footer()
- Obté els valors i els mostra al footer

---

## Seguretat

El plugin implementa:
- Verificació de permisos
- Escapar sortida (esc_html, esc_attr, wp_kses_post)
- Sanititzar entrada
- Nonces

---

## Resolució de Problemes

| Problema | Solució |
|----------|---------|
| No apareix al panell | Comprova header del .php |
| No vull al footer | Comprova que wp_footer() estigui al tema |
| Els estils no funcionen | Pot ser tema que anul·li estils |
| Formulari no es guarda | Comprova register_setting() |

---

## Com Distribuir-lo

### Opció 1: GitHub
1. Crea repo a GitHub
2. Puja els arxius

### Opció 2: ZIP Manual
1. Comprimeix la carpeta
2. Els alumnes descarreguen
3. Extrauen a wp-content/plugins/
4. Activen des del panell

### Opció 3: WordPress.org
1. Crea compte wordpress.org
2. Segueix el procés
3. Publica el plugin

---

**Versió:** 1.0.0
**Llicència:** GPL v2 o posterior

---

## Estructura de Carpetes

```
wp-content/plugins/
â””â”€â”€ missatge-footer-personalitzat/
    â”œâ”€â”€ missatge-footer-personalitzat.php    (Arxiu principal)
    â”œâ”€â”€ README.md                             (Aquest arxiu)
    â””â”€â”€ languages/                            (Carpeta per a traduccions)
        â”œâ”€â”€ missatge-footer-personalitzat-ca_ES.po
        â””â”€â”€ missatge-footer-personalitzat-ca_ES.mo
```

---

## Com Funciona

### Componentes del Plugin:

1. Header del Plugin (lÃ­nies 1-15)
   - Metadades del plugin (nom, versiÃ³, autor)
   - WordPress les llegeix per mostrar el plugin al panell d'admin

2. Classe Principal (Missatge_Footer_Personalitzat)
   - Constructor: inicialitza els hooks
   - cargar_idiomas(): carrega idiomes per a traduccions
   - registrar_menu_admin(): crea el menÃº a l'administraciÃ³
   - registrar_opciones(): guarda les opcions a la base de dades
   - pagina_opciones(): mostra el formulari de configuraciÃ³
   - mostrar_missatge_footer(): afegeix el missatge al footer

3. Hooks Utilitzats
   - plugins_loaded: carrega idiomas
   - admin_menu: crea el menÃº d'administraciÃ³
   - admin_init: registra les opcions
   - wp_footer: mostra el missatge al footer
   - register_deactivation_hook(): neteja al desactivar

---

## Pas a Pas: Com Crear-lo

### Pas 1: Crear la Carpeta del Plugin
```
1. VÃ©s a: wp-content/plugins/
2. Crea una carpeta anomenada: missatge-footer-personalitzat
```

### Pas 2: Crear l'Arxiu Principal
```
1. Dins de la carpeta anterior
2. Crea un arxiu: missatge-footer-personalitzat.php
3. Afegeix el codi que ves al fitxer principal
```

### Pas 3: Entendre la Estructura del Codi

A) Header/Metadades (primeres 20 lÃ­nies):
- WordPress llegeix aquestes lÃ­nies per mostrar el plugin
- Cal: Plugin Name, Version, Author

B) Constants (lÃ­nies 17-20):
```php
define('MISSATGE_FOOTER_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('MISSATGE_FOOTER_PLUGIN_URL', plugin_dir_url(__FILE__));
```
- Paths Ãºtils per referenciar arxius del plugin

C) La Classe Principal:
```php
class Missatge_Footer_Personalitzat {
    // Tota la lÃ³gica aquÃ­
}
```

D) Instanciar la Classe:
```php
new Missatge_Footer_Personalitzat();
```

### Pas 4: Funcions Clau Explicades

#### A) registrar_opciones()
```php
register_setting(
    'missatge-footer-grup',    // Grup de configuraciÃ³
    'missatge_footer_text'      // Nom de l'opciÃ³ a la BD
);
```
- Registra on es guarden les opcions
- Es guarden a wp_options a la base de dades

#### B) pagina_opciones()
```php
<textarea name="missatge_footer_text">...</textarea>
<input type="color" name="missatge_footer_color" />
<input type="number" name="missatge_footer_tamany_text" />
```
- Formulari HTML amb:
  - Text del missatge (textarea)
  - Color (input color picker)
  - Mida (input number)

#### C) mostrar_missatge_footer()
```php
$missatge_text = get_option('missatge_footer_text');
// Mostrar el missatge amb estils
echo wp_kses_post($missatge_text);
```
- `get_option()`: obtÃ© el valor de la BD
- `wp_kses_post()`: permet HTML segur

---

## ðŸš€ Com Activar el Plugin

### OPCIÃ“ 1: Des del Panell de WordPress

1. Entra al panell de WordPress
2. VÃ©s a: Plugins â†’ Plugins instalÂ·lats
3. Busca: "Missatge Footer Personalitzat"
4. Fes clic en: "Activar"

### OPCIÃ“ 2: Des de l'FTP/Gestor d'Arxius

1. Sura el plugin a `wp-content/plugins/` (ja estÃ  fet)
2. Entra al panell de WordPress
3. Plugins â†’ InstalÂ·lats â†’ Activar

### OPCIÃ“ 3: Amb WP-CLI (terminal)

```bash
wp plugin activate missatge-footer-personalitzat
```

---

## âš™ï¸ Com Usar el Plugin

### Pas: Accedir a la ConfiguraciÃ³

1. Al panell de Wordpress Admin (esquerra)
2. ConfiguraciÃ³ (Settings)
3. Missatge Footer (opciÃ³ nueva)

### Pas: Omplir el Formulari

- Activar missatge: Marca per mostrar (checked)
- Text del missatge: Escriu el teu missatge
- Color del text: Selecciona un color
- Mida del text: Entre 8 i 48 pixels

### Pas: Guardar

Fes clic en "Guardar ConfiguraciÃ³"

### Pas: Veure el Resultat

VÃ©s a la web pÃºblica i desplaÃ§a't al footer. El missatge apareixerÃ  amb els estils que has escollit.

---

## ðŸ’¾ Com Pujar el Plugin a WordPress.org

Si vols compartir el plugin pÃºblicament:

### Pas: Preparar els Arxius

```
Assegura't que tinguis:
- /missatge-footer-personalitzat/
  â”œâ”€â”€ missatge-footer-personalitzat.php
  â”œâ”€â”€ README.md
  â”œâ”€â”€ /languages/ 
  â””â”€â”€ /assets/ (opcional - CSS, JS, imatges)
```

### Pas: Crear un Compte a wordpress.org

1. VÃ©s a: https://wordpress.org/
2. Crea un compte (username + email)
3. Confirma el correu

### Pas: Preparar el Plugin

Estructura recomanada:
```
missatge-footer-personalitzat/
â”œâ”€â”€ missatge-footer-personalitzat.php
â”œâ”€â”€ README.txt (format wordpress.org)
â”œâ”€â”€ assets/
â”‚   â”œâ”€â”€ images/
â”‚   â”œâ”€â”€ css/
â”‚   â””â”€â”€ js/
â””â”€â”€ languages/
```

### Pas: Subir a WordPress.org

1. VÃ©s a: https://wordpress.org/plugins/developers/
2. Fes clic en "Add New Plugin"
3. Segueix el procÃ©s de verificaciÃ³
4. Sura els arxius en format ZIP

### Alternativa: GitHub (mÃ©s simple per desenvolupadors)

1. Crea un repositori a GitHub
2. Puja els arxius del plugin
3. Els usuaris el descarreguen manualment

---

## ðŸ” Mesures de Seguretat Implementades

1. VerificaciÃ³ de Permisos
   ```php
   if (!current_user_can('manage_options')) { ... }
   ```
   - Solo administradors poden accedir

2. Escapar Sortida
   ```php
   echo esc_html($valor);      // Text segur
   echo esc_attr($valor);      // Atributs segurs
   echo wp_kses_post($valor);  // HTML segur
   ```

3. Nonces (opcional - ja en formularis de configuraciÃ³)
   ```php
   wp_verify_nonce($_POST['nonce']);
   ```

4. Sanitizar Entrada
   - Els `register_setting()` automÃ ticament netegen

---

## ðŸ› ï¸ Exemples de PersonalitzaciÃ³

### Canviar el menÃº d'ubicaciÃ³

```php
// Actualment:
add_options_page(...); // Settings submenu

// Per a un menÃº principal:
add_menu_page(
    'Missatge Footer',
    'Missatge Footer',
    'manage_options',
    'missatge-footer-opcions',
    array($this, 'pagina_opciones')
);
```

### Afegir mÃ©s camps

```php
register_setting('missatge-footer-grup', 'missatge_footer_background');

// Al formulari:
<input type="color" name="missatge_footer_background" />

// Al footer:
background-color: <?php echo esc_attr($background); ?>;
```

### Guardar informaciÃ³ per post en lloc de globalment

```php
add_post_meta($post_id, 'missatge_custom', $valor);
update_post_meta($post_id, 'missatge_custom', $valor);
```

---

## ðŸ“š Recursos Educatius

### Hooks Apresos:
- `add_action()` - Enganxar funcions a Ã©vÃ©nements
- `add_filter()` - Modificar dades
- `do_action()` - Crear events personalitzats

### Funcions WordPress Importants:
- `get_option()` / `update_option()` - Opcions globales
- `get_post_meta()` / `update_post_meta()` - Metadades de posts
- `wp_kses_post()` - Seguretat
- `__()` / `_e()` - TraducciÃ³

### API de Settings:
- `register_setting()` - Registrar opcions
- `settings_fields()` - Token seguretat
- `do_settings_sections()` - Mostrar seccions
- `add_settings_field()` - Camps personalitzats

---

## âœ… Checklist de Funcionalitats

- [x] Afegir menÃº al panell de admin
- [x] Formulari de configuraciÃ³
- [x] Guardar opciones a BD
- [x] Mostrar missatge al footer
- [x] Personalizar color
- [x] Personalizar mida de text
- [x] Activar/Desactivar
- [x] Vista previa
- [x] Seguretat (permisos)
- [x] InternacionalitzaciÃ³ (textos traducibles)

---

## ðŸ› ResoluciÃ³ de Problemes

### Q: El plugin no apareix al panell
R: Comprova que `Plugin Name:` estigui al header del .php

### Q: El menÃº no apareix
R: Reload la pÃ gina, potser necessita refrescant

### Q: El footer no es veu
R: Comprova que `wp_footer()` estigui cridat al tema

### Q: Els estils no s'apliquen
R: Pot ser que el tema o plugin anulÂ·li els estils inline

---

## ðŸ“ž Suport

Si tens dubtes, consulta:
- [DocumentaciÃ³ WordPress Plugin Dev](https://developer.wordpress.org/plugins/)
- [WordPress Hooks Reference](https://developer.wordpress.org/plugins/hooks/)
- [Function Reference](https://developer.wordpress.org/reference/)

---

VersiÃ³: 1.0.0  
Actualitzat: 2026-02-01  
LlicÃ¨ncia: GPL v2 o posterior


