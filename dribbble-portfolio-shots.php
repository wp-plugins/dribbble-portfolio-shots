<?php
/**
 * @package dribbble-portfolio-shots
*/
/*
Plugin Name: Dribbble Portfolio Shots
Plugin URI: http://www.ramit-designs.com
Description: Dribbble Portfolio Shots - Showcase your best design work you shared on your dribbble profile on your website also.
Version: 1.0
Author: Matt Armstrong
Author URI: http://www.ramit-designs.com
*/
// style sheets
add_action( 'wp_enqueue_scripts', 'register_plugin_styles_dribbble_portfolio_shots_shortcode' );
add_shortcode('dribbble_shots', 'dribbble_portfolio_shots_shortcode');

function dribbble_portfolio_shots_shortcode($atts){
    $atts = shortcode_atts(array(
 		'id' => 'dribbble',
 		'column' => '4' //column 2,4,6 available
 	), $atts);
    extract($atts);
    $data = "";
    $data .= "
        <div class='dribble_box'>
            <div class='row center dribbble-shots'>
            </div>
        </div>
";
    
 $data .= "
<script>
     var playerId = '$id';
     var column = '$column';
     get_dribbble(playerId,column);
</script>
";
$data .= "<div style='color:#ccc; font-size: 9px; text-align:right;'><a href='http://www.telemedicine-jobs.com' title='click here' target='_blank'>Telemedicine Jobs</a></div>";
    return $data;
    }

 function register_plugin_styles_dribbble_portfolio_shots_shortcode() {
     wp_register_style( 'dribbble_portfolio_shots_shortcode_flexboxgrid', plugins_url( 'assets/flexboxgrid.min.css' , __FILE__ ) );
     wp_register_style( 'dribbble_portfolio_shots_shortcode_style', plugins_url( 'assets/style.css' , __FILE__ ) );
     wp_register_script('dribbble_portfolio_shots_shortcode_jquery', '//code.jquery.com/jquery-latest.min.js');
     wp_register_script('dribbble_portfolio_shots_shortcode_dribbblejs', plugins_url('assets/dribbble.js', __FILE__));
     wp_enqueue_style( 'dribbble_portfolio_shots_shortcode_flexboxgrid' );
     wp_enqueue_style( 'dribbble_portfolio_shots_shortcode_style' );
     wp_enqueue_script('dribbble_portfolio_shots_shortcode_jquery');
     wp_enqueue_script('dribbble_portfolio_shots_shortcode_dribbblejs');
 }