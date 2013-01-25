<?php require_once("class/faqClass.php"); ?>
<center>
this is the english faq for answers and questions<br />
							<a href='index.php?content=faq_ned'><img src='css/nl.png' width='32' height='32' /></a>
						    <a href='index.php?content=faq_eng'><img src='css/en.png' width='32' height='32' /></a> 
<?php


Faq::find_faq();
?>	
<div id='faq_ned'>
<table border='1'>
<tr>

	<th>ID</th>
	<th>Question</th>
	<th>Answer</th>
	
</tr>
<?php 
	Faq::show_faq_eng();
?>
</table>
</div>
</center>	