<?php
/**
 * Plugin Name: Footer personnalisé
 * Plugin URI: http://julienjovy.free.fr
 * Description: Wigdet servant à rajouter le footer personnalisé
 * Version: 1.0.0
 * Author: R0ulito
 * Author URI: http://julienjovy.free.fr
 */
$title= '';
add_action("widgets_init", 'footer_init');

function footer_init() {
    register_widget("WP_Widget_Footer");
}

class WP_Widget_Footer extends WP_Widget {

    function WP_Widget_Footer(){
        $options = array(
            "classname" => "ozp-footer",
            "description" => "Petit widget perso pour avoir le footer personnalisé"
        );
        $this->WP_Widget("footer-widget", "Footer", $options);
    }

    function widget($args, $instance){
        extract($args);
        echo $before_widget;
        echo $before_title.$instance['title'].$after_title;
        ?>

        <!-- Insert datas you want to show here -- -- -- Insérez les données que vous voulez afficher ici -->
        <table border="0" cellspacing="0" cellpadding="0">
            <tbody>
            <tr>
                <td colspan="3" align="center" width="100%">Association loi 1901, essentiellement financée par nos adhérents, et subventionnée par&nbsp;:</td>
            </tr>
            <tr>
                <td align="center" width="33%"><a href="http://www.mairie-ozoir-la-ferriere.fr/" target="_blank" rel="noopener noreferrer">La municipalité d’OZOIR la Ferrière</a></td>
                <td align="center" width="33%"><a href="http://www.seine-et-marne.jeunesse-sports.gouv.fr/" target="_blank" rel="noopener noreferrer">La Direction départementale<br>
                        de la jeunesse et des sports</a></td>
                <td align="center" width="34%"><a href="http://www.seine-et-marne.fr/root" target="_blank" rel="noopener noreferrer">Le Conseil Général de Seine et Marne</a></td>
            </tr>
            <tr>
                <td align="center" width="33%"><a href="http://www.mairie-ozoir-la-ferriere.fr/" target="_blank" rel="noopener noreferrer"><img src="http://ozoir-plongee.org/club/ozoir.jpg" width="149" height="50" border="0"></a></td>
                <td align="center" width="33%"><span style="color: #0000ff;"><a href="http://www.seine-et-marne.jeunesse-sports.gouv.fr/" target="_blank" rel="noopener noreferrer"><img src="http://ozoir-plongee.org/club/ministere.jpg" width="80" height="80" border="0"></a></span></td>
                <td align="center" width="34%"><a href="http://www.seine-et-marne.fr/root" target="_blank" rel="noopener noreferrer"><img src="http://ozoir-plongee.org/club/CG77.gif" width="176" height="55" border="0"></a></td>
            </tr>
            </tbody>
        </table>

        <!-- END of insert place -- -- -- FIN de l'espace d'insertion -->

        <?php
        echo $after_widget;

    }

    function update($new, $old){
        return $new;

    }

    function form($instance){
        $default = array("title" => "Footer");
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