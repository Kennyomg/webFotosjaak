<?php
	require_once("./class/LoginClass.php");
	if (isset($_POST['submit']))
	{
		if ( !strcmp($_POST['pass'], $_POST['pass-check']))
		{
			//echo "Sla het nieuwe wachtwoord op";
			LoginClass::update_password($_POST['email'], $_POST['pw']);
		}
		else
		{
			echo "Kies opnieuw een wachtwoord";
		}
	}
	else
	{
?>
welkom op de site. Uw account wordt geactiveerd nadat u <br />
<form action='' method=''>
	<table>
		<tr>
			<td></td>
			<td><input type='password' name='pass' size=12 maxlenght=12 /></td>
		</tr>
		<tr>
			<td></td>
			<td><input type='password' name='pass-check' size=12 maxlenght=12 /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td<input type='submit' name='submit' value='Verstuur'/>
				<input type='hidden' name='email' value='<?php echo $_GET['em']; ?>' />
			</td>
		</tr>
	</table>
	<?php
	}
	?>