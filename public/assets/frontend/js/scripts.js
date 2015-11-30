/**
 * Created by mrhoang on 11/13/14.
 */
jQuery(document).ready(function($){
   jQuery('.team_img_info img').click(function(){
        jQuery('.member_modal_team').show();
   });
   jQuery('.team_member_modal_close').click(function(){
        jQuery('.member_modal_team').css('display','none');
   });
    jQuery('.view_more_about_us').click(function(){
        jQuery('.infous_des_more').css('max-height','100%');
        jQuery('.view_more_about_us').css('display','none');
   });
    jQuery('.header-second').click(function(){
        var tab = jQuery(this).attr('data-tab')
        if(jQuery(this).hasClass('active')){
            return false;
        }
        jQuery('.header-second').removeClass('active');
        jQuery(this).addClass('active');
        jQuery('.content_info_bu').hide('fast');
        jQuery('.content_info_bu_'+tab).show('fast');
    });
    jQuery('.menu-fisrt').click(function(){
        if(jQuery(this).hasClass('active')){
            return false;
        }
        var tab = jQuery(this).attr('data-tab')
        jQuery('.menu-fisrt span').removeClass('active');
        jQuery(this).children().addClass('active');
        jQuery('.content_info').hide('fast');
        jQuery('.content_info_'+tab).show('fast');
    });
    jQuery('.show-search-form').click(function(){
        jQuery('.search_po').toggle()
    });
    jQuery('#commentform').submit(function(){
        if(jQuery.trim(jQuery('textarea#comment').val()) == ''){
            jQuery('textarea#comment').focus();
            return false;
        }
    });

});
