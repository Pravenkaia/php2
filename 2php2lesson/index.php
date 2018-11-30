<?
/*
include_once("Product.php");        // основной класс
include_once("ProductPiece.php");   // Штучный товар, наследник основного
include_once("ProductDigital.php"); // Цифровой товар, наседник штучного
include_once("IfConstants.php");    // интерфейс с константами кол-ва и скидкок
include_once("ProductWeight.php");  // весовой  товар, наследник основного
*/
spl_autoload_register(function (string $class_name) {
    if ($class_name != '') {
		if (file_exists($class_name . '.php'))
			include $class_name . '.php';
	}
});

$id = 0; // id

$plane = new ProductPiece(++$id,'Самолет', 'ТУ6000000', 2000000000,1,'шт');
//echo 'Цена:' . $plane->getPrice() . '<br>';
//echo 'Сумма: ' . $plane->getSum() . '<br>';
echo($plane);

echo '<hr>'; // книга, для которой существует цифровой товар (файл)
$book1 = new ProductPiece(++$id,'PHP7 в подлиннике. Автор.', 'Учебник по PHP', 2000,1,'шт');
echo($book1);

echo '<hr>'; //цифровой вариант той же книги
$file1 = new ProductDigital(++$id,'PHP7 в подлиннике. Автор.', 'Учебник по PHP', 2000,1,'шт');
echo($file1);

echo '<hr>';
$sugar = new ProductWeight(++$id,'Сахар', 'Сладкий', 50,30,'кг');
echo($sugar);


echo '<hr>';
echo 'Перехватчики __get, __call';
echo '<hr>';
echo 'Свойство boom (несуществующее): ' . $plane->boom . '<br>';
echo 'Свойство name (защищенное): ' . $plane->name . '<br>';
echo "Свойство name1 (публичное, существующее): {$plane->name1}<br>";
echo 'Метод foo (отсутствует): ' . $plane->foo() . '<br>';
echo 'Метод setSum() (защищенный): ' . $plane->setSum() . '<br>';
echo 'Метод getSum() (публичный, существует): ' . $plane->getSum() . '<br>';
echo '<hr>';

?> 