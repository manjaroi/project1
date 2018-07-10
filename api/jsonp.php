<?php
	$arr = Array(
		'name' => 'mao',
		'age' => 18,
		'skill' => array("ps","css","js"),
		'name1' => $_GET["name"],
		'skill2' => $_GET["skill"]
	);
 	// echo "callback('abc')";
 	echo "callback(".json_encode($arr).")";
?>