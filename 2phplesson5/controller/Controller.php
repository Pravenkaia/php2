<?
class Controller {
    protected $title;
	protected $h1;
	
    public function __construct() {
        $this->title = SITE_NAME;
		$this->h1    = SITE_NAME;
    }
	
	public function getTitle() {
		echo $this->title . '<br>';
		return $this->title;
	}

	public function getH1() {
		return $this->h1;
	}
}
?>