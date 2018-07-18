<?php
	$connection=new mysqli("localhost", "root", "", "forum");
	if($connection->connect_error){
		echo "Error with db connection.";
	}
?>
