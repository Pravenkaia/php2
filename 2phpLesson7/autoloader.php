<?
// autoloader
spl_autoload_register(
			function ($class_name) {
				if (file_exists(__DIR__ . '/lib/Twig/lib/' . str_replace('_', '/', $class_name) . '.php'))
					include __DIR__ . '/lib/Twig/lib/' . str_replace('_', '/', $class_name) . '.php';

				if (file_exists(__DIR__ . '/model/' . $class_name . '.php'))
				include __DIR__ . '/model/' . $class_name . '.php';
			
			if (file_exists(__DIR__ . '/controller/' . $class_name . '.php'))
				include __DIR__ . '/controller/' . $class_name . '.php';
			});
?>