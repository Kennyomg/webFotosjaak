<style>
.odd
{ 
	background-color : yellow;
	border : 1px solid black;
	 font-size : 1em;
}
.even
{ 
	background-color : pink;
	border : 2px solid red;
	font-size : 1em
}
.highlight
{ 
	background-color : grey;
	border : 1px solid black;
	font-size : 1em
}
</style>
<script type='text/javascript'>
	$("document").ready(function(){
		$("tr:even").addClass("even");
		$("tr:odd").addClass("odd");
		$("tr").hover(
			function(){
				$(this).toggleClass('highlight');
			},
			function(){
				$(this).toggleClass('highlight');
			}
		);
	});
</script>

<table>
	<tr>
		<th>id</th>
		<th>voornaam</th>
		<th>tussenvoegsel</th>
		<th>achternaam</th>
	</tr>
	<tr>
		<td>1</td>
		<td>Arjan</td>
		<td>de</td>
		<td>Ruijter</td>	
	</tr>
	<tr>
		<td>2</td>
		<td>Bert</td>
		<td>de</td>
		<td>Vries</td>	
	</tr>
	<tr>
		<td>3</td>
		<td>Johan</td>
		<td>de</td>
		<td>Bree</td>	
	</tr>
	<tr>
		<td>4</td>
		<td>Kees</td>
		<td>de</td>
		<td>Jong</td>	
	</tr>
</table>