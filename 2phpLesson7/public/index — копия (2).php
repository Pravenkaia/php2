<?
include_once('../config/config.php');
include_once('../autoloader.php');
//определяем, какая страница сайта
//print_r($_GET);


//print_r($_GET['path']); echo '<br>';

$data['path'] = 'index';

if (!empty($_GET['path']))
	$data['path'] = stripslashes(strip_tags($_GET['path'])); 


	$url = explode("/", $_GET['path']);

if (!empty($url[0])) {
    $_GET['page'] = $url[0];//часть имени класса контроллера
	if(isset($_POST['user']))
		$_GET['page'] = 'user';
	
    if (isset($url[1])) { //id
		if (is_numeric($url[1])) { 
			$_GET['id'] = $url[1];
		} else {
			$_GET['action'] = $url[1];  //метод контроллера
		}
		
		if (isset($url[2])) {	// id для действия админки
			$_GET['id'] = $url[2];
		}
    }
}

//$num_of_items; переменная для корзины, которая сейчас удалена


// база данных
$DB = DB::getInstance();

//  юзер
if ($data['path'] == 'user') {
	if ($_POST['login']) {
		$user = new User();
		$user_info = $user->getThisUser(stripslashes(strip_tags($_POST['login'])),stripslashes(strip_tags($_POST['pass'])));
		if (!$user_info) { $data['error'] = 'Ошибка определения юзера'; }
		else {
			$data['user']   = $user_info;
		}
		$titles = new ControllerUser($user_info['author_name'] . ' ' . $user_info['author_family']);
	}
	else {
		$titles = new ControllerUser();
	}
	
	$data['h1']        = $titles->getH1();
	$data['title']     = $titles->getTitle();
	
	
}
//товары
else { 
// заголовки страницы
	$titles = new ControllerIndex();
	$data['h1']        = $titles->getH1();
	$data['title']     = $titles->getTitle();
	$data['class_ful'] = $titles->getClass();

	
	
	include('../model/dll_functions/imgProduct.php');

	//отображение товаров списком или по ID
	include('../Controller/index_vars.php');
	
	$data['get_id']  = $get_id;
	$data['error']   = $error;
	
	$data['products'] = $products;
	$data['num_products_on_page'] = $num_products_on_page;

}

//echo 'print_r($data[path])='; print_r($data['path']); '<br>';
			
	


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