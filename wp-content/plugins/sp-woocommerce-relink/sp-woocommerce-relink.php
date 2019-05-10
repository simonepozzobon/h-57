<?php
  /*
   Plugin Name: Sp Woocommerce Relink
   Plugin URI: http://www.simonepozzobon.com
   Description: Prodotto personalizzato per Woocommerce
   Version: 1.0
   Author: Simone Pozzobon
   Author URI: http://simonepozzobon.com
   License: GPL2
  */

  define('PLUGIN_PATH', plugin_dir_path( __FILE__ ));

  // Aggiunge la classe del prodotto per estenderlo

  function register_simple_magmatique_product_type() {

  	/**
  	 * This should be in its own separate file.
  	 */
  	class WC_Product_Simple_Magmatique extends WC_Product_Simple {

    		public function __construct( $product ) {
    			$this->product_type = 'magmatique';
          $this->supports[] = '';
    			parent::__construct( $product );

    		}

        public function get_type()
        {
          return 'magmatique';
        }
    	}

  }
  add_action( 'plugins_loaded', 'register_simple_magmatique_product_type' );

  /**
   * Add to product type drop down.
   */
  function add_simple_magmatique_product( $types ){
  	// Key should be exactly the same as in the class
  	$types[ 'simple_magmatique' ] = __( 'Magmatique' );
  	return $types;
  }
  add_filter( 'product_type_selector', 'add_simple_magmatique_product' );
  /**
   * Show pricing fields for simple_magmatique product.
   */
  function simple_magmatique_custom_js() {
  	if ( 'product' != get_post_type() ) :
  		return;
  	endif;
  	?><script type='text/javascript'>
  		jQuery( document ).ready( function() {
  			jQuery( '.options_group.pricing' ).addClass( 'show_if_simple_magmatique' ).show();
  		});
  	</script><?php
  }
  add_action( 'admin_footer', 'simple_magmatique_custom_js' );
  /**
   * Add a custom product tab.
   */
  function custom_product_tabs( $tabs) {
  	$tabs['magmatique'] = array(
  		'label'		=> __( 'Magmatique', 'woocommerce' ),
  		'target'	=> 'magmatique_options',
  		'class'		=> array( 'show_if_simple_magmatique', 'show_if_variable_magmatique'  ),
  	);
  	return $tabs;
  }
  add_filter( 'woocommerce_product_data_tabs', 'custom_product_tabs' );
  /**
   * Contents of the magmatique options product tab.
   */
  function magmatique_options_product_tab_content() {
  	global $post;
  	?><div id='magmatique_options' class='panel woocommerce_options_panel'><?php
  		?><div class='options_group'><?php
  			woocommerce_wp_checkbox( array(
  				'id' 		=> '_enable_magmatique_option',
  				'label' 	=> __( 'Attiva vendita su Magmatique', 'woocommerce' ),
  			) );
  			woocommerce_wp_text_input( array(
  				'id'			=> '_magmatique_link',
  				'label'			=> __( 'Link allo store di Magmatique', 'woocommerce' ),
  				'desc_tip'		=> 'true',
  				'description'	=> __( 'Link al prodotto sul sito di magmatique', 'woocommerce' ),
  				'type' 			=> 'text',
  			) );
  		?></div>

  	</div><?php
  }
  add_action( 'woocommerce_product_data_panels', 'magmatique_options_product_tab_content' );
  /**
   * Save the custom fields.
   */
  function save_magmatique_option_field( $post_id ) {
  	$magmatique_option = isset( $_POST['_enable_magmatique_option'] ) ? 'yes' : 'no';
  	update_post_meta( $post_id, '_enable_magmatique_option', $magmatique_option );
  	if ( isset( $_POST['_magmatique_link'] ) ) :
  		update_post_meta( $post_id, '_magmatique_link', sanitize_text_field( $_POST['_magmatique_link'] ) );
  	endif;
  }
  add_action( 'woocommerce_process_product_meta_simple_magmatique', 'save_magmatique_option_field'  );
  add_action( 'woocommerce_process_product_meta_variable_magmatique', 'save_magmatique_option_field'  );
  /**
   * Hide Attributes data panel.
   */
  function hide_attributes_data_panel( $tabs) {
  	$tabs['attribute']['class'][] = 'hide_if_simple_magmatique hide_if_variable_magmatique';
    $tabs['shipping']['class'][] = 'hide_if_simple_magmatique hide_if_variable_magmatique';
    $tabs['advanced']['class'][] = 'hide_if_simple_magmatique hide_if_variable_magmatique';
    return $tabs;
  }
  add_filter( 'woocommerce_product_data_tabs', 'hide_attributes_data_panel' );


  // Intercetta il template
  // function intercept_wc_template($template, $template_name, $template_path) {
  //     if ($template_name == 'single-product/add-to-cart/simple.php') {
  //       $template = PLUGIN_PATH.'/templates/'.$template_name;
  //     }
  //     print_r($template_name);
  //     return $template;
  // }
  //
  // add_filter('woocommerce_locate_template', 'intercept_wc_template', 20, 3);
  add_filter( 'woocommerce_locate_template', 'woo_adon_plugin_template', 1, 3 );
  function woo_adon_plugin_template( $template, $template_name, $template_path ) {
       global $woocommerce;
       $_template = $template;
       if ( ! $template_path )
          $template_path = $woocommerce->template_url;

       $plugin_path  = untrailingslashit( plugin_dir_path( __FILE__ ) )  . '/templates/';

      // Look within passed path within the theme - this is priority
      $template = locate_template(
      array(
        $template_path . $template_name,
        $template_name
      )
     );

     if( ! $template && file_exists( $plugin_path . $template_name ) )
      $template = $plugin_path . $template_name;

     if ( ! $template )
      $template = $_template;
     return $template;
  }

  add_filter('woocommerce_add_to_cart_handler', 'change_add_to_cart_url');
  function change_add_to_cart_url()
  {
    return 'google.it';
  }
