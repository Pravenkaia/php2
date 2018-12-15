<?
class User {
	
	
	public function userGetId($id) {
		$sql ="SELECT * FROM " . TABLE_AUTHORS . " WHERE id_author=:id_author";
		$execute_params = array(':id_author' => (int)$id);
		$result = DB::getInstance()->Select($sql,$execute_params);
		//print_r($result);
		if($result) {
			//print_r($result); 
			return $result;
		}
		return false;
	}
	
	public function getThisUser($login,$pass) {
		$sql ="SELECT * FROM " . TABLE_AUTHORS . " WHERE author_login LIKE ':author_login' AND author_pass LIKE ':author_pass'";
		$execute_params = array(':author_login' => $login, ':author_pass' => $pass );
		$results = DB::getInstance()->Select($sql,$execute_params);
		//print_r($result);
		if ($results) {
			foreach ($results[0] as $key => $value) {
				$result[$key] = $value;
			}
		}
		else return false;
		if($result) {
			//print_r($result); 
			return $result;
		}
		return false;
	}
	
	/*
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
	*/
}
?>