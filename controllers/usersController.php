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
		$likes = new Likes();

		try {
			$dados['usuario'] = $usuarios->getUsuario($id);
			if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
				$dados['isInscrito'] = $inscricao->isInscrito($dados['usuario']['Id'], $_SESSION['user']);
			}
			$dados['totalInscritos'] = $inscricao->getTotalInscritos($dados['usuario']['Id']);
		} catch (Exception $e) {
			header("Location: /");
		}

		$dados['videos'] = $videos->getVideosByUserId($id);
		foreach ($dados['videos'] as $key => $value) {
			$id_video = $dados['videos'][$key]['Id'];
			$dados['videos'][$key]['likes'] = $likes->getLikesByVideoId($id_video);
			$dados['videos'][$key]['deslikes'] = $likes->getDeslikesByVideoId($id_video);
		}
		$this->loadTemplate('users',$dados);
	}

	public function images($id_usuario){
		if(isset($_SESSION['user']) && $_SESSION['user'] == $id_usuario){
			$dados = array();
			$usuarios = new Usuarios();
			$alterado = false;

			if (isset($_FILES['img_fundo']) && !empty($_FILES['img_fundo']['tmp_name'])) {
				$type = explode("/", $_FILES['img_fundo']['type']);
				$type = end($type);

				$filename = "banner".$id_usuario.".".$type;
				$usuarios->atualizarImgFundo($id_usuario, $filename);
				move_uploaded_file($_FILES['img_fundo']['tmp_name'], "assets/images/".$filename);
				$alterado = true;
			}
			if (isset($_FILES['img_perfil']) && !empty($_FILES['img_perfil']['tmp_name'])) {
				$type = explode("/", $_FILES['img_perfil']['type']);
				$type = end($type);

				$filename = "perfil".$id_usuario.".".$type;
				$usuarios->atualizarImgPerfil($id_usuario, $filename);
				move_uploaded_file($_FILES['img_perfil']['tmp_name'], "assets/images/".$filename);
				$alterado = true;
			}
			if ($alterado) {
				header("Location: /users/ver/".$id_usuario);
				exit();
			}
			$this->loadTemplate('user_images',$dados);
		}
		else{
			header("Location: /");
		}
		
	}


	
}