<?php
	$arr = Array(
		'name'=>'mao',
		'age'=>20,
		'hobby'=>array("basketball","football","running"),
		'name1'=>$_GET{"name"},
		'skill'=>$_GET{"skill"},
	);
	echo "callback(".json_encode($arr).")"
?>