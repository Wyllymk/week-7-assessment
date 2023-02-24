<?php
/**
 * @package AdminSubmenu
 */

 namespace Inc\Base;

 class Employee{
/*-------------------------------------------------------------------------*/
/*                        FETCHING DATA FROM DB                            */
/*-------------------------------------------------------------------------*/
    function register(){
        global $wpdb;
        $table = $wpdb->prefix.'admin_employeeS';

        $this->create_table_admin_employee();

        $this->pass_data_to_admin_employee();

        $this->deleteEmployee();
    }

    function create_table_admin_employee(){
        global $wpdb;
        $table = $wpdb->prefix.'admin_employees';
        $charset_collate = $wpdb->get_charset_collate();

        $admin_employee_details = "CREATE TABLE IF NOT EXISTS $table(
            employee_id bigint unsigned NOT NULL auto_increment,
            event_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            firstname text NOT NULL,
            lastname text NOT NULL,
            email varchar(35) NOT NULL,
            phone int NOT NULL,
            PRIMARY KEY (employee_id)
        ) $charset_collate;";

        require_once(ABSPATH.'wp-admin/includes/upgrade.php');
        dbDelta($admin_employee_details);
    }

    function pass_data_to_admin_employee(){
        if(isset($_POST['submitemployee'])){
            $data = array(
                'firstname' => $_POST['firstname'],
                'lastname'  =>  $_POST['lastname'],
                'email'     =>  $_POST['email'],
                'phone'   =>  $_POST['phone']

            );
            global $wpdb;
            $table = $wpdb->prefix.'admin_employees';
            $result = $wpdb->insert($table, $data, $format=NULL);
            
            if($result==true){
                echo '<script>alert("Employee Form Submitted Successfully");</script>' ;
            }else{
                echo '<script>alert("Employee Form Not Submitted");</script>' ;
            }
        }
    }
    public function deleteEmployee(){
        if(isset($_POST['delbtnemployee'])){
        global $wpdb;
        $table = $wpdb->prefix.'admin_employees';
        
        $id = $_POST['id'];

        $results = $wpdb->delete($table, array('employee_id' => $id));

        if($results==true){
            echo "<script>alert('Employee deleted successfully')</script>";
        }else{
            echo "<script>alert('Employee Deletion failed')</script>";
        }
        }
    }
}