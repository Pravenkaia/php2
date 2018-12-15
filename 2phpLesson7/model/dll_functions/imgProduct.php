<?
//функция обработки товара
function imgProduct($img) {
 
	if ($img != '' && file_exists($_SERVER['DOCUMENT_ROOT'] . '/public' . $img))   {
			$size          = getimagesize($_SERVER['DOCUMENT_ROOT'] . '/public' . $img);  
		$img = '/public' . 	$img;		
			 
		}
		else {
			if (file_exists($_SERVER['DOCUMENT_ROOT'] . NO_PHOTO))   {
			$size          = getimagesize($_SERVER['DOCUMENT_ROOT'] . NO_PHOTO);
			$img ='/public' . "/img/shablon-images/no_photo.png";

			}
			else {
				return '';
			}
		}
		//$size          = getimagesize($_SERVER['DOCUMENT_ROOT'] . NO_PHOTO);
		
	$array_img['img_src']   = $img; //print_r($size);
	$array_img['img_size']	= $size[3];
	return $array_img;
}
?>