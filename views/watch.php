<link rel="stylesheet" type="text/css" href="/assets/css/watch.css">

<div class="video_principal">
	<video src="/assets/videos/videoplayback.mp4" controls="videoplayback"></video>
</div>

<div class="video_secundario">
	<div class="secundario_left">
		<br>
		<h3>Titulo do Video</h3>
		<p style="float: left;">Num View</p>
		<div class="likes_box">
			<button>Like</button>
			<button>DesLike</button>
		</div>
		<br>
		<hr>

		<div class="video_descricao_box">

			<div class="autor_box">
				<img src="/teste.jpg">
				<pre><b style="font-size: 18px;"><br>Nome do Canal </b><br><br><br ><span>Publicado em 01/01/2000</span>
				</pre>
				<button >Inscreva-se</button>

			</div>
			<div style="clear: both;"></div>
			
				<div class="descricao_texto">
					<div align="left">
						sadssads
					</div>
				</div>
			

		</div>
		<div class="comentarios_box">
			<h5>213213 Comnetarios</h5><br>
			<div class="caixa_comentario" id="caixa_comentario">
				

				<div class="caixa_comentario_textarea" >
					<textarea id="textarea" placeholder="Adicione um comentario"></textarea>
				</div>
				<div class="caixa_comentario_img">
					<img src="/teste.jpg" " />
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
		<?php for($i = 0; $i < 10; $i++): ?>
			<a href="#" style="text-decoration: none;color: #000;"><div class="video_recomendado">
				<video src="/assets/videos/videoplayback.mp4"></video>
				<div class="video_recomendado_descricao">
					Titulo d Video<br>
					Num Views
					
				</div>

			</div></a>

		<?php endfor; ?>
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
