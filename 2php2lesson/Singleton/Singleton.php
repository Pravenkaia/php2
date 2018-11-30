<?
class Singleton implements Constants {
	use PrintThis;
	use GetA;
	use GetB;
	use GetD;
	
	private $settings = array();
	private static $_instance = null;
	private $a;
	private $b;
	private $d;
	
	private function __construct() {
		$this->a = Constants::CONST_A . 1;
		$this->b = Constants::CONST_B . 1;
		$this->d = Constants::CONST_D . 1;
	}
	
	
	
	static public function getInstance() {
		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		return 
			self::$_instance;
	}
	
	public function doSomething() {
		$this->toPrint();
	}
	
	public function getA() {
		return $this->a;
	}

	private function __clone() {}// ограничивает клонирование объекта
	//запрет сериализации объекта (запрет на восстановление объекта
	private function __sleep(){}
	private function __wakeup(){}
}
?>