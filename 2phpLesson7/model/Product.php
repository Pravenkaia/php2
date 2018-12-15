<?
//include('../model/dll_functions/imgProduct.php');
include($_SERVER['DOCUMENT_ROOT'] . '/model/dll_functions/imgProduct.php');

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
					$result['img_size'] = $img['img_size']; // строка  width="" height=""
					//print_r($result); 
					return $result;
				}
		return false;
	}
	
	// товары на странице
	public function pagingProducts($limit = 9, $id = 0) { 
		
		if ($id > 0) {
			$where = " WHERE id_product<:id_product ";
			$execute_params = array(':id_product' => (int)$id, ':limit' => (int)$limit);
		}
		else {
			$where = '';
			$execute_params = array(':limit' => (int)$limit);
		}

		$sql = 'SELECT * FROM ' . TABLE_PRODUCTS  . $where . ' ORDER BY id_product DESC LIMIT  :limit ';  //:limit  OFFSET :offset
		
		$res = DB::getInstance()->Select($sql,$execute_params);
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
	
	
}
?>