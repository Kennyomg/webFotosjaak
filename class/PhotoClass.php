<?php
require_once("MySqlDatabaseClass.php");
define('NUMBER_OF_PHOTOS', 3 );
	class PhotoClass
	{
	
		// fields
		private $foto_id;
		private $order_id;
		private $photo_name;
		private $photo_text;
		
		// contructor
		
		public static function find_by_sql( $query )	
		{
			global $database;// globale variable database
			$result = $database->fire_query( $query);//vestuurt het resulataat naar de database
			$object_array = array();
			
			while ($row = mysql_fetch_object ( $result ) )
			{
			 $object = new PhotoClass();
			 $object->photo_id = $row->photo_id;
			 $object->order_id= $row->order_id;
			 $object->photo_name = $row->photo_name;
			 $object->photo_text = $row->photo_text;
			 $object_array[] = $object;
			 
			}
			return $object_array;// vraagt de array object_arrray terug met de de nieuwe invormatie
		}
		
		public static function insert_into_photo($order_id,$photo_name,$photo_text)
		{
		global $database;
			$query = "INSERT INTO `photo` (`photo_id`, `order_id`, `photo_name`, `photo_text`) VALUES (NULL, '".$order_id."', '".$photo_name."', '".$photo_text."');";
			$database->fire_query( $query );
		}
		
		public static function show_photos($order_id, $user_id)
		{
		$query = "SELECT * FROM `photo` WHERE `order_id` = '{$order_id}'";
		$result = self::find_by_sql($query);
		//var_dump($result);
		if (!empty($result))
		{
			$teller = 0;
			echo "<tr>";
			foreach ($result as $photo)
			{
				if ( $teller != NUMBER_OF_PHOTOS )
				{
					echo "<td>
							<img src='./fotos/{$user_id}/{$order_id}/thumbnails/tn_{$photo->photo_name}' alt='tn_{$photo->photo_name}' />
							<div>
								{$photo->photo_text}
							</div>
						  </td>";
					$teller++;
				}
				else
				{
					echo "</tr>
						  <tr>
							<td>
								<img src='./fotos/{$user_id}/{$order_id}/thumbnails/tn_{$photo->photo_name}' alt='tn_{$photo->photo_name}' />
								<div>
									{$photo->photo_text}
								</div>
							  </td>";
					$teller = 1;
				}
			}
			echo "</tr>";
		}
		else
		{
			echo "<tr>
					<td>Er zijn nog geen foto's beschikbaar</td>
				  </tr>";
		}
	}
	}

?>