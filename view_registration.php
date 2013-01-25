<?php

require_once("class/UserClass.php");
include("functions/functions.php");
if ( isset($_POST['submit']))
{
	UserClass::ChangeDataSjaak($_POST);
					
	echo "U wijzigingen zijn verwerkt";

}
if ( isset($_GET['ID']) )
{
	if($_GET['action'] == 'edit')
	{
	
				
?><center>
 <h4> Gegevens van <?php UserClass::show_firstname();?></h4>


				
		<form action='index.php?content=view_registration' method='post'>
		<!--<form action='<?php //echo "index.php?content=view_registration&ID=".$_POST["id"] ?>' method='post'> -->
		<table>
		<?php UserClass::find_customers($_POST); ?>
		</table>

		</form>
		</center>
		
<?php
	}
	
	if ($_GET['action'] == 'drop')
	{	
		UserClass::delete_user($_POST);
		
		header('refresh:0;url=index.php?content=view_registration');
	}
}
else
{
UserClass::find_user_info($_POST);

?>
<center>
<h4>view registration</h4>


<table>

	<tr>
			<th>ID</th>
			<th>Voornaam</th>
			<th>Achternaam</th>
			<th>info</th>
			<th>remove</th>
			
	</tr></center>
	<?php
	UserClass::options($_POST);
	?>


</table>
<?php
}
?>