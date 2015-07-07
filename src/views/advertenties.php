<?php 
	$sth = $pdo->prepare('SELECT * FROM advertenties');
	$sth->execute();
 ?>
<div class="row">
<div class="col-xs-12">
	<table class="table table-bordered aanpassen">
		<tr>
			<th>Titel</th>
			<th>afbeelding</th>
			<th>Vanaf</th>
			<th>Tot</th>
			<th>url</th>
			<th>Type</th>
			<th>Aanpassen</th>
			<th>Verwijderen</th>
		</tr>
		<?php
		while($row = $sth->fetch()) 
		{ 
		?>
			<tr>
				<td><?php echo $row['titel']; ?></td>
				<td><?php echo $row['afbeelding']; ?></td>
				<td><?php echo $row['vanaf_datum']; ?></td>
				<td><?php echo $row['tot_datum']; ?></td>
				<td><?php echo $row['url']; ?></td>
				<td><?php echo $row['type']; ?></td>
				<td><a class="btn btn-default" role="button" href="./index.php?paginanr=8&action=edit&advertentie_ID=<?php echo $row['advertentie_ID']; ?>">Aanpassen</a></td>
				<td><a class="btn btn-default" role="button" href="./index.php?paginanr=8&action=del&advertentie_ID=<?php echo $row['advertentie_ID']; ?>">Verwijderen</a></td>
			</tr>
		<?php 
		} 
		?>
	</table>
</div>
</div>