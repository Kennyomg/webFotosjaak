<?php
 require_once("class/OrderClass.php");
 
	if (isset($_POST['submit']))
	{
		OrderClass::confirm_paid_by_order_id($_POST['order_id']);
	}
	else
	{
?>
U bevestigt door het drukken op de onderstaande knop dat de rekening van : <?php echo $_GET['charge']; ?> betaald is<br />
<form action='index.php?content=update_paid' method='post'>
	<input type='submit' name='submit' value='akkoord' />
	<input type='hidden' name='order_id' value='<?php echo $_GET['order_id']; ?>' />
</form>
<?php 
	}
?>