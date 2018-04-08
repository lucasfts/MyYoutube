<?php
class Comentarios extends Model
{	
	public function addComentario($userId, $videoId, $comentario){
		$sql = "insert into comentarios set Id_Usuario = :userId, Id_Video = :videoId, Comentario = :comentario, Data = now()";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":userId", $userId);
		$sql->bindValue(":videoId", $videoId);
		$sql->bindValue(":comentario", $comentario);
		$sql->execute();
	}

	public function getComentarios($videoId){
		$sql = $this->db->prepare("select comentarios.*, usuarios.nome as 'Autor', usuarios.img_perfil as 'Autor_Img' from comentarios inner join usuarios on comentarios.Id_Usuario = usuarios.id where comentarios.Id_Video = :videoId order by comentarios.Data desc");
		$sql->bindValue(":videoId",$videoId);
		$sql->execute();
		return $sql->fetchAll();
	}

}

?>