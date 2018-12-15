<?
class ControllerIndex extends Controller {

    protected $title;
	protected $h1;
	protected $class_full;
	protected $data=[];
	
    public function __construct($id = 0) {
		parent::__construct();
        $this->title .= ' | Главная';
		$this->h1    = $this->h1;
		if ($id > 0) $this->class_full = ' class="ful"';
		//else $this->class_full = '';
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
	
	public function index(){
			if(!empty($_GET['id']))  {
				// Вывод товара по id
				$data['products'] = Product::productsGetId();
				$data['get_id'] = 1;
			}
			else {
				// вывод товаров списком
				if (!empty($_POST['limit']) && (int)$_POST['limit'] > 0) // если пользователь задал количество товаров на странице
					$limit = (int)$_POST['limit'];
				$limit = 9; 
				$data['products'] = Product::pagingProducts($limit, $id = 0);
				$data['get_id'] = 0;
			}
			$data['error']= '';
			if (empty($data)) {
				$data['error']   = 'Ошибка. Нет данных  о товарах';
				$data['get_id']  = -1;
			}
			$data['path'] = 'index';
			$data['title'] 	     = $this->title;
			$data['h1']     	 = $this->h1;
			$data['class_full']  = $this->class_full;

			return $data;
	}
}
?>		