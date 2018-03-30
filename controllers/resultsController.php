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
		$videos = new Videos();

		if (intval($id) > 0) {		
			$dados['videos'] = $videos->getVideosByCategoriaId($id);
		}
		else{
			header("Location: /");
			exit();
		}

		$this->loadTemplate('results',$dados);
	}

	

}

?>