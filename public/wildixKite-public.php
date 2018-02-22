<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.makas.it
 * @since      1.0.0
 *
 * @package    wildixKite
 * @subpackage wildixKite/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    wildixKite
 * @subpackage wildixKite/public
 * @author     Makas Srls <info@makas.it>
 */
class wildixKite_Public {

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
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wildixKite-public.css', array(), $this->version, 'all' );

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
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wildixKite-public.js', array( 'jquery' ), $this->version, false );

	}
        public function wildixKite_shortcode_init(){
            add_shortcode('wildix_kite', array($this, 'wildixKite_shortcode'));
        }
        /**
         * register shortcode
         */
        public function wildixKite_shortcode($atts = []){
            // normalize attribute keys, lowercase
            $atts = array_change_key_case((array)$atts, CASE_LOWER);
            return $this->getPeopleInfo($atts['interno'], $atts['name'], $atts['linkedin'], $atts['mailto']);
        }
        private function getPeopleInfo($UID, $name, $lnk, $mailto){
            $filename = dirname(plugin_dir_path( __FILE__ )) . "/admin/config.ini";
            if(is_readable($filename)){
                $config[] = parse_ini_file($filename, FALSE, INI_SCANNER_RAW);
            }
            return '<div class="row">
                <div class="form-group col-sm-12 text-center"></div>
                    <div class="form-group col-sm-12 text-center">
                    <img id="'.$UID.'" src="https://kite.wildix.com/infonet/'.$UID.'/api/presence/image" alt="'.$name.'" name="presence" align="" class="presence">&nbsp;&nbsp;
                        <a href="mailto:'.$mailto.'">
                            <img class="alignnone wp-image-135" src="'.$config[0]['email'].'" alt="photo" width="22" height="22">
                        </a>&nbsp;&nbsp;
                        <a href="'.$lnk.'">
                            <img class="alignnone wp-image-136" src="'.$config[0]['linkedin'].'" alt="linkedin-app-icon-300x300" width="22" height="22">
                        </a>
                    </div>
                </div>
            <div class="row">
                <div class="form-group col-sm-6 col-sm-offset-3 text-center">
                    <a href="https://kite.wildix.com/infonet/'.$UID.'">
                        <img src="http://pbx.wildix.com/wp-content/uploads/2013/09/Kite-me.png" alt="Call me with Wildix Kite" width="70">
                    </a>
                </div>
            </div>
            <script type="text/javascript">
            jQuery(function(){
                console.log("first call");
                kiteAlive(' . $UID . ');
            });
            </script>';
        }
}
