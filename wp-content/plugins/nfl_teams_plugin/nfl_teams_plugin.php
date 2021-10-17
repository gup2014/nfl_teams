<?php
/**
 * Plugin Name: NFL Team Plugin
 * Plugin URI: 
 * Description: An awesome plugin to show a list of the NFL teams.
 * Version: 1.0.0
 * Author: David
 * Author URI:
 */

define('WP_NFL_TEAMS_PATH', plugin_dir_path(__FILE__));
define('WP_NFL_TEAMS_URL', plugins_url('/', __FILE__));

class nflTeamsPlugin {

    private static $instance;

    private $nfl_teams;

    /**
     * Initialize the plugin.
     *
     */
    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueueScripts'), 11);

        $this->includeClasses(WP_NFL_TEAMS_PATH . 'php');

        $this->nfl_teams = new \nfl_teams\NFLTeams();
    }

    /**
     * If already exists an instance, return it. Otherwise create one.
     *
     */
    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * Add the styling files.
     *
     */
    public function enqueueScripts()
    {
        wp_register_style('nfl_css', WP_NFL_TEAMS_URL . '/css/bootstrap.min.css', array() ,"1.0");
        wp_enqueue_style('nfl_css');
        wp_register_style('custom_nfl_css', WP_NFL_TEAMS_URL . '/css/custom.css', array() ,"1.2");
        wp_enqueue_style('custom_nfl_css');
    }

    private function includeClasses($dir)
    {
        if ($handle = opendir($dir)) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    $entryPath = $dir.'/'.$entry;
                    if(is_dir($entryPath)){
                        $this->includeClasses($entryPath);
                    } else {
                        include_once $entryPath;
                    }
                }
            }
            closedir($handle);
        }
    }

}

//This mechanism allows us to define the loading order and to load the directory plugin after this one
add_action( 'plugins_loaded', array ( 'nflTeamsPlugin', 'getInstance' ), 10);
