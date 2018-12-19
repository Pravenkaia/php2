<?
class Product {
	
	private $id;
	private $name;
	private $price;
	private $discount;
	private $description;
	public  $product = array();
	
	//счётчик объектов
	public $counter;
	private static $countObects = 0; // переменная класса, счетчик родительских и дочерних объектов класса

    private $str = '';  //строка вывода объекта (посмотреть, что внутри)
	
	
	
	public function __construct($id, $name = '', $price = 0, $discount = 0, $description = '') { //  по id в реальности

		$this->setProduct($id, $name, $price, $discount, $description); 
		
		 // суммируем счетчик. Можно вывести кол-во объектов класса  на текущий момент
		$this->counter = self::$countObects++;
		 
		echo "Метод " . __METHOD__ . " класса " . __CLASS__ . "<br>";
    }
	
	public function __destruct() {
		echo "Метод " . __METHOD__ . " класса " . __CLASS__ . "<br>";
		self::$countObects--; // при удалении объекта уменьшаем счетчик
	}
	
	protected function setProduct($id, $name, $price, $discount, $description) {
		// setProduct($id)
		// запрос из базы данных по id.... по нему получаем массив.
		$this->id 		    = $id;
		$this->name 		= $name;
		$this->price 		= $price;
		$this->discount 	= $discount;
		$this->description  = $description;
		
	}
	public static function getCounter() {
		return self::$countObects; 
	}
	
	public function getProduct() {
		
		$this->product['id']          = $this->id;
		$this->product['name']        = $this->name;
		$this->product['price']       = $this->price;
		$this->product['discount']    = $this->discount;
		$this->product['description'] = $this->description;
		
		return $this->product;
		
	}
	 
	

	public function __toString() {
		foreach ($this->product AS $key => $value) {
			$this->str .= "{$key}: {$value}<br>";
		}
		if($this->str != '') 
			$this->str .=  '<hr>'; 
		echo $this->str;
	}
	
} 

?> 