<link rel="stylesheet" type="text/css" href="/assets/css/users.css">


<div class="banner">
	<img src="" width="100%" height="100%">
</div>

<div class="user_header">
	<img src="/teste.jpg">
	<div class="user_info">
		<br>
		<b style="font-size: 26px"><?php echo $usuario['Nome']; ?></b><br>
		12312312 inscritos
	</div>
	<button>Inscreva-se</button>
</div>

<div class="container_videos">
	<h1>Videos 
		<?php if(isset($_SESSION['user']) && ($_SESSION['user'] == $usuario['Id'])): ?>
			<a href="/videos/add"><img src="/assets/images/upload.ico" height="55px;"></a>
		<?php endif; ?>
	</h1>
	

	<?php foreach($videos as $v): ?>
		<div class="video_item">
			<video style="background-color: black;" src="/assets/videos/<?php echo $v['Url']; ?>" width="100%" height="150px" ></video>
			<h5><?php echo $v['Titulo']; ?></h5>
			<p>123213213 Visualizações</p>
			<p>123213 Likes  e 14123 DESLIKES</p>
			<?php if(isset($_SESSION['user']) && ($_SESSION['user'] == $usuario['Id'])): ?>
				<a href="/videos/editar/<?php echo $v['Id']; ?>"">Editar</a>
				<a href="/videos/excluir/<?php echo $v['Id']; ?>">Excluir</a>
			<?php endif; ?>
		</div>

	<?php endforeach; ?>
	<div style="clear: both;"></div>
	<br><br>
</div>