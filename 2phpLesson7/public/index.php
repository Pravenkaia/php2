<?
include_once('../config/config.php');
include_once('../app.php');

//определяем, какая страница сайта
//print_r($_GET['path']); echo '<br>';

$rout  = new Rout();
//print_r($rout); echo '<br>';
$controllerName = $rout->getControllerName(); //getControllerName();
$methodName     = $rout->getMethodName();
echo '$methodName: ' . $methodName . '<br>';
echo '$controllerName=' . $controllerName . ' <br>';
$controller = new $controllerName();
$data = $controller->$methodName($_GET);
	

	


try {
	
  $loader = new Twig_Loader_Filesystem(PATH_TEMPLATES); //'templates'
  
  $twig = new Twig_Environment($loader);
  
  $template = $twig->loadTemplate($_GET['page'] . '.tmpl');

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