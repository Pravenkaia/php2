<?
// выборка всех записей каталога товаров
function ProductsGet($db){
	$sql = "SELECT * FROM " . TABLE_PRODUCTS . " ORDER BY id_product DESC;";

	try {
		$statement = $db->prepare($sql);
		$statement->execute(); //

		// в случае ошибки SQL выражения выведем сообщене об ошибке
		$error_array = $statement->errorInfo();
 
		if($statement->errorCode() != 0000) {
			echo "Ошибка SQL в ProductsGet: " . $error_array[2] . '<br /><br />';
			return false;
		}
		else {
			// теперь получаем данные из класса PDOStatement
			while($row = $statement->fetch()) {
				// в результате получаем ассоциативный и индексированный массив
				//print_r($row);
				$res[] = $row;
			}
			if (isset($res))  return $res;
			else  			  return false;

		}
	} // ловим исключение
	catch(PDOException $e) {
		die("Error DB in ProductsGet: ".$e->getMessage());
	}
	return false;
}
?>