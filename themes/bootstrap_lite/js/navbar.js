/**
 * @file
 * A bootstrap navbar top position adjastment
 */

(function ($, Drupal, displace) {

  'use strict';
  if( $('#navbar').hasClass('navbar-fixed-top')){
    var NavbarMarginBottom = 20;
    var toolbarMargin = $('#toolbar-bar').height();
    
    if($('body').hasClass('toolbar-fixed')){
      
      if($('#toolbar-item-administration-tray').hasClass('is-active') && $('#toolbar-item-administration-tray').hasClass('toolbar-tray-horizontal')){
        toolbarMargin = toolbarMargin + $('#toolbar-item-administration-tray').height();
      }
      
      $('#navbar').css('margin-top', toolbarMargin + 'px');
      $('#toolbar-bar').css('padding-top', '0px');

    } else {
      
      $('#toolbar-bar').css('padding-top', $('#navbar').height() + 'px');
      
    }
    
    var dataOffsetTop = toolbarMargin +  $('#navbar').height();
    $('#navbar').attr('data-offset-top', dataOffsetTop);
    $('body').css('margin-top', NavbarMarginBottom + 'px');
    $('body').css('padding-top', dataOffsetTop + 'px');
  }
}(jQuery, Drupal, window.parent.Drupal.displace));
