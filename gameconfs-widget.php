<?php
/*
Plugin Name: Gameconfs Widget
Plugin URI: http://www.gameconfs.com/widget
Description: A widget with a list of game conferences and events from Gameconfs.com.
Version: 1.1
Author: Jurie Horneman
Author URI: http://www.gameconfs.com/about
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/
 
 
class GameconfsWidget extends WP_Widget
{
  function GameconfsWidget()
  {
    $widget_ops = array('classname' => 'GameconfsWidget', 'description' => 'Displays a list of game conferences and events');
    $this->WP_Widget('GameconfsWidget', 'Game Conferences', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'width' => '', 'height' => '', 'place' => '', 'nrmonths' => '', 'nocss' => '' ) );
    $title = $instance['title'];
    $width = $instance['width'];
    $height = $instance['height'];
    $place = $instance['place'];
    $nrmonths = $instance['nrmonths'];
    $nocss = empty($instance['nocss']) ? false : $instance['nocss'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('width'); ?>">Width (in pixels, default is 240): <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo attribute_escape($width); ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('height'); ?>">Height (in pixels, default is 400): <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo attribute_escape($height); ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('place'); ?>">Place: <input class="widefat" id="<?php echo $this->get_field_id('place'); ?>" name="<?php echo $this->get_field_name('place'); ?>" type="text" value="<?php echo attribute_escape($place); ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('nrmonths'); ?>">Number of months (1-12, default is 3): <input class="widefat" id="<?php echo $this->get_field_id('nrmonths'); ?>" name="<?php echo $this->get_field_name('nrmonths'); ?>" type="text" value="<?php echo attribute_escape($nrmonths); ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('nocss'); ?>">Use your own CSS (default is Gameconfs CSS): <input class="widefat" id="<?php echo $this->get_field_id('nocss'); ?>" name="<?php echo $this->get_field_name('nocss'); ?>" type="checkbox" <?php checked($nocss); ?> /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = array();
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['width'] = intval($new_instance['width']);
    $instance['height'] = intval($new_instance['height']);
    $instance['place'] = strip_tags($new_instance['place']);
    $instance['nrmonths'] = intval($new_instance['nrmonths']);
    $instance['nocss'] = boolval($new_instance['nocss']);
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);

    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
    $width = empty($instance['width']) ? 240 : $instance['width'];
    $height = empty($instance['height']) ? 400 : $instance['height'];
    $place = $instance['place'];
    $nrmonths = empty($instance['nrmonths']) ? 3 : $instance['nrmonths'];
    $nocss = empty($instance['nocss']) ? false : $instance['nocss'];
    $nocss_attr = $nocss ? "data-no-css='true'" : "";

    echo $before_widget;

    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
    echo '<div style="margin-top:5px; margin-left:-6px">';
    echo '<div id="gameconfs-widget-container" data-nr-months="'.strval($nrmonths).'" data-place="'.strval($place).'" data-width="'.strval($width).'" data-height="'.strval($height).'" '.$nocss_attr.'></div>';
    echo '</div>';
 
    echo $after_widget;

    wp_enqueue_script("gameconfs", "http://www.gameconfs.com/widget/v1/script.js", array( "jquery" ));
  }
}

add_action( 'widgets_init', create_function('', 'return register_widget("GameconfsWidget");') );

?>