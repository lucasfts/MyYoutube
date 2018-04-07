<?php
class Usuarios extends model
{
	public function add($nome, $email, $senha){
		if ($this->verificaEmail($email)) {
			$sql = $this->db->prepare("insert into usuarios set nome = :nome, email = :email, senha = :senha, img_fundo = 'banner.png', img_perfil = 'user.png'");
   			$sql->bindValue(":email", $email);
   			$sql->bindValue(":nome", $nome);
   			$sql->bindValue(":senha", $senha);
   			$sql->execute();
		}
		else{
			throw new Exception("O email já está cadastrado", 1);	
		}
	}

   function verificaEmail($email){
   		$sql = $this->db->prepare("select * from usuarios where email = :email");
   		$sql->bindValue(":email", $email);
   		$sql->execute();
   		return ($sql->rowCount() == 0);
   }

   public function getId($email, $senha){
   		$sql = "select id from usuarios where email = :email and senha = :senha";
   		$sql = $this->db->prepare($sql);
   		$sql->bindValue(":email", $email);
   		$sql->bindValue(":senha", $senha);
   		$sql->execute();
   		if ($sql->rowCount() == 0) {
   			throw new Exception("Usuário e/ou Senha incorreto(s)", 1);
   		}
   		$sql = $sql->fetch();
   		return $sql['id'];
   }

   public function getUsuario($id){
      $sql = $this->db->prepare("select * from usuarios where id = :id");
      $sql->bindValue(":id", $id);
      $sql->execute();
      if ($sql->rowCount() == 0) {
            throw new Exception("Usuário inexistente", 1);
      }
      return $sql->fetch();
   }

   public function atualizarImgFundo($id_usuario, $filename){
      $sql = $this->db->prepare("update usuarios set img_fundo = :img_fundo where id = :id");
      $sql->bindValue(":id", $id_usuario);
      $sql->bindValue(":img_fundo", $filename);
      $sql->execute();
   }

   public function atualizarImgPerfil($id_usuario, $filename){
      $sql = $this->db->prepare("update usuarios set img_perfil = :img_perfil where id = :id");
      $sql->bindValue(":id", $id_usuario);
      $sql->bindValue(":img_perfil", $filename);
      $sql->execute();
   }
}

?>