<?
spl_autoload_register(function (string $class_name) {
    if ($class_name != '') {
		if (file_exists($class_name . '.php'))
			include $class_name . '.php';
	}
});

// прямая инициализация объекта класса Singleton

echo '<pre>
// прямая инициализация объекта класса Singleton
$obj = Singleton::getInstance();
$obj->doSomething();
$obj2 = Singleton::getInstance();
$obj2->doSomething();
</pre>';
		
$obj = Singleton::getInstance();
$obj->doSomething();

$obj2 = Singleton::getInstance();
$obj2->doSomething();

echo 'var_dump($obj === $obj2): ';  
var_dump($obj === $obj2);
echo '<hr>';


// инициализация через объект

echo '<pre>
// инициализация через объект
$obj3 = new Yes();
echo $x = $obj3->getA();
$obj3->dodo();
</pre>';
		
		
$obj3 = new Yes();

echo $x = $obj3->getA();
//echo $x;
$obj3->dodo(); 

?>