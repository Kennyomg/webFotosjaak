<style>
#kitten img{
	height:300px;
	width:0px;
}
</style>
<script>
var timer = 10;

$(document).ready(function() {

	setInterval("add()",200);

  $("#progressbar").progressbar({
  	value: timer
  });

});

function add() {
	timer = timer + 1;
  	if(timer < 100){
    	$('#kitten img').css("width","+=6");
 	}
	$('#progressbar').progressbar( 'option', 'value', timer )
}

</script>

<div id="progressbar">
</div>
<div id="kitten">
	<img src="./developerzone/img/kitten.jpg" alt="kitten"/>
</div>