<?php 
	require_once("class/MySqlDatabaseClass");
	$query = "INSERT INTO `login` ( `id`,
										`username`,
										`password`,
										`userrole`,
										`activated`)
							VALUES 	  (	NULL,
										'test@gmail.com',
										'geheim',
										'sjaak',
										'yes')";
	//echo $query."<br />";
	$database->fire_query($query);
?>
