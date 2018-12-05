<?
//замена пустого изображения и размеры картинки
include('engine/dll_functions/imgProduct.php'); 
// товар по id
include('engine/ProductsGetId.php');
// товары  в пределах страницы
include('engine/pagingProducts.php');
// постраничный вывод
include('engine/countProducts.php');



// постраничный вывод
 //кол-во товаров общее
$num_products = countProducts($db);
// кол-во товаров на страницу
$num_products_on_page = 9;
// кол-во страниц 
$num_pages = ceil($num_products/$num_products_on_page);


// текущая страница
if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
	$page_this = (int)$_GET['page'];
	$from = ($page_this - 1) * $num_products_on_page;
}
else {
	$page_this = 1;
	$from = 0;
}

// массив страниц
for ($i = 1; $i <= $num_pages; $i++) {
	$pages[] = array('page' => $i );
}

//отображение товаров по id или списком

if (isset($_GET['id']) && (int)$_GET['id'] > 0) {
	// выбран товар для просмотра
	$class_full = ' class="ful"';
	// получаем массив товара с id
	$products = [];
	$products = ProductsGetId($db, (int)$_GET['id']);
	if (!$products) { // false
		$error = 'Ошибка. Нет данных  о товаре с ID=' . (int)$_GET['id']; 
		$get_id = -1; // (-1) ошибка вывода для подгрузки шаблона ошибок
	}
	else {
		$get_id = (int)$_GET['id'];
		// функция размеров и  осутствия изображения
		$img = imgProduct($products['photo_big']);
		$products['img_src'] = $img['img_src'];
		$products['img_size'] = $img['img_size']; // строка  width="" height=""
		unset($img);
		$error = '';
	}

}
// товар не выбран, выводится список товаров
else {
	$products = [];
	$products = pagingProducts($db,$num_products_on_page, $from);
	if (!$products) { // false
		$get_id = -1; // (-1) ошибка вывода для подгрузки шаблона ошибок
		$error = 'Ошибка. Нет данных  о товарах'; 
	}
	else {
		$get_id  = 0;
		for   ($i = 0; $i <count($products); $i++ ) {
			$img= Array(); 
			$img = imgProduct($products[$i]['photo_thumb']);// функция размеров и  осутствия изображения
			$products[$i]['photo_thumb'] = $img['img_src']; 
			$products[$i]['img_size'] = $img['img_size']; // строка  width="" height=""
			unset($img);
			$error = '';
		}
	}
				
}

?>