<?php
// contact maken met data base gamelibrary2
require_once("class/UserClass.php");
include("./functions/functions.php");

if ( isset($_POST['submit']))
{
	UserClass::ChangeData($_POST);
	echo "U wijzigingen zijn verwerkt";
}
else
{

?>

<form action='index.php?content=changedata' method='post'>
<table>
<tr>
	<th> wijzig hier je gegevens </th>
</tr>
    <?php echo UserClass::find_users($_POST); ?>    
	</table>

			
	</form>

<?php
 }
?>