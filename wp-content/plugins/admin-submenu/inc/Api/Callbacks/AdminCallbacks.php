<?php
/**
 * @package AdminSubmenu
 */


 namespace Inc\Api\Callbacks;

use \Inc\Base\Controller;

 class AdminCallbacks extends Controller{

    public function adminDashboard(){
        return require_once("$this->plugin_path/templates/Dashboard.php");
    }
    public function createEmployees(){
        return require_once("$this->plugin_path/templates/CreateEmployees.php");
    }
    public function viewEmployees(){
        return require_once("$this->plugin_path/templates/ViewEmployees.php");
    }
   
 }