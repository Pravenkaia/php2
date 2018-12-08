<?
$h1 = 'Каталог товаров';
$title = 'Главная. ' . $h1; 

include('config/config.php');



//$num_of_items; переменная для корзины, которая сейчас удалена


// постраничный вывод
 //кол-во товаров общее
 


// autoloader
spl_autoload_register(
			function ($class_name) {
				if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/lib/Twig/lib/' . str_replace('_', '/', $class_name) . '.php'))
					include $_SERVER['DOCUMENT_ROOT'] . '/lib/Twig/lib/' . str_replace('_', '/', $class_name) . '.php';

				if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/model/' . $class_name . '.php'))
				include $_SERVER['DOCUMENT_ROOT'] . '/model/' . $class_name . '.php';
			});
//			

$DB = DB::getInstance();
$num_products = $DB->countProducts();

//массивы товаров и переменные  
include('model/index_vars.php');


			
		
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
    'h1'        => $h1,
	'title' 	=> $title,
	'products'  => $products,
	'get_id'    => $get_id,
	'error'     => $error,
	'pages'     => $pages,
	'from' 	    => $from,
	'page_this' => $page_this
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