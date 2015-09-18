<?php
$keuze = 2;

$pdo = new PDO('mysql:host=localhost;dbname=vervoerders',"root","");

$sth = $pdo->prepare('SELECT * FROM bedrijfgegevens WHERE specialiteit REGEXP "[[:<:]]'.$keuze.'[[:>:]]"');
		$sth->execute();
$aantal = $sth->rowCount();

//echo $aantal;

$specialname = NULL;

for ($count = 1; $count <= $aantal; $count++)
{
		echo'<br>';
		$sth = $pdo->prepare('SELECT * FROM bedrijfgegevens WHERE specialiteit REGEXP "[[:<:]]'.$keuze.'[[:>:]]"');
		$sth->execute();
		while($row = $sth->fetch())
		{
			$specialiteit = $row['specialiteit'];
			$specialarr = (explode(", ",$specialiteit));
				if(!isset($specialarr[0]))
					{$specialarr[0] = NULL;}
				if(!isset($specialarr[1]))
					{$specialarr[1] = NULL;}
				if(!isset($specialarr[2]))
					{$specialarr[2] = NULL;}
				if(!isset($specialarr[3]))
					{$specialarr[3] = NULL;}
				if(!isset($specialarr[4]))
					{$specialarr[4] = NULL;}
				if(!isset($specialarr[5]))
					{$specialarr[5] = NULL;}
				$special = NULL;
				
					foreach($specialarr as $value) 
					{
						if(!next($specialarr)) 
						{
							$special.= $value;
						}
						else
						{
							$special.= $value.', ';
						}
					}
					
					$sth = $pdo->prepare('SELECT * FROM specialiteiten WHERE specialiteit_id REGEXP "[[:<:]]'.$keuze.'[[:>:]]"');
					$sth->execute();
					while($row = $sth->fetch())
					{
						$specialname.= $row['specialiteit'].', ';
					}
					
					
					$specialname = substr($specialname, 0, -2);
					echo $specialname.'<br>';
		}
}
?>