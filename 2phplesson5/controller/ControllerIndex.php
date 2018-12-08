<?
class ControllerIndex extends Controller {

    protected $title;
	protected $h1;
	protected $class_full;
	
    public function __construct($id = 0) {
		parent::__construct();
        $this->title .= ' | Главная';
		$this->h1    = $this->h1;
		if ($id > 0) $this->class_full = ' class="ful"';
		else $this->class_full = '';
	}
	
	public function getTitle() {
		return $this->title;
	}

	public function getH1() {
		return $this->h1;
	}
	
	public function getClass() {
		return $this->class_full;
	}

}
?>		