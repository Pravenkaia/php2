<?
class User {
	private $obj;
	private $user_array;
	
	private $id_author;
	private $rights;
	private $author_name;
	private $author_family;
	private $author_login;
	private $author_pass;
	private $author_email;
	private $date_reg;
	
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
		$this->id_author     = $this->user_array['id_author'];
		$this->rights        = $this->user_array['rights'];
		$this->author_name   = $this->user_array['author_name'];
		$this->author_family = $this->user_array['author_family'];
		$this->author_login  = $this->user_array['author_login'];
		$this->author_pass   = $this->user_array['author_pass'];
		$this->author_email  = $this->user_array['author_email'];
		$this->date_reg      = $this->user_array['date_reg'];
	}
	

	public function getThisUser() {
		return $this->user_array;
	}
	
	
	public function getIdUser() {
		return $this->id_author;
	}
	public function getUserRights() {
		return $this->rights;
	}
	public function getUserName() {
		return $this->author_name . ' ' . $this->author_family;
	}
	public function getUserLogin() {
		return $this->author_login;
	}
	public function getUserPass() {
		return $this->author_pass;
	}
	public function getUserMail() {
		return $this->author_email;
	}
	public function getDateReg() {
		return $this->date_reg;
	}
}
?>