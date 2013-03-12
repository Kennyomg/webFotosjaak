<ul id='linkdisappear'>
	<li>
		<a href='index.php?content=homepage'>home</a>
	</li>
	<?php
		if ( isset( $_SESSION['user_role']))
		{
			switch ($_SESSION['user_role'])
			{
				case 'customer':
					echo "<li>
							<a href='index.php?content=opdracht'>opdracht plaatsen</a>
						  </li>
						  <li>
							<a href='index.php?content=opdrachten_customer'>geplaatste opdrachten</a>
						  </li>";					
					break;
				case 'sjaak':
					echo "<li>
							<a href='index.php?content=opdrachten'>opdrachten</a>
						  </li>
						 ";
					break;
				case 'root':
					break;
				case 'developer':
					echo "<ul id='disappear'><li>
							<a href='index.php?content=developerzone/selectors'>selectors</a>
						  </li>
						  <li>
							<a href='index.php?content=developerzone/filters'>filters</a>
						  </li>
						  <li>
							<a href='index.php?content=developerzone/image-attributes'>image-attributes</a>
						  </li>
						  <li>
							<a href='index.php?content=developerzone/inserting'>inserting</a>
						  </li>
						  <li>
							<a href='index.php?content=developerzone/addclass'>addclass</a>
						  </li>
						  <li>
							<a href='index.php?content=developerzone/show-hide-selection'>show/hide selection</a>
						  </li>
						  <li>
							<a href='index.php?content=developerzone/fading'>fading</a>
						  </li>
						  <li>
							<a href='index.php?content=developerzone/sliding'>sliding</a>
						  </li>
						  <li>
							<a href='index.php?content=developerzone/image_rotator'>imagerotator</a>
						  </li>
						  <li>
							<a href='index.php?content=developerzone/animate'>animatie</a>
						  </li> </ul>";
					break;
				default:
					break;			
			}
			echo "<li><a href='index.php?content=logout'>uitloggen</a></li>";
		}
		else
		{
			echo "<li>
					<a href='index.php?content=register'>registreren</a>
				  </li>
				  <li>
					<a href='index.php?content=login'>inloggen</a>
				  </li>";		
		}
	?>	
</ul>