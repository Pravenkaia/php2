<?
class ControllerUser extends Controller {

    protected $title;
	protected $h1;
	
    public function __construct($id = 0,$name = '') {
		parent::__construct();
        $this->title .= ' | Пользователь';
		$this->h1    = 'Пользователь ' . $name;
	}
	
	public function getTitle() {
		return $this->title;
	}

	public function getH1() {
		return $this->h1;
	}
	

}
?>		