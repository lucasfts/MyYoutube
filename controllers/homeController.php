<?php
class homeController extends Controller{

	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$dados = array();
		$categorias = new Categorias();
		$dados['categorias'] = $categorias->getCategorias();
		$this->loadTemplate('home',$dados);
	}

}

?>