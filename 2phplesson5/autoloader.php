<?
// autoloader
spl_autoload_register(
			function ($class_name) {
				if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/lib/Twig/lib/' . str_replace('_', '/', $class_name) . '.php'))
					include $_SERVER['DOCUMENT_ROOT'] . '/lib/Twig/lib/' . str_replace('_', '/', $class_name) . '.php';

				if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/model/' . $class_name . '.php'))
				include $_SERVER['DOCUMENT_ROOT'] . '/model/' . $class_name . '.php';
			
			if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/controller/' . $class_name . '.php'))
				include $_SERVER['DOCUMENT_ROOT'] . '/controller/' . $class_name . '.php';
			});
?>