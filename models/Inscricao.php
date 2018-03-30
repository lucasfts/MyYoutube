<?php
class Inscricao extends Model
{	
	public function isInscrito($userid,$canalid){
		$sql = "select count(*) qtd from inscricao where id_canal = :canalid and id_inscrito = :userid";
		$sql = $this->db->prepare($sql);
		$sql->bindValue("canalid", $canalid);
		$sql->bindValue("userid", $userid);
		$sql->execute();
		return ($sql->fetch()['qtd']) > 0;
	}

	public function addInscrito($userid, $canalid){
		$sql = "insert into inscricao (id_canal, id_inscrito) values (:canalid, :userid)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue("canalid", $canalid);
		$sql->bindValue("userid", $userid);
		$sql->execute();
	}

	public function deleteInscrito($userid, $canalid){
		$sql = "delete from inscricao where id_inscrito = :userid and id_canal = :canalid";
		$sql = $this->db->prepare($sql);
		$sql->bindValue("canalid", $canalid);
		$sql->bindValue("userid", $userid);
		$sql->execute();
	}

	public function getTotalInscritos($canalid){
		$sql = "select count(*) qtd from inscricao where id_canal = :canalid";
		$sql = $this->db->prepare($sql);
		$sql->bindValue("canalid", $canalid);
		$sql->execute();
		return $sql->fetch()['qtd'];
	}
}

?>