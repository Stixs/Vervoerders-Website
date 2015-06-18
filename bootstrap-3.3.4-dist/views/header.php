<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Vervoeders Website</title>
		<link href="./style/stylej.css" type="text/css" rel="stylesheet" />
		<link href="./style/stylet.css" type="text/css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<header>
		<?php
			if(LoginCheck($pdo))
			{
				$userid = $_SESSION['user_id'];
				$parameter = array(':gebruiker_id'=>$userid);
				$sth = $pdo->prepare('select inlognaam from gebruikers where gebruiker_id = :gebruiker_id');
				$sth->execute($parameter);
				
				$row = $sth->fetch();
				echo $row['inlognaam'];
			}
		?>
		</header>
		
		