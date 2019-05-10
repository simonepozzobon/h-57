/*
Description:    Color Picker
Author:         Simone Pozzobon
*/

(function($) {
    $.noConflict();

    /**
     * Script per la gestione del footer
     */
    $(window).load(function(){
      var headerHeight = $('header').height();
      mainContentHeight = $('#theme-page').outerHeight();
      footerHeight = $('#mk-footer').height();
      contentHeight = headerHeight + mainContentHeight + footerHeight;
      documentHeight = $(window).height();
      setFixedFooter(documentHeight);
      function setFixedFooter(documentHeight) {
        if (contentHeight < documentHeight) {
          $('#mk-footer').addClass('sp-fixed-bottom');
        } else {
          $('#mk-footer').removeClass('sp-fixed-bottom');
        }
      }
      $(window).resize(function() {
        documentHeight = $(window).height();
        setFixedFooter(documentHeight);
      });
    });




    /**************************************************************/
    /*                          SELETTORI                         */
    /**************************************************************/

    /* BACKGROUND SELECTORS - BG COLOR */
    var sp_selector = 'body, ';
    sp_selector += '#mk-footer, ';
    sp_selector += '#sub-footer, ';
    sp_selector += '.mk-main-navigation li.no-mega-menu ul.sub-menu, ';
    sp_selector += '.mk-shopping-cart-box, ';
    sp_selector += '.mk-responsive-wrap, ';
    sp_selector += '.mk-body-loader-overlay, ';
    sp_selector += '.mk-header-bg, ';
    sp_selector += '.mk-responsive-nav li';

    /* MEDIA CONTENT - BG COLOR */
    var sp_mdb_sel = '.tg-item-media-content';

    /* SVG SELECTORS - TEXT COLOR */
    var sp_svg_sel = '.sp-shortology-wrapper svg, '; // Logo
    sp_svg_sel += '.sp-logo-wrapper svg, '; // Logo
    sp_svg_sel += '.mk-svg-icon'; // Cart Icon

    /* BUTTONS - TEXT COLOR */
    var sp_btn_sel = '.tg-ajax-button > span, '; // Load More Button (Grid)
    sp_btn_sel += '.woocommerce.widget_shopping_cart .buttons .mk-button, '; // Navigation Shop Widget Cart
    sp_btn_sel += '.cart .shop-flat-btn, .shop-flat-btn.shop-black-btn, '; // Generic Cart Shop Button
    sp_btn_sel += '.tg-shop57 .tg-element-4, '; // Add To Cart Url in the Shop Grid
    sp_btn_sel += '.sp-shop-flat-btn, '; // Generic Shop Button (overwritten in first line)
    sp_btn_sel += '.mk-message-box.mk-confirm-message-box .button.wc-forward, ';
    sp_btn_sel += '.checkout-button, ';
    sp_btn_sel += '.button,';
    sp_btn_sel += '.mk-button';

    /* VARIOUS BG - TEXT COLOR */
    var sp_bkg_sel = '.sp-client, ';
    sp_bkg_sel += '.mk-css-icon-menu-line-1, .mk-css-icon-menu-line-2, .mk-css-icon-menu-line-3';

    /* BORDER COlOR- TEXT COLOR */
    var sp_brd_sel = '.shop_table thead, '; // Header Table Cart Page
    sp_brd_sel += '.shop_table th, .shop_table thead th, .shop_table tfoot th, .shop_table tfoot thead th, '; // Header Table Cart Page
    sp_brd_sel += '.shop_table > td, .woocommerce table.shop_table > td, .woocommerce-page table.shop_table > td, '; // Cell Table Shop
    sp_brd_sel += '.cart-subtotal th, .cart-subtotal td, '; // Cell Table Shop
    sp_brd_sel += '.woocommerce form.login, '; // Login Box Shop
    sp_brd_sel += 'input, ';
    sp_brd_sel += 'textarea, ';
    sp_brd_sel += '.main-navigation-ul .menu-item > ul, ';
    sp_brd_sel += '.woocommerce #payment div.form-row, .woocommerce-page #payment div.form-row, ';
    sp_brd_sel += '.woocommerce table.shop_table td, ';
    sp_brd_sel += '.shop_table tbody td';


    /* INPUT AND TEXTAREA PLACEHOLDER - TEXT COLOR */
    var sp_inp_sel = 'input, ';
    sp_inp_sel += 'textarea';

    /* TEXT COLOR */
    var sp_txt_sel = '.woocommerce-Price-amount, ';
    sp_txt_sel += '.tax_label, .master-holder strong, ';
    sp_txt_sel += '.menu-item-link';





    $(document).ready(function($) {

        /**************************************************************/
        /*                  PRENDO OGNI CAMBIAMENTO                   */
        /**************************************************************/

        //$('body, ').live('change', function() {
        //    alert (sessionStorage.getItem('sp-text'));
        //    });
        //$(document).ajaxComplete(function() {
        //    alert('ciao');
        //});

        /**************************************************************/
        /*                  RIPRENDO IL CONTROLLO                     */
        /**************************************************************/

        // Generic Button
        $('.shop-flat-btn').removeClass('shop-flat-btn').addClass('sp-shop-flat-btn').removeClass('shop-black-btn');

        // Checkout Button
        $('.button').removeClass('button').addClass('sp-shop-flat-btn');


        // Checkout Button
        $('input#place_order.button.alt').removeClass('alt').addClass('sp-shop-flat-btn').removeClass('button');



        // Set the default color

        if (sessionStorage.getItem('sp-text') === null) {
            sessionStorage.setItem('sp-text', 'gray');
            sessionStorage.setItem('sp-color', 'gray');
            sessionStorage.setItem('sp-text-color', '#e4e5e6');
            sessionStorage.setItem('sp-color-hex', '#6d6e70');
            $('*').css('color', '#e4e5e6', 'important');
        }

        /**************************************************************/
        /*                       SETTO VARIABILI                      */
        /**************************************************************/

        var sp_text_var = sessionStorage.getItem('sp-text');
        var sp_color_var  = sessionStorage.getItem('sp-color');

        /**************************************************************/
        /*                          FUNZIONI                          */
        /**************************************************************/

        function sp_magic_init(a,b,c,d,e,f,g,h,i,l) {
            $(a).addClass('sp-color-' + i);
            $(b).addClass('sp-bg-color-' + i);
            $(c).addClass('sp-svg-' + l);
            $(d).addClass('sp-btn-' + l);
            $(e).addClass('sp-bkg-' + l);
            $(f).addClass('sp-brd-' + l);
            $(g).addClass('sp-inp-' + l);
            $(h).addClass('sp-txt-' + l);
        }

        function sp_magic(a,b,c,d,e,f,g,h) {
            $(a).removeClass(function (index, className) {
                return (className.match (/(^|\s)sp-svg-\S+/g) || []).join(' ');
                }).addClass('sp-svg-' + h);
            $(b).removeClass(function (index, className) {
                return (className.match (/(^|\s)sp-btn-\S+/g) || []).join(' ');
                }).addClass('sp-btn-' + h);
            $(c).removeClass(function (index, className) {
                return (className.match (/(^|\s)sp-bkg-\S+/g) || []).join(' ');
                }).addClass('sp-bkg-' + h);
            $(d).removeClass(function (index, className) {
                return (className.match (/(^|\s)sp-brd-\S+/g) || []).join(' ');
                }).addClass('sp-brd-' + h);
            $(e).removeClass(function (index, className) {
                return (className.match (/(^|\s)sp-inp-\S+/g) || []).join(' ');
                }).addClass('sp-inp-' + h);
            $(f).removeClass(function (index, className) {
                return (className.match (/(^|\s)sp-txt-\S+/g) || []).join(' ');
                }).addClass('sp-txt-' + h);
        }

        /**************************************************************/
        /*                           INIZIO                           */
        /**************************************************************/

        $('*').css('color', sessionStorage.getItem('sp-text-color'), 'important');
        sp_magic_init(sp_selector,sp_mdb_sel,sp_svg_sel,sp_btn_sel,sp_bkg_sel,sp_brd_sel,sp_inp_sel,sp_txt_sel,sp_color_var,sp_text_var);


        /****************************************************************/
        /*                              BLUE                            */
        /****************************************************************/

        $('.sp-text-color-picker.blue').click(function() {
            $('*').css('color', '#abd4d7', 'important');
            sp_magic(sp_svg_sel, sp_btn_sel, sp_bkg_sel, sp_brd_sel, sp_inp_sel, sp_txt_sel, sp_text_var, 'blue');
            sessionStorage.setItem('sp-text', 'blue');
            sessionStorage.setItem('sp-text-color', '#abd4d7');
        });

        /****************************************************************/
        /*                              GRAY                            */
        /****************************************************************/

        $('.sp-text-color-picker.gray').click(function() {
            $('*').css('color', '#e4e5e6', 'important');
            sp_magic(sp_svg_sel, sp_btn_sel, sp_bkg_sel, sp_brd_sel, sp_inp_sel, sp_txt_sel, sp_text_var, 'gray');
            sessionStorage.setItem('sp-text', 'gray');
            sessionStorage.setItem('sp-text-color', '#e4e5e6');
        });

        /****************************************************************/
        /*                             BROWN                            */
        /****************************************************************/

        $('.sp-text-color-picker.brown').click(function() {
            $('*').css('color', '#e1d1ac', 'important');
            sp_magic(sp_svg_sel, sp_btn_sel, sp_bkg_sel, sp_brd_sel, sp_inp_sel, sp_txt_sel, sp_text_var, 'brown');
            sessionStorage.setItem('sp-text', 'brown');
            sessionStorage.setItem('sp-text-color', '#e1d1ac');
        });

        /****************************************************************/
        /*                          BACKGROUND                          */
        /****************************************************************/

        $('.sp-color-picker.red').click(function() {
            $(sp_selector).removeClass(function (index, className) {
                return (className.match (/(^|\s)sp-color-\S+/g) || []).join(' ');
                }).addClass('sp-color-red');
            $(sp_mdb_sel).removeClass(function (index, className) {
                return (className.match (/(^|\s)sp-bg-color-\S+/g) || []).join(' ');
                }).addClass('sp-bg-color-red');
            sessionStorage.setItem('sp-color', 'red');
            sessionStorage.setItem('sp-color-hex', '#d1364a');
        });

        $('.sp-color-picker.brown').click(function() {
            $(sp_selector).removeClass(function (index, className) {
                return (className.match (/(^|\s)sp-color-\S+/g) || []).join(' ');
                }).addClass('sp-color-brown');
            $(sp_mdb_sel).removeClass(function (index, className) {
                return (className.match (/(^|\s)sp-bg-color-\S+/g) || []).join(' ');
                }).addClass('sp-bg-color-brown');
            sessionStorage.setItem('sp-color', 'brown');
            sessionStorage.setItem('sp-color-hex', '#9d885c');
        });

        $('.sp-color-picker.blue').click(function() {
            $(sp_selector).removeClass(function (index, className) {
                return (className.match (/(^|\s)sp-color-\S+/g) || []).join(' ');
                }).addClass('sp-color-blue');
            $(sp_mdb_sel).removeClass(function (index, className) {
                return (className.match (/(^|\s)sp-bg-color-\S+/g) || []).join(' ');
                }).addClass('sp-bg-color-blue');
            sessionStorage.setItem('sp-color', 'blue');
            sessionStorage.setItem('sp-color-hex', '#748e96');
        });

        $('.sp-color-picker.orange').click(function() {
            $(sp_selector).removeClass(function (index, className) {
                return (className.match (/(^|\s)sp-color-\S+/g) || []).join(' ');
                }).addClass('sp-color-orange');
            $(sp_mdb_sel).removeClass(function (index, className) {
                return (className.match (/(^|\s)sp-bg-color-\S+/g) || []).join(' ');
                }).addClass('sp-bg-color-orange');
            sessionStorage.setItem('sp-color', 'orange');
            sessionStorage.setItem('sp-color-hex', '#f07355');
        });

        $('.sp-color-picker.green').click(function() {
            $(sp_selector).removeClass(function (index, className) {
                return (className.match (/(^|\s)sp-color-\S+/g) || []).join(' ');
                }).addClass('sp-color-green');
            $(sp_mdb_sel).removeClass(function (index, className) {
                return (className.match (/(^|\s)sp-bg-color-\S+/g) || []).join(' ');
                }).addClass('sp-bg-color-green');
            sessionStorage.setItem('sp-color', 'green');
            sessionStorage.setItem('sp-color-hex', '#46544b');
        });

        $('.sp-color-picker.gray').click(function() {
            $(sp_selector).removeClass(function (index, className) {
                return (className.match (/(^|\s)sp-color-\S+/g) || []).join(' ');
                }).addClass('sp-color-gray');
            $(sp_mdb_sel).removeClass(function (index, className) {
                return (className.match (/(^|\s)sp-bg-color-\S+/g) || []).join(' ');
                }).addClass('sp-bg-color-gray');
            sessionStorage.setItem('sp-color', 'gray');
            sessionStorage.setItem('sp-color-hex', '#6d6e70');
        });

    });

})( jQuery );
