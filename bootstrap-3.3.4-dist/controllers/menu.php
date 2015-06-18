<?php

$Level = 0; // default level 0

$MenuInUitloggen = '<li><a href="?paginanr=50">Inloggen</a></li>'; // default menuknop inloggen
$IngelogdAls = NULL;

if(LoginCheck($pdo))
{
	
	
	$Level = $_SESSION['level'];
	$MenuInUitloggen = '<li><a href="?paginanr=52">Uitloggen</a></li>';
}

$parameter = array(':Level' => $Level);
$sth = $pdo->prepare('Select * from menu where Level <= :Level');

$sth->execute($parameter);
?>
<div id="bar">
	<nav>
		<ul>
			<li><a href="?paginanr=0">Home</a></li>
			<?php
			while($row = $sth->fetch())
				{echo '<li><a href="?paginanr=' . $row["paginanr"] . '">' . $row["tekst"] . '</a></li>';}	
			echo $MenuInUitloggen;
			
			?>
		</ul>
	</nav>
</div>
