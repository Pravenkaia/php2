<?
include_once('../config/config.php');
include_once('../app.php');

//$user = new User();
//echo __LINE__ . ' ' . __FILE__ . '<br>print_r(User::isLogged()): ';print_r(User::isLogged()); echo '<br>';
if (User::isLogged()) 
	Session::start();

//определяем, какая страница сайта
//echo __LINE__ . ' ' . __FILE__ . '<br>print_r($_GET[path])'; print_r($_GET['path']); echo '<br>';

$rout  = new Rout();
//print_r($rout); echo '<br>';


$controllerName = $rout->getControllerName(); //getControllerName();
$methodName     = $rout->getMethodName();
//echo __LINE__ .  ' ' . __FILE__ . '<br> $methodName=' . $methodName . '<br>';
//test(__LINE__, __FILE__,$methodName,'$methodName=');

//echo __LINE__ .  ' ' . __FILE__ . '<br> $controllerName=' . $controllerName . ' <br>';
//test(__LINE__, __FILE__,$controllerName);

$controller = new $controllerName();
$data = $controller->$methodName($_GET);
//echo '$data='; print_r($data); echo '<br>';

//print_r($controller);
/*	
if(empty($data['page'])) 
	$data['page']  = 'index';
*/	
//Session::start();
//if (!empty($_SESSION['User'])) {print_r(unserialize($_SESSION['User'])); echo '<br>';}
//echo'<pre>';print_r($_SESSION['__app_session_fp']);echo '</pre><br>';
//echo'<pre>';print_r($_SESSION);echo '</pre><br>';


try {
	
  $loader = new Twig_Loader_Filesystem(PATH_TEMPLATES); //'templates'
  
  $twig = new Twig_Environment($loader);
  
  $template = $twig->loadTemplate($data['page'] . '.tmpl');
  //$template = $twig->loadTemplate($methodName . '.tmpl');
 // $template = $twig->loadTemplate($_GET['page'] . '.tmpl');

	echo $template->render(array(
		'data' => $data
	));
}
 
catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
catch (PDOException $e){
    //echo "DB is not available";
    var_dump($e->getTrace());
}


?>