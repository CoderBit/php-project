<?php 
  $mysql_host = 'localhost';
  $mysql_user = 'root';
  $mysql_pass = '';

  if( !@mysql_connect($mysql_host,$mysql_user,$mysql_pass) || !@mysql_select_db('jerry') ){
    die('Could not connect to database');
  }
  
  ob_start();
  session_start();
  
?>