<?
/*
//5.
class A {
    public function foo() {
        static $x = 0; // статическая переменная. Принадлежит классу, а не объекту. 
        echo ++$x;     // суммирование при каждом вызове
    }
}
$a1 = new A(); //$x = 0 (метод не вызывался)
$a2 = new A(); //$x = 0 (метод не вызывался)
$a1->foo(); // ++0++ => 1 // ссылка объекта класса A на перемнную класса A
$a2->foo(); // ++1++ => 2
$a1->foo(); // ++2++ => 3
$a2->foo(); // ++3++ => 4


//6.
class A {
    public function foo() { //  есть у всех объектов, в том числе прозводных классов
        static $x = 0; // статическая переменная. 
					   // Теперь принадлежит классам А и B 
					   // ( т.к. функция имеет стату public)
        echo ++$x;     // суммирование при каждом вызове соответсвующего класса 
    }
}
class B extends A {
}

$a1 = new A(); //$x = 0 (метод не вызывался)
$b1 = new B(); //$x = 0 (метод не вызывался)
$a1->foo(); // ++0 => 1 // ссылка объекта класса A на перемнную класса A
$b1->foo(); // ++0 => 1 // ссылка объекта класса B на перемнную класса B
$a1->foo(); // ++1 => 2 
$b1->foo(); // ++1 => 2


// 6. Переписала, чтобы было видно, от какого класса пришла переменная

class A {
    public function foo() { //  есть у всех объектов, в том числе прозводных классов
        static $x = 0; // статическая переменная. 
		printf("%s: %d<br>", get_class($this), ++$x);
    }
}
class B extends A {
}

$a1 = new A(); //$x = 0 (метод не вызывался)
$b1 = new B(); //$x = 0 (метод не вызывался)
$a1->foo(); // A: 1 // ++0 // ссылка объекта класса A на перемнную класса A
$b1->foo(); // B: 1 // ++0 // ссылка объекта класса B на перемнную класса B
$a1->foo(); // A: 2 // ++1
$b1->foo(); // B: 2 // ++1

//6. переопределен метод в производном классе
class A {

    public function foo() { //  есть у всех объектов, в том числе прозводных классов
        static $x = 0; // статическая переменная. Принадлежит классу, а не объекту. 
        //echo ++$x;     // суммирование при каждом вызове соответсвующего класса 
		printf("%s: %d<br>", get_class($this), ++$x);
    }
}
class B extends A {
	function foo() {
		Parent::foo();
	}
}

$a1 = new A(); //$x = 0 (метод не вызывался)
$b1 = new B(); //$x = 0 (метод не вызывался)
$a1->foo(); // A: 1 // ссылка объекта класса A на перемнную класса A
$b1->foo(); // B: 2 // ссылка объекта класса B на перемнную класса A
$a1->foo(); // A: 3 
$b1->foo(); // B: 4 


// 6. заменила get_class($this) на __CLASS__ : значение переменной не изменилось
// get_class($this) : показывает класс ссылающегося объекта
// __CLASS__  		: показывает класс метода 

class A {

    public function foo() { //  есть у всех объектов, в том числе прозводных классов
        static $x = 0; // статическая переменная. Принадлежит классу, а не объекту. 
        //echo ++$x;     // суммирование при каждом вызове соответсвующего класса 
		printf("%s: %d<br>", __CLASS__, ++$x);
    }
}
class B extends A {
	function foo() {
		Parent::foo();
	}
}

$a1 = new A(); //$x = 0 (метод не вызывался)
$b1 = new B(); //$x = 0 (метод не вызывался)
$a1->foo(); // A: 1 // на перемнную класса A
$b1->foo(); // A: 2 // 
$a1->foo(); // A: 3 
$b1->foo(); // A: 4 
*/
?>