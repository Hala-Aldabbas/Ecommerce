<?php
class MOPPM_DATABASE
{
    private $linkDetailsTable;
    function __construct()
    {
        global $wpdb;
        $this->Report_Table   = $wpdb->base_prefix.'moppm_user_report_table';
    }
    function plugin_activate()
    {
        add_site_option('moppm_activated_time', time());
        add_site_option('Moppm_enable_disable_ppm','on');
        global $wpdb;
        if ( ! get_site_option( 'moppm_dbversion' ) ) {
            update_site_option( 'moppm_dbversion', MOPPM_Constants::DB_VERSION );
            $this->generate_tables();
        } else {
            $current_db_version = get_site_option( 'moppm_dbversion' );
            if ( $current_db_version < MOPPM_Constants::DB_VERSION ) {

                update_site_option( 'moppm_dbversion', MOPPM_Constants::DB_VERSION );
                $this->generate_tables();
            }
        }
    }
   
    function generate_tables()
    {
        global $wpdb;
        
            $tableName = $this->Report_Table;
            if($wpdb->get_var("show tables like '$tableName'") != $tableName) 
            {
                $sql = "CREATE TABLE " . $tableName . " (
                `id` int NOT NULL AUTO_INCREMENT, `user_email` mediumtext NOT NULL, `Login_time` mediumtext,
                `Logout_time` mediumtext, UNIQUE KEY id (id) );";
                dbDelta($sql);
            }   
       
    }
    function get_Report_list()
        {
           global $wpdb;
           $tableName = $this->Report_Table;
            return $wpdb->get_results("SELECT id,user_email,Login_time,Logout_time input FROM ".$tableName);
        }
    function insert_report_list($user_id,$email,$log_time,$log_out_time) 
    {
        global $wpdb;
        $sql = "INSERT INTO $this->Report_Table(id,user_email,Login_time,Logout_time) VALUES(%s,%s,%s,%s) ON DUPLICATE KEY UPDATE Login_time=%s";

        $query=$wpdb->prepare($sql,array($user_id,$email,$log_time,$log_out_time,$log_time));
        $wpdb->query( $query); 
            
    }
    function delete_report_list($user_id) 
    {
        global $wpdb;
        $query=$wpdb->prepare("DELETE FROM {$this->Report_Table} WHERE id = %s",array($user_id));
        $wpdb->query($query);
        return;  
    }
    function clear_report_list() 
    {
        global $wpdb;
        $wpdb->query( "DELETE FROM {$wpdb->prefix}moppm_user_report_table");
        return;
    }

    function update_report_list($user_id,$log_out_time)
    { 
         global $wpdb;

         $sql1= "UPDATE $this->Report_Table SET Logout_time= %s  WHERE id = %s ";
         
         $query=$wpdb->prepare($sql1,array($log_out_time,$user_id));
         
         $wpdb->query($query);
    }

}
