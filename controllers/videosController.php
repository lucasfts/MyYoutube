<?php
class videosController extends Controller{

	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		header("Location: /");
	}

	public function add(){
		$dados = array("erro" => "");
		$categorias = new Categorias();
		if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
			try {
				if ($_FILES['video']['type'] != "video/mp4") {
					throw new Exception("Adicionar apenas videos em formato .mp4", 1);
				}
				$filename = md5($_FILES['video']['tmp_name'].rand(0,9999)).".mp4";
				$id_usuario = $_SESSION['user'];
				$id_categoria = addslashes($_POST['categoria']);
				$titulo = addslashes($_POST['titulo']);
				$descricao = addslashes($_POST['descricao']);

				$videos = new Videos();
				$videos->add($id_usuario,$id_categoria, $filename, $titulo, $descricao);

				header("Location: /users/ver/".$id_usuario);

				move_uploaded_file($_FILES['video']['tmp_name'], "./assets/videos/".$filename);
			} catch (Exception $e) {
				
				$dados['erro'] = $e->getMessage();
			}
			
		}
		$videos = new Videos();

		$dados['categorias'] = $categorias->getCategorias();
		$this->LoadTemplate("videos_add",$dados);
	}

	public function editar($id){
		$dados = array("erro" => "");
		$videos = new Videos();
		$categorias = new Categorias();

		try {
			if ($videos->getUserId($id) != $_SESSION['user']) {
				header("Location : /") ;  exit();
			}
			$dados['video'] = $videos->getVideo($id);
		} catch (Exception $e) {
			header("Location : /");
		}

		if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
			try {
				$id_usuario = $_SESSION['user'];
				$id_categoria = addslashes($_POST['categoria']);
				$titulo = addslashes($_POST['titulo']);
				$descricao = addslashes($_POST['descricao']);
			
				$videos->editar($id, $id_usuario,$id_categoria, $titulo, $descricao);

				header("Location: /users/ver/".$id_usuario);
			} catch (Exception $e) {
				
				$dados['erro'] = $e->getMessage();
			}
			
		}

		
		$dados['categorias'] = $categorias->getCategorias();
		$this->LoadTemplate("videos_editar",$dados);
	}

	public function excluir($id){
		$dados = array("erro" => "");
		$videos = new Videos();

		try {
			if ($videos->getUserId($id) != $_SESSION['user']) {
				header("Location : /") ;  exit();
			}
			$videos->excluir($id);
			header("Location: /users/ver/".$_SESSION['user']);
		} catch (Exception $e) {
			header("Location : /");
		}
		
	}

}

?>