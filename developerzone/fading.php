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
		$("#fadeout").click(function(){
			$("#blauwdivje").fadeOut('slow');
		});
		$("#fadein").click(function(){
			$("#blauwdivje").fadeIn('slow');
		});
		$("#fadeto").click(function(){
			$("#blauwdivje").fadeTo('slow',0.5);
		});
		$("#blauwdivje").mouseover
	});

</script>
<div id='blauwdivje'>
	<form>
		username: <input type='text' />
		password: <input type='text' />
		<input type='submit' />
	</form>
</div>
<button id='fadein'>fadein</button>
<button id='fadeout'>fadeout</button>
<button id='fadeto'>fadeto</button>

