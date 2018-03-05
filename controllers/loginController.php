<?php
class loginController extends Controller{

	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
	
		$dados = array();

		$this->loadView('login',$dados);
	}

	public function cadastrar(){
		$dados = array();

		$this->loadView('login_cadastrar',$dados);
	}

}

?>