/**
 * Created by May2 on 03/09/2015.
 */

var HOME = {
    detail_team:function(){
        jQuery('.a_detail_team').click(function(){
            stt = jQuery(this).attr('stt');
            jQuery('.list-view-team').hide();
            jQuery('.list-view-team'+stt).show();
            jQuery('.ove-hi-po').show();
        });
        jQuery('.close-abo').click(function(){
            jQuery('.list-view-team').hide();
            jQuery('.ove-hi-po').hide();
        });
    },
    showmenumobi: function () {
        jQuery(".cate-show-pa").click(function () {
            jQuery(".menu-mobile").slideToggle();
        });
        jQuery("#cb-mob-close").click(function () {
            jQuery(".menu-mobile").slideToggle();
        });
    }
};

function handleAnimatedHeader() {
    var header = jQuery('.header.fixed');
    function refresh() {
        var scroll = jQuery(window).scrollTop();
        if (scroll >= 99) {
            header.addClass('shrink');
        } else {
            header.removeClass('shrink');
        }
    };
    jQuery(window).load(function () { refresh(); });
    jQuery(window).scroll(function () { refresh(); });
    jQuery(window).on('touchstart',function(){ refresh(); });
    jQuery(window).on('scrollstart',function(){ refresh(); });
    jQuery(window).on('scrollstop',function(){ refresh(); });
    jQuery(window).on('touchmove',function(){ refresh(); });

}
function resizePage() {
    var g = jQuery(window).height();
    var a = (g/100);
    var b = '50%' + ' ' + a*10 + '%';
    var c = (-30+a) + '%';
    jQuery('.page-section').css('height', jQuery(window).height());
    jQuery('.page-section').trigger('refresh');
    jQuery('.skrollable').css('background-position',b);
}
jQuery( window ).resize(function() {
    resizePage();
});
jQuery(document).ready(function () {
    alert(nothing);
    HOME.detail_team();
    handleAnimatedHeader();
    resizePage();
    HOME.showmenumobi();
})