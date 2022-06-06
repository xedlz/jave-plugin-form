<?php
/**
 * Plugin Name: JAVE Plugin Form
 * Author: Tonio Ruiz
 * Description: Formulario personaliozado usando el shortcode [jave-plugin-form]
 */
register_activation_hook(__FILE__,'jave_estudiante_init');

function jave_estudiante_init()
{
    global $wpdb;
    $tabla_estudiante = $wpdb->prefix . 'estudiante';
    $charset_collate = $wpdb->get_charset_collate();
    //prepara la consulta que vamos a lanzar para crear la tabla
    $query = "CREATE TABLE IF NOT EXISTS $tabla_estudiante (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        nombre varchar(40) NOT NULL,
        apellido varchar(40) NOT NULL,
        facultad varchar(40) NOT NULL,
        carrera varchar(40) NOT NULL,
        UNIQUE (id)
        ) $charset_collate";
    include_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($query);     

}
 add_shortcode('jave_plugin_form', 'JAVE_Plugin_form');
//funcion que pinta el formulario 
 function Jave_Plugin_form()
 {   
     global $wpdb;
   
     if (!empty($_POST)
         AND $_POST['nombre'] != ''
         AND $_POST['apellido'] !=""
         AND $_POST['facultad'] !=""
         AND $_POST['carrera'] !=""
         ) {
         $tabla_estudiante = $wpdb->prefix . 'estudiante';   
         $nombre = sanitize_text_field($_POST['nombre']); 
         $apellido = sanitize_text_field($_POST['apellido']); 
         $facultad = sanitize_text_field($_POST['facultad']); 
         $carrera = sanitize_text_field($_POST['carrera']); 
         $wpdb->insert(
             $tabla_estudiante, 
             array(
                 'nombre' => $nombre,
                 'apellido' => $apellido,
                 'facultad' => $facultad,
                 'carrera' => $carrera,
            )
        );
     }

     ob_start();
     ?>
    <form action="<?php get_the_permalink(); ?>" method="post" 
        class="registro">
        <div class="form-input">
            <labe for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" required>
        </div>   
        <form action="<?php get_the_permalink(); ?>" method="post" 
        class="registro">
        <div class="form-input">
            <labe for="nombre">Apellido</label>
            <input type="text" name="apellido" id="apellido" required>
        </div>
        <form action="<?php get_the_permalink(); ?>" method="post" 
        class="registro">
        <div class="form-input">
            <labe for="nombre">Facultad</label>
            <input type="text" name="facultad" id="facultad" required>
        </div> 
        <form action="<?php get_the_permalink(); ?>" method="post" 
        class="registro">
        <div class="form-input">
            <labe for="nombre">Carrera</label>
            <input type="text" name="carrera" id="carrera" required>
        </div> 
        <div class="form-input">
            <input type="submit" value="Enviar">
        </div>

    </form>    
     <?php
     return ob_get_clean();
 }
?>