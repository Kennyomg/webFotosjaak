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
		$("#slideup").click(function(){$("#blauwdivje").slideUp('normal');});
		$("#slidedown").click(function(){$("#blauwdivje").slideDown('normal');});
		$("#slidetoggle").click(function(){$("#blauwdivje").slideToggle('normal');});
		$("#linkdisappear").mouseenter(function(){$("ul#disappear").slideDown('normal');});
		$("#linkdisappear").mouseleave(function(){$("ul#disappear").slideUp('normal');});
	});

</script>
<div id='blauwdivje'>
	<form>
		username: <input type='text' />
		password: <input type='text' />
		<input type='submit' />
	</form>
</div>
<button id='slideup'>slideup</button>
<button id='slidedown'>slidedown</button>
<button id='slidetoggle'>slidetoggle</button>

