<?
const DB_DRIVER  = 'mysql';
const DB_HOST    = 'localhost';
const DB_USER    = 'root';
const DB_PASS    = '';
const DB_NAME    = 'php1';
const DB_CHARSET = 'utf8';

const DB_OPTIONS = [
		PDO::ATTR_ERRMODE, 
		PDO::ERRMODE_EXCEPTION
		,PDO::ATTR_EMULATE_PREPARES   => false
		]; //,PDO::ATTR_EMULATE_PREPARES   => true



const TABLE_AUTHORS		        = "authors";
const TABLE_PHOTOS 		        = "photos";
const TABLE_PRODUCTS            = "products";
const TABLE_PRODUCTS_GROUPS     = "products_groups";
const TABLE_ORDERS     	        = "orders";
const TABLE_PRODUCTS_IN_ORDER   = 'products_in_order';
const TABLE_PRODUCTS_PHOTOS     = "products_photos";
const TABLE_UID_GROUPS     	    = "uid_groups";

const ROUTE_FOLD = "/public";
const SITE_NAME = 'Интернет-магазин игрушек';

const PATH_TEMPLATES = __DIR__ . '/../templates';
const NO_PHOTO = "/public/img/shablon-images/no_photo.png";

$foldBig = '/public/img/big/';        // путь к большим картинкам 
$foldThumbs = '/public/img/thumb/';   // путь к превьюшкам 


?>