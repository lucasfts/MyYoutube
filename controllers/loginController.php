<?php
class loginController extends Controller{

	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$dados = array('erro' => '');
		if (isset($_POST['email']) && !empty($_POST['email'])) {
			try {
				$email = addslashes($_POST['email']);
				$senha = md5($_POST['senha']);
				$usuarios = new Usuarios();
				$_SESSION['user'] = $usuarios->getId($email, $senha);
				header("Location: /");
			} catch (Exception $e) {
				$dados["erro"] = $e->getMessage();
			}
		}

		$this->loadView('login',$dados);
	}

	public function cadastrar(){
		$dados = array("erro" => "");

		if (isset($_POST['email']) && !empty($_POST['email'])) {
			try {
				$nome = addslashes($_POST['nome']);
				$email = addslashes($_POST['email']);
				$senha = md5($_POST['senha']);
				$senha_confirmar = md5($_POST['senha_confirmar']);
				if ($senha != $senha_confirmar) {
					throw new Exception("As senhas não coincidem", 1);
				}
				$usuarios = new Usuarios();
				$usuarios->add($nome, $email, $senha);
				echo "<h1 style='color:green;'>Cadastro efetuado com sucesso</h1>";
				exit();
			} catch (Exception $e) {
				$dados["erro"] = $e->getMessage();
			}
		}

		$this->loadView('login_cadastrar',$dados);
	}

	public function logout(){
		unset($_SESSION['user']);
		header("Location: /");
	}

}

?>