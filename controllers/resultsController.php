<?php
class resultsController extends Controller{

	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$dados = array();

		if (isset($_GET['q']) && !empty($_GET['q'])) {
			$q = addslashes(trim($_GET['q']));
			$videos = new Videos();
			$dados['videos'] = $videos->getVideosByTitulo($q, 20);
		}
		else{
			header("Location: /");
			exit();
		}

		$this->loadTemplate('results',$dados);
	}

	public function categoria($id){
		$dados = array();
		$videos = new Videos();

		if (intval($id) > 0) {		
			$dados['videos'] = $videos->getVideosByCategoriaId($id,20);
		}
		else{
			header("Location: /");
			exit();
		}

		$this->loadTemplate('results',$dados);
	}

	

}

?>