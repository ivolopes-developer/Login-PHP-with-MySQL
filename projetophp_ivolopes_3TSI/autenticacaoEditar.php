<?php 
	session_start();

	if (empty($_POST['username']) || empty($_POST['nome']) || empty($_POST['password'])) {
		echo "
		<script type='text/javascript'> 
			alert('ESTÁ VAZIO!!');
			location.href='painel.php'; 
		</script>";
		exit();
	}

	$cod_user = intval($_GET['utilizador']);

	//conexao com BD
	$strcon = mysqli_connect('localhost', 'root', '');
	$escolheDB = mysqli_select_db($strcon, 'projetophp') or die("Erro na BD");

	$novo_username = $_POST['username'];
	$novo_nome_utilizador = $_POST['nome'];
	$nova_alcunha = $_POST['alcunha'];
	$nova_password = $_POST['password'];

	//insere os dados do registo na base de dados
	$sql = "UPDATE utilizadores, funcoesutilizadores SET utilizadores.username = '$novo_username', utilizadores.nome = '$novo_nome_utilizador', utilizadores.password = md5('$nova_password'), funcoesutilizadores.funcao = '$nova_alcunha' WHERE utilizadores.id = $cod_user AND funcoesutilizadores.id_user = $cod_user";
	if (mysqli_query($strcon, $sql)) {
		echo "<script type='text/javascript'> location.href='painel.php'; </script>";
		mysqli_close($strcon);
		exit();
	} else {
		echo "
		<script type='text/javascript'> 
			alert('Não foi possível editar o utilizador');
			location.href='painel.php'; 
		</script>";
		mysqli_close($strcon);
		exit();
	}
	
 ?>