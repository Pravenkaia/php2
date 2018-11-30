<?
class ProductWeight extends Product implements IfConstants {
	// использую интерфейс для эксперимента. 
	// константы должны быть либо переданы в качестве аргумента (массива)
	// либо заданы в классе как private
	
	private $price;
	private $price_new;
	private $amount = 0;
	private $units;
	private $sum;
	
	
	//  аргументы в массив не перевожу, т.к. это просто пример, а не рабочий файл с классом БД 
	public function __construct($id, $name, $description, $price, $amount, $units) {
		
		Parent::__construct($id, $name, $description); // 
		 // устанавливаем недостающие поля
		$this->setUnits($units);
		$this->setAmount($amount);
		$this->setPrice($price);
		$this->SetNewPrice($amount,$price);
		$this->setSum();
    }
	
	
	protected function setAmount($amount) {
		$this->amount  = $amount;
	}
	protected function setUnits($units) {
		$this->units  = $units;
	}
	protected function setPrice($price) {
		$this->price  = $price;
	}
	protected function SetNewPrice($amount,$price) {
		if ($amount  >= IfConstants::WEIGHT1 && $amount  < IfConstants::WEIGHT2) 
			$this->price_new  = $price * (1 - IfConstants::DISCOUNT1 / 100); 
		elseif ($amount  >= IfConstants::WEIGHT2 && $amount  < IfConstants::WEIGHT3) 
			$this->price_new  = $price * (1 - IfConstants::DISCOUNT2 / 100); 
		elseif ($amount  >= IfConstants::WEIGHT3 && $amount  < IfConstants::WEIGHT4) 
			$this->price_new  = $price * (1 - IfConstants::DISCOUNT3 / 100); 
		elseif (($amount  >= IfConstants::WEIGHT4) )
			$this->price_new  = $price * (1 - IfConstants::DISCOUNT4 / 100); 
		else 
			$this->price_new  = $price;
	}
	
	protected function setSum() {
		$this->sum  = $this->amount * $this->price_new;
	}
	
	public function getPrice(){
		return $this->price;
	}
	public function getPriceNew(){
		return $this->price_new;
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
			$this->str .= 'price_new: ' . number_format($this->getPriceNew(), 0, '.', ' ') . ' (руб)<br>';
			$this->str .= "amount: {$this->getAmount()} ({$this->getUnits()})<br>";
			$this->str .= "sum: {$this->getSum()}<br>";
		return $this->str;
	}
	
}

?> 