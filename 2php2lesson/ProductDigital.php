<?
class ProductDigital extends ProductPiece {
	
	
	private $price;
	private $amount;
	private $name;
	private $sum;
	

	//  аргументы в массив не перевожу, , т.к. это просто пример, а не рабочий файл с классом БД 
	public function __construct($id, $name, $description, $price, $amount, $units) {
		
		Parent::__construct($id, $name, $description, $price, $amount, $units); // 
		 // устанавливаем недостающие поля
		$this->setPrice($price);
		$this->setName($name);
		$this->setAmount($amount);
    }
	
	protected function setName($name) {
		$this->name = '(файл) ' . $name;
	}
	protected function setPrice($price) {
		$this->price  = $price/2; 
	}
	protected function setAmount($amount) {
		$this->amount = $amount; 
	}
	
	
	public function getName() {
		return $this->name;
	}
	public function getPrice() {
		return $this->price;
	}
	function getAmount() {
		return $this->amount;
	}
	public function getSum() {
		return $this->price * $this->amount;
	}

}

?> 