<?
class Paging {

	private $num_pages;
	private $pages;
	private $from;
	private $page_this;
	
	public function __construct($num_products, $page_this = 1, $num_products_on_page = 9) {
		$this->setPaging($num_products, $page_this, $num_products_on_page = 9);
	}

	private function setPaging($num_products, $page_this, $num_products_on_page = 9) {
		
		//текущая страница
		if ($page_this >0 ) $this->page_this = $page_this;
		else $this->page_this = 1;
		
		// кол-во страниц 
		if ($num_products_on_page > 0) 
			$this->num_pages = ceil($num_products/$num_products_on_page);
		else 
			$this->num_pages = 1;
			

		// от какого id считать
		$this->from = ($page_this - 1) * $num_products_on_page;
		if ($this->from < 0) $this->from = 0;
		// массив страниц
		for ($i = 1; $i <= $this->num_pages; $i++) {
			$this->pages[] = array('page' => $i );
		}

	}

	public function	getFrom() {
		return $this->from;
	}
	
	public function	getNumPages() {
		return $this->num_pages;
	}
	
	public function	getPages() {
		return $this->pages;
	}
	public function	getPageThis() {
		return $this->page_this;
	}
}


?>