<?php
Class Dase_User_Exception extends Exception {}

/* the idea here is to enable the dase framework to be used independently of
 * the dase application and so we need a generic user class to instantiates
 * whatever user class the app is supplying 
 */

Class Dase_User 
{
	public $eid;
	public $is_serviceuser;
    public $is_admin;

	function __construct() {}

	public static function get($config)
	{
        return new Dase_User;
    }

	//must be supplied by db user class:
	public function setHttpPassword($token)
	{
		return;
	}

}


