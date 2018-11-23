<?
include_once("product.php");
include_once("productfull.php");


$product[0] = new Product(1,'Телевизор', 2000, 10,'Плоский огромный серый');
$product[0]->getProduct();
$product[0]->__toString();
echo 'Product::getCounter()=' . Product::getCounter() . '<hr>';

$product[1] = new Product(2,'DVD player', 1000, 20,'Маленький и серый');
$product[1]->getProduct();
$product[1]->__toString();

echo 'Product::getCounter()=' . Product::getCounter() . '<hr>';

$product[2] = new Product(3,'Магнитола', 500, 10,'Белая с кнопками');
$product[2]->getProduct();
$product[2]->__toString();
//echo 'Product::getCounter()=' . Product::getCounter() . '<hr>';

$product[2] = null;
echo '<hr>удаляем объект: ($product[2] = null) Product::getCounter()=' . Product::getCounter() . '<hr><br>';



$product2[0] = new ProductFull(4,'Гарнитура', 1500, 70,'Белая с кнопками','Полное описание гарнитуры');
$product2[0]->getProductFull();
$product2[0]->__toString();
echo 'Product::getCounter()=' . Product::getCounter() . '<hr>';
?> 