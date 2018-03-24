<?php
class resultsController extends Controller{

	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
	
		$dados = array();

		$this->loadTemplate('results',$dados);
	}

	public function categoria($id){
	
		$dados = array();

		$this->loadTemplate('results',$dados);
	}

	

}

?>