<?php

class UserController extends Controller
{
	public $view = 'user';
    public $title;
	public $user_data = [];

    public function __construct()
    {
        parent::__construct();
        $this->title .= ' | Личный кабинет';
		if (!empty($_POST)) $this->testUserData();
    }
    
	protected function testUserData(){
		$this->user_data['user_login']     =  htmlspecialchars(strip_tags($_POST['user_login']));
		$this->user_data['user_password']  =  htmlspecialchars(strip_tags($_POST['user_pass']));
	}

	public function testedUsersData()
    {
		return $this->user_data;
    }

	public function index($data)
    {
		return [];
    }
	public function title($data)
    {
		return $this->title;
    }
}