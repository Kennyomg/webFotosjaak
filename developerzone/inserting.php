<style>
img{
	width:200px;
	border:1px solid grey;
}

div.foto p{
	background-color:grey;
}
</style>
<script type='text/javascript'>
	
	$("document").ready(function(){
		//alert("Het werkt!");
		$("#1").click(function(){
			$("div.foto p").append(", in de dierentuin")
						   .prepend("Opgelet allemaal! ")
						   .after("<br /><p id ='boven'>Dit is p-tag na de eerst</p>")
						   .before("<p id =''>Dit is p-tag voor de eerst</p>");
			$(".foto img").before("<br /><p id ='onder'>Hieronder staat een plaatje</p>")
			$("p#onder").insertAfter("img");
			$("div.foto:first").insertAfter('div.foto:last');
			$("p#2").insertBefore("div.foto:last");
			$("div.foto").wripAll("<div id='wrapper' />");
			$("div.foto:last p").empty();
			$("div.foto:first").clone().insertAfter($("div.foto:last"));
		});
	});

</script>
<p id="2">Oefenen met jquery invoegen (insert) van tekst </p>
<div class='foto'>
	<img src='./developerzone/img/kameel.jpg' alt='kameel'/>
	<p>Dit is een kameel.</p>
</div>
<div class='foto'>
	<img src='./developerzone/img/rdhamster.jpg' alt='Russische dwerghamster'/>
	<p>Dit is een russische dwerghamster.</p>
</div>
<button id='1'>Voeg tekst toe</button>