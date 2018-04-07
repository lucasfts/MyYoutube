<link rel="stylesheet" type="text/css" href="/assets/css/watch.css">

<div class="video_principal">
	<video poster src="/assets/videos/<?php echo $video['Url']; ?>" controls="videoplayback" ></video>
</div>

<div class="video_secundario">
	<div class="secundario_left">
		<br>
		<h3><?php echo $video['Titulo']; ?></h3>
		<p style="float: left;"><?php echo $video['Views'] ?> Visualizações</p>
		<div class="likes_box">
			<?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
				<img onclick="like(this)" id="likeImg" data-userid="<?php echo $_SESSION['user'] ?>" data-videoid="<?php echo $video['Id'] ?>" src="/assets/images/like.png">
				<span id="likeTxt"><?php echo $likeTxt; ?></span>

				<img onclick="deslike(this)" id="deslikeImg" data-userid="<?php echo $_SESSION['user'] ?>" data-videoid="<?php echo $video['Id'] ?>" src="/assets/images/deslike.png">
				<span id="deslikeTxt"><?php echo $deslikeTxt; ?></span>
			<?php else: ?>
				<img onclick="window.location.href='/login'" id="likeImg" src="/assets/images/like.png">
				<span id="likeTxt"><?php echo $likeTxt; ?></span>

				<img onclick="window.location.href='/login'" id="deslikeImg" id="deslikeImg" src="/assets/images/deslike.png">
				<span id="deslikeTxt"><?php echo $deslikeTxt; ?></span>
			<?php endif ?>
		</div>
		<br>
		<hr>

		<div class="video_descricao_box">

			<div class="autor_box">
				<a href="/users/ver/<?php echo $video['Id_Usuario'] ?>"><img src="/assets/images/<?php echo $video['canal_img']; ?>"></a>
				<pre><b style="font-size: 18px;"><br><a href="/users/ver/<?php echo $video['Id_Usuario'] ?>" style="color: black;"><?php echo $video['canal']; ?></a></b><br><br><br ><br><span>Publicado em <?php echo date("d/m/Y",strtotime($video['Data_Upload'])); ?></span>
				</pre>
				<?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
					<?php if($_SESSION['user'] != $video['Id_Usuario']): ?>
						<?php if($isInscrito): ?>
							<button style="background-color: gray;" onclick="Inscrever(this)" data-userid="<?php echo $_SESSION['user'] ?>" data-canalid="<?php echo $video['Id_Usuario'] ?>">Inscrito</button>
						<?php else: ?>
							<button onclick="Inscrever(this)" data-userid="<?php echo $_SESSION['user'] ?>" data-canalid="<?php echo $video['Id_Usuario'] ?>">Inscreva-se</button>
						<?php endif; ?>
					<?php endif; ?>
				<?php else: ?>
					<a href="/login"><button>Inscreva-se</button></a>
				<?php endif ?>
				

			</div>
			<div style="clear: both;"></div>
			
				<div class="descricao_texto">
					<div align="left">
						<?php echo $video['Descricao']; ?>
					</div>
				</div>
			

		</div>
		<div class="comentarios_box">
			<h5 ><text id="qtComentarios"><?php echo count($comentarios); ?></text> Comentários</h5><br>
			<div class="caixa_comentario" id="caixa_comentario">
				
				<div class="caixa_comentario_img">
					<img src="/assets/images/<?php echo isset($_SESSION['user']) ? $usuario['img_perfil'] : "user.png"; ?>" />
				</div>
				<div class="caixa_comentario_textarea" >
					<textarea rows="1" id="textarea" placeholder="Adicione um comentario" onkeyup="resizeLinhas()"></textarea>
					<?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
						<button class="btn btn-default" onclick="Comentar(this)" data-userid="<?php echo $_SESSION['user'] ?>" data-videoid="<?php echo $video['Id'] ?>" data-canalnome="<?php echo $video['canal']; ?>"  data-imgperfil="<?php echo $usuario['img_perfil'] ?>">Comentar</button>	
					<?php else: ?>
						<button class="btn btn-default" onclick="window.location.href='/login'" >Comentar</button>	
					<?php endif; ?>
				</div>
				
				<div style="clear: both;"></div>
				

				</div>
				<div id="container_comentarios">
			<?php foreach($comentarios as $c): ?>
				<div class="comentario_item">

				<a href="/users/ver/<?php echo $c['Id_Usuario']; ?>">
					<img src="/assets/images/<?php echo $c['Autor_Img']; ?>">
					<pre class="comentario_autor"><?php echo $c['Autor']; ?></pre><br>
				</a>	
				<pre class="comentario_texto"><?php echo $c['Comentario']; ?></pre>
				</div>
			<?php endforeach; ?>
			</div>
		</div>
	</div>
	<div class="secundario_right">
		<?php $qtd = 0; ?>
		<?php foreach($sugestoes as $s): ?>
			<a href="/watch?v=<?php echo md5($s['Id']); ?>" style="text-decoration: none;color: #000;"><div class="video_recomendado">
				<video poster src="/assets/videos/<?php echo $s['Url'] ?>"></video>
				<div class="video_recomendado_descricao">
					<b><?php echo $s['Titulo'] ?></b><br>
					<?php echo $s['canal']; ?><br>
					<?php echo $s['Views']; ?> Visualizações	
				</div>

			</div></a>
			<?php 
				$qtd++;
				if ($qtd == 10) break;
			?>
		<?php endforeach; ?>
	</div>

</div>

<script type="text/javascript">

	var atualizar = setInterval("redimensionarTextarea()",100);

	function redimensionarTextarea(){
		var caixa = $("#caixa_comentario");
		var textarea = $("#textarea");
		caixa.height(textarea.height())  ;
	}

	function resizeLinhas(){
		var linhas =  $("#textarea").val().split("\n").length;
		$("#textarea").attr("rows",linhas);
	}
</script>
