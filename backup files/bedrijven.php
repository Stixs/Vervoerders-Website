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
							<li role="presentation"><a href="nieuw.php">Bedrijf registreren</a></li>
							<li role="presentation"><a href="wijzigen.php">Bedrijf wijzigen</a></li>
							<li role="presentation"><a href="#">test</a></li>
						</ul>
					</nav>
				</div>
			</div>
			<?php
			}
				$bedrijf = $_GET['bedrijf'];	
				$parameters = array(':bedrijf'=>$bedrijf);
				$sth = $pdo->prepare('select * from bedrijfgegevens where bedrijfsnaam = :bedrijf');
				$sth->execute($parameters);
				$row = $sth->fetch();
			?>
			<div class="rand row">
				<div class="col-xs-12 naam-bedrijf">
				<?php echo $row['bedrijfsnaam']; ?>
				</div>
				
				<div class="col-xs-6 beschrijving">
				<img src="images/truck.jpg">
				<?php echo $row['beschrijving']; ?>
				</div>
				<div class="col-xs-1">
				</div>
				
				<div class="col-xs-4">
					<table class="table table-bordered">
						<tr>
							<td colspan="2" class="titel">Contact</td>
						</tr>
						<tr>
							<td>Adres:</td><td><?php echo $row['adres']; ?></td>
						</tr>
						<tr>
							<td>Plaats:</td><td><?php echo $row['plaats']; ?></td>
						</tr>
						<tr>
							<td>Postcode:</td><td><?php echo $row['postcode']; ?></td>
						</tr>
						<tr>
							<td>Provincie:</td><td><?php echo $row['provincie']; ?></td>
						</tr>
						<tr>
							<td>Telefoon:</td><td><?php echo $row['telefoon']; ?></td>
						</tr>
						<tr>
							<td>Fax:</td><td><?php echo $row['fax']; ?></td>
						</tr>
						<tr>
							<td>Email:</td><td><?php echo $row['bedrijfs_email']; ?></td>
						</tr>
						<tr>
							<td>Website:</td><td><?php echo $row['website']; ?></td>
						</tr>
					</table>
					<table class="table table-bordered">
						<tr>
							<td colspan="2" class="titel">Soort Transport</td>
						</tr>
						<tr>
							<td>Bereik:</td><td><?php echo $row['bereik']; ?></td>
						</tr>
						<tr>
							<td>specialiteit:</td><td><?php echo $row['specialiteit']; ?></td>
						</tr>
						<tr>
							<td>type:</td><td><?php echo $row['type']; ?></td>
						</tr>
					</table>
					<table class="table table-bordered">
						<tr>
							<td colspan="2" class="titel">Bedrijfs Gegevens</td>
						</tr>
						<tr>
							<td>Transport Manager:</td><td><?php echo $row['transport_manager']; ?></td>
						</tr>
						<tr>
							<td>Rechtsvorm:</td><td><?php echo $row['rechtsvorm']; ?></td>
						</tr>
						<tr>
							<td>Vergunning:</td><td><?php echo $row['vergunning']; ?></td>
						</tr>
						<tr>
							<td>Geldig tot:</td><td><?php echo $row['geldig_tot']; ?></td>
						</tr>
					</table>
							
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