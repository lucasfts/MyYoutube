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
			like deslike
		</div>
		<div class="video_descricao_box">
			
		</div>
	</div>
	<div class="secundario_right">
		<?php for($i = 0; $i < 10; $i++): ?>
			<div class="video_recomendado">
				<video src="/assets/videos/videoplayback.mp4"></video>
				<div class="video_recomendado_descricao">
					Titulo d Video<br>
					Num Views
					
				</div>
			</div>

		<?php endfor; ?>
	</div>

</div>
