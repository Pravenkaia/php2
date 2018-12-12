<?php

class GoodsController extends Controller
{
	public $view = 'goods';
    public $title;
	public $user_data = [];

    public function __construct()
    {
        parent::__construct();
        $this->title .= ' | Товары';
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