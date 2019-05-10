/** CUSTOM.JS **/
jQuery(document).ready(function($) {

    /* Aggiungo la classe animation-load per animare l'entrata del content */
    $('#mk-boxed-layout #theme-page').addClass('animation-load');

    /* Aggiungo la classe single-press al body */
    $('body').addClass('single-press');

    /* Aggiungo i pipe al titolo di pagina */
    $('.single-product .page-title').text('// Shop');
    $('.page-id-11566 .page-title').text('// Advertising');
    $('.page-id-11572 .page-title').text('// Design');

    /* Elimino l'attributo target dal menu */
    $('.menu-main_menu-container ul li a, .mk-main-navigation ul li a ').removeAttr('target');

    /* Cambio background */
    var backgroundscr = [
        'http://www.h-57.com/wp-content/uploads/2016/07/Pattern-03-e1470415471488.png',
        'http://www.h-57.com/wp-content/uploads/2016/07/Pattern-04-e1470415534990.png',
        'http://www.h-57.com/wp-content/uploads/2016/07/Pattern-02-e1470415494842.png',
        'http://www.h-57.com/wp-content/uploads/2016/07/Pattern-01-e1470415509337.png'
    ];

    $('body').css({'background-image': 'url(' + backgroundscr[Math.floor(Math.random() * backgroundscr.length)] + ')'});

    /* filtri sempre visibili */
    if ('.page-id-11012') {
        $('.tg-dropdown-holder i').remove();
        $('.tg-dropdown-holder').addClass('sp-work-filters').removeClass('tg-dropdown-holder');
        $('.tg-dropdown-list').addClass('sp-work-list').removeClass('tg-dropdown-list');
        $('.tg-dropdown-item').addClass('sp-work-item').removeClass('tg-dropdown-item');
    }
});
