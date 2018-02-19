<?php
/**
 * @file
 * theme-settings.php
 *
 * Theme settings file for Bootstrap.
 */

function bootstrap_lite_form_system_theme_settings_alter(&$form, $form_state) {

  $form['tweaks'] = array(
    '#type' => 'fieldset',
    '#title' => t('Tweaks'),
  );

  $form['tweaks']['bootstrap_lite_container'] = array(
    '#type' => 'select',
    '#title' => t('Container type'),
    '#default_value' => theme_get_setting('bootstrap_lite_container', 'bootstrap_lite'),
    '#description' => t('Switch between full width (fluid) or fixed (max 1170px) width.'),
    '#options' => array(
      'container' => t('Fixed'),
      'container-fluid' => t('Fluid'),
    )
  );

  $form['tweaks']['bootstrap_lite_datetime'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show "XX time ago".'),
    '#default_value' => theme_get_setting('bootstrap_lite_datetime', 'bootstrap_lite'),
    '#description' => t('If enabled, replace date output for nodes and comments by "XX time ago".'),
  );

  $form['navbar'] = array(
    '#type' => 'fieldset',
    '#title' => t('Navbar'),
    '#description' => t('Navigation bar settings.'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['navbar']['bootstrap_lite_navbar_position'] = array(
    '#type' => 'select',
    '#title' => t('Navbar Position'),
    '#description' => t('Select your Navbar position.'),
    '#default_value' => theme_get_setting('bootstrap_lite_navbar_position', 'bootstrap_lite'),
    '#options' => array(
      'static-top' => t('Static Top'),
      'fixed-top' => t('Fixed Top'),
      'fixed-bottom' => t('Fixed Bottom'),
    ),
    '#empty_option' => t('Normal'),
  );
  
  $form['navbar']['bootstrap_lite_navbar_menu_position'] = array(
    '#type' => 'select',
    '#title' => t('Navbar Menu Position'),
    '#description' => t('Select your Navbar Menu position.'),
    '#default_value' => theme_get_setting('bootstrap_lite_navbar_menu_position', 'bootstrap_lite'),
    '#options' => array(
      'navbar-left' => t('Left'),
      'navbar-right' => t('Right'),
    ),
    '#empty_option' => t('Normal'),
  );
  
  $form['navbar']['bootstrap_lite_navbar_inverse'] = array(
    '#type' => 'checkbox',
    '#title' => t('Inverse navbar style'),
    '#description' => t('Select if you want the inverse navbar style.'),
    '#default_value' => theme_get_setting('bootstrap_lite_navbar_inverse', 'bootstrap_lite'),
  );

}

