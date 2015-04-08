<?php
	$dbc = new mysqli('localhost', 'root', '', 'lady-luck');
	// $cityID = $cityIDresults->fetch_assoc();
	$query = "SELECT * FROM locations";
	//run query
	$results = $dbc->query($query);
	if($results){
		$data = $results->fetch_assoc();
		$data = json_encode($data);
		header('Content-Type: application/json');
		echo $data;
	}
?>