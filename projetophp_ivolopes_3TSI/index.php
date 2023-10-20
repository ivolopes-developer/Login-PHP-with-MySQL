<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="imagens/iconSite.png" type="image/x-icon"/>
	<title>Login</title>
</head>
<body>
	<div class="FormLogin">
		<form id="form1" method="post" action="autenticacao.php">
			<h2 style="font-family: Arial; text-align: center; color: #424242;">Login</h2>
			<input type="text" name="c_user" placeholder="Seu username" maxlength="20" required>
			<input type="Password" name="c_pass" placeholder="Sua password" maxlength="16" required>
			<p>
			<input id="btLogin" type="submit" name="bt_login" value="Login">
			<p>
		</form>
		<div style="text-align: center; font-family: Arial, Sans-Serif; font-size: 12px;">
			<a href="registar.php" id="linkRegisto">Crie uma conta!</a>
		</div>
		<p></p>
		<div class="copyDiv">
			<label id="copyright">Copyright&copy Ivo Lopes, 2019</label>
		</div>
	</div>
	<?php if(isset($_SESSION['naoAutenticado'])): ?>
	<div id="error">
		<label style="color: #efefef; font-family: Arial; font-size: 15px;">Utilizador ou Password estão incorretos</label>
	</div>
	<?php endif; unset($_SESSION['naoAutenticado']) ?>
</body>
</html>
