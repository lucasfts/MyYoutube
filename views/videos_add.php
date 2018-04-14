<form method="post" enctype="multipart/form-data" style="width: 97%; margin: auto;">
	<h2>Videos - Adicionar</h2>
	<p style="color: red"><?php echo $erro; ?></p>
	<input type="file" size="15MB" name="video" class="form-control" accept=".mp4" required>
	<br>

	<label for="titulo">Titulo</label>
	<input type="text" id="titulo" name="titulo" placeholder="Titulo do Video" class="form-control" required>
	<br>

	<label for="categoria">Categoria</label>
	<select name="categoria" id="categoria" class="form-control" required>
		<?php foreach($categorias as $c): ?>
			<option value="<?php echo $c['Id']; ?>"><?php echo $c['Nome']; ?></option>
		<?php endforeach; ?>
	</select>
	<br>

	<label for="descricao">Descrição</label>
	<textarea rows="4" class="form-control" name="descricao" id="descricao"></textarea>
	<br>

	<input type="submit" class="btn btn-default" value="Adicionar Video" style="float: right;">
</form>
<div style="height: 80px;"></div>