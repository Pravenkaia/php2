<?
class Yes {
	private $obj;
	private $aa; 
	public function __construct() {
		$this->obj = Singleton::getInstance();
		$this->setA($this->obj);
	}

	private function setA() {
		$this->aa = $this->obj->getA();
	}
	public function getA() {
		return $this->aa;
	}
	public function dodo() {
		//echo 'aaaaa';
		$this->obj->doSomething();
	}

}
?>