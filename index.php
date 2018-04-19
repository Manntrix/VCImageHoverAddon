<?php
/*
Plugin Name: VC Image Hover
Plugin URI:	http://www.manishmandal.com
Description: This plugin is addon for visual composer to create image hover effect
Author: Manish Mandal
Version: 1.0
Author URI: http://www.manishmandal.com
*/

function vc_image_hover($attr){
	

	
	
	extract(
	shortcode_atts(array(
		'title_sec_1_image' => '',
        'title_sec_2_image' => '',
		'vc_image_hover_width' => '',
		'vc_image_hover_height' => '',
	
	
	),$attr)
	);
	
	
	ob_start();
	
	?>
					<?php
						$sce1_image =wp_get_attachment_image_src($title_sec_1_image,'full');
                        $sca1_image =wp_get_attachment_image_src($title_sec_2_image,'full');
						
						if($sce1_image){?>
			 
							 <div class="" style="background:url(<?php echo esc_url($sce1_image[0]);?>) no-repeat; background-size:cover;width: <?php echo($vc_image_hover_width);?>; height: <?php echo($vc_image_hover_height); ?>; " onmouseover="this.style.background = 'url(<?php echo esc_url($sca1_image[0]);?>) no-repeat';" onmouseout="this.style.background = 'url(<?php echo esc_url($sce1_image[0]);?>) no-repeat';"></div>
							
						<?php }
						
						?>

	<?php
	return ob_get_clean();
	
	
}
add_shortcode('vc_image_hover','vc_image_hover');



 function consult_intigratewithvc(){
	 
	 vc_map(array(
	 'name'=>__('VC Image Hover','text-donain'),
	 'description'=>'Image hover effect for VC',
	 'base'=>'vc_image_hover',
	 'category'=>'Manish VC Element',
	 'icon'=> plugin_dir_url( __FILE__ ).'icon.png' ,
	 'params'=>array( 
	 
	array(
	 'param_name'=>'title_sec_1_image',
	 'type'=>'attach_image',
	 'heading'=>'Attach your first image',
	 ),
	 
	 array(
	 'param_name'=>'title_sec_2_image',
	 'type'=>'attach_image',
	 'heading'=>'Attach your second image',
	 ),
	 array(
	 'param_name'=>'vc_image_hover_width',
	 'type'=>'textfield',
	 'heading'=>'Width in px',
	 ),
	 array(
	 'param_name'=>'vc_image_hover_height',
	 'type'=>'textfield',
	 'heading'=>'Height in px',
	 ),
	 ),

	 ));
 
	 
 }
 add_action('vc_before_init','consult_intigratewithvc');

?>