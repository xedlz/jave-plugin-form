<?php
/**
 * Plugin Name: JAVE Plugin Form
 * Author: Tonio Ruiz
 * Description: Formulario personaliozado usando el shortcode [jave-plugin-form]
 */

 add_shortcode('jave_plugin_form', 'JAVE_Plugin_form');
//funcion que pinta el formulario 
 function JAVE_Plugin_form()
 {
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