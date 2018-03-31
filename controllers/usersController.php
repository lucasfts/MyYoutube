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
		$inscricao = new Inscricao();

		try {
			$dados['usuario'] = $usuarios->getUsuario($id);
			$dados['isInscrito'] = $inscricao->isInscrito($dados['usuario']['Id'], $_SESSION['user']);
			$dados['totalInscritos'] = $inscricao->getTotalInscritos($dados['usuario']['Id']);
		} catch (Exception $e) {
			header("Location: /");
		}

		$dados['videos'] = $videos->getVideosByUserId($id);
		$this->loadTemplate('users',$dados);
	}


	
}