<?
include_once('config/config.php');
include_once('autoloader.php');


//$num_of_items; переменная для корзины, которая сейчас удалена


// постраничный вывод
//кол-во товаров общее


// база данных
$DB = DB::getInstance();


//определяем, какая страница сайта
$data['site_page'] = 'index';
$data['site_page'] = stripslashes(strip_tags($_GET['site_page'])); 


//  юзер
if ($data['site_page'] == 'users') {
	
	$user = new User(6);
	$titles = new ControllerUser(6,$user->getThisUser()['author_name'] . ' ' . $user->getThisUser()['author_family']);
	
	
	$data['h1']        = $titles->getH1();
	$data['title']     = $titles->getTitle();
	if (!$user) { $data['error'] = 'Ошибка определения юзера'; }
	else {
		$data['user_name'] = $user->getUserName();
		$data['pass']      = $user->getUserPass();
		$data['login']     = $user->getUserLogin();
	}
}
//товары
else { 
// заголовки страницы
	$titles = new ControllerIndex();
	//замена пустого изображения и размеры картинки
	
	$data['h1']        = $titles->getH1();
	$data['title']     = $titles->getTitle();
	$data['class_ful'] = $titles->getClass();

	
	
	include('model/dll_functions/imgProduct.php');
	$num_products = $DB->countProducts();
	// список страниц
	// Paging(кол-во товаров, текущая страница, кол-во товаров на странице)
	$num_products_on_page = 9;
	$paging = new Paging($num_products, (int)$_GET['page'], 9);	
	
	$data['pages']      = $paging->getPages();
	$data['from']       = $paging->getFrom();
	$data['page_this']  = $paging->getPageThis();
	
	//отображение товаров списком или по ID
	include('Controller/index_vars.php');
	
	$data['get_id']  = $get_id;
	$data['error']   = $error;
	
	$data['products'] = $products;
	/*			
echo 'INSERT INTO `products`(`product_name`, `product_text`, `price`, `photo_big`, `photo_thumb`, `product_time`) VALUES  <br>';
for ($i = 100; $i <101; $i++) {
	echo "('Игрушка" . $i . "','Подробно: " . $i . "','" . (100 + $i) . "','','','" . (time() + $i) . "'),  <br>";
}
*/
}


			
		


try {
	
  $loader = new Twig_Loader_Filesystem('templates');
  
  $twig = new Twig_Environment($loader);
  
  $template = $twig->loadTemplate('index.tmpl');

	echo $template->render(array(
		'data' => $data
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