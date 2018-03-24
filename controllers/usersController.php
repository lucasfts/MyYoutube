<?php
class usersController extends Controller{

	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$dados = array();

		$this->loadTemplate('users',$dados);
		
	}

	
}