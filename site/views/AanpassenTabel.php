<?php 
$zoeken = NULL;

if(isset($_POST['submit']) and !empty($_POST['zoekbedrijf']))
{
	$zoeken = $_POST['zoekbedrijf'];
	$parameters = array(':zoeken'=>$zoeken);
	$sth = $pdo->prepare('SELECT * FROM bedrijfgegevens WHERE bedrijfsnaam REGEXP :zoeken');
	$sth->execute($parameters);
}
else
{
	$sth = $pdo->prepare('SELECT * FROM bedrijfgegevens LIMIT 10');
	$sth->execute();
}
 ?>
<div class="row">
	<div class="col-xs-6">
		<form class="form-inline" method="post" action="" >
			<div class="form-group">
				<label for="zoeken">Zoeken</label>
				<input class="form-control" id="zoekbedrijf" name="zoekbedrijf" value="<?php echo $zoeken; ?>">
				<button type="submit" name="submit" class="btn btn-default">Zoeken</button>
			</div>
		</form>
	</div>
<div class="col-xs-12">
	<table class="table table-bordered aanpassen">
		<tr>
			<th>Bedrijfs naam</th>
			<th>Adres</th>
			<th>Plaats</th>
			<th>Telefoon</th>
			<th>Aanpassen</th>
			<th>Verwijderen</th>
		</tr>
		<?php
		while($row = $sth->fetch()) 
		{ 
		?>
			<tr>
				<td><?php echo $row['bedrijfsnaam']; ?></td>
				<td><?php echo $row['adres']; ?></td>
				<td><?php echo $row['plaats']; ?></td>
				<td><?php echo $row['telefoon']; ?></td>
				<td><a class="btn btn-default" role="button" href="./index.php?paginanr=4&action=edit&bedrijfs_id=<?php echo $row['bedrijfs_id']; ?>">Aanpassen</a></td>
				<td><a class="btn btn-default" role="button" href="./index.php?paginanr=4&action=del&bedrijfs_id=<?php echo $row['bedrijfs_id']; ?>">Verwijderen</a></td>
			</tr>
		<?php 
		} 
		?>
	</table>
</div>
</div>