<style>
#blauwdivje
{
	width:200px;
	height: 130px;
	background-color: RGBA(0,0,255,0.3);
}
</style>
<script type='text/javascript'>
	$("document").ready(function(){
		//alert("Het werkt!");
		$('form').wrapAll('<div id="blauwdivje" />');
		$('#hide').click(function(){
			$("#blauwdivje").hide(500)
		});
		$('#show').click(function(){
			$("#blauwdivje").show(500)
		});
		$('#toggle').click(function(){
			$("#blauwdivje").toggle(500)
		});
	});

</script>
<div id='blauwdivje'>
	<form>
		username: <input type='text' />
		password: <input type='text' />
		<input type='submit' />
	</form>
</div>
<button id='show'>show</button>
<button id='hide'>hide</button>
<button id='toggle'>toggle</button>

