<?
include_once("Product.php");
include_once("ProductPiece.php");
include_once("ProductDigital.php");
include_once("TraitArgs.php");

$k = 0;
$book1 = Array('PHP7 в подлиннике. Автор.', 'Учебник по PHP', 2000,1,'шт');
//print_r($book1);
$book1 = new ProductPiece(++$k,$book1[0], $book1[1], $book1[2],$book1[3],$book1[4]);
echo 'Цена:' . $book1->getPrice() . '<br>';
echo 'Сумма: ' . $book1->getSum() . '<br>';
$book1->__toString();

echo '<hr>';

//та же книга в цифровом формате
$file1 = new ProductDigital(++$k,$book1[0], $book1[1], $book1[2],$book1[3],$book1[4]);
echo 'Цена:' . $file1->getPrice() . '<br>';
echo 'Сумма: ' . $file1->getSum() . '<br>';
$file1->__toString();
?> 