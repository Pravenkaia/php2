<?
// перемнные
include 'models/vars.php';
// autoloader
spl_autoload_register(
			function ($class_name) {
				include __DIR__ . '/lib/' . str_replace('_', '/', $class_name) . '.php';
				//include __DIR__ . '/lib/Twig/lib/' . str_replace('_', '/', $class_name) . '.php';
			});


try {
	
  $loader = new Twig_Loader_Filesystem('templates');
  
  $twig = new Twig_Environment($loader);
  
  $template = $twig->loadTemplate('index.tmpl');
  
  echo $template->render(array (
    'h1' => $h1,
    'h2' => $h2,
	'title' => $title,
	'imgs_src' => $imgs_src
  ));
  
} 
catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
?>