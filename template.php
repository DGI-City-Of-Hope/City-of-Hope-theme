<?php

/**
 * Template.php: template overrides and preprocess functions go here.
 */


/**
 * template_preprocess_page()
 */
function cityofhope_preprocess_page(&$variables) {
	
	// add custom (alternative) mission statement
	$variables['slogan_alt'] = t('City of Hope, an NCI-designated Comprehensive Cancer Center');
	
	// add footer text & images
	$variables['footer_text'] = theme('footer_text', _cityofhope_footer_text());

  // unset the fist sidebar then on the form builder page  
  if (arg(0) == 'admin' AND arg(1) == 'content' AND arg(2) == 'xml' AND arg(3) == 'form' AND arg(5) == 'edit') {
    // unset sidebar_first
    unset($variables['sidebar_first']);
    // add class wo we can assign proper width again (see cityofhope.css).
    $variables['body_classes'] .= ' xml-form-builder'; 
  }
    
}



/**
 * Custom theme functions
 */
function cityofhope_theme() {
  return array(
    'footer_text' => array(
      'arguments' => array('footer_text' => NULL),
    ),
  );
}


function _cityofhope_footer_text() {
	
	
	$footer_text['footer_bottom_left'] = t('&copy; 2011 City of Hope.<br />
1500 East Duarte Road<br />
Duarte, California 91010<br />
626-256-HOPE (4673)');
	
	$footer_text['footer_bottom_top_left_logo'] = '<a href="http://www.cancer.gov" class="nci" title="http://www.cancer.gov"></a>';
	
	$footer_text['footer_bottom_top_left'] = t('City of Hope is one of 40 Comprehensive Cancer Centers, the highest designation bestowed by the National Cancer Institute and a recognition of excellence in cancer treatment, research, prevention and education.');
		
	$footer_text['footer_bottom_bottom_left'] = t('City of Hope strongly supports and values the uniqueness of all individuals and promotes a work environment where diversity is embraced.');
	
	$footer_text['footer_bottom_top_right_logo'] = '<a href="http://www.nccn.org" class="nccn" title="http://www.nccn.org"></a>';
	
	$footer_text['footer_bottom_top_right'] = t("The <strong>National Comprehensive Cancer Network&reg;</strong> (NCCN), a not-for-profit alliance of 21 of the world's leading cancer centers, is dedicated to improving the quality and effectiveness of care provided to patients with cancer.");
	
	$footer_text['footer_bottom_bottom_right_logo'] = '<a href="http://www.hon.ch" class="hon" title="http://www.hon.ch"></a>';
	
	$footer_text['footer_bottom_bottom_right'] = t('We subscribe to the HON code of the Healthcare on the Net Foundation.');
	
	
  return $footer_text;
	
}

/**
 * footer text theme function
 */
function cityofhope_footer_text($footer_text = NULL) {
	
	$output = '';
	$output .= '<div class="footer-bottom">';
	
	$output .= '<div class="footer-left">' . $footer_text['footer_bottom_left'] . '</div>';
	
	$output .= '<div class="footer-right">';
	
	$output .= '<div class="footer-right-top">';
	
	$output .= '<div class="col-left">';
	$output .= '<div class="logo">' . $footer_text['footer_bottom_top_left_logo'] . '</div>';
	$output .= '<div class="content">' . $footer_text['footer_bottom_top_left'] . '</div>';
	$output .= '</div>';
	
	$output .= '<div class="col-right">';
	$output .= '<div class="logo">' . $footer_text['footer_bottom_top_right_logo'] . '</div>';
	$output .= '<div class="content">' . $footer_text['footer_bottom_top_right'] . '</div>';
	$output .= '</div>';
	
	$output .= '</div>';
	
	$output .= '<div class="footer-right-bottom">';
	
	$output .= '<div class="col-left">';
	$output .= '<div class="content">' . $footer_text['footer_bottom_bottom_left'] . '</div>';
	$output .= '</div>';
	
	$output .= '<div class="col-right">';
	$output .= '<div class="logo">' . $footer_text['footer_bottom_bottom_right_logo'] . '</div>';
	$output .= '<div class="content">' . $footer_text['footer_bottom_bottom_right'] . '</div>';
	$output .= '</div>';
	
	$output .= '</div>';
	
	$output .= '</div>';
	
  return $output;	
	
}


function cityofhope_preprocess_views_slideshow_singleframe(&$vars) {
  // unset pager_bottom as we include this in the controls function
  unset($vars['pager_bottom']);
}

/**
 * The slideshow controls.
 *
 * @ingroup themeable
 */
function cityofhope_views_slideshow_singleframe_controls($vss_id, $view, $options) {
  $classes = array(
    'views_slideshow_singleframe_controls',
    'views_slideshow_controls',
  );

  $attributes['class'] = implode(' ', $classes);
  $attributes['id'] = "views_slideshow_singleframe_controls_" . $vss_id;
  $attributes = drupal_attributes($attributes);

  $output = "<div$attributes>";
  $output .= theme('views_slideshow_singleframe_control_previous', $vss_id, $view, $options);
  // add pager
  $output .= theme('views_slideshow_singleframe_pager', $vss_id, $view, $options);
  $output .= theme('views_slideshow_singleframe_control_next', $vss_id, $view, $options);
  $output .= "</div>\n";
  return $output;
}
