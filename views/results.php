<link rel="stylesheet" type="text/css" href="/assets/css/results.css"></link>
<div class="resultados">
	<?php foreach($videos as $v): ?>
		<div class="result_item">
			<a href="/watch?v=<?php echo md5($v['Id']); ?>">
				<video src="/assets/videos/<?php echo $v['Url'] ?>"></video>
				<div class="info">
					<h3><?php echo $v['Titulo'] ?><h3>
						<h5>Canl x  -  1233 Visualizações</h5>
						<p><?php echo $v['Descricao'] ?></p>
					</div>
				</div>
			</a>
		<?php endforeach; ?>
	</div>