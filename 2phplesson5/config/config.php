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
		]; //,PDO::ATTR_EMULATE_PREPARES   => true



const TABLE_AUTHORS		        = "authors";
const TABLE_PHOTOS 		        = "photos";
const TABLE_PRODUCTS            = "products";
const TABLE_PRODUCTS_GROUPS     = "products_groups";
const TABLE_ORDERS     	        = "orders";
const TABLE_PRODUCTS_IN_ORDER   = 'products_in_order';
const TABLE_PRODUCTS_PHOTOS     = "products_photos";
const TABLE_UID_GROUPS     	    = "uid_groups";


const SITE_NAME = 'Интернет-магазин игрушек';


$foldBig = '/img/big/';        // путь к большим картинкам 
$foldThumbs = '/img/thumb/';   // путь к превьюшкам 

$pathAdmin = '/admin/';     //путь к админке 


$src_plus           = "/img/shablon-images/b_plus.png";
$size_plus          =  getimagesize($_SERVER['DOCUMENT_ROOT'] . $src_plus);

$src_edit           = "/img/shablon-images/b_edit.png";
$size_edit          =  getimagesize($_SERVER['DOCUMENT_ROOT'] . $src_edit);

$src_drop           = "/img/shablon-images/b_drop.png";
$size_drop          =  getimagesize($_SERVER['DOCUMENT_ROOT'] . $src_drop);

?>