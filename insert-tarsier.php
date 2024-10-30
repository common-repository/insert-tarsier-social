<?php

/*
Plugin Name: Insert Tarsier Social
Version: 2.0
Plugin URI: http://www.tarsiersocial.com
Author: michael cole
Author URI: http://www.lemonskydesign.com
Plugin Description: Insert Tarsier Social where you want.
*/

/*	Copyright 2011  Lemonskydesign Inc  (email : wordpress@lemonskydesign.com)

    This program is free software; you can redistribute it
    under the terms of the GNU General Public License version 2,
    as published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
*/

$insert_tarsier = "2.0";

function LSD_tarsier_isMobile() {
	return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

function LSD_showtarsier($num){
	if(LSD_tarsier_isMobile()){
		$LSD_MOBILE='true';
	}else{
		$LSD_MOBILE='false';
	}
	$tarsier_enc_value = get_option('tarsiercode'.$num);
	$tarsier_colour_value = get_option('tarsiercolour'.$num);
	$tarsier_count_value = get_option('tarsiercount'.$num);
	$tarsier_sort_value = get_option('tarsiersort'.$num);
	$tarsier_tag_value = get_option('tarsiertag'.$num);
	$tarsier_nottag_value = get_option('tarsiernottag'.$num);
	$tarsier_forcetag_value = get_option('tarsierforcetag'.$num);
	$tarsier_cleanlen_value = get_option('tarsiercleanlen'.$num);
	$tarsier_shownum_value = get_option('tarsiershownum'.$num);
	$tarsier_width_value = get_option('tarsierwidth'.$num);
	
	$tarsier_dec_value = html_entity_decode($tarsier_enc_value, ENT_COMPAT);
	$LSD_TSURL=$tarsier_dec_value;
	if(strpos($LSD_TSURL, '?')<10){
		$LSD_TSURL .= '?';
	}
	$LSD_TSURL .= '&mobile='.$LSD_MOBILE;
	if(strlen($tarsier_colour_value)>1){
		$Tcolour =  plugin_dir_path( __FILE__ ."tarsier-".$tarsier_colour_value.".style");
		$Tcolour = $Tcolour."tarsier-".$tarsier_colour_value.".style"; 
		if($tarsier_width_value<200){
			$tarsier_width_value=278;
		}
	$output .= '<style type="text/css">';
	$output .= '.fullsize {';
	$output .= 'width: '.$tarsier_width_value.'px;';
	$output .= 'text-align: left;';
	$output .= 'padding: 5px 10px;';
	$output .= 'margin: 0 auto;';
	$output .= '}';
		$output .= file_get_contents($Tcolour);
	}
	if(strlen($tarsier_count_value)>1){
		$LSD_TSURL .='&count='.$tarsier_count_value;
	}
	if(strlen($tarsier_sort_value)>1){
		$LSD_TSURL .='&sort='.$tarsier_sort_value;
	}
	if(strlen($tarsier_tag_value)>1){
		$LSD_TSURL .='&tag='.$tarsier_tag_value;
	}
	if(strlen($tarsier_nottag_value)>1){
		$LSD_TSURL .='&nottag='.$tarsier_nottag_value;
	}
	if(strlen($tarsier_forcetag_value)>1){
		$LSD_TSURL .='&forcetag='.$tarsier_forcetag_value;
	}
	if(strlen($tarsier_cleanlen_value)>1){
		$LSD_TSURL .='&cleanlen='.$tarsier_cleanlen_value;
	}
	if(strlen($tarsier_shownum_value)>1){
		$LSD_TSURL .='&shownum='.$tarsier_shownum_value;
	}
	
	if(!empty($tarsier_dec_value))
	{
		$output .= LSD_tarsier_fasterget($LSD_TSURL);
		if($LSD_MOBILE=='true'){
			wp_enqueue_style( 'jquery-ui', plugins_url('/css/jquery-ui.css' , __FILE__ ) );
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script('jquery-ui-dialog');
			wp_enqueue_script( 'masonry', plugins_url('/js/masonry.pkgd.min.js' , __FILE__ ), array('jquery'), '3.1.2', true );
			wp_enqueue_script( 'run-scripts', plugins_url( '/js/mobile.min.js' , __FILE__ ), array('jquery'), '1.0.1', true );
		}else{
			wp_enqueue_style( 'jquery-ui', plugins_url('/css/jquery-ui.css' , __FILE__ ) );
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script('jquery-ui-dialog');
			wp_enqueue_script( 'masonry', plugins_url('/js/masonry.pkgd.min.js' , __FILE__ ), array('jquery'), '3.1.2', true );
			wp_enqueue_script( 'youtubepopup', plugins_url( '/js/jquery.youtubepopup.min.js' , __FILE__ ), array('jquery'), '1.0.1', true );
			wp_enqueue_script( 'vimeopopup', plugins_url( '/js/jquery.vimeopopup.min.js' , __FILE__ ), array('jquery'), '1.0.1', true );
			wp_enqueue_script( 'fbpopup', plugins_url( '/js/jquery.fbvideopopup.min.js' , __FILE__ ), array('jquery'), '1.0.1', true );
			wp_enqueue_script( 'imagepopup', plugins_url( '/js/jquery.imagepopup.min.js' , __FILE__ ), array('jquery'), '1.0.1', true );
			wp_enqueue_script( 'run-scripts', plugins_url( '/js/tarsier-non-mobile.min.js' , __FILE__ ), array('jquery'), '1.0.1', true );
		}
	
	}
	return 		$output;
}
function LSD_showtarsier1()
{
	$output=LSD_showtarsier(1);
    return $output;
}
add_shortcode('tarsierTS1', 'LSD_showtarsier1');

function LSD_showtarsier2()
{
   $output=LSD_showtarsier(2);
    return $output;
}
add_shortcode('tarsierTS2', 'LSD_showtarsier2');

function LSD_showtarsier3()
{
    $output=LSD_showtarsier(3);
    return $output ;
}
add_shortcode('tarsierTS3', 'LSD_showtarsier3');

function LSD_showtarsier4()
{
    $output=LSD_showtarsier(4);
    return $output;
}
add_shortcode('tarsierTS4', 'LSD_showtarsier4');

function LSD_showtarsier5()
{
    $output=LSD_showtarsier(5);
    return $output;
}
add_shortcode('tarsierTS5', 'LSD_showtarsier5');

function LSD_showtarsier6()
{
	$output=LSD_showtarsier(6);
    return $output;
}
add_shortcode('tarsierTS6', 'LSD_showtarsier6');

function LSD_showtarsier7()
{
	$output=LSD_showtarsier(7);
    return $output;
}
add_shortcode('tarsierTS7', 'LSD_showtarsier7');

// Displays Simple Ad tarsier Options menu
function LSD_tarsier_add_option_page() {
    if (function_exists('add_options_page')) {
        add_options_page('Tarsier Social Settings', 'Tarsier Social Settings', 8, __FILE__, 'LSD_admin_page');
    }
}

function LSD_admin_page() {

    global $var_insert_tarsier;

    if (isset($_POST['LSD_tarsier_update']))
    {
        echo '<div id="message" class="updated fade"><p><strong>';
		
		$tmpCode1 = htmlentities(stripslashes($_POST['tarsiercode1']), ENT_COMPAT);
        update_option('tarsiercode1', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiercolour1']), ENT_COMPAT);
        update_option('tarsiercolour1', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiercount1']), ENT_COMPAT);
        update_option('tarsiercount1', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiersort1']), ENT_COMPAT);
        update_option('tarsiersort1', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiertag1']), ENT_COMPAT);
        update_option('tarsiertag1', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiernottag1']), ENT_COMPAT);
        update_option('tarsiernottag1', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsierforcetag1']), ENT_COMPAT);
        update_option('tarsierforcetag1', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiercleanlen1']), ENT_COMPAT);
        update_option('tarsiercleanlen1', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiershownum1']), ENT_COMPAT);
        update_option('tarsiershownum1', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsierwidth1']), ENT_COMPAT);
        update_option('tarsierwidth1', $tmpCode1);
        
		$tmpCode2 = htmlentities(stripslashes($_POST['tarsiercode2']) , ENT_COMPAT);
        update_option('tarsiercode2', $tmpCode2);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiercolour2']), ENT_COMPAT);
        update_option('tarsiercolour2', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiercount2']), ENT_COMPAT);
        update_option('tarsiercount2', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiersort2']), ENT_COMPAT);
        update_option('tarsiersort2', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiertag2']), ENT_COMPAT);
        update_option('tarsiertag2', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiernottag2']), ENT_COMPAT);
        update_option('tarsiernottag2', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsierforcetag2']), ENT_COMPAT);
        update_option('tarsierforcetag2', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiercleanlen2']), ENT_COMPAT);
        update_option('tarsiercleanlen2', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiershownum2']), ENT_COMPAT);
        update_option('tarsiershownum2', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsierwidth2']), ENT_COMPAT);
        update_option('tarsierwidth2', $tmpCode1);
		
		$tmpCode3 = htmlentities(stripslashes($_POST['tarsiercode3']) , ENT_COMPAT);
        update_option('tarsiercode3', $tmpCode3);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiercolour3']), ENT_COMPAT);
        update_option('tarsiercolour3', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiercount3']), ENT_COMPAT);
        update_option('tarsiercount3', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiersort3']), ENT_COMPAT);
        update_option('tarsiersort3', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiertag3']), ENT_COMPAT);
        update_option('tarsiertag3', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiernottag3']), ENT_COMPAT);
        update_option('tarsiernottag3', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsierforcetag3']), ENT_COMPAT);
        update_option('tarsierforcetag3', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiercleanlen3']), ENT_COMPAT);
        update_option('tarsiercleanlen3', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiershownum3']), ENT_COMPAT);
        update_option('tarsiershownum3', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsierwidth3']), ENT_COMPAT);
        update_option('tarsierwidth3', $tmpCode1);
		
		$tmpCode4 = htmlentities(stripslashes($_POST['tarsiercode4']) , ENT_COMPAT);
        update_option('tarsiercode4', $tmpCode4);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiercolour4']), ENT_COMPAT);
        update_option('tarsiercolour4', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiercount4']), ENT_COMPAT);
        update_option('tarsiercount4', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiersort4']), ENT_COMPAT);
        update_option('tarsiersort4', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiertag4']), ENT_COMPAT);
        update_option('tarsiertag4', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiernottag4']), ENT_COMPAT);
        update_option('tarsiernottag4', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsierforcetag4']), ENT_COMPAT);
        update_option('tarsierforcetag4', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiercleanlen4']), ENT_COMPAT);
        update_option('tarsiercleanlen4', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiershownum4']), ENT_COMPAT);
        update_option('tarsiershownum4', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsierwidth4']), ENT_COMPAT);
        update_option('tarsierwidth4', $tmpCode1);
		
		$tmpCode5 = htmlentities(stripslashes($_POST['tarsiercode5']) , ENT_COMPAT);
        update_option('tarsiercode5', $tmpCode5);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiercolour5']), ENT_COMPAT);
        update_option('tarsiercolour5', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiercount5']), ENT_COMPAT);
        update_option('tarsiercount5', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiersort5']), ENT_COMPAT);
        update_option('tarsiersort5', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiertag5']), ENT_COMPAT);
        update_option('tarsiertag5', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiernottag5']), ENT_COMPAT);
        update_option('tarsiernottag5', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsierforcetag5']), ENT_COMPAT);
        update_option('tarsierforcetag5', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiercleanlen5']), ENT_COMPAT);
        update_option('tarsiercleanlen5', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiershownum5']), ENT_COMPAT);
        update_option('tarsiershownum5', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsierwidth5']), ENT_COMPAT);
        update_option('tarsierwidth5', $tmpCode1);

		$tmpCode6 = htmlentities(stripslashes($_POST['tarsiercode6']) , ENT_COMPAT);
        update_option('tarsiercode6', $tmpCode6);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiercolour6']), ENT_COMPAT);
        update_option('tarsiercolour6', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiercount6']), ENT_COMPAT);
        update_option('tarsiercount6', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiersort6']), ENT_COMPAT);
        update_option('tarsiersort6', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiertag6']), ENT_COMPAT);
        update_option('tarsiertag6', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiernottag6']), ENT_COMPAT);
        update_option('tarsiernottag6', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsierforcetag6']), ENT_COMPAT);
        update_option('tarsierforcetag6', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiercleanlen6']), ENT_COMPAT);
        update_option('tarsiercleanlen6', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiershownum6']), ENT_COMPAT);
        update_option('tarsiershownum6', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsierwidth6']), ENT_COMPAT);
        update_option('tarsierwidth6', $tmpCode1);
        
		$tmpCode7 = htmlentities(stripslashes($_POST['tarsiercode7']) , ENT_COMPAT);
        update_option('tarsiercode7', $tmpCode7);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiercolour7']), ENT_COMPAT);
        update_option('tarsiercolour7', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiercount7']), ENT_COMPAT);
        update_option('tarsiercount7', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiersort7']), ENT_COMPAT);
        update_option('tarsiersort7', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiertag7']), ENT_COMPAT);
        update_option('tarsiertag7', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiernottag7']), ENT_COMPAT);
        update_option('tarsiernottag7', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsierforcetag7']), ENT_COMPAT);
        update_option('tarsierforcetag7', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiercleanlen7']), ENT_COMPAT);
        update_option('tarsiercleanlen7', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsiershownum7']), ENT_COMPAT);
        update_option('tarsiershownum7', $tmpCode1);
        $tmpCode1 = htmlentities(stripslashes($_POST['tarsierwidth7']), ENT_COMPAT);
        update_option('tarsierwidth7', $tmpCode1);
        
        echo 'Tarsier Codes Updated!';
        echo '</strong></p></div>';
    }

    ?>

    <div class=wrap>
    <h1>Tarsier Social Settings </h1>
    <p>You can paste your Tarsier codes, On clicking that button a short code will be added at the place of your cursor in the post.<br/> Adding an Tarsier Feed at right place in post can do miracles resulting in much more clicks.</p>
    
    <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
    <input type="hidden" name="LSD_tarsier_update" id="LSD_tarsier_update" value="true" />

    <fieldset class="options">
    <legend><strong>Paste your Tarsier Social codes below</strong></legend>
	<br/>
    <table width="100%" border="0" cellspacing="0" cellpadding="6">

    <tr valign="top"><td width="35%" align="left">
    <strong>Tarsier Code 1:</strong><br/>
    Tool Bar Button to add this code in post - <br/><br/>
    <center><img src="<?php echo get_bloginfo('wpurl').'/wp-content/plugins/insert-tarsier/tarsier-wpicon.png'?>" width="30" height="30" /></center>
    </td>
    <td colspan="2" align="left">
      <textarea name="tarsiercode1" rows="1" cols="70"><?php echo get_option('tarsiercode1'); ?></textarea>
      <table>
      <tr><td>Width of Tarsier</td><td><input name="tarsierwidth1" type="text" value="<?php echo get_option('tarsierwidth1'); ?>"/></td></tr>
      <tr><td>Theme Colour</td><td><select name="tarsiercolour1">
  									<option value="white" <?php if(get_option('tarsiercolour1')=="white"){echo 'selected';}; ?>>white</option>
  									<option value="black"<?php if(get_option('tarsiercolour1')=="black"){echo 'selected';}; ?>>black</option>
  									<option value="sky" <?php if(get_option('tarsiercolour1')=="sky"){echo 'selected';}; ?>>sky</option>
  									<option value="" <?php if(get_option('tarsiercolour1')==""){echo 'selected';}; ?>>none</option>
									</select></td></tr>
      <tr><td>Number to display</td><td><input name="tarsiercount1" type="text" value="<?php echo get_option('tarsiercount1'); ?>"/></td></tr>
      <tr><td>Sort</td><td><select name="tarsiersort1">
  									<option value="True" <?php if(get_option('tarsiersort1')=="True"){echo 'selected';}; ?>>Yes</option>
  									<option value="False" <?php if(get_option('tarsiersort1')=="False"){echo 'selected';}; ?>>No</option>
									</select></td></tr>
      <tr><td>Items only with this word</td><td><input name="tarsiertag1" type="text" value="<?php echo get_option('tarsiertag1'); ?>" /></td></tr>
      <tr><td>Remove Items with this word</td><td><input name="tarsiernottag1" type="text" value="<?php echo get_option('tarsiernottag1'); ?>" /></td></tr>
      <tr><td>Force Word to be tagged items</td><td><select name="tarsierforcetag1">
  									<option value="True" <?php if(get_option('tarsierforcetag1')=="True"){echo 'selected';}; ?>>Yes</option>
  									<option value="False" <?php if(get_option('tarsierforcetag1')=="False"){echo 'selected';}; ?>>No</option>
									</select></td></tr>
      <tr><td>no duplicates over this many characters</td><td><input name="tarsiercleanlen1" type="text" value="<?php echo get_option('tarsiercleanlen1'); ?>" /></td></tr>
      <tr><td>Show number of likes if available</td><td><select name="tarsiershownum1">
  									<option value="True" <?php if(get_option('tarsiershownum1')=="True"){echo 'selected';}; ?>>Yes</option>
  									<option value="False" <?php if(get_option('tarsiershownum1')=="False"){echo 'selected';}; ?>>No</option>
									</select></td></tr>
      </table>
    </td>
    </tr>
  	<tr valign="top"><td>
    <strong>Tarsier Code 2:</strong><br/>
    Tool Bar Button to add this code in post - <br/><br/>
    <center><img src="<?php echo get_bloginfo('wpurl').'/wp-content/plugins/insert-tarsier/tarsier-wpicon.png'?>" width="30" height="30" /></center>
    </td>
    <td colspan="2" align="left">
      <textarea name="tarsiercode2" rows="1" cols="70"><?php echo get_option('tarsiercode2'); ?></textarea>
            <table>
      <tr><td>Width of Tarsier</td><td><input name="tarsierwidth2" type="text" value="<?php echo get_option('tarsierwidth2'); ?>"/></td></tr>
      <tr><td>Theme Colour</td><td><select name="tarsiercolour2">
  									<option value="white" <?php if(get_option('tarsiercolour2')=="white"){echo 'selected';}; ?>>white</option>
  									<option value="black"<?php if(get_option('tarsiercolour2')=="black"){echo 'selected';}; ?>>black</option>
  									<option value="sky" <?php if(get_option('tarsiercolour2')=="sky"){echo 'selected';}; ?>>sky</option>
  									<option value="" <?php if(get_option('tarsiercolour2')==""){echo 'selected';}; ?>>none</option>
									</select></td></tr>
      <tr><td>Number to display</td><td><input name="tarsiercount2" type="text" value="<?php echo get_option('tarsiercount2'); ?>"/></td></tr>
      <tr><td>Sort</td><td><select name="tarsiersort2">
  									<option value="True" <?php if(get_option('tarsiersort2')=="True"){echo 'selected';}; ?>>Yes</option>
  									<option value="False" <?php if(get_option('tarsiersort2')=="False"){echo 'selected';}; ?>>No</option>
									</select></td></tr>
      <tr><td>Items only with this word</td><td><input name="tarsiertag2" type="text" value="<?php echo get_option('tarsiertag2'); ?>" /></td></tr>
      <tr><td>Remove Items with this word</td><td><input name="tarsiernottag2" type="text" value="<?php echo get_option('tarsiernottag2'); ?>" /></td></tr>
      <tr><td>Force Word to be tagged items</td><td><select name="tarsierforcetag2">
  									<option value="True" <?php if(get_option('tarsierforcetag2')=="True"){echo 'selected';}; ?>>Yes</option>
  									<option value="False" <?php if(get_option('tarsierforcetag2')=="False"){echo 'selected';}; ?>>No</option>
									</select></td></tr>
      <tr><td>no duplicates over this many characters</td><td><input name="tarsiercleanlen2" type="text" value="<?php echo get_option('tarsiercleanlen2'); ?>" /></td></tr>
      <tr><td>Show number of likes if available</td><td><select name="tarsiershownum2">
  									<option value="True" <?php if(get_option('tarsiershownum2')=="True"){echo 'selected';}; ?>>Yes</option>
  									<option value="False" <?php if(get_option('tarsiershownum2')=="False"){echo 'selected';}; ?>>No</option>
									</select></td></tr>
      </table>
    </td></tr>

    <tr valign="top"><td>
    <strong>Tarsier Code 3:</strong><br/>
    Tool Bar Button to add this code in post - <br/><br/>
    <center><img src="<?php echo get_bloginfo('wpurl').'/wp-content/plugins/insert-tarsier/tarsier-wpicon.png'?>" width="30" height="30" /></center>
    </td>
    <td colspan="2" align="left">
      <textarea name="tarsiercode3" rows="1" cols="70"><?php echo get_option('tarsiercode3'); ?></textarea>
            <table>
      <tr><td>Width of Tarsier</td><td><input name="tarsierwidth3" type="text" value="<?php echo get_option('tarsierwidth3'); ?>"/></td></tr>
      <tr><td>Theme Colour</td><td><select name="tarsiercolour3">
  									<option value="white" <?php if(get_option('tarsiercolour3')=="white"){echo 'selected';}; ?>>white</option>
  									<option value="black"<?php if(get_option('tarsiercolour3')=="black"){echo 'selected';}; ?>>black</option>
  									<option value="sky" <?php if(get_option('tarsiercolour3')=="sky"){echo 'selected';}; ?>>sky</option>
  									<option value="" <?php if(get_option('tarsiercolour3')==""){echo 'selected';}; ?>>none</option>
									</select></td></tr>
      <tr><td>Number to display</td><td><input name="tarsiercount3" type="text" value="<?php echo get_option('tarsiercount3'); ?>"/></td></tr>
      <tr><td>Sort</td><td><select name="tarsiersort3">
  									<option value="True" <?php if(get_option('tarsiersort3')=="True"){echo 'selected';}; ?>>Yes</option>
  									<option value="False" <?php if(get_option('tarsiersort3')=="False"){echo 'selected';}; ?>>No</option>
									</select></td></tr>
      <tr><td>Items only with this word</td><td><input name="tarsiertag3" type="text" value="<?php echo get_option('tarsiertag3'); ?>" /></td></tr>
      <tr><td>Remove Items with this word</td><td><input name="tarsiernottag3" type="text" value="<?php echo get_option('tarsiernottag3'); ?>" /></td></tr>
      <tr><td>Force Word to be tagged items</td><td><select name="tarsierforcetag3">
  									<option value="True" <?php if(get_option('tarsierforcetag3')=="True"){echo 'selected';}; ?>>Yes</option>
  									<option value="False" <?php if(get_option('tarsierforcetag3')=="False"){echo 'selected';}; ?>>No</option>
									</select></td></tr>
      <tr><td>no duplicates over this many characters</td><td><input name="tarsiercleanlen3" type="text" value="<?php echo get_option('tarsiercleanlen3'); ?>" /></td></tr>
      <tr><td>Show number of likes if available</td><td><select name="tarsiershownum3">
  									<option value="True" <?php if(get_option('tarsiershownum3')=="True"){echo 'selected';}; ?>>Yes</option>
  									<option value="False" <?php if(get_option('tarsiershownum3')=="False"){echo 'selected';}; ?>>No</option>
									</select></td></tr>
      </table>
    </td></tr>

    <tr valign="top"><td>
    <strong>Tarsier Code 4:</strong><br/>
    Tool Bar Button to add this code in post - <br/><br/>
    <center><img src="<?php echo get_bloginfo('wpurl').'/wp-content/plugins/insert-tarsier/tarsier-wpicon.png'?>" width="30" height="30" /></center>
    </td>
    <td colspan="2" align="left">
      <textarea name="tarsiercode4" rows="1" cols="70"><?php echo get_option('tarsiercode4'); ?></textarea>
            <table>
      <tr><td>Width of Tarsier</td><td><input name="tarsierwidth4" type="text" value="<?php echo get_option('tarsierwidth4'); ?>"/></td></tr>
      <tr><td>Theme Colour</td><td><select name="tarsiercolour4">
  									<option value="white" <?php if(get_option('tarsiercolour4')=="white"){echo 'selected';}; ?>>white</option>
  									<option value="black"<?php if(get_option('tarsiercolour4')=="black"){echo 'selected';}; ?>>black</option>
  									<option value="sky" <?php if(get_option('tarsiercolour4')=="sky"){echo 'selected';}; ?>>sky</option>
  									<option value="" <?php if(get_option('tarsiercolour4')==""){echo 'selected';}; ?>>none</option>
									</select></td></tr>
      <tr><td>Number to display</td><td><input name="tarsiercount4" type="text" value="<?php echo get_option('tarsiercount4'); ?>"/></td></tr>
      <tr><td>Sort</td><td><select name="tarsiersort4">
  									<option value="True" <?php if(get_option('tarsiersort4')=="True"){echo 'selected';}; ?>>Yes</option>
  									<option value="False" <?php if(get_option('tarsiersort4')=="False"){echo 'selected';}; ?>>No</option>
									</select></td></tr>
      <tr><td>Items only with this word</td><td><input name="tarsiertag4" type="text" value="<?php echo get_option('tarsiertag4'); ?>" /></td></tr>
      <tr><td>Remove Items with this word</td><td><input name="tarsiernottag4" type="text" value="<?php echo get_option('tarsiernottag4'); ?>" /></td></tr>
      <tr><td>Force Word to be tagged items</td><td><select name="tarsierforcetag4">
  									<option value="True" <?php if(get_option('tarsierforcetag4')=="True"){echo 'selected';}; ?>>Yes</option>
  									<option value="False" <?php if(get_option('tarsierforcetag4')=="False"){echo 'selected';}; ?>>No</option>
									</select></td></tr>
      <tr><td>no duplicates over this many characters</td><td><input name="tarsiercleanlen4" type="text" value="<?php echo get_option('tarsiercleanlen4'); ?>" /></td></tr>
      <tr><td>Show number of likes if available</td><td><select name="tarsiershownum4">
  									<option value="True" <?php if(get_option('tarsiershownum4')=="True"){echo 'selected';}; ?>>Yes</option>
  									<option value="False" <?php if(get_option('tarsiershownum4')=="False"){echo 'selected';}; ?>>No</option>
									</select></td></tr>
      </table>
    </td></tr>
    
    <tr valign="top"><td>
    <strong>Tarsier Code 5:</strong><br/>
    Tool Bar Button to add this code in post - <br/><br/>
    <center><img src="<?php echo get_bloginfo('wpurl').'/wp-content/plugins/insert-tarsier/tarsier-wpicon.png'?>" width="30" height="30" /></center>
    </td>
    <td colspan="2" align="left">
      <textarea name="tarsiercode5" rows="1" cols="70"><?php echo get_option('tarsiercode5'); ?></textarea>
            <table>
      <tr><td>Width of Tarsier</td><td><input name="tarsierwidth5" type="text" value="<?php echo get_option('tarsierwidth5'); ?>"/></td></tr>
      <tr><td>Theme Colour</td><td><select name="tarsiercolour5">
  									<option value="white" <?php if(get_option('tarsiercolour5')=="white"){echo 'selected';}; ?>>white</option>
  									<option value="black"<?php if(get_option('tarsiercolour5')=="black"){echo 'selected';}; ?>>black</option>
  									<option value="sky" <?php if(get_option('tarsiercolour5')=="sky"){echo 'selected';}; ?>>sky</option>
  									<option value="" <?php if(get_option('tarsiercolour5')==""){echo 'selected';}; ?>>none</option>
									</select></td></tr>
      <tr><td>Number to display</td><td><input name="tarsiercount5" type="text" value="<?php echo get_option('tarsiercount5'); ?>"/></td></tr>
      <tr><td>Sort</td><td><select name="tarsiersort5">
  									<option value="True" <?php if(get_option('tarsiersort5')=="True"){echo 'selected';}; ?>>Yes</option>
  									<option value="False" <?php if(get_option('tarsiersort5')=="False"){echo 'selected';}; ?>>No</option>
									</select></td></tr>
      <tr><td>Items only with this word</td><td><input name="tarsiertag5" type="text" value="<?php echo get_option('tarsiertag5'); ?>" /></td></tr>
      <tr><td>Remove Items with this word</td><td><input name="tarsiernottag5" type="text" value="<?php echo get_option('tarsiernottag5'); ?>" /></td></tr>
      <tr><td>Force Word to be tagged items</td><td><select name="tarsierforcetag5">
  									<option value="True" <?php if(get_option('tarsierforcetag5')=="True"){echo 'selected';}; ?>>Yes</option>
  									<option value="False" <?php if(get_option('tarsierforcetag5')=="False"){echo 'selected';}; ?>>No</option>
									</select></td></tr>
      <tr><td>no duplicates over this many characters</td><td><input name="tarsiercleanlen5" type="text" value="<?php echo get_option('tarsiercleanlen5'); ?>" /></td></tr>
      <tr><td>Show number of likes if available</td><td><select name="tarsiershownum5">
  									<option value="True" <?php if(get_option('tarsiershownum5')=="True"){echo 'selected';}; ?>>Yes</option>
  									<option value="False" <?php if(get_option('tarsiershownum5')=="False"){echo 'selected';}; ?>>No</option>
									</select></td></tr>
      </table>
    </td></tr>
    <tr valign="top"><td>
    <strong>Tarsier Code 6:</strong><br/>
    Tool Bar Button to add this code in post - <br/><br/>
    <center><img src="<?php echo get_bloginfo('wpurl').'/wp-content/plugins/insert-tarsier/tarsier-wpicon.png'?>" width="30" height="30" /></center>
    </td>
    <td align="left">
      <textarea name="tarsiercode6" rows="1" cols="70"><?php echo get_option('tarsiercode6'); ?></textarea>
            <table>
      <tr><td>Width of Tarsier</td><td><input name="tarsierwidth6" type="text" value="<?php echo get_option('tarsierwidth6'); ?>"/></td></tr>
      <tr><td>Theme Colour</td><td><select name="tarsiercolour6">
  									<option value="white" <?php if(get_option('tarsiercolour6')=="white"){echo 'selected';}; ?>>white</option>
  									<option value="black"<?php if(get_option('tarsiercolour6')=="black"){echo 'selected';}; ?>>black</option>
  									<option value="sky" <?php if(get_option('tarsiercolour6')=="sky"){echo 'selected';}; ?>>sky</option>
  									<option value="" <?php if(get_option('tarsiercolour6')==""){echo 'selected';}; ?>>none</option>
									</select></td></tr>
      <tr><td>Number to display</td><td><input name="tarsiercount6" type="text" value="<?php echo get_option('tarsiercount6'); ?>"/></td></tr>
      <tr><td>Sort</td><td><select name="tarsiersort6">
  									<option value="True" <?php if(get_option('tarsiersort6')=="True"){echo 'selected';}; ?>>Yes</option>
  									<option value="False" <?php if(get_option('tarsiersort6')=="False"){echo 'selected';}; ?>>No</option>
									</select></td></tr>
      <tr><td>Items only with this word</td><td><input name="tarsiertag6" type="text" value="<?php echo get_option('tarsiertag6'); ?>" /></td></tr>
      <tr><td>Remove Items with this word</td><td><input name="tarsiernottag6" type="text" value="<?php echo get_option('tarsiernottag6'); ?>" /></td></tr>
      <tr><td>Force Word to be tagged items</td><td><select name="tarsierforcetag6">
  									<option value="True" <?php if(get_option('tarsierforcetag6')=="True"){echo 'selected';}; ?>>Yes</option>
  									<option value="False" <?php if(get_option('tarsierforcetag6')=="False"){echo 'selected';}; ?>>No</option>
									</select></td></tr>
      <tr><td>no duplicates over this many characters</td><td><input name="tarsiercleanlen6" type="text" value="<?php echo get_option('tarsiercleanlen6'); ?>" /></td></tr>
      <tr><td>Show number of likes if available</td><td><select name="tarsiershownum6">
  									<option value="True" <?php if(get_option('tarsiershownum6')=="True"){echo 'selected';}; ?>>Yes</option>
  									<option value="False" <?php if(get_option('tarsiershownum6')=="False"){echo 'selected';}; ?>>No</option>
									</select></td></tr>
      </table>
    </td>
    <td align="left"></td>
    </tr>
    
    <tr valign="top"><td>
    <strong>Tarsier Code 7:</strong><br/>
    Tool Bar Button to add this code in post - <br/><br/>
    <center><img src="<?php echo get_bloginfo('wpurl').'/wp-content/plugins/insert-tarsier/tarsier-wpicon.png'?>" width="30" height="30" /></center>
    </td>
    <td align="left">
      <textarea name="tarsiercode7" rows="1" cols="70"><?php echo get_option('tarsiercode7'); ?></textarea>
            <table>
      <tr><td>Width of Tarsier</td><td><input name="tarsierwidth7" type="text" value="<?php echo get_option('tarsierwidth7'); ?>"/></td></tr>
      <tr><td>Theme Colour</td><td><select name="tarsiercolour7">
  									<option value="white" <?php if(get_option('tarsiercolour7')=="white"){echo 'selected';}; ?>>white</option>
  									<option value="black"<?php if(get_option('tarsiercolour7')=="black"){echo 'selected';}; ?>>black</option>
  									<option value="sky" <?php if(get_option('tarsiercolour7')=="sky"){echo 'selected';}; ?>>sky</option>
  									<option value="" <?php if(get_option('tarsiercolour7')==""){echo 'selected';}; ?>>none</option>
									</select></td></tr>
      <tr><td>Number to display</td><td><input name="tarsiercount7" type="text" value="<?php echo get_option('tarsiercount7'); ?>"/></td></tr>
      <tr><td>Sort</td><td><select name="tarsiersort7">
  									<option value="True" <?php if(get_option('tarsiersort7')=="True"){echo 'selected';}; ?>>Yes</option>
  									<option value="False" <?php if(get_option('tarsiersort7')=="False"){echo 'selected';}; ?>>No</option>
									</select></td></tr>
      <tr><td>Items only with this word</td><td><input name="tarsiertag7" type="text" value="<?php echo get_option('tarsiertag7'); ?>" /></td></tr>
      <tr><td>Remove Items with this word</td><td><input name="tarsiernottag7" type="text" value="<?php echo get_option('tarsiernottag7'); ?>" /></td></tr>
      <tr><td>Force Word to be tagged items</td><td><select name="tarsierforcetag7">
  									<option value="True" <?php if(get_option('tarsierforcetag7')=="True"){echo 'selected';}; ?>>Yes</option>
  									<option value="False" <?php if(get_option('tarsierforcetag7')=="False"){echo 'selected';}; ?>>No</option>
									</select></td></tr>
      <tr><td>no duplicates over this many characters</td><td><input name="tarsiercleanlen7" type="text" value="<?php echo get_option('tarsiercleanlen7'); ?>" /></td></tr>
      <tr><td>Show number of likes if available</td><td><select name="tarsiershownum7">
  									<option value="True" <?php if(get_option('tarsiershownum7')=="True"){echo 'selected';}; ?>>Yes</option>
  									<option value="False" <?php if(get_option('tarsiershownum7')=="False"){echo 'selected';}; ?>>No</option>
									</select></td></tr>
      </table>
    </td>
    <td align="left"></td>
    </tr>
    </table>
    </fieldset>

    <div class="submit">
        <input type="submit" name="tarsier_update" value="<?php _e('Update options'); ?> &raquo;" />
    </div>

    </form>
  
</div><?php
}


// Insert the tarsier_add_option_page in the 'admin_menu'
add_action('admin_menu', 'LSD_tarsier_add_option_page');


// add button in tiny mce
add_action('init', 'LSD_tarsier_add_button');
function LSD_tarsier_add_button() {  
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
   {  
     add_filter('mce_external_plugins', 'LSD_tarsier_add_plugin');  
     add_filter('mce_buttons', 'LSD_tarsier_register_button');  
   }  
}  
function LSD_tarsier_register_button($buttons) {  
   array_push($buttons, "|,LSD_TS1,LSD_TS2,LSD_TS3,LSD_TS4,LSD_TS5,LSD_TS6,LSD_TS7,|");  
   return $buttons;  
}  

function LSD_tarsier_add_plugin($plugin_array) {  
 $plugin_array['LSD_tarsierTS'] = plugins_url('/showtarsier.js' , __FILE__ );
 return $plugin_array;  
} 
 

function LSD_tarsier_fasterget($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 50);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}
?>
