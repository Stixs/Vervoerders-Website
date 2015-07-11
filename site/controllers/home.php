<div class="row">
<div class="col-xs-12 advert">
  
<?php

$sth = $pdo->prepare('SELECT * FROM advertenties WHERE vanaf_datum < '.time().' and tot_datum > '.time().' ORDER BY RAND() LIMIT 6');
	$sth->execute();
	$count = 0;

	while($row = $sth->fetch())
	{

	$count++;
	?>
	
		<div class="advertcontainer">
			<div class="advertimage">
				<img src="images/<?php echo $row['afbeelding']; ?>">
			</div>
			<div class="advertnaam">
				<h4><?php echo $row['titel']; ?></h4>
			</div>
		</div>
	<?php
	}
			

?>

	
</div>