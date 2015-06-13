<?php
/*
$bedrijfsid = $_GET['bedrijfsid'];

$parameter = array(':bedrijfs_id'=>$bedrijfsid);
$sth = $pdo->prepare('select * from bedrijfgegevens where bedrijfs_id = :bedrijfs_id');

$sth->execute($parameter);
*/
?>
<div class="bedrijfsp">
	<span class="naam"><?php echo $row['bedrijfsnaam']; ?></span>
	<div class="info">
		<?php
		echo $row['beschrijving'];
		?>
	</div>
	<table class="contact">
		<tr>
			<th colspan="2">Contact gegevens</th>
		</tr>
		<tr>
			<td>Provincies:</td>
			<td><?php echo $row['provincies']; ?></td>
		</tr>
		<tr>
			<td>Plaats:</td>
			<td><?php echo $row['plaats']; ?></td>
		</tr>
		<tr>
			<td>Adres:</td>
			<td><?php echo $row['adres']; ?></td>
		</tr>
		<tr>
			<td>Postcode:</td>
			<td><?php echo $row['postcode']; ?></td>
		</tr>
		<tr>
			<td>Telefoon-nummer:</td>
			<td><?php echo $row['telefoon']; ?></td>
		</tr>
		<tr>
			<td>Fax-nummer:</td>
			<td><?php echo $row['fax']; ?></td>
		</tr>
		<tr>
			<td>E-mail:</td>
			<td><?php echo $row['bedrijfs_email']; ?></td>
		</tr>
		<tr>
			<th colspan="2">transport</th>
		</tr>
		<tr>
			<td>Specialiteit:</td>
			<td><?php echo $row['specialiteit']; ?></td>
		</tr>
		<tr>
			<td>Type:</td>
			<td><?php echo $row['type']; ?></td>
		</tr>
		<tr>
			<td>Bereik:</td>
			<td><?php echo $row['bereik']; ?></td>  
		</tr>
		<tr>
			<th colspan="2">Rechten</th>
		</tr>
		<tr>
			<td>Transportmanager:</td>
			<td><?php echo $row['transport_manager']; ?></td>
		</tr>
		<tr>
			<td>Aantal werknemers:</td>
			<td><?php echo $row['aantal']; ?></td>
		</tr>
		<tr>
			<td>Rechtsvorm:</td>
			<td><?php echo $row['rechtsvorm']; ?></td>
		</tr>
		<tr>
			<td>Vergunning:</td>
			<td><?php echo $row['vergunning']; ?></td>
		</tr>
		<tr>
			<td>Geldig tot:</td>
			<td><?php echo $row['geldig_tot']; ?></td>
		</tr>
	</table>
</div>