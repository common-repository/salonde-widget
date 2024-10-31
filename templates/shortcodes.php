<?php
// @settings_fields('salon_widget_plugin_group');
// @do_settings_fields('salon_widget_plugin_group');
# salon plugin variables
$salonID = get_option('salon_ID');
$salonColor1_temp = get_option('salon_color1');
$salonColor1 = ltrim($salonColor1_temp, '#');
$salonColor2_temp = get_option('salon_color2');
$salonColor2 = ltrim($salonColor2_temp, '#');
$salonColor3_temp = get_option('salon_color3');
$salonColor3 = ltrim($salonColor3_temp, '#');
$salonHeight = get_option('salon_height');
$salonWidth = get_option('salon_width');
$salonReviewHeight = get_option('salon_review_height');
$salonReviewWidth = get_option('salon_review_width');
$salonLink = get_option('salon_link');
$salonButtonText = get_option('salon_button_text');
$salonButtonTextColor = get_option('salon_button_text_color');
$salonButtonColor = get_option('salon_button_color');
$salonButtonHeight = get_option('salon_button_height');
$salonButtonWidth = get_option('salon_button_width');
#widget 2
$salonID_2 = get_option('salon_ID_2');
$salonColor1_temp_2 = get_option('salon_color1_2');
$salonColor1_2 = ltrim($salonColor1_temp_2, '#');
$salonColor2_temp_2 = get_option('salon_color2_2');
$salonColor2_2 = ltrim($salonColor2_temp_2, '#');
$salonColor3_temp_2 = get_option('salon_color3_2');
$salonColor3_2 = ltrim($salonColor3_temp_2, '#');
$salonHeight_2 = get_option('salon_height_2');
$salonWidth_2 = get_option('salon_width_2');
$salonReviewHeight_2 = get_option('salon_review_height_2');
$salonReviewWidth_2 = get_option('salon_review_width_2');
#widget 3
$salonID_3 = get_option('salon_ID_3');
$salonColor1_temp_3 = get_option('salon_color1_3');
$salonColor1_3 = ltrim($salonColor1_temp_3, '#');
$salonColor2_temp_3 = get_option('salon_color2_3');
$salonColor2_3 = ltrim($salonColor2_temp_3, '#');
$salonColor3_temp_3 = get_option('salon_color3_3');
$salonColor3_3 = ltrim($salonColor3_temp_3, '#');
$salonHeight_3 = get_option('salon_height_3');
$salonWidth_3 = get_option('salon_width_3');
$salonReviewHeight_3 = get_option('salon_review_height_3');
$salonReviewWidth_3 = get_option('salon_review_width_3');
#widget 4
$salonID_4 = get_option('salon_ID_4');
$salonColor1_temp_4 = get_option('salon_color1_4');
$salonColor1_4 = ltrim($salonColor1_temp_4, '#');
$salonColor2_temp_4 = get_option('salon_color2_4');
$salonColor2_4 = ltrim($salonColor2_temp_4, '#');
$salonColor3_temp_4 = get_option('salon_color3_4');
$salonColor3_4 = ltrim($salonColor3_temp_4, '#');
$salonHeight_4 = get_option('salon_height_4');
$salonWidth_4 = get_option('salon_width_4');
$salonReviewHeight_4 = get_option('salon_review_height_4');
$salonReviewWidth_4 = get_option('salon_review_width_4');
#widget 5
$salonID_5 = get_option('salon_ID_5');
$salonColor1_temp_5 = get_option('salon_color1_5');
$salonColor1_5 = ltrim($salonColor1_temp_5, '#');
$salonColor2_temp_5 = get_option('salon_color2_5');
$salonColor2_5 = ltrim($salonColor2_temp_5, '#');
$salonColor3_temp_5 = get_option('salon_color3_5');
$salonColor3_5 = ltrim($salonColor3_temp_5, '#');
$salonHeight_5 = get_option('salon_height_5');
$salonWidth_5 = get_option('salon_width_5');
$salonReviewHeight_5 = get_option('salon_review_height_5');
$salonReviewWidth_5 = get_option('salon_review_width_5');
# end salon plugin variables

$shortcode = "";
	switch( $tag ) {
	    case "salon.de-widget":
	    	if ($salonID == '') {
				$shortcode = __('[No salon.de widget ID saved! Please go to the plugin settings page and enter a valid salon.de ID to display the widget.]','salon_plugin_widget');
			}
			else {
		    	if (($salonHeight == '') || ($salonWidth == '') || ($salonColor1 == '') || ($salonColor2 == '')) {
		    		if ($salonColor1 == '') { $salonColor1 = '0081B9'; }
		    		if ($salonColor2 == '') { $salonColor2 = 'E8E8E8'; }
					if ($salonHeight == '') { $salonHeight = '700'; }
					if ($salonWidth == '') { $salonWidth = '100%'; }
				}
		    	$shortcode = '
	    			<iframe src="https://salon.de/embed/'.$salonID.'?color1='.$salonColor1.'&amp;color2='.$salonColor2.'&amp;color3='.$salonColor3.'" allowtransparency="true" scrolling="auto" title="Wählen Sie hier Ihren Wunschtermin" frameborder="no" height="'.$salonHeight.'" width="'.$salonWidth.'"></iframe>
	    		';
	    	}
	    	break;
	    case "salon.de-review":
	    	if ($salonID == '') {
				$shortcode = __('[No salon.de widget ID saved! Please go to the plugin settings page and enter a valid salon.de ID to display the review.]','salon_plugin_widget');
			}
			else {
		    	if (($salonReviewHeight == '') || ($salonReviewWidth == '')) {
					if ($salonReviewHeight == '') { $salonReviewHeight = '700'; }
					if ($salonReviewWidth == '') { $salonReviewWidth = '100%'; }
				}
	    		$shortcode = '
	    			<iframe src="https://salon.de/embed/'.$salonID.'?r=1" allowtransparency="true" scrolling="auto" title="Wählen Sie hier Ihren Wunschtermin" frameborder="no" height="'.$salonReviewHeight.'" width="'.$salonReviewWidth.'"></iframe>
	    		';
	    	}
	    	break;
	    case "salon.de-button":
	    	if (($salonButtonColor == '') || ($salonButtonTextColor == '') || ($salonButtonHeight == '') || ($salonButtonWidth == '') || ($salonButtonText == '')) {
    			if ($salonButtonColor == '') { $salonButtonColor = '#0081B9'; }
    			if ($salonButtonTextColor == '') { $salonButtonTextColor = '#FFFFFF'; }
				if ($salonButtonText == '') { $salonButtonText = 'Online-Termin buchen'; }
				if ($salonButtonWidth == '') { $salonButtonWidth = '180'; }
				if ($salonButtonHeight == '') { $salonButtonHeight = '26'; }
			}
	    	$shortcode = '
	    		<a style="-webkit-box-shadow: rgba(0, 0, 0, 0.496094) 0px 1px 2px 0px; -webkit-transition-delay: 0s; -webkit-transition-duration: 0.10000000149011612s; -webkit-transition-property: all; -webkit-transition-timing-function: cubic-bezier(0.42, 0, 0.58, 1); background-attachment: scroll; background-clip: border-box; background-color: '.$salonButtonColor.'; background-image: none; background-origin: padding-box; border-bottom-color: rgba(0, 0, 0, 0.246094); border-bottom-left-radius: 3px; border-bottom-right-radius: 3px; border-bottom-style: solid; border-bottom-width: 1px; border-left-width: 0px; border-right-width: 0px; border-top-left-radius: 3px; border-top-right-radius: 3px; border-top-width: 0px; color: '.$salonButtonTextColor.'; cursor: pointer; display: block; font-family: Arial, Helvetica, sans-serif; font-size: 15px; font-style: normal; font-weight: bold; height: '.$salonButtonHeight.'px; line-height: 18px; margin-bottom: 4px; margin-left: auto; margin-right: auto; margin-top: 4px; outline-color: black; outline-style: none; outline-width: 0px; padding-bottom: 6px; padding-left: 9px; padding-right: 9px; padding-top: 4px; position: relative; text-align: center; text-decoration: none; text-shadow: rgba(0, 0, 0, 0.246094) 0px 0px 1px; vertical-align: baseline; width: '.$salonButtonWidth.'px;" href="'.$salonLink.'">'.$salonButtonText.'</a>
	    	';
	    	break;
	    case "salon.de-widget-2":
	    	if ($salonID_2 == '') {
				$shortcode = __('[No salon.de widget 2 ID saved! Please go to the plugin settings page and enter a valid salon.de ID to display the widget.]','salon_plugin_widget');
			}
			else {
		    	if (($salonHeight_2 == '') || ($salonWidth_2 == '') || ($salonColor1_2 == '') || ($salonColor2_2 == '')) {
		    		if ($salonColor1_2 == '') { $salonColor1_2 = '0081B9'; }
		    		if ($salonColor2_2 == '') { $salonColor2_2 = 'E8E8E8'; }
					if ($salonHeight_2 == '') { $salonHeight_2 = '700'; }
					if ($salonWidth_2 == '') { $salonWidth_2 = '100%'; }
				}
	    		$shortcode = '
	    			<iframe src="https://salon.de/embed/'.$salonID_2.'?color1='.$salonColor1_2.'&amp;color2='.$salonColor2_2.'&amp;color3='.$salonColor3_2.'" allowtransparency="true" scrolling="auto" title="Wählen Sie hier Ihren Wunschtermin" frameborder="no" height="'.$salonHeight_2.'" width="'.$salonWidth_2.'"></iframe>
	    		';
	    	}
	    	break;
	    case "salon.de-review-2":
	    	if ($salonID_2 == '') {
				$shortcode = __('[No salon.de widget 2 ID saved! Please go to the plugin settings page and enter a valid salon.de ID to display the review.]','salon_plugin_widget');
			}
			else {
		    	if (($salonReviewHeight_2 == '') || ($salonReviewWidth_2 == '')) {
					if ($salonReviewHeight_2 == '') { $salonReviewHeight_2 = '700'; }
					if ($salonReviewWidth_2 == '') { $salonReviewWidth_2 = '100%'; }
				}
	    		$shortcode = '
	    			<iframe src="https://salon.de/embed/'.$salonID_2.'?r=1" allowtransparency="true" scrolling="auto" title="Wählen Sie hier Ihren Wunschtermin" frameborder="no" height="'.$salonReviewHeight_2.'" width="'.$salonReviewWidth_2.'"></iframe>
	    		';
	    	}
	    	break;
	    case "salon.de-widget-3":
	    	if ($salonID_3 == '') {
				$shortcode = __('[No salon.de widget 3 ID saved! Please go to the plugin settings page and enter a valid salon.de ID to display the widget.]','salon_plugin_widget');
			}
			else {
		    	if (($salonHeight_3 == '') || ($salonWidth_3 == '') || ($salonColor1_3 == '') || ($salonColor2_3 == '')) {
		    		if ($salonColor1_3 == '') { $salonColor1_3 = '0081B9'; }
		    		if ($salonColor2_3 == '') { $salonColor2_3 = 'E8E8E8'; }
					if ($salonHeight_3 == '') { $salonHeight_3 = '700'; }
					if ($salonWidth_3 == '') { $salonWidth_3 = '100%'; }
				}
	    		$shortcode = '
	    			<iframe src="https://salon.de/embed/'.$salonID_3.'?color1='.$salonColor1_3.'&amp;color2='.$salonColor2_3.'&amp;color3='.$salonColor3_3.'" allowtransparency="true" scrolling="auto" title="Wählen Sie hier Ihren Wunschtermin" frameborder="no" height="'.$salonHeight_3.'" width="'.$salonWidth_3.'"></iframe>
	    		';
	    	}
	    	break;
	    case "salon.de-review-3":
	    	if ($salonID_3 == '') {
				$shortcode = __('[No salon.de widget 3 ID saved! Please go to the plugin settings page and enter a valid salon.de ID to display the review.]','salon_plugin_widget');
			}
			else {
		    	if (($salonReviewHeight_3 == '') || ($salonReviewWidth_3 == '')) {
					if ($salonReviewHeight_3 == '') { $salonReviewHeight_3 = '700'; }
					if ($salonReviewWidth_3 == '') { $salonReviewWidth_3 = '100%'; }
				}
		    	$shortcode = '
		    		<iframe src="https://salon.de/embed/'.$salonID_3.'?r=1" allowtransparency="true" scrolling="auto" title="Wählen Sie hier Ihren Wunschtermin" frameborder="no" height="'.$salonReviewHeight_3.'" width="'.$salonReviewWidth_3.'"></iframe>
		    	';
		    }
	    	break;
	    case "salon.de-widget-4":
	    	if ($salonID_4 == '') {
				$shortcode = __('[No salon.de widget 4 ID saved! Please go to the plugin settings page and enter a valid salon.de ID to display the widget.]','salon_plugin_widget');
			}
			else {
		    	if (($salonHeight_4 == '') || ($salonWidth_4 == '') || ($salonColor1_4 == '') || ($salonColor2_4 == '')) {
		    		if ($salonColor1_4 == '') { $salonColor1_4 = '0081B9'; }
		    		if ($salonColor2_4 == '') { $salonColor2_4 = 'E8E8E8'; }
					if ($salonHeight_4 == '') { $salonHeight_4 = '700'; }
					if ($salonWidth_4 == '') { $salonWidth_4 = '100%'; }
				}
		    	$shortcode = '
		    		<iframe src="https://salon.de/embed/'.$salonID_4.'?color1='.$salonColor1_4.'&amp;color2='.$salonColor2_4.'&amp;color3='.$salonColor3_4.'" allowtransparency="true" scrolling="auto" title="Wählen Sie hier Ihren Wunschtermin" frameborder="no" height="'.$salonHeight_4.'" width="'.$salonWidth_4.'"></iframe>
		    	';
		    }
	    	break;
	    case "salon.de-review-4":
	    	if ($salonID_4 == '') {
				$shortcode = __('[No salon.de widget 4 ID saved! Please go to the plugin settings page and enter a valid salon.de ID to display the review.]','salon_plugin_widget');
			}
			else {
		    	if (($salonReviewHeight_4 == '') || ($salonReviewWidth_4 == '')) {
					if ($salonReviewHeight_4 == '') { $salonReviewHeight_4 = '700'; }
					if ($salonReviewWidth_4 == '') { $salonReviewWidth_4 = '100%'; }
				}
		    	$shortcode = '
			    	<iframe src="https://salon.de/embed/'.$salonID_4.'?r=1" allowtransparency="true" scrolling="auto" title="Wählen Sie hier Ihren Wunschtermin" frameborder="no" height="'.$salonReviewHeight_4.'" width="'.$salonReviewWidth_4.'"></iframe>
	    		';
	    	}
	    	break;
	    case "salon.de-widget-5":
	    	if ($salonID_5 == '') {
				$shortcode = __('[No salon.de widget 5 ID saved! Please go to the plugin settings page and enter a valid salon.de ID to display the widget.]','salon_plugin_widget');
			}
			else {
		    	if (($salonHeight_5 == '') || ($salonWidth_5 == '') || ($salonColor1_5 == '') || ($salonColor2_5 == '')) {
		    		if ($salonColor1_5 == '') { $salonColor1_5 = '0081B9'; }
		    		if ($salonColor2_5 == '') { $salonColor2_5 = 'E8E8E8'; }
					if ($salonHeight_5 == '') { $salonHeight_5 = '700'; }
					if ($salonWidth_5 == '') { $salonWidth_5 = '100%'; }
				}
		    	$shortcode = '
			    	<iframe src="https://salon.de/embed/'.$salonID_5.'?color1='.$salonColor1_5.'&amp;color2='.$salonColor2_5.'&amp;color3='.$salonColor3_5.'" allowtransparency="true" scrolling="auto" title="Wählen Sie hier Ihren Wunschtermin" frameborder="no" height="'.$salonHeight_5.'" width="'.$salonWidth_5.'"></iframe>
	    		';
	    	}
	    	break;
	    case "salon.de-review-5":
	    	if ($salonID_5 == '') {
				$shortcode = __('[No salon.de widget 5 ID saved! Please go to the plugin settings page and enter a valid salon.de ID to display the review.]','salon_plugin_widget');
			}
			else {
		    	if (($salonReviewHeight_5 == '') || ($salonReviewWidth_5 == '')) {
					if ($salonReviewHeight_5 == '') { $salonReviewHeight_5 = '700'; }
					if ($salonReviewWidth_5 == '') { $salonReviewWidth_5 = '100%'; }
				}
		    	$shortcode = '
			    	<iframe src="https://salon.de/embed/'.$salonID_5.'?r=1" allowtransparency="true" scrolling="auto" title="Wählen Sie hier Ihren Wunschtermin" frameborder="no" height="'.$salonReviewHeight_5.'" width="'.$salonReviewWidth_5.'"></iframe>
	    		';
	    	}
	    	break;
	    default:
			$shortcode = __('Shortcode not supported!','salon_plugin_widget');
	        break;
	}

?>
