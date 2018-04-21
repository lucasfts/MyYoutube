<form method="post" enctype="multipart/form-data" style="width: 97%; margin: auto;">
	<h2>Videos - Adicionar</h2>
	<p style="color: red"><?php echo $erro; ?></p>

		<video height="300px;" width="100%"  onloadeddata="createThumb()"  controls src="" id="video" ></video>
	
	<canvas id="canvas" hidden>
		
	</canvas>
	
	<input  type="file" onchange="preview(this)" size="15MB" name="video" class="form-control" accept=".mp4" required>
	<br>

	<input type="text" name="thumbnail" hidden id="thumbnail">

	<label for="titulo">Titulo</label>
	<input type="text" id="titulo" name="titulo"  placeholder="Titulo do Video" class="form-control" required>
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

<script type="text/javascript">
	function preview(input) { 
	 	if (input.files && input.files[0]) {
	 	 var reader = new FileReader(); 
	 	 reader.onload = function (e) {
	 	 		$('#video') .attr('src', e.target.result); 
	 		}; 
	 	reader.readAsDataURL(input.files[0]); 
	 	} 
	 	
	}

	function createThumb(){
		var vid = document.getElementById("video");
	    var canvas = document.getElementById('canvas');
	    var ctx = canvas.getContext('2d');

	    canvas.width = 250;
	    canvas.height = 150;

	    ctx.drawImage(vid, 0, 0, 250, 150);
	    var canvasData = canvas.toDataURL("image/jpeg"); 

	    var thumbnail = document.getElementById("thumbnail");
	   	thumbnail.value = canvasData.replace("data:image/jpeg;base64,","");
	    
	}
</script>