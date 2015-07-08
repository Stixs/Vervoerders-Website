<?php
session_start();
require('./controllers/functies.php');

$pdo = ConnectDB();

if(isset($_GET['paginanr']))
{
	$paginanr = $_GET['paginanr'];
}
else
{
	$paginanr = 1;
}

?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Transportplaza</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="style/stylej.css" rel="stylesheet">
	<script src="./ckeditor/ckeditor.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<div class="container">
		<div class="box-shadow">
			<div class="row">
				<div class="col-xs-12">
					<nav class="navbar navbar-default navbar-collapse">
						<ul class="nav nav-pills">
							<li role="presentation"><a href="index.php?paginanr=1">Home</a></li>
							<li role="presentation"><a href="#">Gids</a></li>
							<li role="presentation"><a href="index.php?paginanr=3">Zoeken</a></li>	
							<?php
							if(LoginCheck($pdo))
							{
							?>
								<span class="login"><a href="index.php?paginanr=52">Logout</a></span>
							<?php
							}
							else
							{
							?>
								<span class="login"><a href="index.php?paginanr=51">Login</a></span>
							<?php
							}
							?>
						</ul>
					</nav>
				</div>
			</div>
			<?php
			if(LoginCheck($pdo))
			{
			?>
			<div class="row">
				<div class="col-xs-12">
					<nav class="navbar navbar-default navbar-collapse">
						<ul class="nav nav-pills pull-left">
							<li role="presentation"><a href="index.php?paginanr=5">Bedrijf toevoegen</a></li>
							<li role="presentation"><a href="index.php?paginanr=4">Bedrijf wijzigen</a></li>
						</ul>
						<ul class="nav nav-pills pull-right">
							<li role="presentation"><a href="index.php?paginanr=7">Beheer</a></li>
							<li role="presentation"><a href="index.php?paginanr=8">Beheer Advertenties</a></li>
						</ul>
					</nav>
				</div>
			</div>
			<?php
			}
			switch($paginanr)
				{
					case 1:
					require('./controllers/home.php');
					break;
					case 2:
					require('./controllers/gids.php');
					break;
					case 3:
					require('./controllers/zoeken.php');
					break;
					case 4:
					require('./controllers/wijzigen.php');
					break;
					case 5:
					require('./controllers/toevoegenbedrijf.php');
					break;
					case 6:
					require('./controllers/bedrijven.php');
					break;
					case 7:
					require('./controllers/beheer.php');
					break;
					case 8:
					require('./controllers/advertentieswijzigen.php');
					break;
					case 51:
					require('./controllers/inloggen.php');
					break;
					case 52:
					require('./controllers/uitloggen.php');
					break;
				}
			?>
		</div>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>