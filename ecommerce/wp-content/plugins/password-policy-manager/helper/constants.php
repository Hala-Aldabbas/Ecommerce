<?php
    
class MOPPM_Constants
{
    const HOST_NAME                 = "https://login.xecurify.com";
    const DEFAULT_CUSTOMER_KEY      = "16555";
    const DEFAULT_API_KEY           = "fFd2XcvTGDemZvbw1bcUesNJWEqKbbUq";
    const DB_VERSION                = 2;
    function __construct()
    {
        $this->define_global();
    }

    function define_global()
    {
        global $moppm_db_queries,$moppm_utility,$moppm_dirname;
        $moppm_db_queries   = new MOPPM_DATABASE();
        $moppm_dirname      = plugin_dir_path(dirname(__FILE__));
    }
}
    new MOPPM_Constants;
