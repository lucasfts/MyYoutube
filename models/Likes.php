<?php
class Likes extends Model
{	
	// Coluna Tipo
	// 0 -> Deslike
	// 1 -> Like

	public function getRegistro($videoId, $userId){
		$sql = $this->db->prepare("select * from likes where Id_Video = :videoId and Id_Usuario = :userId");
		$sql->bindValue(":videoId", $videoId);
		$sql->bindValue(":userId", $userId);
		$sql->execute();
		if ($sql->rowCount() == 0) {
			throw new  Exception("Registro não existe", 1);
			
		}
		return $sql->fetch();
	}

	public function atualizarTipo($videoId, $userId, $tipo){
		$sql = $this->db->prepare("update likes set tipo = :tipo where id_usuario = :userId and id_video = :videoId");
		$sql->bindValue(":videoId", $videoId);
		$sql->bindValue(":userId", $userId);
		$sql->bindValue(":tipo", $tipo);
		$sql->execute();
	}

	public function addLike($userId, $videoId){
		$sql = $this->db->prepare("insert into likes set id_usuario = :userId, id_video = :videoId, tipo = 1");
		$sql->bindValue(":videoId", $videoId);
		$sql->bindValue(":userId", $userId);
		$sql->execute();
	}

	public function addDeslike($userId, $videoId){
		$sql = $this->db->prepare("insert into likes set id_usuario = :userId, id_video = :videoId, tipo = 0");
		$sql->bindValue(":videoId", $videoId);
		$sql->bindValue(":userId", $userId);
		$sql->execute();
	}

	public function getLikesByVideoId($videoId){
		$sql = $this->db->prepare("select count(*) qtd from likes where Id_Video = :videoId and tipo = 1");
		$sql->bindValue(":videoId", $videoId);
		$sql->execute();
		return $sql->fetch()['qtd'];
	}

	public function getDeslikesByVideoId($videoId){
		$sql = $this->db->prepare("select count(*) qtd from likes where Id_Video = :videoId and tipo = 0");
		$sql->bindValue(":videoId", $videoId);
		$sql->execute();
		return $sql->fetch()['qtd'];
	}

	public function deleteRegistro($userId,$videoId){
		$sql = $this->db->prepare("delete from likes where Id_Video = :videoId and Id_Usuario = :userId");
		$sql->bindValue(":videoId", $videoId);
		$sql->bindValue(":userId", $userId);
		$sql->execute();
		return $sql->fetch();
	}
}

?>