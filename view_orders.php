<?php
require_once("class/orderClass.php");

?>
Opdrachten van klanten
<table>
	<form action='' method=''>
		<tr>
			<th>order_id</th>
			<th>opdracht</th>
			<th>datum</th>
			<th>aantal</th>
			<th>kleur</th>
			<th>betaald</th>
			<th>bevestigd</th>
			<th>prijs</th>
			<th>upload</th>
			<th>prijs_OK</th>
			<th>afgerond</th>
		</tr>
		<?php echo Order::find_order_users();?>
	</form>
</table>

