<?php

/*

Template Name: Plantilla Projectes Destacats

*/

get_header(); // Carrega la capçalera de WordPress

?>
 
<main style="padding-top: 120px;">
<h1>Galeria de Projectes Destacats</h1>
 
    <div class="llista-projectes" style="padding-top: 120px;">
 
        <?php

        // Llista dels noms dels camps de grup que hem creat

        $camps_projectes = array('projecte_1', 'projecte_2', 'projecte_3');
 
        // 1. Recórrer cada un dels noms dels camps de grup fixos

        foreach ($camps_projectes as $camp_grup) {
 
            // 2. Obtenir TOTES les dades del grup com un array.

            // Si el grup no està omplert, $grup_dades serà false.

            $grup_dades = get_field($camp_grup);
 
            // 3. Comprovar si el camp de grup conté dades

            if ($grup_dades):
 
                // 4. Accedir a les dades directament des de l'array

                $nom = $grup_dades['nom'];

                $imatge_array = $grup_dades['imatge'];

                $descripcio = $grup_dades['descripcio'];

                $enllac = $grup_dades['enllac'];
 
                // 5. Mostrar el contingut

        ?>
<div class="projecte-item">
<?php if ($imatge_array): ?>
<img src="<?php echo esc_url($imatge_array['url']); ?>" alt="<?php echo esc_attr($imatge_array['alt']); ?>"       
                 
<img src="<?php echo esc_url($imatge_array>['url']); ?>" alt="<?php echo esc_attr($imatge_array['alt']); ?>" style="max-width: 100%; height: auto;">
<?php endif; ?>
 
                    <h2><?php echo esc_html($nom); ?></h2>
<p><?php echo esc_html($descripcio); ?></p>
 
                    <?php if ($enllac): ?>
<a href="<?php echo esc_url($enllac); ?>" target="_blank">Veure Projecte</a>
<?php endif; ?>
</div>
<?php

            endif;

        }

        ?>
 
    </div>
 
    <?php

    // Aquesta comprovació final serveix per mostrar un missatge si no hi ha cap projecte.

    if (! get_field('projecte_1') && ! get_field('projecte_2') && ! get_field('projecte_3')) {

        echo '<p>Encara no s\'han afegit projectes destacats.</p>';

    }

    ?>
</main>
 
<?php

get_footer(); // Carrega el peu de pàgina de WordPress 

?>
 