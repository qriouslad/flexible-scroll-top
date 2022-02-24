<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://bowo.io
 * @since      1.0.0
 *
 * @package    Flexible_Scroll_Top
 * @subpackage Flexible_Scroll_Top/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Flexible_Scroll_Top
 * @subpackage Flexible_Scroll_Top/public
 * @author     Bowo <hello@bowo.io>
 */
class Flexible_Scroll_Top_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/flexible-scroll-top-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/flexible-scroll-top-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Output the back to top button on the frontend
	 *
	 * @since 1.0.0
	 */
	
	public function activate_button() {

		$options = get_option( 'flexible_scroll_top' );

		// Main Tab
		$enabled = $options['fst_button']['enable'];
		$position_class = $options['fst_button']['position'].'-side';
		$style_class = 'style-'.$options['fst_button']['style'];

		// Appearance Tab
		$icon = $options['fst_button']['icon'];
		switch ( $icon ) {
			case 'up1':
				$svg = '<svg viewBox="0 0 407.436 407.436" width="407.436" height="407.436"><polygon points="203.718,91.567 0,294.621 21.179,315.869 203.718,133.924 386.258,315.869 407.436,294.621 "/></svg>';
				break;
			case 'up2':
				$svg = '<svg viewBox="0 0 32 32" width="32" height="32"><path clip-rule="evenodd" d="M15.251,0.279L0.307,15.223  c-0.202,0.202-0.301,0.467-0.299,0.731c0,0.008-0.004,0.014-0.004,0.022l0,15c0,0.552,0.448,1,1,1c0.008,0,0.014-0.004,0.022-0.004  c0.264,0.002,0.529-0.097,0.731-0.299l14.246-14.246l14.277,14.277c0.401,0.401,1.051,0.401,1.452,0  c0.238-0.238,0.317-0.561,0.273-0.87V16.122c0.044-0.309-0.035-0.632-0.273-0.87L16.76,0.28c-0.208-0.208-0.482-0.303-0.755-0.295  C15.733-0.023,15.459,0.072,15.251,0.279z M30.004,16.428v12.096L16.76,15.28c-0.208-0.208-0.482-0.303-0.755-0.295  c-0.272-0.008-0.546,0.087-0.754,0.295L2.004,28.526V16.425L16.003,2.427L30.004,16.428z" fill-rule="evenodd" id="Border_Arrow_Up"/><g/><g/><g/><g/><g/><g/></svg>';
				break;
			case 'up3':
				$svg = '<svg viewBox="0 0 407.437 407.437" width="407.437" height="407.437"><g><polygon points="203.718,84.507 386.258,266.453 407.437,245.205 203.718,42.15 0,245.205 21.179,266.453"/><polygon points="0,344.039 21.179,365.287 203.718,183.341 386.258,365.287 407.437,344.039 203.718,140.984"/></g></svg>';
				break;
			case 'up4':
				$svg = '<svg viewBox="0 0 386.257 386.257" width="386.257" height="386.257"><polygon points="193.129,96.879 0,289.379 386.257,289.379 "/></svg>';
				break;
			case 'up5':
				$svg = '<svg viewBox="0 0 122.88 120.64" width="122.88" height="120.64"><g><path d="M108.91,66.6c1.63,1.55,3.74,2.31,5.85,2.28c2.11-0.03,4.2-0.84,5.79-2.44l0.12-0.12c1.5-1.58,2.23-3.6,2.2-5.61 c-0.03-2.01-0.82-4.01-2.37-5.55C102.85,37.5,84.9,20.03,67.11,2.48c-0.05-0.07-0.1-0.13-0.16-0.19C65.32,0.73,63.19-0.03,61.08,0 c-2.11,0.03-4.21,0.85-5.8,2.45l-0.26,0.27C37.47,20.21,19.87,37.65,2.36,55.17C0.82,56.71,0.03,58.7,0,60.71 c-0.03,2.01,0.7,4.03,2.21,5.61l0.15,0.15c1.58,1.57,3.66,2.38,5.76,2.41c2.1,0.03,4.22-0.73,5.85-2.28l47.27-47.22L108.91,66.6 L108.91,66.6z M106.91,118.37c1.62,1.54,3.73,2.29,5.83,2.26c2.11-0.03,4.2-0.84,5.79-2.44l0.12-0.12c1.5-1.57,2.23-3.6,2.21-5.61 c-0.03-2.01-0.82-4.02-2.37-5.55C101.2,89.63,84.2,71.76,67.12,54.24c-0.05-0.07-0.11-0.14-0.17-0.21 c-1.63-1.55-3.76-2.31-5.87-2.28c-2.11,0.03-4.21,0.85-5.8,2.45C38.33,71.7,21.44,89.27,4.51,106.8l-0.13,0.12 c-1.54,1.53-2.32,3.53-2.35,5.54c-0.03,2.01,0.7,4.03,2.21,5.61l0.15,0.15c1.58,1.57,3.66,2.38,5.76,2.41 c2.1,0.03,4.22-0.73,5.85-2.28l45.24-47.18L106.91,118.37L106.91,118.37z"/></g></svg>';
				break;
			case 'up7':
				$svg = '<svg viewBox="0 0 32 32" width="32" height="32"><style type="text/css">.st0{;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}</style><path d="M29.9,28.6l-13-26c-0.3-0.7-1.4-0.7-1.8,0l-13,26c-0.2,0.4-0.1,0.8,0.2,1.1C2.5,30,3,30.1,3.4,29.9L16,25.1l12.6,4.9c0.1,0,0.2,0.1,0.4,0.1c0.3,0,0.5-0.1,0.7-0.3C30,29.4,30.1,28.9,29.9,28.6z"/></svg>';
				break;
			case 'up8':
				$svg = '<svg viewBox="0 0 32 32" width="32" height="32" class="fst-up8">
					<style type="text/css">
						.st0{stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
					</style>
					<polygon class="st0" points="16,3 3,29 16,24 29,29 "/>
					</svg>';
				break;
			case 'up9':
				$svg = '<svg viewBox="0 0 24 24" width="24" height="24" style="fill:none !important;" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>';
				break;
			case 'up10':
				$svg = '<svg viewBox="0 0 32 32" width="32" height="32"><path d="M15.299,0.272L8.3,7.171c-0.394,0.391-0.394,1.024,0,1.414  c0.395,0.391,1.034,0.391,1.429,0l5.276-5.201v11.268l-6.721,6.625c-0.17,0.169-0.297,0.46-0.297,0.708v9  c0,0.873,1.102,1.323,1.724,0.707l6.285-6.196l6.285,6.196c0.607,0.601,1.706,0.191,1.706-0.799v-8.816  c0-0.292-0.056-0.58-0.278-0.8l-6.704-6.609V3.367l5.294,5.219c0.394,0.391,1.034,0.391,1.429,0c0.394-0.391,0.394-1.024,0-1.414  l-6.999-6.9c-0.192-0.189-0.456-0.286-0.723-0.286C15.769-0.014,15.469,0.103,15.299,0.272z M21.986,22.403v6.177l-4.982-4.911  v-6.177L21.986,22.403z M15.004,23.652l-5.018,4.947v-6.178l5.018-4.947V23.652z" fill="#121313" id="Vintage_Arrow_Up_2_"/><g/><g/><g/><g/><g/><g/></svg>';
				break;
			case 'up11':
				$svg = '<svg viewBox="0 0 32 32" width="32" height="32"><g><path d="M11,26H7c-0.5,0-0.9-0.4-1-0.9c-0.1-0.5,0.3-1,0.8-1.1L7,24c4.4-1,7.5-4.6,8-9h-3.5c-0.8,0-1.5-0.5-1.8-1.2s-0.1-1.6,0.4-2.2l8.3-8.3c0.4-0.4,1-0.4,1.4,0l8.3,8.3c0.6,0.6,0.7,1.4,0.4,2.2s-1,1.2-1.8,1.2H23C22.4,21.2,17.3,26,11,26z"/></g></svg>';
				break;
		}

		$size = $options['fst_button']['size'];
		if ( $size == 'small' ) {
			$size_numeric = 16;
		} elseif ( $size == 'medium' ) {
			$size_numeric = 24;
		} elseif ( $size == 'large' ) {
			$size_numeric = 32;
		} else {}

		$corner_spacing = $options['fst_button']['corner_spacing'];
		if ( $corner_spacing == 'small' ) {
			$corner_spacing_numeric = 12;
		} elseif ( $corner_spacing == 'medium' ) {
			$corner_spacing_numeric = 20;
		} elseif ( $corner_spacing == 'large' ) {
			$corner_spacing_numeric = 28;
		} else {}

		$border = $options['fst_button']['border'];
		if ( $border == true ) {
			$border_class = 'has-border';
		} else {
			$border_class = 'no-border';			
		}

		$color_scheme = $options['fst_button']['color_scheme'];

		if ( $color_scheme == 'dark' ) {
			$background_color = '#000000';
			$icon_color = '#ffffff';
			$border_color = '#ffffff';
		} elseif ( $color_scheme == 'light' ) {
			$background_color = '#ffffff';
			$icon_color = '#000000';
			$border_color = '#000000';
		} elseif ( $color_scheme == 'custom' ) {
			$background_color = $options['fst_button']['background_color'];
			$icon_color = $options['fst_button']['icon_color'];
			$border_color = $options['fst_button']['border_color'];
		} else {}

		$color_scheme_class = 'color-'.$options['fst_button']['color_scheme'];

		// Behaviour Tab
		$scroll_duration = $options['fst_button']['scroll_duration'];
		$offset_show = $options['fst_button']['offset_show'];
		$offset_fade = $options['fst_button']['offset_fade'];

		$idle_transparency = $options['fst_button']['idle_transparency'];
		$opacity = 1 - ( $idle_transparency / 100);

		$hide_on_mobile = $options['fst_button']['hide_on_mobile'];

		if ( $hide_on_mobile == true ) {

			$hide_on_mobile_css = '
			@media (max-width:800px) {
				.fst .to-top {
					display: none;
				}
			}
			';

		} else {
			$hide_on_mobile_css = '';
		}

		$styles = '

			:root {
				--corner-spacing: '.$corner_spacing_numeric.'px;
				--icon-size: '.$size_numeric.'px;
				--background-color: '.$background_color.';
				--icon-color: '.$icon_color.';
				--border-color: '.$border_color.';
				--button-opacity: '.$opacity.'; 
			}

			.to-top {
				display: flex;
				align-items: center;
				justify-content: center;
				padding: 8px;
				background: var(--background-color);
			}

			.to-top svg {
				width: var(--icon-size);
				height: var(--icon-size);
				fill: var(--icon-color);
				stroke: var(--icon-color);
			}

			.to-top svg.fst-up8 {
				fill: none;
			}

			.to-top svg path {
				fill: var(--icon-color);
				stroke: var(--icon-color);
			}

			.to-top.right-side {
				bottom: var(--corner-spacing);
				right: var(--corner-spacing);
			}

			.to-top.left-side {
				bottom: var(--corner-spacing);
				left: var(--corner-spacing);
			}

			.to-top.style-rounded {
				border-radius: 4px;
			}

			.to-top.style-square {
				border-radius: 0;
			}

			.to-top.style-circle {
				border-radius: 1000px;
			}

			.to-top.has-border {
				border: 1px solid var(--border-color);
			}

			.fst .to-top--fade-out {
			    opacity: var(--button-opacity);
			}

			'.$hide_on_mobile_css.'

		';

		// Remove line breaks so it does not cause error during script execution
		$styles = preg_replace( "/\r|\n/", "", $styles );

		if ( $enabled == true ) {

			// $output = '<div class="fst"><a href="#" class="to-top text-replace js-to-top"><img src="'.plugin_dir_url( __FILE__ ) . 'img/'.$icon.'.png'.'" /></a></div>';

			$output = '<div class="fst"><a href="#" class="to-top fst-button">'.$svg.'</a></div>';

			$output .= '
				<script id="flexible-scroll-top">

				    // Based on main.js from https://github.com/CodyHouse/back-to-top

					var backTop = document.getElementsByClassName("fst-button")[0],
						toTopVisibleClass = "to-top--is-visible";
						toTopFadeOutClass = "to-top--fade-out";
						fstPositionClass = "'.$position_class.'",
						fstStyleClass = "'.$style_class.'",
						fstBorderClass = "'.$border_class.'",
						fstColorSchemeClass = "'.$color_scheme_class.'",
						fstOffset = '.$offset_show.',
						fstOffsetOpacity = '.$offset_fade.',
						fstScrollDuration = '.$scroll_duration.',
						scrolling = false;

					Util.addClass(backTop, fstPositionClass +" "+ fstStyleClass +" "+ fstBorderClass +" "+ fstColorSchemeClass);

					// Add HTML <styles> block for custom styles

					var styles = "<style id=\"flexible-scroll-top\">'.$styles.'</style>";

					window.addEventListener("load",function(event) {
						document.head.insertAdjacentHTML("beforeend", styles);
					},false);
					if ( backTop ) {
						//update back to top visibility on scrolling
						window.addEventListener("scroll", function(event) {
							if( !scrolling ) {
								scrolling = true;
								(!window.requestAnimationFrame) ? setTimeout(checkBackToTop, 250) : window.requestAnimationFrame(checkBackToTop);
							}
						});

						//smooth scroll to top
						backTop.addEventListener("click", function(event) {
							event.preventDefault();
							(!window.requestAnimationFrame) ? window.scrollTo(0, 0) : Util.scrollTo(0, fstScrollDuration);
						});
					}

					function checkBackToTop() {
						var windowTop = window.scrollY || document.documentElement.scrollTop;

						if ( windowTop > fstOffset ) {
							Util.addClass(backTop, toTopVisibleClass)
						} else {
							Util.removeClass(backTop, toTopVisibleClass + " " + toTopFadeOutClass)
						}

						if ( windowTop > fstOffsetOpacity ) {
							Util.addClass(backTop, toTopFadeOutClass)
						}

						scrolling = false;
					}

				</script>
			';

			echo $output;

		}

	}

}
