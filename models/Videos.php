<?php 
class Videos extends Model
{
	public function getVideo($id){
		$sql = $this->db->prepare("select * from videos where id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
		if ($sql->rowCount() == 0) {
			throw new Exception("Video not found", 1);
		}
		return $sql->fetch();
	}
	
	public function add($id_usuario,$id_categoria, $url, $titulo, $descricao){
		$sql = "insert into videos
		 set id_usuario = :id_usuario, id_categoria = :id_categoria, url = :url, 
		 titulo = :titulo, descricao = :descricao, data_upload = now()";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id_usuario", $id_usuario);
		$sql->bindValue(":id_categoria", $id_categoria);
		$sql->bindValue(":url", $url);
		$sql->bindValue(":titulo", $titulo);
		$sql->bindValue(":descricao", $descricao);

		$sql->execute();
	}

	public function editar($id, $id_usuario,$id_categoria, $titulo, $descricao){
		$sql = "update videos
		 set id_categoria = :id_categoria, titulo = :titulo, descricao = :descricao
		  where id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->bindValue(":id_categoria", $id_categoria);
		$sql->bindValue(":titulo", $titulo);
		$sql->bindValue(":descricao", $descricao);

		$sql->execute();
	}

	public function excluir($id){
		$sql = $this->db->prepare("delete from videos where id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
	}

	public function getVideosByUserId($id_usuario){
		$sql = $this->db->prepare("select * from videos where id_usuario = :id_usuario");
		$sql->bindValue(":id_usuario", $id_usuario);
		$sql->execute();
		return $sql->fetchAll();
	}

	public function getVideosByCategoriaId($id_categoria, $limit = 0){
		$sql = "select videos.*, usuarios.nome as 'canal' from videos 
		inner join usuarios on usuarios.id = videos.id_usuario 
		where videos.id_categoria = :id_categoria";
		if ($limit > 0) {
			$sql = $sql." limit $limit";
		}

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id_categoria", $id_categoria);
		$sql->execute();
		return $sql->fetchAll();
	}

	public function getRamdomVideos($limit){
		$sql = $this->db->query("select videos.*, usuarios.nome as 'canal' from videos 
		inner join usuarios on usuarios.id = videos.id_usuario
		 order by videos.data_upload limit $limit");
		$sql = $sql->fetchAll();
		shuffle($sql);
		
		return $sql;
	}

	public function getVideoByHashId($hash_id){
		$sql = $this->db->prepare("select videos.* , usuarios.nome as 'canal' from videos 
		inner join usuarios on usuarios.id = videos.id_usuario where md5(videos.id) = :id ");
		$sql->bindValue(":id", $hash_id);
		$sql->execute();
		if ($sql->rowCount() == 0) {
			throw new Exception("Video not found", 1);
		}
		return $sql->fetch();
	}

	public function getUserId($id){
		$sql = $this->db->prepare("select Id_Usuario from videos where id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
		if ($sql->rowCount() == 0) {
			throw new Exception("Usuario não encontrado", 1);
			
		}
		return $sql->fetch()["Id_Usuario"];
	}
}

?>