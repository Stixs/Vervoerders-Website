		<?php
		$userid = $_SESSION['user_id'];
		
		$parameters = array(':gebruiker_id'=>$userid);
		$sth = $pdo->prepare('select bedrijfs_id from gebruikers where gebruiker_id = :gebruiker_id');
		$sth->execute($parameters);
		$row = $sth->fetch();	
		
		$bedrijfs_id = $row['bedrijfs_id'];
		
		$parameters = array(':bedrijfs_id'=>$bedrijfs_id);
		$sth = $pdo->prepare('select * from bedrijfgegevens where bedrijfs_id = :bedrijfs_id');
		$sth->execute($parameters);
		$row = $sth->fetch();
		
		?>

<div class="row">
	<div class="col-xs-6">
		<?php echo $row['beschrijving'] ?>
	</div>
	<div class="col-xs-1">
	</div>
	<div class="col-xs-5">
	<div>
</div>
	