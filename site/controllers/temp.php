<?php

$pdo = new PDO('mysql:host=localhost;dbname=vervoerders',"root","");
$sth = $pdo->prepare('SELECT * FROM bedrijfgegevens WHERE specialiteit REGEXP');
		$sth->execute();
$aantal = $sth->rowCount();

echo $aantal;

$specialname = NULL

for ($count = 0; $count <= $aantal; $count++)
	
		$sth = $pdo->prepare('SELECT * FROM bedrijfgegevens WHERE bedrijfs_id = $count and specialiteit REGEXP');
		$sth->execute();
		
		
		foreach($specialiteit as $value) 
					{
						if(!next($specialiteit)) 
						{
							$special.= $value;
							$specialZ.= "[[:<:]]".$value."[[:>:]]'";
						}
						else
						{
							$special.= $value.', ';
							$specialZ.= "[[:<:]]".$value."[[:>:]]|";
						}
					}
					
					$sth = $pdo->prepare('SELECT * FROM specialiteiten WHERE specialiteit_id REGEXP '.$specialZ);
					$sth->execute($parameters);
					while($row = $sth->fetch())
					{
						$specialname.= $row['specialiteit'].', ';
					}
					
					
					$specialname = substr($specialname, 2);
					$specialname = substr($specialname, 0, -2);
	
?>