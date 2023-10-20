<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="imagens/iconSite.png" type="image/x-icon"/>
	<title>Registo</title>
</head>
<body>
	<div class="FormLogin">
		<form id="form2" method="post" action="autenticacaoRegisto.php" enctype="multipart/form-data">
			<h2 style="font-family: Arial; text-align: center; color: #424242;">Registo</h2>
			<input type="text" name="c_user" placeholder="Seu username" maxlength="20" required>
			<input type="text" name="c_nome" placeholder="Seu nome" maxlength="50" required>
			<hr>
			<input type="Password" name="c_pass" placeholder="Sua password" maxlength="16" required>
			<input type="text" name="c_func" placeHolder="Sua alcunha" maxlength="20" required>
			<p></p>
			<div style="text-align: center;">
				<label style="font-family: Arial; font-size: 14px; vertical-align: top;">Foto de perfil</label>	
				<input type="file" accept=".png,.jpg" name="fotoPerfil" required>
			</div>
			<p></p>
			<hr>
			<input id="btRegistar" type="submit" name="bt_registar" value="Registar">
			<p></p>
		</form>
		<div style="text-align: center; font-family: Arial, Sans-Serif; font-size: 12px;">
			<a href="index.php" id="linkRegisto">Volte para o Login</a>
		</div>
		<p></p>
		<div class="copyDiv">
			<label id="copyright">Copyright&copy Ivo Lopes, 2019</label>
		</div>
	</div>
	<?php if(isset($_SESSION['extincao'])): ?>
	<div id="error">
		<label style="color: #efefef; font-family: Arial; font-size: 15px;">Tipo de ficheiro incorreto (apenas .png / .jpg)</label>
	</div>
	<?php endif; unset($_SESSION['extincao']); ?>
	<?php if(isset($_SESSION['failed'])): ?>
	<div id="error">
		<label style="color: #efefef; font-family: Arial; font-size: 15px;">Utilizador já existe!</label>
	</div>
	<?php endif; unset($_SESSION['failed']); ?>
	<?php if(isset($_SESSION['sucesso'])): ?>
	<div id="success">
		<label style="color: #efefef; font-family: Arial; font-size: 15px;">Registado com sucesso!</label>
	</div>
	<?php endif; unset($_SESSION['sucesso']); ?>
</body>
</html>
