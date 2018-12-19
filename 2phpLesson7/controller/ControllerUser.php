<?
class ControllerIndex extends Controller {

    protected $title;
	protected $h1;

	
    public function __construct($id = 0) {
		parent::__construct();
        $this->title = $this->title . ' | Личный кабинет';
		$this->h1    = 'Личный кабинет';
		
	}

	public function index(){
		$data['error'] = '';
		if(!empty($_GET['id']))  {
			// Вывод юзера по id
			$data['user'] = User::userGetId();
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
		$data['user'] = User::getThisUser();
		if (!empty($data['user'])) {
			$data['error']= '';
		}
		else
			$data['error']   = 'Пользователь не найден ';
		$data['page'] = 'user';
		$data['title'] = $this->title;
		$data['h1'] = $this->h1;
		return $data;
	}
}
?>		