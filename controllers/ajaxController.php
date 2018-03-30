<?php
class ajaxController extends Controller{

	public function __construct(){
		parent::__construct();
		if (!isset($_SESSION['user'])) {
			header("Location: /");
		}
	}
	
	public function Inscrever(){
		$canalid = addslashes($_POST['canalid']);
		$userid = addslashes($_POST['userid']);
		$inscricao = new Inscricao();
		$dados = array(
			"background" => "red",
			"texto" => "Inscreva-se"
		);
		
		if (!$inscricao->isInscrito($userid, $canalid)) {
			$inscricao->addInscrito($userid, $canalid);
			$dados["background"] = "gray";
			$dados["texto"] = "Inscrito";	
		}
		else{
			$inscricao->deleteInscrito($userid, $canalid);
		}
		$dados['qtInscritos'] = $inscricao->getTotalInscritos($canalid);
		echo json_encode($dados);
	}

}

?>