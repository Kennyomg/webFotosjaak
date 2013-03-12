<?php require_once("./class/OrderClass.php"); ?>

Opdrachten van klanten
<p>klik op de prijs om deze te bevestigen voor akkoord</p>
<p></p>
<table border='1'>
	<form action='' method=''>
		<tr>
			<th>ordernr.</th>
			<th>opdracht</th>
			<th>datum</th>
			<th>aantal</th>
			<th>kleur-z/w</th>
			<th>betaald</th>
			<th>bevestigd</th>
			<th>prijs</th>
			<th>bevestigd</th>
		</tr>
		<?php echo OrderClass::find_orders_by_id(); ?>
	</form>
</table>