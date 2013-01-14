<?php
require_once("class/OrderClass.php");
	if(isset($_POST['submit']))
	{
		echo "Er is op de knop gedrukt";
		OrderClass::update_charge_by_id($_POST['order_id'],$_POST['pricetag']);

	}
	else
	{
?>
		<table>
			<caption>Geef een prijs in euro's</caption>
			<form action='index.php?content=pricetag' method='post' />
				<tr>
					<td>
						<input type='text' name='pricetag' />
					</td>
				</tr>
				<tr>
					<td>
						<input type='submit' name='submit' value='verstuur' />
					</td>
				</tr>
				<input type='hidden' name='user_id' value='<?php echo $_GET["user_id"] ?>' />
				<input type='hidden' name='order_id' value='<?php echo $_GET["order_id"] ?>' />
			</form>
		</table>
<?php } ?>