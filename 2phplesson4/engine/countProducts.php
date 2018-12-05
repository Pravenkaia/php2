<?
function countProducts($db) {
	$sql = "SELECT COUNT(*) as num_products FROM " . TABLE_PRODUCTS;
	//echo $sql . "<br>";
	try {
		$statement = $db->prepare($sql);
		$statement->execute();
		
		// в случае ошибки SQL выражения выведем сообщене об ошибке
		$error_array = $statement->errorInfo();
 		if($statement->errorCode() != 0000) {
			echo "Ошибка SQL в pagingProducts: " . $error_array[2] . '<br /><br />';
			return false;
		}
		else {
			// теперь получаем данные из класса PDOStatement
			if($row = $statement->fetch()) {
				return $row['num_products'];
			}
			else  
				return false;

		}
		
	} // ловим исключение
	catch(PDOException $e) {
		die("Error DB in countProducts: ".$e->getMessage());
	}
	return false;
}
?>