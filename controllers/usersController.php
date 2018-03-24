<?php
class usersController extends Controller{

	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		header("Location: /");
	}

	public function ver($id){
		$dados = array();
		$videos = new Videos();
		$usuarios = new Usuarios();

		try {
			$dados['usuario'] = $usuarios->getUsuario($id);
		} catch (Exception $e) {
			header("Location: /");
		}

		$dados['videos'] = $videos->getVideosByUserId($id);
		$this->loadTemplate('users',$dados);
	}


	
}