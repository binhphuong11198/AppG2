<?php 
	/**
	 * summary
	 */
	class user
	{
	    var $username;
	    var $password;
	    var $fullname;
	    function user($username, $password, $fullname){
	    	$this->username=$username;
	    	$this->password=$password;
	    	$this->fullname=$fullname;
	    }
	    static function authentication($username, $password){
	    	if ($username=="binhphuong123@gmail.com" && $password =="123") {
	    		return new user($username, $password, $fullname);
	    	}
	    	else return null;
	    }
	}
 ?>