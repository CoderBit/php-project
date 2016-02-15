<!--<?php
require 'connect.inc.php';

ob_start();
session_start();
echo $current_file = $_SERVER['SCRIPT_NAME'];


function loggedin(){
	if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) ){
		return true;
	} 
	else{
		return false;
	}
}

?>-->