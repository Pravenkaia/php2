<?
const DB_DRIVER  = 'mysql';
const DB_HOST    = 'localhost';
const DB_USER    = 'root';
const DB_PASS    = '';
const DB_NAME    = 'php1';
const DB_CHARSET = 'utf8';

const TABLE_AUTHORS		        = "authors";
const TABLE_PHOTOS 		        = "photos";
const TABLE_PRODUCTS            = "products";
const TABLE_PRODUCTS_GROUPS     = "products_groups";
const TABLE_ORDERS     	        = "orders";
const TABLE_PRODUCTS_IN_ORDER   = 'products_in_order';
const DB_OPTIONS = [PDO::ATTR_EMULATE_PREPARES   => true];

// соединяемся с базой данных
try {
	$connect_str = DB_DRIVER . ':host='. DB_HOST . ';dbname=' . DB_NAME . ";charset=" . DB_CHARSET;
	$db = new PDO($connect_str,DB_USER,DB_PASS,DB_OPTIONS);
} 
catch(PDOException $e)  {  // выбрасывается исключение
	die("Error ( Соединение с ДБ): ".$e->getMessage());
}

// на случай неработы других страниц

//таблицы базы данных
$table_authors			   = "authors";
$table_photos 			   = "photos";
$table_products     	   = "products";
$table_products_groups     = "products_groups";
$table_products_photos     = "products_photos";
$table_uid_groups     	   = "uid_groups";




?>