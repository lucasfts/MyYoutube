<link rel="stylesheet" type="text/css" href="/assets/css/home.css">

<?php for($i = 0; $i< 15; $i++): ?>
	<h5>Categoria</h5>
	<div class="item_right">

		<div class="slider_items">
			<?php for($j = 0; $j< 5; $j++): ?>
				<div class="video_item">
					<a href="#"><video class="video_item_frame" src="/assets/videos/videoplayback.mp4"></video></a>
					<div class="descricao">
						<a href="/watch" class="titulo_video">Titulo asd saddasdasdasd asdasdasd</a><br>
						<span>Autor</span> <br>
						<span>Visualizações</span>
					</div>					
				</div>
			<?php endfor; ?>
		</div>


	</div>
<?php endfor; ?>	