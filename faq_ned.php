<center>
<?php require_once("class/faqClass.php"); ?>
dit is een faq voor uw vragen en antwoorden<br />
							<a href='index.php?content=faq_ned'><img src='css/nl.png' width='32' height='32' /></a>
						    <a href='index.php?content=faq_eng'><img src='css/en.png' width='32' height='32' /></a> 
<?php

Faq::find_faq();
?>	
<div id='faq_ned'>
<table border='1'>
<tr>
	<th>ID</th>
	<th>Vraag</th>
	<th>Antwoord</th>

</tr>
<?php 
 
	Faq::show_faq_ned();
?>
</table>
</div>
</center>