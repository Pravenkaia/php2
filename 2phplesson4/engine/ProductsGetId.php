<?
// выборка товара по id
function ProductsGetId($db, $id){
	$sql ="SELECT * FROM " . TABLE_PRODUCTS . " WHERE id_product=:id_product;";

	try {
		$statement = $db->prepare($sql);
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
				// в результате получаем ассоциативный и нумерованный массив 
				//print_r($row); 
				return $row;
			}
			else  			  return false;

		}
	} // ловим исключение
	catch(PDOException $e) {
		die("Error DB in ProductsGetId: ".$e->getMessage());
	}
	return false;
}
?>