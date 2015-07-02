<?php 
$sth = $pdo->prepare('select * from bedrijfgegevens');
$sth->execute();
 ?>
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
				<td><a class="btn btn-default" role="button" href="./aanpassen.php?action=edit&bedrijfs_id=<?php echo $row['bedrijfs_id']; ?>">Aanpassen</a></td>
				<td><a class="btn btn-default" role="button" href="./aanpassen.php?action=del&bedrijfs_id=<?php echo $row['bedrijfs_id']; ?>">Verwijderen</a></td>
			</tr>
		<?php 
		} 
		?>
	</table>
</div>