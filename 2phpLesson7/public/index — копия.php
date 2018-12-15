<?
include_once('../config/config.php');
include_once('../autoloader.php');
//определяем, какая страница сайта
print_r($_GET);


print_r($_GET['path']); echo '<br>';

$data['path'] = 'index';

if (!empty($_GET['path']))
	$data['path'] = stripslashes(strip_tags($_GET['path'])); 

if (!empty($_POST['user']))
	$_GET['path'] = $_POST['user'];
if (!empty($_POST['user']))
	$url = explode("/", $_GET['path']);

if (!empty($url[0])) {
            $_GET['page'] = $url[0];//„асть имени класса контроллера
            if (isset($url[1])) {
                if (is_numeric($url[1])) {
                    $_GET['id'] = $url[1];
                } else {
                    $_GET['action'] = $url[1];
                }
                if (isset($url[2])) {
                    $_GET['id'] = $url[2];
                }
            }
}

//$num_of_items; переменная для корзины, которая сейчас удалена


// постраничный вывод
//кол-во товаров общее


// база данных
//$DB = DB::getInstance();
$DB = DB::getInstance()->Connect();





//  юзер
if ($data['path'] == 'user') {
	
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

	
	
	include('../model/dll_functions/imgProduct.php');
	//$num_products = $DB->countProducts();
	// список страниц
	// Paging(кол-во товаров, текущая страница, кол-во товаров на странице)
	//$num_products_on_page = 9;
	/*//$paging = new Paging($num_products, (int)$_GET['page'], 9);	
	
	$data['pages']      = $paging->getPages();
	$data['from']       = $paging->getFrom();
	$data['page_this']  = $paging->getPageThis();
	*/
	//$obg = new Product;
	//$arr = $obg->productsGetId(99);
	//print_r($arr);
	//отображение товаров списком или по ID
	include('../Controller/index_vars.php');
	
	$data['get_id']  = $get_id;
	$data['error']   = $error;
	
	$data['products'] = $products;
	$data['num_products_on_page'] = $num_products_on_page;
	/*			
echo 'INSERT INTO `products`(`product_name`, `product_text`, `price`, `photo_big`, `photo_thumb`, `product_time`) VALUES  <br>';
for ($i = 100; $i <101; $i++) {
	echo "('Игрушка" . $i . "','Подробно: " . $i . "','" . (100 + $i) . "','','','" . (time() + $i) . "'),  <br>";
}

echo 'INSERT INTO `uid_groups`(`id_group`, `id_product`) VALUES  <br>';
for ($i = 1, $k = 1; $i <(101-17); $i++, $k++) {
	if ($k >8) $k = 1;
	echo "('$k','" . (17+$i) . "'),  <br>";
}
*/
}

echo 'print_r($data[path])='; print_r($data['path']); '<br>';
			
	


try {
	
  $loader = new Twig_Loader_Filesystem(PATH_TEMPLATES); //'templates'
  
  $twig = new Twig_Environment($loader);
  
  $template = $twig->loadTemplate($data['path'] . '.tmpl');

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