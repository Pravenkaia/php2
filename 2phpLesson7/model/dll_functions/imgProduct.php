<?
//функция обработки товара
function imgProduct($img) {
	$array_img['size'] = '';
	$array_img['img_src'] = '';
	
	if ($img != '' && file_exists($_SERVER['DOCUMENT_ROOT'] . ROUTE_FOLD . $img))   {
			$size          = getimagesize($_SERVER['DOCUMENT_ROOT'] . ROUTE_FOLD . $img);  
		$img = 	$img;		
			 
		}
		else {
			if (file_exists($_SERVER['DOCUMENT_ROOT'] . NO_PHOTO))   {
			$size          = getimagesize($_SERVER['DOCUMENT_ROOT']  . NO_PHOTO);
			$img = NO_PHOTO;

			}
			else {
				return $array_img;
			}
		}
		//$size          = getimagesize($_SERVER['DOCUMENT_ROOT'] . NO_PHOTO);
		
	$array_img['img_src']   = $img; //print_r($size);
	$array_img['img_size']	= $size[3];
	return $array_img;
}
?>