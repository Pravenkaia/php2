<?
class User {
	private $obj;
	private $user_array;

	public function __construct($id) {
		$this->obj = DB::getInstance();
		$this->setUser($id);
	}
/*
	private function setA($this->obj) {
		$this->aa = $this->obj->getA();
	}
*/	
	// получение товара по ID
	// выборка товара по id
	private function setUser($id){
		$this->user_array = $this->obj->getUser($id);
		//print_r($this->user_array);
	}
	

	public function getThisUser() {
		return $this->user_array;
	}

}
?>