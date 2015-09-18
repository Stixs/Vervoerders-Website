<?php

$geo = 'http://maps.google.com/maps/api/geocode/xml?latlng='.htmlentities(htmlspecialchars(strip_tags($_GET['latlng']))).'&sensor=true';
$xml = simplexml_load_file($geo);

foreach($xml->result->address_component as $component){
	if($component->type=='street_number'){
		$geodata['Huis nummer'] = $component->long_name;
	}
	if($component->type=='route'){
		$geodata['Straat'] = $component->long_name;
	}
	if($component->type=='locality'){
		$geodata['Plaats'] = $component->long_name;
	}
	if($component->type=='postal_code'){
		$geodata['Postcode'] = $component->long_name;
	}

}

echo $geodata['Huis nummer'];
echo $geodata['Straat'];
echo $geodata['Plaats'];
echo $geodata['Postcode'];

?>