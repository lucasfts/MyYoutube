<!DOCTYPE html>
<html>
<head>
	<title>Jogo da Forca</title>
	<script type="text/javascript" src="/assets/js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
		<div class="topo">
			<ul class="">
				<li><a href="#"><p class="logo">MyYoutube</p></a></li>
				<li>
					<form>
						<input class="form_item caixa_pesquisa" type="search" name="" placeholder="Pesquisar">
						<input class="btn_submit" type="submit" value="ir">
					</form>
					
				</li>
				<li style="float: right;"><a href="#"><p class="p_login">Fazer Login</p></a></li>
			</ul>
		</div>
		<div class="container_left">
			<div>
				<div class="container_left_item">
					<p>Categorias</p>
				<ul>
					<li>testr</li>
					<li>testr</li>
				</ul>
				</div>
				
			</div>
		</div>
		<div class="container_right">
			<?php for($i = 0; $i< 15; $i++): ?>
			<div class="item_right">
				
				
					<div class="slider_items">
						<?php for($j = 0; $j< 5; $j++): ?>
					<div class="video_item">
					<a href="#"><video class="video_item_frame" src="/assets/videos/videoplayback.mp4"></video></a>
					<div class="descricao">
						<a href="#" class="titulo_video">Titulo asd saddasdasdasd asdasdasd</a><br>
						<span>Autor</span> <br>
						<span>Visualizações</span> <br>
					</div>					
				</div>
				<?php endfor; ?>
				</div>

				
			</div>
		<?php endfor; ?>

		</div>
	</body>
	</html>
	<?php $this->loadViewInTemplate($viewName,$viewData); ?>
</body>
</html>
