<?
spl_autoload_register(function (string $class_name) {
    if ($class_name != '') {
		if (file_exists($class_name . '.php'))
			include $class_name . '.php';
	}
});

// прямая инициализация объекта класса Singleton
$obj = Singleton::getInstance();
$obj->doSomething();

$obj2 = Singleton::getInstance();
$obj2->doSomething();


// инициализация через объект
$obg3 = new Yes();
$x = $obg3->getA();
echo $x;
// Не работает!!!! 
//$obj3->dodo(); 

?>