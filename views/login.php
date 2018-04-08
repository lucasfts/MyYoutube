<!DOCTYPE html>
<html>
<head>
	<title>MyYoutube</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/login.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
</head>
<body>
	<div class="formulario">
		<form method="post">
			<img src="/assets/images/logo.png" style="margin-bottom: 8px;" width="100%" height="150px">
			<p style="color: red; text-align: center;"><?php echo $erro; ?></p>
			<input type="email" name="email" id="email" class="form-control" placeholder="Email">
			<br>
			<input type="password" name="senha" id="senha" class="form-control" placeholder="Senha">
			<br>
			<input type="submit" value="Login" class="btn btn-danger" >
			<div class="link">
				<a href="/login/cadastrar" >Cadastre-se</a>
			</div>
			
		</form>
	</div>
</div>
</body>
</html>