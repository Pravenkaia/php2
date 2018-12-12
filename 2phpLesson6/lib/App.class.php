<?php

class App 
{
    public static function Init() 
    {
        date_default_timezone_set('Europe/Moscow');
        db::getInstance()->Connect(Config::get('db_user'), Config::get('db_password'), Config::get('db_base'));

        if (php_sapi_name() !== 'cli' && isset($_SERVER) && (isset($_GET) || isset($_POST) ) ){
			self::web(isset($_GET['path']) ? $_GET['path'] : '');
        }
		
		
    }
	
  //http://site.ru/index.php?path=news/edit/5
	

	
// метод роутинг
    protected static function web($url)
    {

        $url = explode("/", $url);
        if (!empty($url[0])) { //isset
            $_GET['page'] = $url[0];//„асть имени класса контроллера
            if (isset($url[1])) {
                if (is_numeric($url[1])) {
                    $_GET['id'] = $url[1];
                } else {
                    $_GET['action'] = $url[1];
                }
                if (isset($url[2])) {
                    $_GET['id'] = $url[2];
                }
            }
        }
		// если переданн данные от юзера
		if (isset($_POST)) {
			if ($_POST['page'] != '') {

				$_GET['page'] = $_POST['page'];
				$controllerName = ucfirst($_GET['page']) . 'Controller';//
				$controller = new $controllerName();
				$user_data = $controller->testedUsersData();

				if (!empty($user_data['user_login']) && !empty($user_data['user_password'])) {
					$data = User::getDataUser($user_data['user_login'],$user_data['user_password']);
					if (!$data) 
						$data['user_error'] = 'Неверные данные';
				}
				else $data['user_error'] = 'Неверный ввод';
			}
		}
		
		//если ничего не передано
        if (empty($_GET['page'])){
            $_GET['page'] = 'index';
        }

        if (isset($_GET['page'])) { //isset
            $controllerName = ucfirst($_GET['page']) . 'Controller';//IndexController
            $methodName = !empty($_GET['action']) ? $_GET['action'] : 'index';

			if (!isset($controller)) 
				$controller = new $controllerName();
            

            $data['content_data'] = $controller->$methodName($_GET);
            $data['title']        = $controller->title;
            $data['categories']   = Category::getCategories(0);
			
		
            $view = $controller->view . '/' . $methodName . '.html';
            if (!isset($_GET['asAjax'])) {
                $loader = new Twig_Loader_Filesystem(Config::get('path_templates'));
                $twig = new Twig_Environment($loader);
                $template = $twig->loadTemplate($view);
                

                echo $template->render($data);
            } else {
                echo json_encode($data);
            }
        }
    }


}