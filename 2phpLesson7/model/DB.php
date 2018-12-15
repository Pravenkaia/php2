<?
class DB {
	//use countProducts;
	
	private static $PDOInstance = null;
	private $connect_str;
	private $connection;
	
	private function __construct() {
		$this->connection = self::setDb();
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
			// в случае ошибки SQL выражения выведем сообщене об ошибке
			$error_array = self::$PDOInstance->errorInfo();

			
			if(self::$PDOInstance->errorCode() != 0000) {
				echo "Ошибка SQL в SetDb: " . $error_array[2] . '<br /><br />';
				return false;
			}
			return self::$PDOInstance;
			
		}
		catch(PDOException $e) {
			die("Error (PDO CONNECTION ): ".$e->getMessage());
		}
		return false;
	}
	
	/*
     * Выполнить запрос к БД
     */
    public function Query($query, $params = array())
    {
		try {
        $result = $this->connection->prepare($query);
        $result->execute($params);//$params
		}catch(PDOException $e) {
        die("Error DB in Query : ".$e->getMessage());
		}
        return $result;
    }

    /*
     * Выполнить запрос с выборкой данных
     */
    public function Select($query, $params = array())
    {
        $result = $this->Query($query, $params);
        if ($result) {
		//echo 'print_r($result): ' ; print_r($result); echo '<br>';
            return $result->fetchAll();
        }
    }
/*	
	// user(id)
	public function getUser($id){
		$sql ="SELECT * FROM " . TABLE_AUTHORS . " WHERE id_author=:id_author;";
		try {
			$statement = $this->connection->prepare($sql);
			$statement->bindValue(':id_author',  (int)$id, PDO::PARAM_INT);
			$statement->execute(); //

			// в случае ошибки SQL выражения выведем сообщене об ошибке
			$error_array = $statement->errorInfo();
 
			if($statement->errorCode() != 0000) {
				echo "Ошибка SQL in Id of Author: " . $error_array[2] . '<br /><br />';
				return false;
			}
			else {
				// теперь получаем данные из класса PDOStatement
				if ($row = $statement->fetch()) {
					return $row;
				}
				else  			  return false;
			}
		} // ловим исключение
		catch(PDOException $e) {
			die("Error DB in ProductsGetId : ".$e->getMessage());
		}
		return false;
	}
	*/
	private function __clone() {} // запрет на клонирование
	
	private function __sleep(){}  //
	private function __wakeup(){} //запрет сериализации объекта и восстановления объекта 
	
	/*
	public function errorCode() {
    	return self::$PDOInstance->errorCode();

    }
	/*
	public __destruct() {   // уничтожение соединения
		self::$PDOInstance = null;
	}
	*/
}
?>