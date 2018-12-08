<?
include_once('../config/config.php');
include_once('../autoloader.php');


// заголовки страницы
$index = new ControllerUser();



//$num_of_items; переменная для корзины, которая сейчас удалена


// постраничный вывод
//кол-во товаров общее

//$DB = DB::getInstance();

$user = new User(6);
//$user_arrays = $user->getThisUser();
//print_r($user_array);
echo '$user->getThisUser()->id_author: ' . $user->getThisUser()['id_author']. '<br>'; //$user_arrays['id_author'] . '<br>';



try {
	
  $loader = new Twig_Loader_Filesystem('templates');
  
  $twig = new Twig_Environment($loader);
  
  $template = $twig->loadTemplate('index.tmpl');
  
  echo $template->render(array(
    'h1'        => $index->getH1(),//$h1,
	'title' 	=> $index->getTitle(), //$title,
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