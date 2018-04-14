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

	public function Like(){
		$dados = array();
		$likes = new Likes();
		$userId = addslashes($_POST['userid']);
		$videoId = addslashes($_POST['videoid']);

		try {
			$registro = $likes->getRegistro($videoId, $userId);

			if($registro['Tipo'] == 1){
				$likes->deleteRegistro($userId,$videoId);
				$dados["likeTxt"] = $likes->getLikesByVideoId($videoId);
				$dados["deslikeTxt"] = $likes->getDeslikesByVideoId($videoId);
			}
			else{
				$likes->atualizarTipo($videoId, $userId, 1);
				$dados["likeTxt"] = "<b>".$likes->getLikesByVideoId($videoId)."</b>";
				$dados["deslikeTxt"] = $likes->getDeslikesByVideoId($videoId);
			}
		} catch (Exception $e) {
			$likes->addLike($userId,$videoId);
			$dados["likeTxt"] = "<b>".$likes->getLikesByVideoId($videoId)."</b>";
			$dados["deslikeTxt"] = $likes->getDeslikesByVideoId($videoId);
		}
		echo json_encode($dados);
	}


	public function Deslike(){
		$dados = array();
		$likes = new Likes();
		$userId = addslashes($_POST['userid']);
		$videoId = addslashes($_POST['videoid']);

		try {
			$registro = $likes->getRegistro($videoId, $userId);

			if($registro['Tipo'] == 0 ){
				$likes->deleteRegistro($userId,$videoId);
				$dados["likeTxt"] = $likes->getLikesByVideoId($videoId);
				$dados["deslikeTxt"] = $likes->getDeslikesByVideoId($videoId)."";
			}
			else{
				$likes->atualizarTipo($videoId, $userId, 0);
				$dados["likeTxt"] = $likes->getLikesByVideoId($videoId);
				$dados["deslikeTxt"] = "<b>".$likes->getDeslikesByVideoId($videoId)."</b>";
			}
		} catch (Exception $e) {
			$likes->addDeslike($userId,$videoId);
			$dados["likeTxt"] = $likes->getLikesByVideoId($videoId);
			$dados["deslikeTxt"] = "<b>".$likes->getDeslikesByVideoId($videoId)."</b>";
		}
		echo json_encode($dados);
	}

	public function Comentar(){

		if (isset($_POST['comentario']) && !empty($_POST['comentario'])){
			$comentario = addslashes($_POST['comentario']);
			$userId = addslashes($_POST['userid']);
			$videoId = addslashes($_POST['videoid']);
			$comentarios = new Comentarios();
			$id = $comentarios->addComentario($userId, $videoId, $comentario);
			echo json_encode(array("id" => $id));
		}
	}

	public function ExcluirComent(){
		$comentarios = new Comentarios();
		$id_comentario = $_POST['id_comentario'];
		$comentarios->Excluir($id_comentario, $_SESSION['user']);
	}

}

?>