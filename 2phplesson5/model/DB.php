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
			//echo $connect_str;
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
	
	
	// кол-во товаров в БД
	public function countProducts() {
		$sql = "SELECT COUNT(*) as num_products FROM " . TABLE_PRODUCTS;
		//echo $sql . "<br>";
		try {
			$statement = $this->connection->prepare($sql);
			$statement->execute();
			
			if($statement->errorCode() != 0000) {
				echo "Ошибка SQL в не могу посчитать товары: " . $error_array[2] . '<br /><br />';
				return false;
			}
		//$row = $statement->fetch();
		//print_r($row);
			// теперь получаем данные из класса PDOStatement
			if($row = $statement->fetch()) {
					return $row['num_products'];
			}
			else  
				return false;
		} 
		catch(PDOException $e) {
			die("Error DB in counting of products: ".$e->getMessage());
		}
		return false;
	}
	
	// получение товара по ID
	// выборка товара по id
	public function productsGetId($id){
		$sql ="SELECT * FROM " . TABLE_PRODUCTS . " WHERE id_product=:id_product;";
		try {
			$statement = $this->connection->prepare($sql);
			$statement->bindValue(':id_product',  (int)$id, PDO::PARAM_INT);
			$statement->execute(); //

			// в случае ошибки SQL выражения выведем сообщене об ошибке
			$error_array = $statement->errorInfo();
 
			if($statement->errorCode() != 0000) {
				echo "Ошибка SQL в ProductsGetId: " . $error_array[2] . '<br /><br />';
				return false;
			}
			else {
				// теперь получаем данные из класса PDOStatement
				if ($row = $statement->fetch()) {
					// функция размеров и  осутствия изображения
					$img = imgProduct($row['photo_big']);
					$row['photo_big'] = $img['img_src'];
					$row['img_size'] = $img['img_size']; // строка  width="" height=""
					unset($img);
					//print_r($row); 
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
	
	
	// товары на странице
	public function pagingProducts($limit, $from = 0) {
		$sql = "SELECT * FROM " . TABLE_PRODUCTS . " ORDER BY id_product DESC LIMIT :limit OFFSET :offset;";
		try {
			$statement = $this->connection->prepare($sql);
			$statement->bindValue(':limit',  (int)$limit, PDO::PARAM_INT);
			$statement->bindValue(':offset', (int)$from,  PDO::PARAM_INT);
			$statement->execute(); //

			// в случае ошибки SQL выражения выведем сообщение об ошибке
			$error_array = $statement->errorInfo();
 
			if($statement->errorCode() != 0000) {
				echo "Ошибка SQL в pagingProducts: " . $error_array[2] . '<br /><br />';
				return false;
			}
			else {
				// теперь получаем данные из класса PDOStatement
				for ($i = 0; $row = $statement->fetch(); $i++) {
					// в результате получаем ассоциативный и нумерованный массив
					$res[$i] = $row;
					// определяем размеры картинки, а если нет фото, ставим заглушку
					$img= Array(); 
					$img = imgProduct($res[$i]['photo_thumb']);// функция размеров и  осутствия изображения
					$res[$i]['photo_thumb'] = $img['img_src']; 
					$res[$i]['img_size'] = $img['img_size']; // строка  width="" height=""
					unset($img);
				}
				//print_r($res);
				if (isset($res))  return $res;
				else  			  return false;

			}
		} // ловим исключение
		catch(PDOException $e) {
			die("Error DB in pagingProducts: ".$e->getMessage());
		}
		return false;
	}
	
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