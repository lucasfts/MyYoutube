<?php
class Categorias extends Model
{	
	public function getCategorias(){
		$sql = $this->db->prepare("select * from categorias");
		$sql->execute();
		return $sql->fetchAll();
	}
}

?>