<link rel="stylesheet" type="text/css" href="/assets/css/home.css">

<?php foreach($categorias as $c): ?>
	<h5><?php echo $c["Nome"]; ?></h5>
	<div class="item_right" onmouseover="MostrarScroll(this)" onmouseout="EsconderScroll(this)">

		<div class="slider_items"  >
			<?php for($j = 0; $j< 5; $j++): ?>
				<div class="video_item">
					<a href="/watch"><video class="video_item_frame" src="/assets/videos/videoplayback.mp4"></video></a>
					<div class="descricao">
						<a href="/watch" class="titulo_video">Titulo asd saddasdasdasd asdasdasd</a><br>
						<span>Autor</span> <br>
						<span>Visualizações</span>
					</div>					
				</div>
			<?php endfor; ?>
		</div>


	</div>
<?php endforeach; ?>	