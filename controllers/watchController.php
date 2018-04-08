<?php
class watchController extends Controller{

	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$dados = array();
		$videos = new Videos();
		$inscricao = new Inscricao();
		$likes = new Likes();
		$comentarios = new Comentarios();
		$usuarios = new Usuarios();

		try {
			if (isset($_GET['v']) && strlen($_GET['v']) == 32) {
				$dados['video'] = $videos->getVideoByHashId($_GET['v']);
				
				// Retorna no máximo 50 videos para as sugestões
				$dados['sugestoes'] = $videos->getRamdomVideos(50);
				$qtlikes = $likes->getLikesByVideoId($dados['video']['Id']);
				$qtdeslikes = $likes->getDeslikesByVideoId($dados['video']['Id']);

				$dados['comentarios'] = $comentarios->getComentarios($dados['video']['Id']);
				
				try {
					if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
						$dados['usuario'] = $usuarios->getUsuario($_SESSION['user']);
						$dados['isInscrito'] = $inscricao->isInscrito($_SESSION['user'],$dados['video']['Id_Usuario']);
						$tipo = $likes->getRegistro($dados['video']['Id'], $_SESSION['user']);
						if ($tipo['Tipo'] == 1) {
							$dados['likeTxt'] = "<b>".$qtlikes."</b>";
							$dados['deslikeTxt'] = $qtdeslikes;
						}
						else{
							$dados['likeTxt'] = $qtlikes;
							$dados['deslikeTxt'] = "<b>".$qtdeslikes."</b>";
						}
					}
					else{
						$dados['likeTxt'] = $qtlikes;
						$dados['deslikeTxt'] = $qtdeslikes;
					}
					
				} catch (Exception $e) {
					$dados['likeTxt'] = $qtlikes;
					$dados['deslikeTxt'] = $qtdeslikes;
				}
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