<?
class User {
	
	
	public function userGetId() {
		$id = (int)$_GET['id'];
		if ($id = (int)$_GET['id'] > 0) {
			$sql ="SELECT * FROM " . TABLE_AUTHORS . " WHERE id_author=:id_author";
			$execute_params = array(':id_author' => (int)$id);
			$result = DB::getInstance()->Select($sql,$execute_params);
			//print_r($result);
			if($result) {
				//print_r($result); 
				return $result;
			}
		}
		return false;
	}
	
	public function getThisUser() {
		$login = htmlspecialchars(strip_tags($_POST['login']));
		$pass  = htmlspecialchars(strip_tags($_POST['pass']));
		if($login != '' && $pass) {
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
		}
		return false;
	}
	
	
}
?>