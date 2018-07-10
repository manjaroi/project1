<?php
	// 定义变量页码
	// 三元判断页码	
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	// echo $page;
	// 三元判断数量
	$qty = isset($_GET['qty']) ? $_GET['qty'] : 20;
	$price = array(998,888,666,98.99,48.89,10086,110);
	$color = array('黑色','红色','土豪金','绿色','灰色','玫瑰金');
	$goodslist = array();
	for($i = 0;$i < 500;$i ++){
		$imgNum = $i%77;
		$goods = array(
			'id' => 'g'.$i,
			'name' => '畅销产品'.$i%77,
			'price' => $price[array_rand($price)],
			'imgurl' => "img/$imgNum.jpg",
			'color' => $color[array_rand($color)],
		);
		$goodslist[] = $goods;
	}
	// echo $goodslist;
	// 根据分页截取不同的数据
	$data = array_slice($goodslist,($page-1)*$qty,$qty);
	// 格式化数据
	$res = array(
		'total' => count($goodslist),
		'page' => $page,
		'qty' => $qty,
		'data' => $data
	);
	echo json_encode($res,JSON_UNESCAPED_UNICODE);
?>