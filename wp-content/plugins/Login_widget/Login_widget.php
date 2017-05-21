<?php
/**
 * Plugin Name: Widget de connexion
 * Plugin URI: http://julienjovy.free.fr
 * Description: Wigdet servant à rajouter le formulaire de connexion
 * Version: 1.0.0
 * Author: R0ulito
 * Author URI: http://julienjovy.free.fr
 */
$title= '';
add_action("widgets_init", 'login_init');

function login_init() {
    register_widget("WP_Widget_Login");
}

class WP_Widget_Login extends WP_Widget {

    function WP_Widget_Login(){
        $options = array(
            "classname" => "log-form",
            "description" => "Petit widget perso qui permet d'avoir le formulaire de log in/out sans le flux RSS"
        );
        $this->WP_Widget("login-widget", "Connexion", $options);
    }

    function widget($args, $instance){
        extract($args);
        echo $before_widget;
        echo $before_title.$instance['title'].$after_title;
        ?>
        <ul>
            <li><?php wp_register();?></li>
            <li><?php wp_loginout();?></li>
        </ul>
        
        <?php
        echo $after_widget;

    }

    function update($new, $old){
        return $new;

    }

    function form($instance){
        $default = array("title" => "Connexion");
        $instance = wp_parse_args($instance, $default)
        ?>
        <p>
            <label for="<?php echo $this->get_field_id("title");?>">Titre:</label>
            <input type="text" value="<?php echo $instance['title']?>" name="<?php echo $this->get_field_name("title");?>" id="<?php echo $this->get_field_id("title");?>"/>
        </p>

        <?php
            }
}


?>