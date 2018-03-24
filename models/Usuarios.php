<?php
class Usuarios extends model
{
	public function add($nome, $email, $senha){
		if ($this->verificaEmail($email)) {
			$sql = $this->db->prepare("insert into usuarios set nome = :nome, email = :email, senha = :senha");
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
}

?>