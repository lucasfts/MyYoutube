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
				<li><img onclick="toggleLeft()" id="menuimg" src="/assets/images/menu.png"></li>	
				<li><a href="/"><p class="logo">MyYoutube</p></a></li>
				<li>
					<form action="/results">
						<input style="border: 1px solid #555" class="form_item caixa_pesquisa" type="search" name="q" placeholder="Pesquisar" value="<?php echo isset($_GET['q']) ? $_GET['q'] : ""; ?>" required>
						<input class="btn_submit" type="submit" value=" ">
					</form>
					
				</li>
				<?php if (!isset($_SESSION['user'])): ?>
					<li style="float: right;"><a href="/login"><p class="p_login">Fazer Login</p></a></li>
				<?php else: ?>
					<li style="float: right;margin-left: 15px;"><a href="/login/logout"><p class="p_login">Sair</p></a></li>
					<li style="float: right;">
						<a href="/users/ver/<?php echo $usuario['Id']; ?>"><p class="p_login"><?php echo $usuario['Nome']; ?></p></a>
					</li>
				<?php endif ?>
				
			</ul>
		</div>
		<div class="container_left" id="container_left">
			<div>
				<div class="container_left_item">
					<h5>Categorias</h5>
				<ul style="margin-top: 5px;">
					<?php foreach($categorias as $c): ?>
					<li>
						<a href="/results/categoria/<?php echo $c['Id'] ?>">
						<div class="categoria_item">

						<img src="/assets/images/categoria.png">
						<pre><?php echo $c['Nome']; ?></pre><br>
						
						</div>
						</a>
					</li>
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
