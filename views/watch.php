<link rel="stylesheet" type="text/css" href="/assets/css/watch.css">

<div class="video_principal">
	<video src="/assets/videos/<?php echo $video['Url']; ?>" controls="videoplayback"></video>
</div>

<div class="video_secundario">
	<div class="secundario_left">
		<br>
		<h3><?php echo $video['Titulo']; ?></h3>
		<p style="float: left;">Num View</p>
		<div class="likes_box">
			<button>Like</button>
			<button>DesLike</button>
		</div>
		<br>
		<hr>

		<div class="video_descricao_box">

			<div class="autor_box">
				<a href="/users/ver/<?php echo $video['Id_Usuario'] ?>"><img src="/teste.jpg"></a>
				<pre><b style="font-size: 18px;"><br><a href="/users/ver/<?php echo $video['Id_Usuario'] ?>" style="color: black;"><?php echo $video['canal']; ?></a></b><br><br><br ><span>Publicado em 01/01/2000</span>
				</pre>
				<?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
					<button onclick="Inscrever(this)" data-userid="<?php echo $_SESSION['user'] ?>" data-canalid="<?php echo $video['Id_Usuario'] ?>">Inscreva-se</button>
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
			<h5>213213 Comentários</h5><br>
			<div class="caixa_comentario" id="caixa_comentario">
				
				<div class="caixa_comentario_img">
					<img src="/teste.jpg" " />
				</div>
				<div class="caixa_comentario_textarea" >
					<textarea id="textarea" placeholder="Adicione um comentario"></textarea>
					<button class="btn btn-default">Comentar</button>	
				</div>
				
				<div style="clear: both;"></div>
				

				</div>
				
			<?php for($i = 0; $i < 10; $i++): ?>
				<div class="comentario_item">

				<img src="/teste.jpg">
				<pre class="comentario_autor">Nome do Canal</pre><br>
				<pre class="comentario_texto">fasdfasdfasdfasdfasdf</pre>
				</div>
			<?php endfor; ?>
		</div>
	</div>
	<div class="secundario_right">
		<?php $qtd = 0; ?>
		<?php foreach($sugestoes as $s): ?>
			<a href="/watch?v=<?php echo md5($s['Id']); ?>" style="text-decoration: none;color: #000;"><div class="video_recomendado">
				<video src="/assets/videos/<?php echo $s['Url'] ?>"></video>
				<div class="video_recomendado_descricao">
					<b><?php echo $s['Titulo'] ?></b><br>
					<?php echo $s['canal']; ?><br>
					Num Views	
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
</script>
