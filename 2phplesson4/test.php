<?
/*
    В этом примере подготавливается запрос 
	с достаточным количеством неименованных псевдопеременных (?) 
	для каждого значения из массива $params. 
	Когда запрос будет выполняться, эти знаки вопроса будут заменены на элементы массива. 
	SELECT id IN array(параметры)
	Здесь PDOStatement::execute() связывает параметры по значению.
*/
include('config/common.php');
include('config/db.php');
include('engine/dll_functions/imgProduct.php'); 


function GetProductsArrayId($db,$params) {
	if (empty($params)) :
		echo "Ошибка GetProductsArrayId: пустой массив параметров<br /><br />";
	else :
		try {
			// PDO работает, но 
			// можно проверить входящие параметры на INT 
			// и удалить ненужные из смассива
			foreach ($params as $key => $value) {
				$params[$key] = (int)$value;
				if ($params[$key] == 0) {unset($params[$key]);}
			}
			sort($params);
			//var_dump($params); echo '<br>';
			
			
			// Создаем строку из знаков вопроса (?) в количестве, равном количеству параметров 
			$place_holders = implode(',', array_fill(0, count($params), '?'));
			$sql = "SELECT * FROM " . TABLE_PRODUCTS . " WHERE id_product IN ($place_holders) ORDER BY id_product DESC";
			
			$statement = $db->prepare($sql);
			/// использование execute одной строкой для массива значений
			$statement->execute($params);

			
			// в случае ошибки SQL выражения выведем сообщене об ошибке
			$error_array = $statement->errorInfo();
 
			if($statement->errorCode() != 0000) {
				echo "Ошибка SQL в GetProductsArrayId: " . $error_array[2] . '<br /><br />';
				return false;
			}
			else {
				// теперь получаем данные из класса PDOStatement
				while($row = $statement->fetch()) {
					// в результате получаем ассоциативный и нумерованный массив
					//print_r($row);
					$res[] = $row;
				}
				if (isset($res))  return $res;
				else  			  return false;
			}
	} // ловим исключение
	catch(PDOException $e) {
		die("Error DB in GetProductsArrayId: ".$e->getMessage());
		return false;
	}
	
	endif;
}

//$params = array(7, 21, 63, 86);

//массив с некорректными данными, SQL-инъекциями
$params = array('"";Select * FROM ' . TABLE_ORDERS . ';', 'rtuxmh', 5, '"";Delete FROM ' . TABLE_ORDERS . 'WHERE id_product=86;' );
// сработало число 5 без ошибок, PDO обрабатывает вводимые  данные
// 

$products = [];
	$products = GetProductsArrayId($db,$params);
	
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

			
// autoloader
spl_autoload_register(
			function ($class_name) {
				//include __DIR__ . '/lib/' . str_replace('_', '/', $class_name) . '.php';
				include __DIR__ . '/lib/Twig/lib/' . str_replace('_', '/', $class_name) . '.php';
			});
// twig
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
?>