<?php
/**
 * @package AdminSubmenu
 */

/**
 * Plugin Name: Admin Submenu Employees
 * Plugin URI: #
 * Description: This is a plugin with an admin menu and 2 submenus
 * Version: 1.0.0
 * License: GPL v2 or later
 * License URI: #
 * Author: Wilson
 * Author URI:#
 * Text Domain: admin-submenu
 */


/* A security check to make sure that the file is not being accessed directly. */
defined('ABSPATH') or die('Hey you, gerarahia!');


/* Checking if the file exists and if it does, it will require it. */
if(file_exists(dirname(__FILE__). '/vendor/autoload.php')){
    require_once dirname(__FILE__). '/vendor/autoload.php';
}

function activate_externally(){
    Inc\Base\Activate::activate();
}

function deactivate_externally(){
    Inc\Base\Deactivate::deactivate();
}

register_activation_hook(__FILE__, 'activate_externally');
register_deactivation_hook(__FILE__, 'deactivate_externally');

/* Checking if the class exists and if it does, it will register the services. */
if(class_exists('Inc\\Init')){
    Inc\Init::register_services();
}