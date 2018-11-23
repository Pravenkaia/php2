<?
class ProductFull extends Product {
	
	private $text;  // новое свойство (поле)
	public  $product;
	

	//  по id в реальности
	public function __construct($id, $name, $price, $discount, $description,$text) { 

		Parent::__construct($id, $name, $price, $discount, $description); // ?обращение к родителю напрямую нарушает принцип инкапсуляции
		 // устанавливаем новое свойство (поле)
		$this->setProductFull($text);
		echo "Метод " . __METHOD__ . " класса " . __CLASS__ . "<br>";
    }
	
	public function __destruct() {
		Parent::__destruct();
		echo "Метод " . __METHOD__ . " класса " . __CLASS__ . "<br>";
	}
	
	protected function setProductFull($text) {
		// добавляем новое свойство (поле)
		$this->product['text']  = $text;
	}

	
	public function getProductFull() {
		$this->product = Parent::getProduct();
		return $this->product;
	}
	
}

?> 