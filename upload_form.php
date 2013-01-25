<?php
require_once("class/PhotoClass.php");
if ( isset($_POST['submit']) )
{
/*
	echo "de volgende gegevens worden doorgestuurd middels het formulier:<br />
	naam van de foto: ".$_FILES['foto']['name']."<br />
	Type foto: ".$_FILES['foto']['type']."<br />
	padnaam tijdelijke opslag foto: ".$_FILES['foto']['tmp_name']."<br/>".
	"Error-nummber: ".$_FILES['foto']['error']." <br />".
	"grote van bestand:".$_FILES['foto']['size']." bytes <br />".
	"Grote van bestand: ".$_FILES['foto']['size']/(1024)." kB <br />";
*/

$mime_type = array('image/png','image/jpeg','image/pjpeg','image/gif');

	if( in_array($_FILES['foto']['type'],$mime_type))
	{
		$dir = 'fotos/'.$_POST['user_id']."/".$_POST['order_id']."/";
		if( !file_exists($dir))
		{
		  mkdir($dir,0777,true);
		  mkdir($dir."thumbnails",0777,true);
		}
		if (is_uploaded_file($_FILES['foto']['tmp_name']))
		{
			move_uploaded_file($_FILES['foto']['tmp_name'],$dir.$_FILES['foto']['name']);
		}
		else
		{
			echo "bestaat al";
		}
		define('THUMB_SIZE',80);
		// pad naar de groto foto
		$path_photo = $dir.$_FILES['foto']['name'];
		// pad naar de thumbnail
		$path_thumbnail = $dir."thumbnails/tn_".$_FILES['foto']['name'];
		// vraag de hoogte en breedte van de orginele foto
		$specs_image = getimagesize($path_photo);
		$ratio_image = $specs_image[0]/$specs_image[1];
		if($ratio_image >= 1)
		{
			//landscape
			$tn_width = THUMB_SIZE;
			$tn_height = THUMB_SIZE/$ratio_image;
		}
		else
		{
			//portrait
			$tn_height = THUMB_SIZE;
			$tn_width = THUMB_SIZE * $ratio_image;
		}
		$thumb = imagecreatetruecolor($tn_width,$tn_height); 
		switch($_FILES['foto']['type'])
		{
		case 'image/jpeg':
		$source = imagecreatefromjpeg($path_photo);
		imagecopyresampled($thumb,$source,0,0,0,0,$tn_width,$tn_height,$specs_image[0],$specs_image[1]); 
		
		imagejpeg($thumb,$path_thumbnail,100);
			break;
		
		case 'image/png':
		$source = imagecreatefrompng($path_photo);
		imagecopyresampled($thumb,$source,0,0,0,0,$tn_width,$tn_height,$specs_image[0],$specs_image[1]); 
		
		imagepng($thumb,$path_thumbnail,9);
		
			break;
			
			
		case 'image/gif':
		$source = imagecreatefromgif($path_photo);
		imagecopyresampled($thumb,$source,0,0,0,0,$tn_width,$tn_height,$specs_image[0],$specs_image[1]); 
		
		imagegif($thumb,$path_thumbnail);
		
		
			break;
		}
		PhotoClass::insert_into_photo($_POST['order_id'],$_FILES['foto']['name'],$_POST['beschrijving']);

		echo "Het uploaden van bestanden met de extentie: ".$_FILES['foto']['type']." is voltooid. <br />
				  Uw wordt door gestuurd naar de upload pagina";
			header("refresh:4;index.php?content=upload_form&user_id=".$_POST['user_id']."&order_id=".$_POST['order_id']."");
	}
	else
	{
			echo "Het uploaden van bestanden met de extentie: ".$_FILES['foto']['type']." is niet toegestaan. <br />
				  Uw wordt door gestuurd naar de upload pagina";
			header("refresh:4;index.php?content=upload_form&user_id=".$_POST['user_id']."&order_id=".$_POST['order_id']."");
	}
	
}
else
{

?>
<table>
<?php PhotoClass::show_photos($_GET['order_id'],$_GET['user_id']); ?>
</table>
<form action='index.php?content=upload_form' method='post' enctype='multipart/form-data' >
	<table>
			
	<tr>
	     <center >toegestaane bestands type( jpeg...gif...png )</center>
		<td>Kies een foto</td>
		<td><input type='file' name='foto'  /></td>
	</tr>
	
	<tr>
		<td>Beschrijving foto</td>
		<td><textarea cols='50' rows='5' name='beschrijving'> </textarea> </td>
	</tr>
	
	
	<tr>
		<td>&nbsp;</td>
		<td><input type='submit' name='submit' value='submit' /></td>
	</tr>
	</table>
	<input type='hidden' name='user_id' value='<?php echo $_GET["user_id"];?>' />
	<input type='hidden' name='order_id' value='<?php echo $_GET["order_id"];?>' />
	
</form>
<?php
}
?>
	