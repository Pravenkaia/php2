<?
class Controller {
    protected $title;
	protected $h1;
	
    public function __construct() {
        $this->title = SITE_NAME;
		$this->h1    = SITE_NAME;
    }
	
	public function getTitle() {
		//echo $this->title . '<br>';
		return $this->title;
	}

	public function getH1() {
		return $this->h1;
	}
	
	public function get_data(){
	}
	public function err404(){
		$data['page'] = 'err404';
		return $data;
	}
	
	public function index(){
	}
	public function __call($name,array $params) {
		echo "Метод не существует"; //$name 
	}
}
?>