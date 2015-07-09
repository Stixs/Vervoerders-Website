<?php
	$bedrijfs_id = $_GET['bedrijfs_id'];	
	$parameters = array(':bedrijfs_id'=>$bedrijfs_id);
	$sth = $pdo->prepare('select * from bedrijfgegevens where bedrijfs_id = :bedrijfs_id');
	$sth->execute($parameters);
	$row = $sth->fetch();
	
	$specialarr = (explode(", ",$row['specialiteit']));
					
	$special = "'[[:<:]]".$specialarr[0]."[[:>:]]|";
	$special .= "[[:<:]]".$specialarr[1]."[[:>:]]|";
	$special .= "[[:<:]]".$specialarr[2]."[[:>:]]|";
	$special .= "[[:<:]]".$specialarr[3]."[[:>:]]|";
	$special .= "[[:<:]]".$specialarr[4]."[[:>:]]|";
	$special .= "[[:<:]]".$specialarr[5]."[[:>:]]'";

if ($row['premium'] == 'gold')
{	
?>
<div class="row">
	<div class="col-xs-12">
		<img src="images/<?php echo $row['banner']; ?>" width="100%" role="banner" />
	</div>
</div>
<div class="rand row">
	<div class="col-xs-12 naam-bedrijf">
	<?php echo $row['bedrijfsnaam']; ?>
	</div>
	
	<div class="col-xs-6 beschrijving">
	<img src="images/<?php echo $row['logo']; ?>" width="200px"><br>
	<?php echo $row['beschrijving']; ?><br />
	<img src="images/<?php echo $row['afbeelding']; ?>" width="500px"/><br />
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
			<tr>
				<td>Transport Manager:</td><td><?php echo $row['transport_manager']; ?></td>
			</tr>
			<tr>
				<td>specialiteit:</td><td>
				<?php 
				
				
				$sth = $pdo->prepare('SELECT * FROM specialiteiten WHERE specialiteit_id REGEXP '.$special);
				$sth->execute($parameters);
				$specialiteiten = NULL;
				while($row = $sth->fetch())
				{
				$specialiteiten .= $row['specialiteit'].', '; 
				}
				$specialiteiten = substr($specialiteiten, 2);
				$specialiteiten = substr($specialiteiten, 0, -2);
				echo $specialiteiten;
				
				?></td>
			</tr>
		</table>
	</div>
</div>
<?php
}
else
{
	header("Refresh: ;URL=index.php?paginanr=1");
}
?>
















