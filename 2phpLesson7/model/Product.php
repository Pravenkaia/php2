<?
class Product{
	

	public function productsGetId() { //$id
		$id = (int)$_GET['id'];
		$sql ="SELECT * FROM " . TABLE_PRODUCTS . " WHERE id_product=:id_product;";
		$execute_params = array(':id_product' => $id);
		$results = DB::getInstance()->Select($sql,$execute_params);
		if ($results) {
			foreach ($results[0] as $key => $value) {
				$result[$key] = $value;
			}
		}
		else 
			return false;
		//print_r($results);
		if($result) {
					// функция размеров и  осутствия изображения
					$img = imgProduct($result['photo_big']);
					$result['photo_big'] = $img['img_src'];
					$result['img_size']  = $img['img_size']; // строка  width="" height=""
					//print_r($result); 
					return $result;
				}
		return false;
	}
	
	// товары на странице
	public function pagingProducts($limit = 9, $id = 0, $id_category = 0) { 
			
		$require = self::textOfRequire($limit, $id, $id_category);

		//$sql = 'SELECT * FROM ' . TABLE_PRODUCTS  . $where . ' ORDER BY id_product DESC LIMIT  :limit ';  //:limit  OFFSET :offset
		//$sql = 'SELECT * FROM ' . TABLE_PRODUCTS  . $where . ' ORDER BY id_product DESC LIMIT  :limit ';  //:limit  OFFSET :offset
		
		//$res = DB::getInstance()->Select($sql,$execute_params);
		$res = DB::getInstance()->Select($require['sql'],$require['execute_params']);
		if ($res) {
				for ($i = 0; $i < count($res); $i++) {
					// определяем размеры картинки, а если нет фото, ставим заглушку
					$img= Array(); 
					$img = imgProduct($res[$i]['photo_thumb']);// функция размеров и  осутствия изображения
					$res[$i]['photo_thumb'] = $img['img_src']; 
					$res[$i]['img_size'] = $img['img_size']; // строка  width="" height=""
					unset($img);
				}
				if (isset($res))  return $res;
				else  			  return false;

			}
		return false;
	}
	
	private function textOfRequire($limit = 9, $id = 0,$id_category = 0) {
		if ($id > 0) {
			$and = " AND id_product<:id_product ";
			$execute_params = array(':id_product' => (int)$id, ':limit' => (int)$limit);
		}
		else {
			$and = '';
			$execute_params = array(':limit' => (int)$limit);
		}
		if ($id_category > 0) {
			$execute_params[':id_category'] = $id_category;
			$sql = 'SELECT *' . TABLE_PRODUCTS  . ' 
						FROM ' . TABLE_PRODUCTS  . ', ' . TABLE_UID_GROUPS . 
						' WHERE 1 ' . 
						$and .
						' AND ' . TABLE_PRODUCTS . '.id_product=' .  TABLE_UID_GROUPS . '.id_product' .
						' ORDER BY ' . TABLE_PRODUCTS . '.id_product DESC 
						LIMIT  :limit ';
		}
		else {
			$sql = 'SELECT * FROM ' . TABLE_PRODUCTS  . 
						' WHERE 1 ' . 
						$and .
						' ORDER BY ' . TABLE_PRODUCTS . '.id_product DESC ' .
						'LIMIT  :limit ';
		}
		//echo $sql;
		return array('sql' => $sql, 'execute_params' => $execute_params);
		//$sql = 'SELECT * FROM ' . TABLE_PRODUCTS  . $where . ' ORDER BY id_product DESC LIMIT  :limit ';  //:limit  OFFSET :offset
		//$sql = 'SELECT * FROM ' . TABLE_PRODUCTS  . $where . ' ORDER BY id_product DESC LIMIT  :limit ';  //:limit  OFFSET :offset
		
	}
	
	
}
?>