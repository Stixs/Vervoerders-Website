<?php

$Level = 0; // default level 0

$MenuInUitloggen = '<li><a href="?paginanr=50">Inloggen</a></li>'; // default menuknop inloggen
$IngelogdAls = NULL;

if(LoginCheck($pdo))
{
	$userid = $_SESSION['user_id'];
	$parameter = array(':gebruiker_id'=>$userid);
	$sth = $pdo->prepare('select inlognaam from gebruikers where gebruiker_id = :gebruiker_id');
	$sth->execute($parameter);
	
	$row = $sth->fetch();
	$naam = $row['inlognaam'];
	
	$Level = $_SESSION['level'];
	$MenuInUitloggen = '<li><a href="?paginanr=52">Uitloggen</a></li>';
	$IngelogdAls = '<li class="ingelogdals">U bent ingelogd als: '. $naam .'<li>';
}

$parameter = array(':Level' => $Level);
$sth = $pdo->prepare('Select * from menu where Level <= :Level');

$sth->execute($parameter);
?>
<div id="bar">
	<nav>
		<ul id="menu">
			<li><a href="?paginanr=0">Home</a></li>
			<?php
			while($row = $sth->fetch())
				{echo '<li><a href="?paginanr=' . $row["paginanr"] . '">' . $row["tekst"] . '</a></li>';}	
			echo $MenuInUitloggen;
			echo $IngelogdAls;
			?>
		</ul>
	</nav>
</div>
