<?
function pagingProducts($db,$limit, $from) {
	$sql = "SELECT * FROM " . TABLE_PRODUCTS . " ORDER BY id_product DESC LIMIT :limit OFFSET :offset;";

	try {
		$statement = $db->prepare($sql);
		$statement->bindValue(':limit',  (int)$limit, PDO::PARAM_INT);
		$statement->bindValue(':offset', (int)$from,  PDO::PARAM_INT);
		$statement->execute(); //

		// в случае ошибки SQL выражения выведем сообщене об ошибке
		$error_array = $statement->errorInfo();
 
		if($statement->errorCode() != 0000) {
			echo "Ошибка SQL в pagingProducts: " . $error_array[2] . '<br /><br />';
			return false;
		}
		else {
			// теперь получаем данные из класса PDOStatement
			while($row = $statement->fetch()) {
				// в результате получаем ассоциативный и нумерованный массив
				//print_r($row);
				$res[] = $row;
			}
			if (isset($res))  return $res;
			else  			  return false;

		}
	} // ловим исключение
	catch(PDOException $e) {
		die("Error DB in pagingProducts: ".$e->getMessage());
	}
	return false;
}
?>