<?
class ProductPiece extends Product {
	
	
	private $price;
	private $amount;
	private $units;
	private $sum;
	

	//  аргументы в массив не перевожу, , т.к. это просто пример, а не рабочий файл с классом БД 
	public function __construct($id, $name, $description, $price, $amount, $units) {
		
		Parent::__construct($id, $name, $description); // 
		 // устанавливаем недостающие поля
		$this->setUnits($units);
		$this->setAmount($amount);
		$this->setPrice($price);
		$this->setSum();
    }
	
	protected function setPrice($price) {
		$this->price  = $price; 
	}
	protected function setAmount($amount) {
		$this->amount  = $amount;
	}
	protected function setUnits($units) {
		$this->units  = $units;
	}
	protected function setSum() {
		$this->sum  = $this->amount * $this->price;
	}
	
	public function getPrice(){
		return $this->price;
	}
	public function getAmount(){
		return $this->amount;
	}
	public function getUnits(){
		return $this->units;
	}
	public function getSum() {
		return $this->sum;
	}
	
	
	public function __toString() {
		$this->str = Parent::__toString();
			$this->str .= 'price: ' . number_format($this->getPrice(), 0, '.', ' ') . ' (руб)<br>';
			$this->str .= "amount: {$this->getAmount()} ({$this->getUnits()})<br>";
			$this->str .= "sum: {$this->getSum()}<br>";
		return $this->str;
	}
	
}

?> 