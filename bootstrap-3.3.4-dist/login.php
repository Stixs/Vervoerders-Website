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
				<div class="col-xs-3">
					<br><br><br><br><br><br><br>
				</div>
				<div class="col-xs-9">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<nav class="navbar navbar-default navbar-collapse">
						<ul class="nav nav-pills">
							<li role="presentation" class="active"><a href="#">Home</a></li>
							<li role="presentation"><a href="#">Gids</a></li>
							<li role="presentation"><a href="#">Zoeken</a></li>	
							<span class="login"><a href="login.php">Login</a><span>
						</ul>
					</nav>					
				</div>
				<div class="col-xs-12">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<?php
						require('/controllers/inloggen.php');
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


