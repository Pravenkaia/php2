<?
abstract class Product {
	
	private $id;
	private $name;
	private $description;
	
    private $str = '';  //строка вывода объекта (отладка)
	public $name1 = 'Коко';  //для проверки метода __get
	
	
	public function __construct($id, $name = '', $description = '') { 
		$this->setProduct($id, $name, $description); 
		
    }

	// установка значений (общих для всех производных классов)
	private function setProduct($id, $name,  $description) {
		$this->id 		    = $id; 
		$this->name 		= $name;
		$this->description  = $description;
	}

	// получение значений (общих для всех производных классов)
	public function getId() {
		return $this->id;
	}
	public function getName() {
		return $this->name;
	}
	public function getDiscount() {
		return $this->discount;
	}
	public function getDescription() {
		return $this->description;
	}

	//
	abstract protected function setPrice($price);
	abstract protected function setAmount($amount);
	abstract protected function setUnits($units);
	abstract protected function setSum();
	
	abstract public function getPrice();
	abstract public function getAmount();
	abstract public function getUnits();
	abstract public function getSum();

	// преобразует объект в строку
	public function __toString() {
			$this->str .= "ID: {$this->getId()}<br>";
			$this->str .= "name: {$this->getName()}<br>";
			$this->str .= "description: {$this->getDescription()}<br>";
		return $this->str;
	}

	//перехват несуществующих или защищенных свойств
	public function __get($property) {
		if (property_exists($this,$property)) 
			return $this->property; // существующее публичное свойство
		else 
			return "Свойство '$property' отсутствует или недоступно";
	}
	
	//перехват несуществующих или защищенных методов
	public function __call($method, $arguments) {
        return "Вызов недоступного метода '$method' "
             . implode(', ', $arguments). "\n";
    }
	
}

?> 