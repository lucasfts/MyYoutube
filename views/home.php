<link rel="stylesheet" type="text/css" href="/assets/css/home.css">

<?php foreach($categorias as $c): ?>
	<h5><?php echo $c["Nome"]; ?></h5>
	<div class="item_right" onmouseover="MostrarScroll(this)" onmouseout="EsconderScroll(this)">
		<div class="slider_items"  >
			<?php foreach($c['videos'] as $v): ?>
				<div class="video_item">
					<a href="/watch?v=<?php echo md5($v['Id']); ?>"><video poster class="video_item_frame" src="/assets/videos/<?php echo $v['Url'] ?>"></video></a>
					<div class="descricao">
						<a href="/watch" class="titulo_video"><?php echo $v['Titulo']; ?></a><br>
						<span>Autor: <?php echo $v['canal']; ?></span> <br>
						<span>Visualizações</span>
					</div>					
				</div>
			<?php endforeach; ?>
		</div>


	</div>
<?php endforeach; ?>	