<?
include_once('config/config.php');
include_once('autoloader.php');


// заголовки страницы
$index = new ControllerIndex();


//замена пустого изображения и размеры картинки
include('model/dll_functions/imgProduct.php');




//$num_of_items; переменная для корзины, которая сейчас удалена


// постраничный вывод
//кол-во товаров общее

$DB = DB::getInstance();
$num_products = $DB->countProducts();

/*
$user = new User(6);
//$user_arrays = $user->getThisUser();
//print_r($user_array);
echo '$user->getThisUser()->id_author: ' . $user->getThisUser()['id_author']. '<br>'; //$user_arrays['id_author'] . '<br>';
*/

// список страниц
// Paging(кол-во товаров, текущая страница, кол-во товаров на странице)
$num_products_on_page = 9;
$paging = new Paging($num_products, (int)$_GET['page'], 9);	

	
//отображение товаров списком или по ID
include('Controller/index_vars.php');


			
		
/*			
echo 'INSERT INTO `products`(`product_name`, `product_text`, `price`, `photo_big`, `photo_thumb`, `product_time`) VALUES  <br>';
for ($i = 100; $i <101; $i++) {
	echo "('Игрушка" . $i . "','Подробно: " . $i . "','" . (100 + $i) . "','','','" . (time() + $i) . "'),  <br>";
}
*/

try {
	
  $loader = new Twig_Loader_Filesystem('templates');
  
  $twig = new Twig_Environment($loader);
  
  $template = $twig->loadTemplate('index.tmpl');
  
  echo $template->render(array(
    'h1'        => $index->getH1(),//$h1,
	'title' 	=> $index->getTitle(), //$title,
	'class_ful' => $index->getClass(),
	'products'  => $products,
	'get_id'    => $get_id,
	'error'     => $error,
	'pages'     => $paging->getPages(),//$pages,
	'from' 	    => $paging->getFrom(),//$from,
	'page_this' => $paging->getPageThis()
  ));
  
} 
catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
catch (PDOException $e){
    echo "DB is not available";
    var_dump($e->getTrace());
}


?>