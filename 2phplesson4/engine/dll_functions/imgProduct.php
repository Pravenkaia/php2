<?
//функция обработки товара
function imgProduct($img) {

	if ($img != '' && file_exists($_SERVER['DOCUMENT_ROOT'] . $img))   {
			$size          = @getimagesize($_SERVER['DOCUMENT_ROOT'] . $img);   
			 
		}
		else {
			if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/img/shablon-images/no_photo.png"))   {
			$size          = @getimagesize($_SERVER['DOCUMENT_ROOT'] . "/img/shablon-images/no_photo.png");
			$img = "/img/shablon-images/no_photo.png";
			}
			else {
				return '';
			}
		}
	$array_img['img_src']   = $img; 
	$array_img['img_size']	= $size[3];
	return $array_img;
}
?>