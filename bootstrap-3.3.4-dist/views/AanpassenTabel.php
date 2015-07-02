<?php 
$sth = $pdo->prepare('select * form bedrijfgegevens');
$row = $sth->fetch();
 ?>
<div class="row">
	<div class="col-xs-3">
		Bedrijfs id
	</div>
	<div class="col-xs-3">
		Bedrijfs naam
	</div>
	<div class="col-xs-3">
		Aanpassen
	</div>
	<div class="col-xs-3">
		Verwijderen
	</div>
</div>
	<?php
		while($row = $sth->fetch()) 
		{ 
		?>
		<div class="row">
			<div class="col-xs-3">
				<?php echo $row['bedrijfs_id'];?>
			</div>
			<div class="col-xs-3">
				<?php echo $row['bedrijfsnaam']; ?>
			</div>
			<div class="col-xs-3">
				<a class="btn btn-default" role="button" href="./aanpassen.php?action=edit&bedrijfs_id=<?php echo $row['bedrijfs_id']; ?>">Aanpassen</a>
			</div>
			<div class="col-xs-3">
				<a class="btn btn-default" role="button" href="./aanpassen.php?action=del&bedrijfs_id=<?php echo $row['bedrijfs_id']; ?>">Verwijderen</a>
			</div>
		</div>
		<?php 
		} 
		?>

</div>