<?
class User {
	protected static $instance = null;  // юзер
    protected static $logged   = false; // залогинен или нет
	public $err = [];
	
	//Проверяет, создана ли сессия, этот метод следует вызвать до вызова любого другого метода класса
    public static function check() {
        Session::start();
        if ($data = Session::get('User')) {
			
            $data = unserialize($data);
            self::$logged  = $data['logged'];
            self::$instance = $data['instance'];
			
			if (self::$logged && self::$instance != null) 
				return true;
			else {
				Session::destroy();
				return false;
			}
			
        } else {
            // Не может быть сессии без переменной User. Должно быть, это ошибка
            Session::destroy();
			return false;
        }
    }
 
	public static function isLogged() { 
		//echo __LINE__ . ' ' . __FILE__ . '<br>self::$logged: '; print_r(self::$logged); echo '<br>';
		$r = self::$logged;
        return $r; //
    }
	

	
	
	
	public static function login() {
		$login = htmlspecialchars(strip_tags($_POST['login']));
		$pass  = htmlspecialchars(strip_tags($_POST['pass']));
		//echo __LINE__ . ' ' . __FILE__ . ' $login=' . $login . ' <br>' ;
		
		if($login != '' && $pass != '') {
			$sql ="SELECT * FROM " . TABLE_AUTHORS . " WHERE author_login LIKE ?"; //:author_login // AND author_pass LIKE ':author_pass'";
			//echo __LINE__ . ' ' . __FILE__ . ' $sql=' . $sql . ' <br>' ;
			
			$execute_params = array($login); // ':author_login' =>  //, ':author_pass' => $pass 
			$results = DB::getInstance()->Select($sql,$execute_params);
			//echo __LINE__ . ' ' . __FILE__ . '<br>print_r($results)='; print_r($results); echo '<br>';
			
			if ($results) {
				foreach ($results[0] as $key => $value) {
					$result[$key] = $value;
				}
				//echo __LINE__ . ' ' . __FILE__ . '<br>print_r($result)='; print_r($result); echo '<br>';
				
				//проверрка пароля
				if ( password_verify($pass, $result['author_pass']) ) { //password_hash(
					//echo __LINE__ . ' ' . __FILE__ . '<br>print_r($result)='; print_r($result); echo '<br>';
					
					Session::start();
					self::$logged = true;
					echo __LINE__ . ' ' . __FILE__ . '<br>self::$logged: '; print_r(self::$logged); echo '<br>';
					self::$instance = $result;
					self::addToSession();
					return $result;
					
				}
				return false;
			}
			return false;
		}
		return false;
	}
	
	public static function getInstance() {
        return self::$instance;
    }
	
	private static function addToSession() {  
	
        Session::set("User", serialize(array(
            "instance" => self::$instance,
            "logged" => self::$logged
        )));
		//echo __LINE__ . ' ' . __FILE__ . '<br>self::$logged: '; print_r(self::$logged); echo '<br>';
    }
	
	public function userGetId($id) {
		//$id = (int)$_GET['id'];
		if ((int)$id > 0) {
			$sql ="SELECT * FROM " . TABLE_AUTHORS . " WHERE id_author=:id_author";
			$execute_params = array(':id_author' => (int)$id);
			$result = DB::getInstance()->Select($sql,$execute_params);
			//print_r($result);
			if($result) {
				//print_r($result); 
				return $result;
			}
		}
		return false;
	}
	
}
?>