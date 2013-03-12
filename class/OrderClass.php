<?php
 require_once("MySqlDatabaseClass.php");
 require_once("UserClass.php");
 require_once("LoginClass.php");
 require_once("DateFormatClass.php");
 require_once("DbFormatClass.php");

 class OrderClass
 {
	//Fields
	private $order_id;
	private $user_id;
	private $order_short;
	private $order_long;
	private $deliverydate;
	private $eventdate;
	private $color_pictures;
	private $number_of_pictures;
	private $orderdate;
	private $confirmed;
	private $charge;
	private $confirm_charge;
	private $paid;
	
	//Constructor
	public function __construct()
	{
		
	}

	public static function find_by_sql( $query )
	{
		global $database;
		$result = $database->fire_query( $query );
		$object_array = array();
		while ( $row = mysql_fetch_object( $result ) )
		{
			$object = new OrderClass();
			$object->order_id = $row->order_id;
			$object->user_id = $row->user_id;
			$object->order_short = $row->order_short;
			$object->order_long = $row->order_long;
			$object->deliverydate = $row->deliverydate;
			$object->eventdate = $row->eventdate;
			$object->color_pictures = $row->color_pictures;
			$object->number_of_pictures = $row->number_of_pictures;
			$object->orderdate = $row->orderdate;
			$object->confirmed = $row->confirmed;
			$object->charge = $row->charge;
			$object->confirm_charge = $row->confirm_charge;
			$object->paid = $row->paid;
			$object_array[] = $object;		
		}
		return $object_array;
	}
	
	public static function insert_into_Order( $postarray )
	{
		global $database;
		//Datum genereren
		$date = date("Y-m-d H:i:s");
		//echo $date; exit();
		$query = "INSERT INTO `order` (`order_id`,
									   `user_id`,
									   `order_short`,
									   `order_long`,
									   `deliverydate`,
									   `eventdate`,
									   `color_pictures`,
									   `number_of_pictures`,
									   `orderdate`,
									   `confirmed`,
									   `charge`,
									   `confirm_charge`
									   `paid`) 
							  VALUES ( Null,
									   '".$_SESSION['user_id']."',
									   '".$postarray['order_short']."',
									   '".$postarray['order_long']."',
									   '".date("Y-m-d", strtotime($postarray['deliveryDate']))."',		
									   '".date("Y-m-d", strtotime($postarray['eventDate']))."',
									   '".$postarray['color']."',
									   '".$postarray['numberOfPictures']."',
									   '".$date."',
									   'no',
									   '0',
									   'no',
									   'no')";
		$database->fire_query($query);
		$order_id = mysql_insert_id();
		self::send_orderactivation_email($postarray, $order_id, $date);
		echo "U opdracht is goed ontvangen. U krijgt een bevestigingsmail toegestuurd. Nadat u op de 	bevestigingslink heeft geklikt is de opdracht definitief.";
		header("refresh:4;url=index.php?content=customerHomepage");
	}

	public static function send_orderactivation_email($postarray, $order_id, $date)
	{
		$user = UserClass::find_firstname_infix_surname(); 
		$carbonCopy = "sjaak@fotosjaak.nl";
		$blindCarbonCopy = "info@belastingdienst.nl";
		$ontvanger = LoginClass::find_by_id_email($_SESSION['user_id']);
		$password = LoginClass::find_by_id_password($_SESSION['user_id']);
		$onderwerp = "Activatiemail website FotoSjaak";
		 
		$bericht   = "Geachte heer/mevrouw <b>".$user->get("firstname").
					 " ".$user->get("infix").
					 " ".$user->get("surname")."</b><br /><br />
					  Wij hebben de onderstaande order van u ontvangen.<br />
					  <table border='1'>
						<tr>
							<td>Uw order-id</td>
							<td>".$order_id."</td>
						</tr>
						<tr>
							<td>Korte omschrijving opdracht</td>
							<td>".$postarray['order_short']."</td>
						</tr>
						<tr>
							<td>Uitgebreide omschrijving opdracht</td>
							<td>".$postarray['order_long']."</td>
						</tr>
						<tr>
							<td>Opleveringsdatum</td>
							<td>".$postarray['deliveryDate']."</td>
						</tr>
						<tr>
							<td>Datum van het evenement</td>
							<td>".$postarray['eventDate']."</td>
						</tr>
						<tr>
							<td>Uw foto's worden gemaakt in</td>
							<td>".$postarray['color']."</td>
						</tr>
						<tr>
							<td>Aantal foto's dat wordt gemaakt</td>
							<td>".$postarray['numberOfPictures']."</td>
						</tr>
						<tr>
							<td>Datum van de aanvraag</td>
							<td>".date("d-m-Y", strtotime($date))."</td>
						</tr>
						<tr>
							<td>Tijdstip van de aanvraag</td>
							<td>".date("H:i:s", strtotime($date))."</td>
						</tr>
					  </table>
					  Wanneer u op de onderstaande link klikt, gaat u akkoord met<br />
					  de algemene voorwaarden en is de order definitief.<br />
					  <a href='http://localhost/2012-2013/AM1A/Blok2/index.php?content=confirmOrder&order_id=".$order_id."&user_name=".$ontvanger."&password=".$password."'>bevestig order</a><br /><br />
					  Met vriendelijke groet,<br />
					  <i><u>Sjaak de Vries</u></i><br />
					  uw fotograaf";
					  
		$headers   = "From: info@fotosjaak.nl\r\n";
		$headers  .= "Reply-To: info@fotosjaak.nl\r\n"; 
		$headers  .= "Cc: ".$carbonCopy."\r\n";
		$headers  .= "Bcc: ".$blindCarbonCopy."\r\n";
		$headers  .= "X-mailer: PHP/".phpversion()."\r\n";
		$headers  .= "MIME-version: 1.0\r\n";
		$headers  .= "Content-Type: text/html; charset=iso-8859-1\r\n";
		mail( $ontvanger, $onderwerp, $bericht, $headers );
	}
	
	public static function confirm_order_by_id($order_id)
	{
		global $database;
		//TODO check of de persoon die deze order op confirmed wil zetten wel de
		//persoon is die deze opdracht geplaatst heeft.
		$query = "UPDATE `order` SET  `confirmed` =  'yes'
				  WHERE  `order_id` = '".$order_id."'";
		$database->fire_query($query);
	}
	
	public static function find_orders_users()
	{
		global $database;
		$query = "SELECT * FROM `order`, `user`
				  WHERE `order`.`user_id` = `user`.`id`
				  ORDER BY `user_id`";
		$result = $database->fire_query($query);
		$rows = "";
		$previous = "";
		while ( $object = mysql_fetch_object($result))
		{
			//var_dump($object);
			$current = $object->user_id;
			if ( $current != $previous )
			{
				$rows .= "<tr>
							<td colspan='5' >
								id = [".$object->user_id."] "
									   .$object->firstname." "
									   .$object->infix." "
									   .$object->surname."
							</td>
						  </tr>";
			}
			$previous = $current;
			
			if ($object->charge == 0.00)
			{
				$charge = "<a href='index.php?content=pricetag&order_id={$object->order_id}&user_id={$object->user_id}'>".$object->charge."</a>";
			}
			else
			{
				$charge = $object->charge;
			}
			
			$rows .= "<tr>
						<td>".$object->order_id."</td>
						<td>".$object->order_short."</td>
						<td>
							Oplevering: ".DateFormat::change($object->deliverydate)."<br />
							Evenement: ".DateFormat::change($object->eventdate)."<br />
							Plaatsing: ".DateFormat::change($object->orderdate)."<br />
						</td>
						<td>".$object->number_of_pictures."</td>
						<td>".DbFormat::translate_color($object->color_pictures)."</td>
						<td>
							<a href='index.php?content=update_paid&order_id={$object->order_id}&charge={$object->charge}'>".DbFormat::translate_paid($object->paid)."</a>
						</td>
						<td>".DbFormat::translate_confirmed($object->confirmed)."</td>
						<td>{$charge}</td>
						<td>
							<a href='index.php?content=upload_form&user_id={$object->user_id}&order_id={$object->order_id}'>
								<img src='img/plus.png' alt='upload' />
							</a>
						</td>
					  </tr>";
		}
		return $rows;
	}
	
	public static function update_charge_by_id($order_id, $charge)
	{
		global $database;
		$query = "UPDATE `order` SET `charge` = '{$charge}' WHERE `order_id` = '{$order_id}'";
		$database->fire_query($query);
		self::send_pricetag_email($order_id);
		echo "De prijs van de opdracht is weggeschreven naar de database. Er wordt een mailtje gestuurd naar de opdrachtgever";
		header("refresh:400;url=index.php?content=opdrachten");		
	}
	
	public static function find_orders_by_id()
	{
		global $database;
		$query = "SELECT * FROM `order`, `user`
				  WHERE `order`.`user_id` = `user`.`id`
				  AND `user`.`id` = '{$_SESSION['user_id']}'
				  ORDER BY `user_id`";
		$result = $database->fire_query($query);
		$rows = "";
		$previous = "";
		while ( $object = mysql_fetch_object($result))
		{
			//var_dump($object);
			$current = $object->user_id;
			if ( $current != $previous )
			{
				$rows .= "<tr>
							<td colspan='9' >
								id = [".$object->user_id."] "
									   .$object->firstname." "
									   .$object->infix." "
									   .$object->surname."
							</td>
						  </tr>";
			}
			$previous = $current;
			
			$rows .= "<tr>
						<td>
							<a href='index.php?content=show_fotos&user_id={$object->user_id}&order_id={$object->order_id}'>".$object->order_id."</a>
						</td>
						<td>".$object->order_short."</td>
						<td>
							Oplevering: ".DateFormat::change($object->deliverydate)."<br />
							Evenement: ".DateFormat::change($object->eventdate)."<br />
							Plaatsing: ".DateFormat::change($object->orderdate)."<br />
						</td>
						<td>".$object->number_of_pictures."</td>
						<td>".DbFormat::translate_color($object->color_pictures)."</td>
						<td>".DbFormat::translate_paid($object->paid)."</td>
						<td>".DbFormat::translate_confirmed($object->confirmed)."</td>
						<td>";
						if ($object->confirm_charge == 'no' && $object->charge != 0 )
						{
							$rows .= "<a href='index.php?content=bevestigen_prijs&order_id={$object->order_id}&charge={$object->charge}'>".round($object->charge, 0)."</a>";
						}
						else
						{
							$rows .= round($object->charge, 0);
						}
							$rows .="
						</td>
						<td>
							{$object->confirm_charge}
						</td>
					  </tr>";
		}
		return $rows;	
	}
	
	public static function confirm_charge_by_order_id($order_id)
	{
		global $database;
		$query = "UPDATE `order` SET `confirm_charge` = 'yes' WHERE `order_id` = ' {$order_id}'";
		$database->fire_query($query);
		echo "U heeft de prijs bevestigd. U wordt doorgestuurd naar de opdrachten pagina";
		header("refresh:4;url=index.php?content=opdrachten_customer");
	}
	
	public static function confirm_paid_by_order_id($order_id)
	{
		global $database;
		$query = "UPDATE `order` SET `paid` = 'yes' WHERE `order_id` = ' {$order_id}'";
		$database->fire_query($query);
		echo "U heeft de betaling bevestigd. U wordt doorgestuurd naar de opdrachten pagina";
		header("refresh:4;url=index.php?content=opdrachten");
	}
	
	public static function send_pricetag_email($order_id)
	{
		global $database;
		$query = "SELECT * FROM `order`, `login`, `user`
				  WHERE `order`.`order_id` = {$order_id}
				  AND `order`.`user_id` = `login`.`id`
				  AND `order`.`user_id` = `user`.`id`";
		$result = $database->fire_query($query);
		$object =  mysql_fetch_object($result);
		//var_dump($object);
		
		$carbonCopy = "sjaak@fotosjaak.nl";
		$blindCarbonCopy = "info@belastingdienst.nl";
		$ontvanger = $object->username;
		$password = "";
		$onderwerp = "Prijsopgave".$object->order_short;
		 
		$bericht   = "Geachte heer/mevrouw <b>".$object->firstname.
					 " ".$object->infix.
					 " ".$object->surname."</b><br /><br />
					  Wij hebben de onderstaande order van u ontvangen.<br />
					  <table border='1'>
						<tr>
							<td>Uw order-id</td>
							<td>".$object->order_id."</td>
						</tr>
						<tr>
							<td>Korte omschrijving opdracht</td>
							<td>".$object->order_short."</td>
						</tr>
						<tr>
							<td>Uitgebreide omschrijving opdracht</td>
							<td>".$object->order_long."</td>
						</tr>
						<tr>
							<td>Opleveringsdatum</td>
							<td>".$object->deliverydate."</td>
						</tr>
						<tr>
							<td>Datum van het evenement</td>
							<td>".$object->eventdate."</td>
						</tr>
						<tr>
							<td>Uw foto's worden gemaakt in</td>
							<td>".$object->color_pictures."</td>
						</tr>
						<tr>
							<td>Aantal foto's dat wordt gemaakt</td>
							<td>".$object->number_of_pictures."</td>
						</tr>
						<tr>
							<td>Datum van de aanvraag</td>
							<td>".date("d-m-Y", strtotime($object->orderdate))."</td>
						</tr>
						<tr>
							<td>Tijdstip van de aanvraag</td>
							<td>".date("H:i:s", strtotime($object->orderdate))."</td>
						</tr>
					  </table>
					  Ik heb voor de bovenstaande opdracht een offerteprijs berekend van: ".round($object->charge, 2)."<br />
					  U kunt via de website akkoord gaan met dit bedrag waarmee de transactie definitief is.<br />
					  <br />
					  Met vriendelijke groet,<br />
					  <i><u>Sjaak de Vries</u></i><br />
					  uw fotograaf";
					  
		$headers   = "From: info@fotosjaak.nl\r\n";
		$headers  .= "Reply-To: info@fotosjaak.nl\r\n"; 
		$headers  .= "Cc: ".$carbonCopy."\r\n";
		$headers  .= "Bcc: ".$blindCarbonCopy."\r\n";
		$headers  .= "X-mailer: PHP/".phpversion()."\r\n";
		$headers  .= "MIME-version: 1.0\r\n";
		$headers  .= "Content-Type: text/html; charset=iso-8859-1\r\n";
		mail( $ontvanger, $onderwerp, $bericht, $headers );
		header("refresh:4;url=index.php?content=opdrachten");
	}
 }
 
 
?>