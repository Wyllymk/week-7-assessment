<?php
/**
 * @package AdminSubmenu
 */

 namespace Inc\Pages;

 use \Inc\Api\SettingsApi;
 use \Inc\Api\Callbacks\AdminCallbacks;
 
 class Admin{

   public $settings;

   public $callbacks;

   public $pages = array();

   public $subpages = array();

   public function register(){
      $this->settings = new SettingsApi();

      $this->callbacks = new AdminCallbacks();

      $this->setPages();

      $this->setSubPages();

      $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
   }

  public function setPages(){

   $this->pages = array(
      [
      'page_title'   =>    'Admin Menu',
      'menu_title'   =>    'Admin Menu',
      'capability'   =>    'manage_options',
      'menu_slug'    =>    'admin_menu',
      'callback'     =>    array( $this->callbacks, 'adminDashboard' ),
      'icon_url'     =>    'dashicons-admin-site-alt',
      'position'     =>    110
      ]

   );

  }
  public function setSubPages(){

   $this->subpages = array(
      [
         'parent_slug'  =>   'admin_menu',
         'page_title'   =>   'Create Employees',
         'menu_title'   =>   'Create Employees',
         'capability'   =>   'manage_options',
         'menu_slug'    =>   'create_employees',
         'callback'     =>   array($this->callbacks, 'createEmployees'),
      ],
      [
         'parent_slug'  =>   'admin_menu',
         'page_title'   =>   'View Employees',
         'menu_title'   =>   'View Employees',
         'capability'   =>   'manage_options',
         'menu_slug'    =>   'view_employees',
         'callback'     =>   array($this->callbacks, 'viewEmployees'),
      ]
   );

  }

}