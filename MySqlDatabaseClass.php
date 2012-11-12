<?php
require_once('config/config.php');
//Dit is de class definitie van de MySqlDatabase class
class MySqlDatabaseClass
{
	//Fields
	private $db_connection;

	//Dit is de constructor van de class
	public function __construct()
	{
		$this->db_connection = mysql_connect( SERVERNAME, USERNAME, PASSWORD)
			or die('MySqlDatabaseClass: '.mysql_error());
		mysql_select_db(DATABASE, $this->db_connection)
			or die('MySqlDatabaseClass: '.mysql_error());

	}

	//Methode om query's naar de database te sturen.
	public function fire_query($query)
	{
		$result = mysql_query($query, $this->db_connection) 
			or die ('MySqlDatabaseClass: '.mysql_error());
		return $result;
	}
}
//Maak nu een instantie van de MySqlDatabaseClass class;
$database = new MySqlDatabaseClass();
?>