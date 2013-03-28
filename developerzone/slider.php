<style>
#slider {
	width:400px;
	margin-bottom: 15px;

}
#slider2{
	height:200px;
	position:relative;

}
#box img{
	margin-left: 30px;
	position:absolute;
}
</style>

<script>
$(document).ready(function() {

	$('#slider').slider({ max: 800,
	   	min: 0,
	   	orientation: 'horizontal',
	   	value: 200,
	   	slide: function(event, ui){
			$('#box img').css('width', ui.value);
	 	}
	});
	$('#slider2').slider({ max: 400,
	   	min: 0,
	   	orientation: 'vertical',
	   	value: 200,
	   	slide: function(event, ui){
			$('#box img').css('height', ui.value);
	 	}
	});


});
</script>

<div id="slider"></div>

<div id="box">
	<img src="./developerzone/img/kitten.jpg" alt="kitten"/>
</div>
<div id="slider2"></div>