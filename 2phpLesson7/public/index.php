<?
include_once('../config/config.php');
include_once('../app.php');
//определяем, какая страница сайта
//print_r($_GET);


//print_r($_GET['path']); echo '<br>';


$controllerName = $start->getControllerName();
$methodName     = $start->getMethodName();

//echo '$controllerName=' . $controllerName . ' <br>';
$controller = new $controllerName();
$data = $controller->$methodName($_GET);
	

	


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