<?php
class Controller{
	
	public function __construct(){
		
	}
	
	public function loadView($viewName,$viewData = array()){
		extract($viewData);
		include "views/".$viewName.".php";
	}

	public function loadTemplate($viewName,$viewData = array()){

		$dados = array();
		$categorias = new Categorias();
		$dados['categorias'] = $categorias->getCategorias();
		if (isset($_SESSION['user'])) {
			$u = new Usuarios();
			$dados['usuario'] = $u->getUsuario($_SESSION['user']);
		}
		extract($dados);
		include 'views/template.php';

	}

	public function loadViewInTemplate($viewName,$viewData = array()){
		extract($viewData);
		
		include "views/".$viewName.".php";
	}
}
?>