<?php
	$username="eogletree2";  
    $password="eogletree2";  
    $db_name="eogletree2"; 
    $host = "localhost";  
     
    $conn = mysql_connect($host, $username, $password)or die("cannot connect"); 
    mysql_select_db($db_name)or die("cannot select DB");
?>
	