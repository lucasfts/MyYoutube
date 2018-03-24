<form method="post" enctype="multipart/form-data" style="width: 97%; margin: auto;">
	<h2>Videos - Editar</h2>
	<p style="color: red"><?php echo $erro; ?></p>
	<video width="100%" height="400px;" style="background-color: black" src="/assets/videos/<?php echo $video['Url']; ?>" ></video>
	<br>

	<label for="titulo">Titulo</label>
	<input type="text" id="titulo" name="titulo" placeholder="Titulo do Video" class="form-control" required value="<?php echo $video['Titulo'] ?>">
	<br>

	<label for="categoria">Categoria</label>
	<select name="categoria" id="categoria" class="form-control" required>
		<?php foreach($categorias as $c): ?>
			<option <?php echo ($c['Id'] == $video['Id_Categoria']) ? "selected" : "" ; ?> value="<?php echo $c['Id']; ?>"><?php echo $c['Nome']; ?></option>
		<?php endforeach; ?>
	</select>
	<br>

	<label for="descricao">Descrição</label>
	<textarea rows="4" class="form-control" name="descricao" id="descricao"><?php echo $video['Descricao'] ?></textarea>
	<br>

	<input type="submit" class="btn btn-default" value="Editar Video" style="float: right;">
</form>
<div style="height: 80px;"></div>