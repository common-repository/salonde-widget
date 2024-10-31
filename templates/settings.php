<?php	
add_action( 'admin_enqueue_scripts', 'salon_widget_plugin_color_picker' );
function salon_widget_plugin_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker' );
}
?>
<div class="wrap salon-widget-review-button-plugin">
	<script language="JavaScript">
		jQuery(document).ready(function() {
			// COLOR PICKER
			var myOptions = {
			    // you can declare a default color here, or in the data-default-color attribute on the input
			    defaultColor: false,
			    // a callback to fire whenever the color changes to a valid color
			    change: function(event, ui){},
			    // a callback to fire when the input is emptied or an invalid color
			    clear: function() {},
			    // hide the color picker controls on load
			    hide: true,
			    // show a group of common colors beneath the square or, supply an array of colors to customize further
			    palettes: true
			};
			jQuery('.salon-color-field').wpColorPicker(myOptions);
			
			// ON/OFF SWITCH
			jQuery(".cb-enable").click(function(){
		        var parent = jQuery(this).parents('.switch');
		        jQuery('.cb-disable',parent).removeClass('selected');
		        jQuery(this).addClass('selected');
		        jQuery('.checkbox',parent).attr('checked', true);
		        jQuery('.salon-settings-extended-wrapper').removeClass('hidden');
		    });
		    jQuery(".cb-disable").click(function(){
		        var parent = jQuery(this).parents('.switch');
		        jQuery('.cb-enable',parent).removeClass('selected');
		        jQuery(this).addClass('selected');
		        jQuery('.checkbox',parent).attr('checked', false);
		        jQuery('.salon-settings-extended-wrapper').addClass('hidden');
		    });
		});
	</script>
	<div class="salon-main-header">
	    <a class="salon-logo" href="https://salon.de/" target="_blank"><img src="<?php echo MYPLUGIN_PLUGIN_URL ?>/img/salon.de-logo.png" /></a>
	    <h2 class="salon-main-header-h"><?php _e('salon.de plugin settings','salon_plugin_widget') ?></h2>
    </div>
    <form method="post" action="options.php"> 
        <?php 
	        @settings_fields('salon_widget_plugin_group');
	        @do_settings_fields('salon_widget_plugin_group');
			$extendedSettings = get_option('salon_extended');
        ?>
		<div class="salon-settings">
			<div class="salon-settings-sub-section">
				<div class="salon-settings-head">
					<h3><?php _e('salon.de widget','salon_plugin_widget') ?></h3>
					<p><?php _e('Edit the salon.de widget color and width/height properties.','salon_plugin_widget') ?></p>
				</div>
				<div class="salon-settings-content">
					<table class="form-table">  
					    <tr valign="center">
						   	<th scope="row"><label for="salon-ID"><?php _e('salon.de widget ID','salon_plugin_widget') ?></label><p></p></th>
					   		<td><input id="salon-ID" name="salon_ID" type="text" value="<?php echo get_option('salon_ID'); ?>" /><p></p>
					    </tr>
					    <tr valign="center">
					        <th scope="row"><label for="salon-color1"><?php _e('salon.de widget appointment dates color picker','salon_plugin_widget') ?></label></th>
					        <td><input id="salon-color1" type="text" class="salon-color-field" data-default-color="#C29F64" name="salon_color1" value="<?php echo get_option('salon_color1'); ?>" /></td>
					    </tr>
						<tr valign="center">
					        <th scope="row"><label for="salon-color2"><?php _e('salon.de widget selection fields color picker','salon_plugin_widget') ?></label></th>
					        <td><input id="salon-color2" type="text" class="salon-color-field" data-default-color="#E8E8E8" name="salon_color2" value="<?php echo get_option('salon_color2'); ?>" /></td>
					    </tr>
						<tr valign="center">
					        <th scope="row"><label for="salon-color3"><?php _e('salon.de widget background color picker','salon_plugin_widget') ?></label></th>
					        <td><input id="salon-color3" type="text" class="salon-color-field" data-default-color="" name="salon_color3" value="<?php echo get_option('salon_color3'); ?>" /></td>
					    </tr>
					    <tr valign="center">
					       	<th scope="row"><label for="salon-width"><?php _e('salon.de widget width (in px or %)','salon_plugin_widget') ?></label><p>(e.g. 500 / 100%)</p></th>
					       	<td><input id="salon-width" name="salon_width" type="text" value="<?php echo get_option('salon_width'); ?>" /><p></p>
					    </tr>
					    <tr valign="center">
					       	<th scope="row"><label for="salon-height"><?php _e('salon.de widget height (in px)','salon_plugin_widget') ?></label><p>(e.g. 700)</p></th>
					       	<td><input id="salon-height" name="salon_height" type="text" value="<?php echo get_option('salon_height'); ?>" /><p></p>
					    </tr>
					</table>	
				</div>
			</div>
			<div class="salon-settings-sub-section">
				<div class="salon-settings-head">
					<h3><?php _e('salon.de review','salon_plugin_widget') ?></h3>
					<p><?php _e('Edit the salon.de review width/height properties.','salon_plugin_widget') ?></p>
				</div>
				<div class="salon-settings-content">
					<table class="form-table">  
			            <tr valign="center">
			            	<th scope="row"><label for="salon-review-width"><?php _e('salon.de review width (in px or %)','salon_plugin_widget') ?></label><p>(e.g. 500 / 100%)</p></th>
			            	<td><input id="salon-review-width" name="salon_review_width" type="text" value="<?php echo get_option('salon_review_width'); ?>" /><p></p>
			            </tr>
			            <tr valign="center">
			            	<th scope="row"><label for="salon-review-height"><?php _e('salon.de review height (in px)','salon_plugin_widget') ?></label><p>(e.g. 700)</p></th>
			            	<td><input id="salon-review-height" name="salon_review_height" type="text" value="<?php echo get_option('salon_review_height'); ?>" /><p></p>
			            </tr>
			        </table>	
				</div>
			</div>
			<div class="salon-settings-sub-section">
				<div class="salon-settings-head">
					<h3><?php _e('salon.de button','salon_plugin_widget') ?></h3>
					<p><?php _e('Edit the salon.de button link, text, color and width/height properties.','salon_plugin_widget') ?></p>
				</div>
				<div class="salon-settings-content">
					<table class="form-table">  
						<tr valign="center">
			            	<th scope="row"><label for="salon-link"><?php _e('salon.de button link','salon_plugin_widget') ?></label><p>(e.g. https://salon.de/)</p></th>
			            	<td><input id="salon-link" name="salon_link" type="text" value="<?php echo get_option('salon_link'); ?>" /><p></p>
			            </tr>
			            <tr valign="center">
			            	<th scope="row"><label for="salon-button-text"><?php _e('salon.de button text','salon_plugin_widget') ?></label><p>(e.g. Online-Termin buchen)</p></th>
			            	<td><input id="salon-button-text" name="salon_button_text" type="text" value="<?php echo get_option('salon_button_text'); ?>" /><p></p>
			            </tr>
			            <tr valign="center">
			                <th scope="row"><label for="salon-button-text-color"><?php _e('salon.de button text color picker','salon_plugin_widget') ?></label></th>
			                <td><input id="salon-button-text-color" type="text" class="salon-color-field" data-default-color="#FFFFFF" name="salon_button_text_color" value="<?php echo get_option('salon_button_text_color'); ?>" /></td>
			            </tr>
						<tr valign="center">
			                <th scope="row"><label for="salon-button-color"><?php _e('salon.de button background color picker','salon_plugin_widget') ?></label></th>
			                <td><input id="salon-button-color" type="text" class="salon-color-field" data-default-color="#C29F64" name="salon_button_color" value="<?php echo get_option('salon_button_color'); ?>" /></td>
			            </tr>
			            <tr valign="center">
			            	<th scope="row"><label for="salon-button-width"><?php _e('salon.de button width (in px)','salon_plugin_widget') ?></label><p>(e.g. 180)</p></th>
			            	<td><input id="salon-button-width" name="salon_button_width" type="text" value="<?php echo get_option('salon_button_width'); ?>" /><p></p>
			            </tr>
			            <tr valign="center">
			            	<th scope="row"><label for="salon-button-height"><?php _e('salon.de button height (in px)','salon_plugin_widget') ?></label><p>(e.g. 26)</p></th>
			            	<td><input id="salon-button-height" name="salon_button_height" type="text" value="<?php echo get_option('salon_button_height'); ?>" /><p></p>
			            </tr>
			        </table>	
				</div>
			</div>
			<div class="salon-settings-sub-section">
		        <div class="salon-settings-head">
					<h3><?php _e('Add more than one widget/review','salon_plugin_widget') ?></h3>
					<p><?php _e('Activate if you want to add more than one salon.de widget/review on your page.','salon_plugin_widget') ?></p>
				</div>
	        	<div class="salon-settings-content">
					<p class="field switch">
					<?php
					$extendedClass = "";
				    if ($extendedSettings == 1){
				    	$extendedClass = "";
				    	$html = '<input type="radio" id="radio1" name="salon_extended" value="1"' . checked( 1, $extendedSettings, false ) . '/>';
						$html .= '&nbsp;';
						$html .= '<label for="radio1" class="cb-enable selected"><span>On</span></label>';
						$html .= '&nbsp;';
						$html .= '<input type="radio" id="radio2" name="salon_extended" value="2"' . checked( 2, $extendedSettings, false ) . '/>';
						$html .= '&nbsp;';
						$html .= '<label for="radio2" class="cb-disable"><span>Off</span></label>';
						echo $html;
				    }
					else {
						$extendedClass = "hidden";
						$html = '<input type="radio" id="radio1" name="salon_extended" value="1"' . checked( 1, $extendedSettings, false ) . '/>';
						$html .= '&nbsp;';
						$html .= '<label for="radio1" class="cb-enable"><span>On</span></label>';
						$html .= '&nbsp;';
						$html .= '<input type="radio" id="radio2" name="salon_extended" value="2"' . checked( 2, $extendedSettings, false ) . '/>';
						$html .= '&nbsp;';
						$html .= '<label for="radio2" class="cb-disable selected"><span>Off</span></label>';
						echo $html;
					}
				    ?>
					</p>
				</div>
			</div>
			<div class="salon-settings-extended-wrapper <?php echo $extendedClass; ?>">
	        	<div class="salon-settings-sub-section">
					<div class="salon-settings-head">
						<h3><?php _e('salon.de widget 2','salon_plugin_widget') ?></h3>
						<p><?php _e('Edit the salon.de widget 2 color and width/height properties.','salon_plugin_widget') ?></p>
					</div>
					<div class="salon-settings-content">
						<table class="form-table">  
				            <tr valign="center">
				            	<th scope="row"><label for="salon-ID-2"><?php _e('salon.de widget 2 ID','salon_plugin_widget') ?></label><p></p></th>
				            	<td><input id="salon-ID-2" name="salon_ID_2" type="text" value="<?php echo get_option('salon_ID_2'); ?>" /><p></p>
				            </tr>
				            <tr valign="center">
				                <th scope="row"><label for="salon-color1-2"><?php _e('salon.de widget 2 appointment dates color picker','salon_plugin_widget') ?></label></th>
				                <td><input id="salon-color1-2" type="text" class="salon-color-field" data-default-color="#C29F64" name="salon_color1_2" value="<?php echo get_option('salon_color1_2'); ?>" /></td>
				            </tr>
							<tr valign="center">
				                <th scope="row"><label for="salon-color2-2"><?php _e('salon.de widget 2 selection fields color picker','salon_plugin_widget') ?></label></th>
				                <td><input id="salon-color2-2" type="text" class="salon-color-field" data-default-color="#E8E8E8" name="salon_color2_2" value="<?php echo get_option('salon_color2_2'); ?>" /></td>
				            </tr>
							<tr valign="center">
				                <th scope="row"><label for="salon-color3-2"><?php _e('salon.de widget 2 background color picker','salon_plugin_widget') ?></label></th>
				                <td><input id="salon-color3-2" type="text" class="salon-color-field" data-default-color="" name="salon_color3_2" value="<?php echo get_option('salon_color3_2'); ?>" /></td>
				            </tr>
				            <tr valign="center">
				            	<th scope="row"><label for="salon-width-2"><?php _e('salon.de widget 2 width (in px or %)','salon_plugin_widget') ?></label><p>(e.g. 500 / 100%)</p></th>
				            	<td><input id="salon-width-2" name="salon_width_2" type="text" value="<?php echo get_option('salon_width_2'); ?>" /><p></p>
				            </tr>
				            <tr valign="center">
				            	<th scope="row"><label for="salon-height-2"><?php _e('salon.de widget 2 height (in px)','salon_plugin_widget') ?></label><p>(e.g. 700)</p></th>
				            	<td><input id="salon-height-2" name="salon_height_2" type="text" value="<?php echo get_option('salon_height_2'); ?>" /><p></p>
				            </tr>
				        </table>	
					</div>
				</div>
				<div class="salon-settings-sub-section">
					<div class="salon-settings-head">
						<h3><?php _e('salon.de widget 2 review','salon_plugin_widget') ?></h3>
						<p><?php _e('Edit the salon.de widget 2 review width/height properties.','salon_plugin_widget') ?></p>
					</div>
					<div class="salon-settings-content">
						<table class="form-table">  
				            <tr valign="center">
				            	<th scope="row"><label for="salon-review-width-2"><?php _e('salon.de widget 2 review width (in px or %)','salon_plugin_widget') ?></label><p>(e.g. 500 / 100%)</p></th>
				            	<td><input id="salon-review-width-2" name="salon_review_width_2" type="text" value="<?php echo get_option('salon_review_width_2'); ?>" /><p></p>
				            </tr>
				            <tr valign="center">
				            	<th scope="row"><label for="salon-review-height-2"><?php _e('salon.de widget 2 review height (in px)','salon_plugin_widget') ?></label><p>(e.g. 700)</p></th>
				            	<td><input id="salon-review-height-2" name="salon_review_height_2" type="text" value="<?php echo get_option('salon_review_height_2'); ?>" /><p></p>
				            </tr>
				        </table>	
					</div>
				</div>
	    	    <div class="salon-settings-sub-section">
					<div class="salon-settings-head">
						<h3><?php _e('salon.de widget 3','salon_plugin_widget') ?></h3>
						<p><?php _e('Edit the salon.de widget 3 color and width/height properties.','salon_plugin_widget') ?></p>
					</div>
					<div class="salon-settings-content">
						<table class="form-table">  
				            <tr valign="center">
				            	<th scope="row"><label for="salon-ID-3"><?php _e('salon.de widget 3 ID','salon_plugin_widget') ?></label><p>(</p></th>
				            	<td><input id="salon-ID-3" name="salon_ID_3" type="text" value="<?php echo get_option('salon_ID_3'); ?>" /><p></p>
				            </tr>
				            <tr valign="center">
				                <th scope="row"><label for="salon-color1-3"><?php _e('salon.de widget 3 appointment dates color picker','salon_plugin_widget') ?></label></th>
				                <td><input id="salon-color1-3" type="text" class="salon-color-field" data-default-color="#C29F64" name="salon_color1_3" value="<?php echo get_option('salon_color1_3'); ?>" /></td>
				            </tr>
							<tr valign="center">
				                <th scope="row"><label for="salon-color2-3"><?php _e('salon.de widget 3 selection fields color picker','salon_plugin_widget') ?></label></th>
				                <td><input id="salon-color2-3" type="text" class="salon-color-field" data-default-color="#E8E8E8" name="salon_color2_3" value="<?php echo get_option('salon_color2_3'); ?>" /></td>
				            </tr>
							<tr valign="center">
				                <th scope="row"><label for="salon-color3-3"><?php _e('salon.de widget 3 background color picker','salon_plugin_widget') ?></label></th>
				                <td><input id="salon-color3-3" type="text" class="salon-color-field" data-default-color="" name="salon_color3_3" value="<?php echo get_option('salon_color3_3'); ?>" /></td>
				            </tr>
				            <tr valign="center">
				            	<th scope="row"><label for="salon-width-3"><?php _e('salon.de widget 3 width (in px or %)','salon_plugin_widget') ?></label><p>(e.g. 500 / 100%)</p></th>
				            	<td><input id="salon-width-3" name="salon_width_3" type="text" value="<?php echo get_option('salon_width_3'); ?>" /><p></p>
				            </tr>
				            <tr valign="center">
				            	<th scope="row"><label for="salon-height-3"><?php _e('salon.de widget 3 height (in px)','salon_plugin_widget') ?></label><p>(e.g. 700)</p></th>
				            	<td><input id="salon-height-3" name="salon_height_3" type="text" value="<?php echo get_option('salon_height_3'); ?>" /><p></p>
				            </tr>
				        </table>	
					</div>
				</div>
				<div class="salon-settings-sub-section">
					<div class="salon-settings-head">
						<h3><?php _e('salon.de widget 3 review','salon_plugin_widget') ?></h3>
						<p><?php _e('Edit the salon.de widget 3 review width/height properties.','salon_plugin_widget') ?></p>
					</div>
					<div class="salon-settings-content">
						<table class="form-table">  
				            <tr valign="center">
				            	<th scope="row"><label for="salon-review-width-3"><?php _e('salon.de widget 3 Review width (in px or %)','salon_plugin_widget') ?></label><p>(e.g. 500 / 100%)</p></th>
				            	<td><input id="salon-review-width-3" name="salon_review_width_3" type="text" value="<?php echo get_option('salon_review_width_3'); ?>" /><p></p>
				            </tr>
				            <tr valign="center">
				            	<th scope="row"><label for="salon-review-height-3"><?php _e('salon.de widget 3 Review height (in px)','salon_plugin_widget') ?></label><p>(e.g. 700)</p></th>
				            	<td><input id="salon-review-height-3" name="salon_review_height_3" type="text" value="<?php echo get_option('salon_review_height_3'); ?>" /><p></p>
				            </tr>
				        </table>	
					</div>
				</div>
	        	<div class="salon-settings-sub-section">
					<div class="salon-settings-head">
						<h3><?php _e('salon.de widget 4','salon_plugin_widget') ?></h3>
						<p><?php _e('Edit the salon.de widget 4 color and width/height properties.','salon_plugin_widget') ?></p>
					</div>
					<div class="salon-settings-content">
						<table class="form-table">  
				            <tr valign="center">
				            	<th scope="row"><label for="salon-ID-4"><?php _e('salon.de widget 4 ID','salon_plugin_widget') ?></label><p></p></th>
				            	<td><input id="salon-ID-4" name="salon_ID_4" type="text" value="<?php echo get_option('salon_ID_4'); ?>" /><p></p>
				            </tr>
				            <tr valign="center">
				                <th scope="row"><label for="salon-color1-4"><?php _e('salon.de widget 4 appointment dates color picker','salon_plugin_widget') ?></label></th>
				                <td><input id="salon-color1-4" type="text" class="salon-color-field" data-default-color="#C29F64" name="salon_color1_4" value="<?php echo get_option('salon_color1_4'); ?>" /></td>
				            </tr>
							<tr valign="center">
				                <th scope="row"><label for="salon-color2-4"><?php _e('salon.de widget 4 selection fields color picker','salon_plugin_widget') ?></label></th>
				                <td><input id="salon-color2-4" type="text" class="salon-color-field" data-default-color="#E8E8E8" name="salon_color2_4" value="<?php echo get_option('salon_color2_4'); ?>" /></td>
				            </tr>
							<tr valign="center">
				                <th scope="row"><label for="salon-color3-4"><?php _e('salon.de widget 4 background color picker','salon_plugin_widget') ?></label></th>
				                <td><input id="salon-color3-4" type="text" class="salon-color-field" data-default-color="" name="salon_color3_4" value="<?php echo get_option('salon_color3_4'); ?>" /></td>
				            </tr>
				            <tr valign="center">
				            	<th scope="row"><label for="salon-width-4"><?php _e('salon.de widget 4 width (in px or %)','salon_plugin_widget') ?></label><p>(e.g. 500 / 100%)</p></th>
				            	<td><input id="salon-width-4" name="salon_width_4" type="text" value="<?php echo get_option('salon_width_4'); ?>" /><p></p>
				            </tr>
				            <tr valign="center">
				            	<th scope="row"><label for="salon-height-4"><?php _e('salon.de widget 4 height (in px)','salon_plugin_widget') ?></label><p>(e.g. 700)</p></th>
				            	<td><input id="salon-height-4" name="salon_height_4" type="text" value="<?php echo get_option('salon_height_4'); ?>" /><p></p>
				            </tr>
				        </table>	
					</div>
				</div>
				<div class="salon-settings-sub-section">
					<div class="salon-settings-head">
						<h3><?php _e('salon.de widget 4 review','salon_plugin_widget') ?></h3>
						<p><?php _e('Edit the salon.de widget 4 review width/height properties.','salon_plugin_widget') ?></p>
					</div>
					<div class="salon-settings-content">
						<table class="form-table">  
				            <tr valign="center">
				            	<th scope="row"><label for="salon-review-width-4"><?php _e('salon.de widget 4 review width (in px or %)','salon_plugin_widget') ?></label><p>(e.g. 500 / 100%)</p></th>
				            	<td><input id="salon-review-width-4" name="salon_review_width_4" type="text" value="<?php echo get_option('salon_review_width_4'); ?>" /><p></p>
				            </tr>
				            <tr valign="center">
				            	<th scope="row"><label for="salon-review-height-4"><?php _e('salon.de widget 4 review height (in px)','salon_plugin_widget') ?></label><p>(e.g. 700)</p></th>
				            	<td><input id="salon-review-height-4" name="salon_review_height_4" type="text" value="<?php echo get_option('salon_review_height_4'); ?>" /><p></p>
				            </tr>
				        </table>	
					</div>
				</div>
	        	<div class="salon-settings-sub-section">
					<div class="salon-settings-head">
						<h3><?php _e('salon.de widget 5','salon_plugin_widget') ?></h3>
						<p><?php _e('Edit the salon.de widget 5 color and width/height properties.','salon_plugin_widget') ?></p>
					</div>
					<div class="salon-settings-content">
						<table class="form-table">  
				            <tr valign="center">
				            	<th scope="row"><label for="salon-ID-5"><?php _e('salon.de widget 5 ID','salon_plugin_widget') ?></label><p></p></th>
				            	<td><input id="salon-ID-5" name="salon_ID_5" type="text" value="<?php echo get_option('salon_ID_5'); ?>" /><p></p>
				            </tr>
				            <tr valign="center">
				                <th scope="row"><label for="salon-color1-5"><?php _e('salon.de widget 5 appointment dates color picker','salon_plugin_widget') ?></label></th>
				                <td><input id="salon-color1-5" type="text" class="salon-color-field" data-default-color="#C29F64" name="salon_color1_5" value="<?php echo get_option('salon_color1_5'); ?>" /></td>
				            </tr>
							<tr valign="center">
				                <th scope="row"><label for="salon-color2-5"><?php _e('salon.de widget 5 selection fields color picker','salon_plugin_widget') ?></label></th>
				                <td><input id="salon-color2-5" type="text" class="salon-color-field" data-default-color="#E8E8E8" name="salon_color2_5" value="<?php echo get_option('salon_color2_5'); ?>" /></td>
				            </tr>
							<tr valign="center">
				                <th scope="row"><label for="salon-color3-5"><?php _e('salon.de widget 5 background color picker','salon_plugin_widget') ?></label></th>
				                <td><input id="salon-color3-5" type="text" class="salon-color-field" data-default-color="" name="salon_color3_5" value="<?php echo get_option('salon_color3_5'); ?>" /></td>
				            </tr>
				            <tr valign="center">
				            	<th scope="row"><label for="salon-width-5"><?php _e('salon.de widget 5 width (in px or %)','salon_plugin_widget') ?></label><p>(e.g. 500 / 100%)</p></th>
				            	<td><input id="salon-width-5" name="salon_width_5" type="text" value="<?php echo get_option('salon_width_5'); ?>" /><p></p>
				            </tr>
				            <tr valign="center">
				            	<th scope="row"><label for="salon-height-5"><?php _e('salon.de widget 5 height (in px)','salon_plugin_widget') ?></label><p>(e.g. 700)</p></th>
				            	<td><input id="salon-height-5" name="salon_height_5" type="text" value="<?php echo get_option('salon_height_5'); ?>" /><p></p>
				            </tr>
				        </table>	
					</div>
				</div>
				<div class="salon-settings-sub-section">
					<div class="salon-settings-head">
						<h3><?php _e('salon.de widget 5 review','salon_plugin_widget') ?></h3>
						<p><?php _e('Edit the salon.de widget 5 review width/height properties.','salon_plugin_widget') ?></p>
					</div>
					<div class="salon-settings-content">
						<table class="form-table">  
				            <tr valign="center">
				            	<th scope="row"><label for="salon-review-width-5"><?php _e('salon.de widget 5 review width (in px or %)','salon_plugin_widget') ?></label><p>(e.g. 500 / 100%)</p></th>
				            	<td><input id="salon-review-width-5" name="salon_review_width_5" type="text" value="<?php echo get_option('salon_review_width_5'); ?>" /><p></p>
				            </tr>
				            <tr valign="center">
				            	<th scope="row"><label for="salon-review-height-5"><?php _e('salon.de widget 5 review height (in px)','salon_plugin_widget') ?></label><p>(e.g. 700)</p></th>
				            	<td><input id="salon-review-height-5" name="salon_review_height_5" type="text" value="<?php echo get_option('salon_review_height_5'); ?>" /><p></p>
				            </tr>
				        </table>	
					</div>
				</div>
			</div>
			<?php submit_button(); ?>
		</div>
    </form>
</div>
