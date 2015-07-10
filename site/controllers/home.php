<div class="row">
<div class="col-xs-12 advert">
<?php

$sth = $pdo->prepare('SELECT * FROM advertenties ORDER BY RAND() LIMIT 6');
	$sth->execute();
	$count = 0;
	while($row = $sth->fetch())
	{
	if($count == 3)
	{
	?>
		</div>
		<div class="col-xs-12 advert">
		
	<?php
	
	}
	$count++;
	?>
	
		<div class="advert-container">
			<div class="advert-image">
				<img src="images/truck.jpg">
			</div>
			<div class="advert-naam">
				<h4><?php $row['titel'] ?></h4>
			</div>
		</div>
	<?php
	}
			

?>

	
</div>