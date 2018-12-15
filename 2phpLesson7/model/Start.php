<?php

class Start 
{
	protected $controllerName = 'ControllerIndex';
	protected $methodName = 'index';
	
    public  function Init() //static
    {
        DB::getInstance();

        if (php_sapi_name() !== 'cli' && isset($_SERVER) && (isset($_GET) || isset($_POST) ) ){
			$this->web(isset($_GET['path']) ? $_GET['path'] : '');
        }
		
		
    }
	
  //http://site.ru/index.php?path=news/edit/5
	

	
// метод роутинг
    protected  function web($url) {  // задает значение глобальным переменным $_GET static

		$_GET['path'] = stripslashes(strip_tags($_GET['path'])); 
        
		if ($_GET['path'] != '' &&  !empty($_GET['path']))
			$url = explode("/", $_GET['path']); 

		if (!empty($url[0])) {
			$_GET['page'] = $url[0];//часть имени класса контроллера
	
			// было заполнение формы (передан адрес страницы, например, 'user')
			if (!empty($_POST))
				$_GET['page'] = $_POST['page'];
		
			if (isset($url[1])) { 
				if (is_numeric($url[1])) { 
					$_GET['id'] = $url[1];  ////id
				} else {
					$_GET['action'] = $url[1];  //метод контроллера
				}
		
				if (isset($url[2])) {	// id для действия 
				$_GET['id'] = $url[2];
				}
			}	
		}

		//если ничего не передано
        if (empty($_GET['page'])){
            $_GET['page'] = 'index';
        }
		
        if (isset($_GET['page'])) { 
			$this->controllerName = 'Controller' . ucfirst($_GET['page']);//IndexController
            $this->methodName = !empty($_GET['action']) ? $_GET['action'] : 'index';

        }
    } // конец protected static function web($url)

	public function setController() {
		
	}
	public function getControllerName() {
		return $this->controllerName;
	}
	public function getMethodName() {
		return $this->methodName;
	}
}