<style>
#imagerotator div{
	position:absolute;
	z-index: 0;
}
#imagerotator .huidigeFoto{
	z-index: 2;
}
#imagerotator .vorigeFoto{
	z-index: 1
}
#imagerotator img{
	width: 200px;
	height: 180px;
}


</style>

<p>De image rotator</p>
<script type="text/javascript">
	$("document").ready(function() {
		setInterval("veranderFoto()",100);

		/*$("div#imagerotator img").attr({"width" : "200px",
										"height":"180px"
									});
		$("div#imagerotator div").css({"position":"absolute","z-index":0});
		$("div#imagerotator .vorigeFoto").css("z-index", 1);
		$("div#imagerotator .huidigeFoto").css("z-index", 2);*/

	});

	function veranderFoto(){
		var huidigeFoto = $("#imagerotator div.huidigeFoto");
		var volgendeFoto = huidigeFoto.next();

		if(volgendeFoto.length == 0){
			volgendeFoto = $('#imagerotator div:first');
		}

		huidigeFoto.removeClass('huidigeFoto').addClass('vorigeFoto');
		volgendeFoto.addClass('huidigeFoto');
		huidigeFoto.removeClass('vorigeFoto');
	}

</script>
<div id='imagerotator' >
	<div class='huidigeFoto'>
		<img src="./developerzone/img/rdhamster.jpg" alt="rdhamster"/>
	</div>
	<div>
		<img src="./developerzone/img/kameel.jpg" alt="kameel"/>
	</div>
	<div>
		<img src="./developerzone/img/kitten.jpg" alt="kitten"/>
	</div>

</div>
