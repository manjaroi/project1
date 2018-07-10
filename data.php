<?php
	$myname = 'mao';
	echo '大家好,我叫'.$myname.'<br>';
	echo 'hello my name is $myname<br>';	
	echo '<br><br><br>';



    $price = array('100','200');
    $player = array(
    	'agentina' => 'messi',
    	'wulagui' => 'suarez',
    	'china' => 'mao',
    );
    print_r($price);
    $arrlength = count($price);
    echo '<br>';
    for($i = 0;$i < $arrlength;$i ++){
    	echo $price[$i].'<br>';
    };
    forEach($player as $x => $x_value){
    	echo "Key=" .$x . ",Value=" .$x_value;
    	echo "<br>";
    };

?>
