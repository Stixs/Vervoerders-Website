<?php
session_start();
require('./controllers/functies.php');

$pdo = ConnectDB();
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<div class="container">
		<div class="row box-shadow">
			<div class="row">
				<div class="col-xs-3"><br><br><br><br><br><br><br></div>
				<div class="col-xs-9"></div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<nav class="navbar navbar-default navbar-collapse">
						<ul class="nav nav-pills">
							<li role="presentation"><a href="index.php">Home</a></li>
							<li role="presentation"><a href="Gids.php">Gids</a></li>
							<li role="presentation" class="active"><a href="zoeken.php">Zoeken</a></li>	
							<?php
							if(LoginCheck($pdo))
							{
							?>
					 			<span class="login"><a href="uitloggen.php">Logout</a></span>
							<?php
							}
							else
							{
							?>
								<span class="login"><a href="login.php">Login</a></span>
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
						<ul class="nav nav-pills">
							<li role="presentation"><a href="nieuw.php">Bedrijf registreren</a></li>
							<li role="presentation"><a href="wijzigen.php">Bedrijf wijzigen</a></li>
							<li role="presentation"><a href="#">test</a></li>
						</ul>
					</nav>
				</div>
			</div>
			<?php
			}
			?>
			<div class="row">
				<div class="col-xs-12">
				<?php
					require('./controllers/zoeken.php');
				?>
				</div>
			</div>
		</div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>