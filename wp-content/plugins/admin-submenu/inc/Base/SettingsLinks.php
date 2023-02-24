<?php
/**
 * @package AdminSubmenu
 */

 namespace Inc\Base;

 use \Inc\Base\Controller;

 class SettingsLinks extends Controller{

    public function register(){
        add_filter("plugin_action_links_$this->plugin_name", array($this, 'settings_link'));
    }
    public function settings_link($links){
    $settings_link = '<a href="admin.php?page=admin_menu">Settings</a>';
    array_push($links, $settings_link); 
    return $links;
    }
 }
