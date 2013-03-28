<style>
#dialog img{
	height: 0;
	width:0;
}
</style>
<script>
$(document).ready(function() {
  	$('#button').click(function(){
		$('#dialog img').dialog({
			
			buttons: {
			"Yes": function(){
				$(this).dialog('close');
			},
			"No": function(){
				$(this).dialog('close');
			} },
			   modal: true,
			   width: 400,
			   height:400,
			   position: { my: "center", at: "center", of: window },
			   show: 'slow',
			   close: function( event, ui ) {
					alert("Nyan!");
			   }
			});
		});
});
</script>

<div id="holder">
  <button id='button'>Click Me!</button>
  <div id='dialog' title='ALERT'>
  	<img src="./developerzone/img/kitten.jpg" alt="kitten"/>
  </div>
</div>