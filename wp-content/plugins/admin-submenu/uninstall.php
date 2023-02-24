<?php
/**
 * @package AdminSubmenu
 */

/**
 * Trigger this file on plugin install
 */

 /*-------------------------------------------------------------------------*/
/*                        SECURITY CHECK                                   */
/*-------------------------------------------------------------------------*/
if(! defined('WP_UNINSTALL_PLUGIN')){
    die;
}

 /*-------------------------------------------------------------------------*/
/*                        CLEAR DATABASE DATA                              */
/*-------------------------------------------------------------------------*/

//Access database via SQL

global $wpdb;
$wpdb->query("DELETE * FROM wp_admin_employeeS");