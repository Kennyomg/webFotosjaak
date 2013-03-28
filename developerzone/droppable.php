<style>\
#succes{
	font-size: 26px;
}
</style>
<script>
$(document).ready(function() {
	$( "#draggable img" ).draggable();
	$( "#droppable" ).droppable({
      drop: function( event, ui ) {
        $(this).addClass( "succes" ).html( "Dropped!" );
      }
    });
});
</script>

<div id="draggable" class="box"><img src="./developerzone/img/kitten.jpg" alt="kitten"/></div>
<div id="droppable" class="box" style="height:300px; width:300px; background-color:blue;">Drop it here!</div>