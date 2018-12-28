<?
class ControllerUser extends Controller {

    protected $title;
	protected $h1;

	
    public function __construct($id = 0) {
		parent::__construct();
        $this->title = $this->title . ' | Личный кабинет';
		$this->h1    = 'Личный кабинет';
		
	}

	public function index(){
		$data['page']  = 'user';
		$data['title'] = $this->title;
		$data['h1']    = $this->h1;
		$data['error'] = '';
		$data['user']  = '';
		
		$user = new User();
		if ($user->isLogged()) {
			$data['user'] = unserialize(User::getInstance());
			if (empty($data['user'])) 
				$data['error'] = 'Ошибка Авторизации';
			else
				$data['h1'] =  'Привет ' . $data['user']['h1'];;
		}
		
		return $data;
	}
	
	public function userId(){
		$user = new User();
		$data['error'] = '';
		if(!empty($_GET['id']))  {
			// Вывод юзера по id
			$data['user'] = $user->userGetId(); // User::
			if (!empty($data['user'])) 
				$data['user']= '';
			else
				$data['error']   = 'Ошибка. Нет данных  о Пользователе ' . $_GET['id'];
		}
		$data['page'] = 'user';
		$data['title'] = $this->title;
		$data['h1'] = $this->h1;
		return $data;
	}
	
	public function login(){

		// Вывод ЮЗЕРА ПО логину и паролю
		$data['user'] = User::login(); //
		
		if (!empty($data['user'])) {
			$data['error']= '';
		}
		else
			$data['error']   = 'Пользователь не найден ';
		
		$data['page'] = 'user';
		$data['title'] = $this->title;
		$data['h1'] = $this->h1;
		//echo '<br>43 ' . __FILE__ . ' $data[user]: ';print_r($data['user']);  echo '<br>';
		return $data;
	}
}
?>