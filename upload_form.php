<?php
	require_once("class/PhotoClass.php");

	if(isset($_POST['submit']))
	{
		//var_dump($_FILES['foto']);
		//Zet in deze array alle bestandtypen(mime-types) die je accepteert als uploadfile
		$mime_type = array('image/png','image/jpeg', 'image/pjpeg', 'image/gif');

		//Check of het geuploade bestand een correct mime-type heeft

		if(in_array( $_FILES['foto']['type'], $mime_type))
		{
			$dir = 'fotos/'.$_POST["user_id"]."/".$_POST["oder_id"]."/";
			//echo $dir; exit();
			if( !file_exists($dir))
			{
				mkdir($dir, 0777, true);
				mkdir($dir."thumbnails/", 0777, true);
			}

			if(is_uploaded_file($_FILES['foto']['tmp_name']))
			{
				move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$_FILES['foto']['name']);
			}

			define('THUMB_SIZE', 80);
			$path_photo = $dir.$_FILES['foto']['name'];
			$path_thumbnail = $dir."thumbnails/tn_".$_FILES['foto']['name'];
			$specs_image = getimagesize($path_photo);
			$ratio_image = $specs_image[0]/$specs_image[1];
			//Als $ratio_image > 1 => landscape foto. Als gene < 1 => portrait foto. als gene == 1 => square foto
			if($ratio_image >= 1)
			{
				//Landscape
				$tn_width = THUMB_SIZE;
				$tn_height = THUMB_SIZE / $ratio_image;
			}
			else
			{
				$tn_height = THUMB_SIZE;
				$tn_width = THUMB_SIZE * $ratio_image;
			}

			$thumb = imagecreatetruecolor($tn_width, $tn_height);

			//Kijk welk mime-type de foto is.
			switch($_FILES['foto']['type'])
			{
				case 'image/jpeg':
					$source = imagecreatefromjpeg($path_photo);
					imagecopyresampled($thumb, $source, 0, 0, 0, 0, $tn_width, $tn_height, $specs_image[0], $specs_image[1]);
					imagejpeg($thumb, $path_thumbnail, 100);
				break;
				case 'image/png':
					$source = imagecreatefrompng($path_photo);
					imagecopyresampled($thumb, $source, 0, 0, 0, 0, $tn_width, $tn_height, $specs_image[0], $specs_image[1]);
					imagepng($thumb, $path_thumbnail, 9);
				break;
				case 'image/gif':
					$source = imagecreatefromgif($path_photo);
					imagecopyresampled($thumb,$source,0,0,0,0,$tn_width,$tn_height,$specs_image[0],$specs_image[1]); 		
					imagegif($thumb,$path_thumbnail);
		
				case 'image/png':
					$source = imagecreatefromgif($path_photo);
					imagecopyresampled($thumb, $source, 0, 0, 0, 0, $tn_width, $tn_height, $specs_image[0], $specs_image[1]);
					imagegif($thumb, $path_thumbnail);
				break;
				default:
				break;
			}

			PhotoClass::insert_into_photo($_POST['order_id'], $_FILES['foto']['name'], $_POST['beschrijving']);
			echo "Het uploaden van betand met de naam: ".$_FILES['foto']['name']." is niet toegestaan.
			U word doorgestuurd naar de uploadpagina";
			header("refresh:4;url=index.php?content=upload_form&user_id=".$_POST["user_id"]."&order_id=".$_POST["order_id"]);
		

		}
		else
		{
			echo "Het uploaden van betanden met de extentie: ".$_FILES['foto']['type']." is voltooid.
			U word doorgestuurd naar de uploadpagina";
			header("refresh:4;url=index.php?content=upload_form&user_id=".$_POST["user_id"]."&order_id=".$_POST["order_id"]);
		}


	}
	else
	{
?>
		<table>
			<?php PhotoClass::show_photos($_GET["user_id"],$_GET["order_id"]);?>
		</table>
		
		<form action='index.php?content=upload_form' method'post' enctype='multipart/form-data' >
			<table>
				<tr>
					<td>Kies een foto</td>
					<td><input type='file' name='foto' /></td>
				</tr>
				<tr>
					<td>Beschrijving foto</td>
					<td><textarea cols='50' rows='5' name='beschrijving'></textarea></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type='submit' name='submit' value='verstuur' /></td>
				</tr>
			</table>
			<input type='hidden' name='user_id' value='<?php echo $_GET["user_id"]; ?>' />
			<input type='hidden' name='Order_id' value='<?php echo $_GET["order_id"]; ?>' />
		</form>
<?php
	}
?>