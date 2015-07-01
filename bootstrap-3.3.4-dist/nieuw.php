<?php
session_start();
require('./controllers/functies.php');

$pdo = ConnectDB();
?> 

<!DOCTYPE html>
<html lang="en">
<?php
	include('head.php');
?>
  <body>
	<div class="container">
		<div class="row box-shadow">
			<div class="row">
				<div class="col-xs-12">
					<nav class="navbar navbar-default navbar-collapse">
						<ul class="nav nav-pills">
							<li role="presentation"><a href="index.php">Home</a></li>
							<li role="presentation"><a href="#">Gids</a></li>
							<li role="presentation"><a href="zoeken.php">Zoeken</a></li>	
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
			<div class="row">
				<div class="col-xs-3">
					<br><br><br><br><br><br><br>
				</div>
				<div class="col-xs-9">
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
							<li role="presentation" class="active"><a href="nieuw.php">Bedrijf registreren</a></li>
							<li role="presentation"><a href="wijzigen.php">Bedrijf wijzigen</a></li>
							<li role="presentation"><a href="#">test</a></li>
						</ul>
					</nav>
				</div>
			</div>
			<?php
			}
			require('./controllers/registrerenbedrijf.php');
			?>
		</div>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>