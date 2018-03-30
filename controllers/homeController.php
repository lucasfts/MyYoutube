<?php
class homeController extends Controller{

	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$dados = array();
		$categorias = new Categorias();
		$videos = new Videos();

		$dados['categorias'] = $categorias->getCategorias();
		foreach ($dados['categorias'] as $key => $value) {
			$dados['categorias'][$key]['videos'] = $videos->getVideosByCategoriaId($value['Id'], 5);
		}
		
		$this->loadTemplate('home',$dados);
	}

}

?>