<!DOCTYPE html>
<html>
<head>
	<title>MyYoutube</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
		<div class="topo">	
			<ul>
				<li><button style="height:30px;line-height:20px;" onclick="toggleLeft()"><img id="menuimg" src="/assets/images/menu.png"></button></li>	
				<li><a href="/"><p class="logo">MyYoutube</p></a></li>
				<li>
					<form>
						<input style="border: 1px solid #555" class="form_item caixa_pesquisa" type="search" name="" placeholder="Pesquisar">
						<input class="btn_submit" type="submit" value="ir">
					</form>
					
				</li>
				<?php if (!isset($_SESSION['user'])): ?>
					<li style="float: right;"><a href="/login"><p class="p_login">Fazer Login</p></a></li>
				<?php else: ?>
					<li style="float: right;margin-left: 15px;"><a href="/login/logout"><p class="p_login">Sair</p></a></li>
					<li style="float: right;">
						<a href="#"><p class="p_login">Nome do Canal</p></a>
					</li>
				<?php endif ?>
				
			</ul>
		</div>
		<div class="container_left" id="container_left">
			<div>
				<div class="container_left_item">
					<p>Categorias</p>
				<ul>
					<?php foreach($categorias as $c): ?>
					<a href="/results?c=<?php echo $c['Id'] ?>"><li>
						<div class="categoria_item">

						<img src="/teste.jpg">
						<pre><?php echo $c['Nome']; ?></pre><br>
						
						</div>
					</li></a>
				<?php endforeach; ?>
					
				</ul>
				</div>
				
			</div>
		</div>
		<div class="container_right" id="container_right" >
			<?php $this->loadViewInTemplate($viewName,$viewData); ?>
		</div>
	
</body>
</html>

<script type="text/javascript" src="/assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/js/script.js"></script>
