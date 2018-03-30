<?php
class watchController extends Controller{

	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$dados = array();
		$videos = new Videos();
		try {
			if (isset($_GET['v']) && strlen($_GET['v']) == 32) {
				$dados['video'] = $videos->getVideoByHashId($_GET['v']);
				// Retorna no máximo 50 videos para as sugestões
				$dados['sugestoes'] = $videos->getRamdomVideos(50);
			}
			else{
				throw new Exception("Identificaçao do video não informada", 1);
				
			}
		} catch (Exception $e) {
			header("Location: /");
			exit();
		}

		$this->loadTemplate('watch',$dados);
	}

}

?>