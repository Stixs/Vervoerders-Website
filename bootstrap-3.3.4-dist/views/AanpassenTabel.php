<?php 
$sth = $pdo->prepare('select * form bedrijfgegevens');
$row = $sth->fetch();
 ?>
<div class="col-xs-12">
	<table class="table table-bordered">
		<tr>
			<th>Bedrijfs id</th>
			<th>Bedrijfs naam</th>
			<th>Aanpassen</th>
			<th>Verwijderen</th>
		</tr>
		<?php
		while($row = $sth->fetch()) 
		{ 
		?>
			<tr>
				<td><?php echo $row['bedrijfs_id'];?></td>
				<td><?php echo $row['bedrijfsnaam']; ?></td>
				<td><a class="btn btn-default" role="button" href="./aanpassen.php?action=edit&bedrijfs_id=<?php echo $row['bedrijfs_id']; ?>">Aanpassen</a></td>
				<td><a class="btn btn-default" role="button" href="./aanpassen.php?action=del&bedrijfs_id=<?php echo $row['bedrijfs_id']; ?>">Verwijderen</a></td>
			</tr>
		<?php 
		} 
		?>
	</table>
</div>