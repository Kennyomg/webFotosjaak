<p>Animatie</p>
<style type="text/css">
#rooddivje
{
	width:200px;
	height: 200px;
	background-color: RGBA(255,0,0,0.6);
	position:absolute;
	top:600;
	left:100;
}
</style>
<script type="text/javascript">
	$("document").ready(function() {
		
		$("button").click(function(){
			var cssObjectAfter = {"width" : "400", "height":"50", "background-color" : "RGBA(0,0,255,0.6)","top":"100","left":"150"};
			
			
			
			$("#rooddivje").animate(cssObjectAfter,4000,doeNogIets);
		});
		/*document.onkeypress=function(e){
 			var e=window.event || e
 			var position = 500;
 			var cssObject = {"width" : "250", "height":"200", "background-color" : "RGBA(255,0,0,0.6)","top":"300","left":"150"};
 			if(String.fromCharCode(e.charCode) == "d"){
 				//alert("CharCode value: "+e.charCode)
 				cssObject.left += 1px;

 				$("#rooddivje").css(cssObject);
 			}
 			if(String.fromCharCode(e.charCode) == "a"){
 				//alert("CharCode value: "+e.charCode)
 				var position = "150";
 				$("#rooddivje").css(cssObject);
 			}
		}
		/*document.onkeypress=function(e){
			var e=window.event || e
			alert("CharCode value: "+e.charCode)
			alert("Character: "+String.fromCharCode(e.charCode))
		}*/
		
	});
	function doeNogIets(){
				var cssObjectBefore = {"width" : "200", "height":"200", "background-color" : "RGBA(255,0,0,0.6)","top":"150","left":"400"};
				$("#rooddivje").animate(cssObjectBefore,2000);
			}
	
</script>
<button>animeer mij</button>
<div id='rooddivje'>
	Ik word geanimimeerd
</div>
