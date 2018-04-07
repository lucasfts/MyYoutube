<link rel="stylesheet" type="text/css" href="/assets/css/users.css">


<div class="banner" style="background-image: url('/assets/images/<?php echo $usuario['img_fundo'] ?>'); ">
	<a href="/users/images/<?php echo $usuario['Id']; ?>" id="linkImagem" ><span id="imgCamera"><img src="/assets/images/camera.png" height="100%" style="margin-right: 7px;">Alterar imagens</span></a>
</div>

<div class="user_header">
	<img  src="/assets/images/<?php echo $usuario['img_perfil']; ?>">
	<div class="user_info">
		<br>
		<b style="font-size: 26px"><?php echo $usuario['Nome']; ?></b><br>
		<text id="totalInscritos"><?php echo $totalInscritos; ?></text> Inscritos
	</div>
	<?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
		<?php if($_SESSION['user'] != $usuario['Id']): ?>
			<?php if($isInscrito): ?>
				<button style="background-color: gray;" onclick="Inscrever(this)" data-userid="<?php echo $_SESSION['user'] ?>" data-canalid="<?php echo $usuario['Id'] ?>">Inscrito</button>
			<?php else: ?>
				<button  onclick="Inscrever(this)" data-userid="<?php echo $_SESSION['user'] ?>" data-canalid="<?php echo $usuario['Id'] ?>">Inscreva-se</button>
			<?php endif; ?>
		<?php endif; ?>
	<?php else: ?>
		<a href="/login"><button>Inscreva-se</button></a>
	<?php endif ?>
</div>

<div class="container_videos">
	<h1>Videos 
		<?php if(isset($_SESSION['user']) && ($_SESSION['user'] == $usuario['Id'])): ?>
			<a href="/videos/add"><img src="/assets/images/upload.ico" height="55px;"></a>
		<?php endif; ?>
	</h1>
	

	<?php foreach($videos as $v): ?>
		<div class="video_item">
			<a style="width: 100%" href="/watch?v=<?php echo md5($v['Id']) ?>">
				<video poster style="background-color: black;" src="/assets/videos/<?php echo $v['Url']; ?>" width="100%" height="150px" ></video>
			</a>
			<h5><?php echo $v['Titulo']; ?></h5>
			<p><?php echo $v['Views']; ?> Visualizações</p>
			<p><?php echo $v['likes']; ?> Likes - <?php echo $v['deslikes']; ?> Deslikes</p>
			<?php if(isset($_SESSION['user']) && ($_SESSION['user'] == $usuario['Id'])): ?>
				<a href="/videos/editar/<?php echo $v['Id']; ?>"">Editar</a>
				<a href="/videos/excluir/<?php echo $v['Id']; ?>">Excluir</a>
			<?php endif; ?>
		</div>

	<?php endforeach; ?>
	<div style="clear: both;"></div>
	<br><br>
</div>