<?
interface 	public  Constants {
	// константы интерфейса невозможно переопределить
	public  const DB_DRIVER  = 'mysql';
	public  const DB_HOST    = 'localhost';
	public  const DB_USER    = 'root';
	public  const DB_PASS    = '';
	public  const DB_NAME    = 'php1';
	public  const DB_CHARSET =	'utf8';
	public  const DB_OPTIONS = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //выбрасывать исключения
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       //возвращает массив, 
																//индексированный именами столбцов результирующего набора
																//PDO::FETCH_BOTH (по умолчанию): возвращает массив, 
																//индексированный именами столбцов результирующего набора, 
																//а также их номерами (начиная с 0)
        PDO::ATTR_EMULATE_PREPARES   => false
		//Включение или выключение эмуляции подготавливаемых запросов. 
		//Некоторые драйверы не поддерживают подготавливаемые запросы, 
		//либо их поддержка ограничена. 
		//Эта настройка указывает PDO всегда эмулировать подготавливаемые запросы 
		//(если TRUE и эмуляция поддерживается драйвером) 
		//или пытаться использовать собственные подготавливаемые запросы 
		//(если FALSE). 
		//Если драйвер не сможет подготовить запрос, 
		//эта настройка сбросится в режим эмуляции. Требует значение типа bool.
    ];

	public  const TABLE_AUTHORS		        = "authors";
	public  const TABLE_PHOTOS 		        = "photos";
	public  const TABLE_PRODUCTS            = "products";
	public  const TABLE_PRODUCTS_GROUPS     = "products_groups";
	public  const TABLE_ORDERS     	        = "orders";
	public  const TABLE_PRODUCTS_IN_ORDER   = 'products_in_order';
}
?>