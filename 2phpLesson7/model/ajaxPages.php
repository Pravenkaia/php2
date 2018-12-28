<?
include_once('../config/config.php');
include_once('../autoloader.php');


if($_POST) {
	$i = 0;
	$i = (int)$_POST['goods'];
	//echo '$i' . $i . '<br>';
	//echo '$_POST[goods]=' .$_POST['goods'] . '<br>';
	$limit = 9;
	$DB = DB::getInstance();

	$htmlStr = '';

	$product_obj = new Product();
	$product	= $product_obj->pagingProducts($limit,$i);
	//print_r($product);

	for($i = 0; $i < count($product); $i++) {
		$htmlStr .= "<div class=product data-id=" . $product[$i]['id_product'] . ">
						<div><a href='?path=index&id=" . $product[$i]['id_product'] . "'>
							<img src='" . $product[$i]['photo_thumb'] . "' " . $product[$i]['img_size'] . " alt='" .  $product[$i]['product_name'] . "'>
						</div>
						<div> ID=" . $product[$i]['id_product'] . "</div>
						<div><a href='?path=index&id=" . $product[$i]['id_product'] . "'>" . $product[$i]['product_name'] . "</a></div>
						<div><a class='btnBuy' href='?path=cart&id=" . $product[$i]['id_product'] . "'>Купить</a></div>
					</div>";
	}
	echo $htmlStr;
}
//echo $htmlStr;

//echo '<br><br>123<br>';
?>