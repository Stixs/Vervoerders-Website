<?php
function ConnectDB()
{
	$pdo = new PDO('mysql:host=localhost;dbname=vervoerders',"courierplaze","$6tuS08m");

	return $pdo;
}
?>