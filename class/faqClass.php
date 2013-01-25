<?php
require_once("MySqlDatabase.class.php");
 class Faq
{


public static function find_faq()
{
	global $database;
    $query = "SELECT * FROM `faq`";
	$database->fire_query($query);

}

public static function show_faq_eng()
{

	global $database;
	
	$query = "SELECT * FROM `faq`";
	
	$result = $database->fire_query($query);
	
	while( $row  = mysql_fetch_array($result))
 {
	echo"<tr>
		   <td>{$row['ID']}</td>
			 <td>{$row['Question']}</td>
			 <td>{$row['Answer']}</td>
		</tr>";
}
	}
	
public static function show_faq_ned()
{

	global $database;
	
	$query = "SELECT * FROM `faq`";
	
	$result = $database->fire_query($query);
	
	while( $row  = mysql_fetch_array($result))
 {
	echo"<tr>
		   <td>{$row['ID']}</td>
			 <td>{$row['Vraag']}</td>
			 <td>{$row['Antwoord']}</td>
		</tr>";
}
	}
		}








?>