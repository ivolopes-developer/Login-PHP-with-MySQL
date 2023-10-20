<?php
	session_start();

	if (!$_SESSION['user']) {
		header('Location: index.php');
		exit();
	}

	if ($_SESSION['acesso'] != 0) {
		echo "
		<script type='text/javascript'> 
			alert('Não tem permissão para editar!');
			location.href='painel.php'; 
		</script>";
		exit();
	}

	$cod_user = intval($_GET['utilizador']);
	$nome = $_GET['nome'];

	$strcon = mysqli_connect('localhost', 'root', '');
	$escolheDB = mysqli_select_db($strcon, 'projetophp') or die("Erro na BD");

	$consulta = "SELECT username, nome, funcao FROM utilizadores, funcoesutilizadores WHERE utilizadores.id = $cod_user AND funcoesutilizadores.id_user = $cod_user";
	$result = mysqli_query($strcon, $consulta);
	$row = mysqli_num_rows($result);

	if ($row == 1) {
		while ($row = mysqli_fetch_array($result)) {
			$db_user= $row['username'];
			$db_nome = $row['nome'];
			$db_funcao = $row['funcao'];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estilos2.css">
	<link rel="icon" href="imagens/iconSite.png" type="image/x-icon"/>
	<title>Editar ficheiros</title>
</head>
<body>
	<div id="principal2">
		<label style="font-size: 20px;">Editar o utilizador <b>'<?php echo $nome ?>' (ID <?php echo $cod_user ?>) </b></label>
		<hr style="margin-bottom: 5%; margin-top: 5%;">
		<form id="form1" method="post" action="autenticacaoEditar.php?p=editar&utilizador=<?php echo $cod_user ?>" enctype="multipart/form-data">
			<input type="text" name="username" placeholder="Novo username" maxlength="20" value="<?php echo $db_user; ?>" required>
			<input type="text" name="nome" placeholder="Novo nome" maxlength="50" value="<?php echo $db_nome; ?>" required>
			<input type="text" name="alcunha" placeholder="Nova Alcunha" maxlength="20" value="<?php echo $db_funcao; ?>" required>
			<input type="password" name="password" placeholder="Nova password" maxlength="16" required>
			<p></p>
			<input id="bt_editar" type="submit" name="bt_editar" value="Editar dados">
		</form>
	</div>
	<div id="header">
		<label style="color: white; margin-left: 20px; margin-right: 10px; vertical-align: middle;">Olá, <?php echo $_SESSION['nome_user']; ?></label>
		<img src="<?php echo 'fotosPerfil/'. $_SESSION['imagem']; ?> " style="width: 30px; height: 30px; border-radius: 5px; vertical-align: middle;">
		<a href="logout.php"><input type="image" title="Terminar Sessão" src="imagens/sair.png" name="sair" width="30px" style="float: right; margin-right: 20px;"></a>
		<hr>
	</div>
	<div id="footer">
		<label>Copyright&copy Ivo Lopes 2018</label>&nbsp&nbsp|&nbsp&nbsp<label>Se quer roubar tem que pagar</label>
	</div>
</body>
</html>