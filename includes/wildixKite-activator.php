<?php

/**
 * Fired during plugin activation
 *
 * @link       http://www.makas.it
 * @since      1.0.0
 *
 * @package    wildixKite
 * @subpackage wildixKite/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    wildixKite
 * @subpackage wildixKite/includes
 * @author     Makas Srls <info@makas.it>
 */
class wildixKite_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
            $logfile = plugin_dir_path( __FILE__ ) . "mylog.log";
            file_put_contents($logfile, "Time: ".date('Y-m-d H:i:s', time())." => funzione attivazione plugin\n", FILE_APPEND);
//            $this->createKiteTable();
	}
//        protected function createKiteTable() {
//            $logfile = plugin_dir_path( __FILE__ ) . "mylog.log";
//            file_put_contents($logfile, "Time: ".date('Y-m-d H:i:s', time())." => funzione creazioen tabella\n", FILE_APPEND);
//            global $wpdb;
//            $table_name = $wpdb->prefix . 'kite';
//            file_put_contents($logfile, "Time: ".date('Y-m-d H:i:s', time())." => nome tabella: ".$table_name."\n", FILE_APPEND);
//            $sql = "CREATE TABLE $table_name (
//            id mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
//            title varchar(50) NOT NULL,
//            structure longtext NOT NULL,
//            author longtext NOT NULL,
//            PRIMARY KEY  (id)
//            );";
//            
//            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
//            $db = dbDelta( $sql );
//            file_put_contents($logfile, "Time: ".date('Y-m-d H:i:s', time())." => Esecuzione query: ".$db."\n", FILE_APPEND);
//            echo "<pre>".htmlspecialchars(print_r($db,TRUE))."</pre>";
//        }
}
