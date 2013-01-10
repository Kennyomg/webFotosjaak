<?php
	require_once("./class/OrderClass.php");
	
?>
Opdrachten van klanten
<table>
	<form action='' method=''>
		<tr>
			<th>Ordernr.</th>
			<th>Opdracht</th>
			<th>Datum</th>
			<th>Aantal foto's</th>
			<th>Kleur/zwart-wit</th>
			<th>Betaald</th>
			<th>Bevestigd</th>
			<th>Prijs</th>
			<th>Upload</th>
		</tr>
		<?php echo OrderClass::find_orders_users(); ?>
	</form>
</table>
