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
		//echo '23 ' . __FILE__ . ' $login=' . $login . ' <br>' ;
		if($login != '' && $pass != '') {
			$sql ="SELECT * FROM " . TABLE_AUTHORS . " WHERE author_login LIKE ?"; //:author_login // AND author_pass LIKE ':author_pass'";
			//echo '26 ' . __FILE__ . ' $sql=' . $sql . ' <br>' ;
			$execute_params = array($login); // ':author_login' =>  //, ':author_pass' => $pass 
			$results = DB::getInstance()->Select($sql,$execute_params);
			//echo '29 ' . __FILE__ . '<br>print_r($results)='; print_r($results); echo '<br>';
			if ($results) {
				foreach ($results[0] as $key => $value) {
					$result[$key] = $value;
				}
				//echo '34 ' . __FILE__ . '<br>print_r($result)='; print_r($result); echo '<br>';
				//проверрка пароля
				if ( password_verify($pass, $result['author_pass']) ) { //password_hash(
					//echo '37 ' . __FILE__ . '<br>print_r($result)='; print_r($result); echo '<br>';
					return $result;
				}
				return false;
			}
			return false;
		}
		return false;
	}
	
	
}
?>