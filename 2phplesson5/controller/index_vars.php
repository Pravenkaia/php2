<?
 


//отображение товаров по id или списком

if (isset($_GET['id']) && (int)$_GET['id'] > 0) {

	// получаем массив товара с id
	$products = [];
	$products = $DB->productsGetId((int)$_GET['id']);
	if (!$products) { // false
		$error = 'Ошибка. Нет данных  о товаре с ID=' . (int)$_GET['id']; 
		$get_id = -1; // (-1) ошибка вывода для подгрузки шаблона ошибок
	}
	else {
		$get_id = (int)$_GET['id'];
		$error = '';
	}

}
// товар не выбран, выводится список товаров
else {
	$products = [];
	$products = $DB->pagingProducts($num_products_on_page, $paging->getFrom());
	if (!$products) { // false
		$get_id = -1; // (-1) ошибка вывода для подгрузки шаблона ошибок
		$error = 'Ошибка. Нет данных  о товарах'; 
	}
	else {
		$get_id  = 0;
		$error = '';
	}
	
}

?>