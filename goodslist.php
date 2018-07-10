<?php
	$price = array(1,5,6,4,5,8,7,10);
	$color = array('黑色','红色','土豪金','绿色','灰色','玫瑰金');
	print_r(sort($price));
	$goodslist = [];
	for($i = 0;$i < 100;$i ++){
		$goods = array(
			'name' => '畅销产品'.$i,
			'price' => $price[array_rand($price)],
			'imgurl' => "img/g$i.jpg",
			'color' => $color[array_rand($color)],
		);
		$goodslist[] = $goods;
	}
	// echo $goodslist;
	echo json_encode($goodslist,JSON_UNESCAPED_UNICODE);
?>