<?php
class User
{
    protected $id_user = NULL;
    protected $user_login;
    protected $user_pass;
    protected $user_ok = 0;
	protected $user_data = [];
	protected $connection;

	public static function getUser($user_login,$user_password)
    {
        return db::getInstance()->Select(
            "SELECT * FROM users WHERE user_login=:user_login AND user_password=:user_password",
			['user_login' => $user_login, 'user_password' => $user_password]);
    }
	
	public static function getDataUser($user_login,$user_password)
    {	
		$array = Self::getUser($user_login,$user_password);
		if(!empty($array[0])) {
			foreach ($array[0] as $key => $value) {
				$data[$key] =  $array[0][$key];
			}
			return $data;
		}
		return false;
    }
	
	
	public static function getUserId($value)
    {
        return db::getInstance()->Select(
            "SELECT * FROM users WHERE id_user =?",$value);
    }
	public static function getDataUserId($value)
    {	
		$array = Self::getUserId($value);
		if(!empty($array[0])) {
			foreach ($array[0] as $key => $values) {
				$data[$key] =  $array[0][$key];
			}
			return $data;
		}
		return false;
    }
}