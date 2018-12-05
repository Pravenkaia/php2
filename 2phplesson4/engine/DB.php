<?
class DB implements Constants {

	private static $PDOInstance = null;
	private $connect_str;
	
	private function __construct() {
		self::setDb();
	}
	
	
	static public function getInstance() {
		if (is_null(self::$PDOInstance)) {
			self::$PDOInstance = new self();
		}
		return 
			self::$PDOInstance;
	}
	
	private function SetDb() {
		try {
			// соединяемся с базой данных
			$connect_str = DB_DRIVER . ':host='. DB_HOST . ';dbname=' . DB_NAME . ";charset" . DB_CHARSET;
			
			self::$PDOInstance = new PDO($connect_str,DB_USER,DB_PASS,DB_OPTIONS);
			return self::$PDOInstance;
		}
		catch(PDOException $e) {
			die("Error (PDO CONNECTION ): ".$e->getMessage());
		}
		return false;
	}
	
	
	private function __clone() {} // запрет на клонирование
	
	private function __sleep(){}  //
	private function __wakeup(){} //запрет сериализации объекта и восстановления объекта 
	
	/*
	public function errorCode() {
    	return self::$PDOInstance->errorCode();

    }

	public __destruct() {   // уничтожение соединения
		self::$PDOInstance = null;
	}
	*/
}
?>