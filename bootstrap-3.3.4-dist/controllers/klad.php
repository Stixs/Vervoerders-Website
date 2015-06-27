<?php



$sth = $pdo->prepare('SELECT * FROM bedrijfgegevens WHERE MATCH(rechtsvorm, plaats) AGAINST ('+BV +Utrecht' IN BOOLEAN MODE )');
$sth->execute();









$sth = $pdo->prepare('
	select * from bedrijfgegevens 
	where (bedrijfsnaam like "%'.$trefwoord.'%" or 
	beschrijving like "%'.$trefwoord.'%" or 
	beschrijving like "%'.$trefwoord.'%" or 
	postcode like "%'.$trefwoord.'%" or 
	plaats like "%'.$trefwoord.'%" or 
	provincie like "%'.$trefwoord.'%" or 
	telefoon like "%'.$trefwoord.'%" or 
	fax like "%'.$trefwoord.'%" or 
	transport_manager like "%'.$trefwoord.'%" or 
	aantal like "%'.$trefwoord.'%" or 
	rechtsvorm like "%'.$trefwoord.'%" or 
	vergunning like "%'.$trefwoord.'%" or 
	geldig_tot like "%'.$trefwoord.'%" or 
	bedrijfs_email like "%'.$trefwoord.'%")	and 
	(specialiteit like "%'.$specialiteit.'%" and 
	type like "%'.$type.'%" and 
	bereik like "%'.$bereik.'%")');
	$sth->execute();












?>

