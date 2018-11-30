<?
$title = 'Фотоальбом RedFox 2016';
$h1 = $title;
$h2 = 'Правенькая Елена';

$big = 'img/big/'; //  папка с картинками
$thumb = 'img/thumb/';

$imgs_info = array (
            'Здравствуте, участники!',
            'Этап гребли',
            'С байдарок на треккинг',
            'КП в водопаде',
            'КП на быках',
            'КП на быках, падун',
            'КП каньонинг',
            'Финиш',
            ''
        );
		
for ($i = 0; $i < 8; $i++) {
	$imgs_src[] = array (
					'names' => $imgs_info[$i],
					'big'   => $big . $i . '.jpg',
					'thumb' => $thumb . $i . '_.jpg'
				);
}

$nav = array(
  'primary' => array(
    array('name' => 'Clothes', 'url' => '/clothes'),
    array('name' => 'Shoes and Accessories', 'url' => '/accessories'),
    array('name' => 'Toys and Gadgets', 'url' => '/toys'),
    array('name' => 'Books and Movies', 'url' => '/media'),
  ),
  'secondary' => array(
    array('name' => 'By Price', 'url' => '/selector/v328ebs'),
    array('name' => 'By Brand', 'url' => '/selector/gf843k2b'),
    array('name' => 'By Interest', 'url' => '/selector/t31h393'),
    array('name' => 'By Recommendation', 'url' => '/selector/gf942hb')
  )
);


?>
