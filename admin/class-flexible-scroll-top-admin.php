<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://bowo.io
 * @since      1.0.0
 *
 * @package    Flexible_Scroll_Top
 * @subpackage Flexible_Scroll_Top/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Flexible_Scroll_Top
 * @subpackage Flexible_Scroll_Top/admin
 * @author     Bowo <hello@bowo.io>
 */
class Flexible_Scroll_Top_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Flexible_Scroll_Top_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Flexible_Scroll_Top_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/flexible-scroll-top-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Flexible_Scroll_Top_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Flexible_Scroll_Top_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/flexible-scroll-top-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add settings page
	 *
	 * @since 1.0.0
	 */
	public function add_settings_page() {

		if ( class_exists( 'FLSCTO_CSF' ) ) {

			// Set a unique slug-like ID

			$prefix = 'flexible_scroll_top';

			// Create options
			
			FLSCTO_CSF::createOptions( $prefix, array(
				'menu_title' 		=> 'Flexible Scroll Top',
				'menu_slug' 		=> 'flexible-scroll-top',
				'menu_type'			=> 'submenu',
				'menu_parent'		=> 'options-general.php',
				'menu_position'		=> 100,
				// 'menu_icon'			=> 'dashicons-arrow-up-alt2',
				'framework_title' 	=> 'Flexible Scroll Top <small>by <a href="https://bowo.io" target="_blank">bowo.io</a><a href="https://wordpress.org/plugins/flexible-scroll-top/" target="_blank" class="fst-header-action"><span>&#8505;</span> Info</a><a href="https://wordpress.org/plugins/flexible-scroll-top/#reviews" target="_blank" class="fst-header-action"><span>&starf;</span> Review</a><a href="https://wordpress.org/support/plugin/flexible-scroll-top/" target="_blank" class="fst-header-action">&#10010; Feedback</a><a href="https://paypal.me/qriouslad" target="_blank" class="fst-header-action">&#9829; Donate</a></small>',
				'framework_class' 	=> 'fst-options',
				'show_bar_menu' 	=> false,
				'show_search' 		=> false,
				'show_reset_all' 	=> true,
				'show_reset_section' => false,
				'show_form_warning' => false,
				'save_defaults'		=> true,
				'show_footer' 		=> false,
				'footer_credit'		=> '<a href="https://wordpress.org/plugins/flexible-scroll-top/" target="_blank">Flexible Scroll Top</a> (<a href="https://github.com/qriouslad/flexible-scroll-top" target="_blank">github</a>) is built with the <a href="https://github.com/devinvinson/WordPress-Plugin-Boilerplate/" target="_blank">WordPress Plugin Boilerplate</a>, <a href="https://wppb.me" target="_blank">wppb.me</a>, <a href="https://github.com/Codestar/codestar-framework" target="_blank">CodeStar</a>, <a href="https://github.com/CodyHouse/back-to-top" target="_blank">Back to Top</a> and <a href="https://freeicons.io/" target="_blank">freeicons.io</a> icons.',
			) );

			// Create Button Options section
			
			FLSCTO_CSF::createSection( $prefix, array(
				'title'		=> 'Options',
				'fields'	=> array(
					array(
						'id'		=> 'fst_button',
						'type'		=> 'tabbed',
						'title' 	=> 'Button Options',
						'subtitle' => 'By simply enabling it, the scroll to top button uses sensible defaults that are good for most websites. You can customize the button\'s appearance and behaviour as needed.',
						'tabs'		=> array(
							array(
								'title' => 'Main',
								'fields' => array(
									array(
										'id' 		=> 'enable',
										'type' 		=> 'switcher',
										'title' 	=> 'Enable?',
										'text_on' 	=> 'Yes',
										'text_off' 	=> 'No',
										'default'	=> false,
										'class'		=> 'fst-enable',
									),
									array(
										'id' 		=> 'position',
										'type' 		=> 'button_set',
										'title' 	=> 'Position',
										'options'	=> array(
											'left'		=> 'Left side',
											'right'		=> 'Right side',
										),
										'default'	=> 'right',
									),
									array(
										'id'		=> 'style',
										'type'      => 'image_select',
										'title'     => 'Style',
										'class'		=> 'icon-style',
										'options'   => array(
											'rounded'	=> plugin_dir_url( __FILE__ ) . 'img/button_style_rounded.png',
											'square'	=> plugin_dir_url( __FILE__ ) . 'img/button_style_square.png',
											'circle'	=> plugin_dir_url( __FILE__ ) . 'img/button_style_circle.png',
										),
										'default'   => 'rounded'
									),
								),
							),
							array(
								'title' => 'Appearance',
								'fields' => array(
									array(
										'id'		=> 'icon',
										'type'      => 'image_select',
										'title'     => 'Icon',
										'class'		=> 'icon-options',
										'options'   => array(
											'up1'	=> plugin_dir_url( __FILE__ ) . 'img/up1.png',
											'up2'	=> plugin_dir_url( __FILE__ ) . 'img/up2.png',
											'up3'	=> plugin_dir_url( __FILE__ ) . 'img/up3.png',
											'up8'	=> plugin_dir_url( __FILE__ ) . 'img/up8.png',
											'up10'	=> plugin_dir_url( __FILE__ ) . 'img/up10.png',
											'up9'	=> plugin_dir_url( __FILE__ ) . 'img/up9.png',
											'up5'	=> plugin_dir_url( __FILE__ ) . 'img/up5.png',
											'up7'	=> plugin_dir_url( __FILE__ ) . 'img/up7.png',
											'up4'	=> plugin_dir_url( __FILE__ ) . 'img/up4.png',
											'up11'	=> plugin_dir_url( __FILE__ ) . 'img/up11.png',
										),
										'default'   => 'up1',
									),
									array(
										'id' 		=> 'size',
										'type' 		=> 'button_set',
										'title' 	=> 'Size',
										'options'	=> array(
											'small'		=> 'Small',
											'medium'	=> 'Medium',
											'large'		=> 'Large',
										),
										'default'	=> 'medium',
									),
									array(
										'id' 		=> 'corner_spacing',
										'type' 		=> 'button_set',
										'title' 	=> 'Corner Spacing',
										'subtitle'	=> 'Distance from bottom and side edges.',
										'options'	=> array(
											'small'		=> 'Small',
											'medium'	=> 'Medium',
											'large'		=> 'Large',
											'custom'	=> 'Custom',
										),
										'default'	=> 'medium',
									),
									array(
										'id'      	=> 'corner_spacing_distance',
										'type'    	=> 'text',
										'title'   	=> 'Distance',
										'subtitle'	=> 'For corner spacing.',
										'after'		=> 'In pixels.',
										'default' 	=> '40',
										'validate' => 'csf_validate_numeric',
										'dependency'	=> array( 'corner_spacing', '==', 'custom' ),
									),
									array(
										'id' 		=> 'border',
										'type' 		=> 'switcher',
										'title' 	=> 'Border',
										'text_on' 	=> 'Yes',
										'text_off' 	=> 'No',
										'default'	=> false,
									),
									array(
										'id' 		=> 'color_scheme',
										'type' 		=> 'button_set',
										'title' 	=> 'Color Scheme',
										'options'	=> array(
											'dark'		=> 'Dark',
											'light'		=> 'Light',
											'custom'	=> 'Custom',
										),
										'default'	=> 'dark',
									),
									array(
										'id'    		=> 'background_color',
										'type'  		=> 'color',
										'title' 		=> 'Background Color',
										'dependency'	=> array( 'color_scheme', '==', 'custom' ),
										'default'		=> '#000000',
									),
									array(
										'id'    		=> 'background_hover_color',
										'type'  		=> 'color',
										'title' 		=> 'Background Hover Color',
										'dependency'	=> array( 'color_scheme', '==', 'custom' ),
										'default'		=> '#000000',
									),
									array(
										'id'    		=> 'icon_color',
										'type'  		=> 'color',
										'title' 		=> 'Icon Color',
										'dependency'	=> array( 'color_scheme', '==', 'custom' ),
										'default'		=> '#ffffff',
									),
									array(
										'id'    		=> 'border_color',
										'type'  		=> 'color',
										'title' 		=> 'Border Color',
										'dependency'	=> array(
											array( 'border', '==', true ),
											array( 'color_scheme', '==', 'custom' ),
										),
										'default'		=> '#ffffff',
									),
								),
							),
							array(
								'title' => 'Behaviour',
								'fields' => array(
									array(
										'id'      	=> 'scroll_duration',
										'type'    	=> 'text',
										'title'   	=> 'Scroll Duration',
										'subtitle'	=> 'How long it takes for a page to scroll back to top.',
										'after'		=> 'In miliseconds.',
										'default' 	=> '300',
										'validate' => 'csf_validate_numeric',
									),
									array(
										'id'      	=> 'offset_show',
										'type'    	=> 'text',
										'title'   	=> 'Scroll to Show',
										'subtitle'	=> 'How far down a page it takes to scroll before the button appears.',
										'after'		=> 'In pixels.',
										'default' 	=> '800',
										'validate' => 'csf_validate_numeric',
									),
									array(
										'id'      	=> 'offset_fade',
										'type'    	=> 'text',
										'title'   	=> 'Scroll to Fade',
										'subtitle'	=> 'How far down a page it takes to scroll before the button becomes semi-transparent as defined in the Idle Transparency settings below.',
										'after'		=> 'In pixels. Use 999999 to disable fading.',
										'default' 	=> '1600',
										'validate' => 'csf_validate_numeric',
									),
									array(
										'id'      	=> 'idle_transparency',
										'type'    	=> 'text',
										'title'   	=> 'Idle Transparency',
										'subtitle'	=> 'For when the button is left unclicked when scrolling down a page.',
										'after'		=> 'In %. 100 is fully transparent and 0 prevents fading.',
										'default' 	=> '70',
										'validate' => 'csf_validate_numeric',
									),
									array(
										'id' 		=> 'show_on_desktop',
										'type' 		=> 'switcher',
										'title' 	=> 'Show on Desktop',
										'subtitle'	=> 'For screen widths 800 pixels and above.',
										'text_on' 	=> 'Yes',
										'text_off' 	=> 'No',
										'default'	=> true,
									),
									array(
										'id' 		=> 'show_on_mobile',
										'type' 		=> 'switcher',
										'title' 	=> 'Show on Mobile',
										'subtitle'	=> 'For screen widths below 800 pixels or equivalent.',
										'text_on' 	=> 'Yes',
										'text_off' 	=> 'No',
										'default'	=> true,
									),
								),
							),
						),
					),

				),

			) );

		}

	}

	/**
	 * Add 'settings' action link in plugins page
	 *
	 * @since 1.0.0
	 */
	public function add_settings_link( $links ) {

		$settings_link = '<a href="options-general.php?page='.$this->plugin_name.'">Settings</a>';

		array_unshift($links, $settings_link); 

		return $links; 

	}

	/**
	 * Suppress all admin notices in the plugin's main page.
	 *
	 * @hooked admin_notices
	 *
	 * @since 1.7.1
	 */
	public function suppress_admin_notices() {

		global $plugin_page;

		if ( $this->plugin_name === $plugin_page ) {
			remove_all_actions( 'admin_notices' );
		}

	}

}
