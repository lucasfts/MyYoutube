<link rel="stylesheet" type="text/css" href="/assets/css/user.css">


<div class="banner">
	<img src="" width="100%" height="100%">
</div>

<div class="user_header">
	<img src="/teste.jpg">
	<div class="user_info">
		<br>
		<b style="font-size: 26px">Canal teste</b><br>
		12312312 inscritos
	</div>
	<button>Inscreva-se</button>
</div>

<div class="container_videos">
	<h1>Videos 
		<a href="#"><img src="/assets/images/upload.ico" height="55px;"></a>
	</h1>
	

	<?php for($i = 0; $i < 30; $i++): ?>
		<div class="video_item">
			<video  src="/assets/videos/videoplayback.mp4" width="100%" height="150px" ></video>
			<h5>Titulo do video</h5>
			<p>123213213 Visualizações</p>
			<p>123213 Likes  e 14123 DESLIKES</p>
			<a href=""">Editar</a>
			<a href="">Excluir</a>
		</div>

	<?php endfor; ?>
	<div style="clear: both;"></div>
</div>