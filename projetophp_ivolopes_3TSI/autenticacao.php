<?php 
	session_start();
	
	if (empty($_POST['c_user']) || empty($_POST['c_pass'])) {
		header('Location: index.php');
		exit();
	}

	$strcon = mysqli_connect('localhost', 'root', '');
	$escolheDB = mysqli_select_db($strcon, 'projetophp') or die("Erro na BD");
	
	//metodo de armazenamento de dados que previne brute force no login do site
	$user = mysqli_real_escape_string($strcon, $_POST['c_user']);
	$pass = mysqli_real_escape_string($strcon, $_POST['c_pass']);

	$query = "SELECT id, username, password, nome, foto_perfil, nivel_acesso FROM utilizadores WHERE username = '{$user}' AND password = md5('{$pass}')";
	$result = mysqli_query($strcon, $query);
	$row = mysqli_num_rows($result);
	
	if ($row == 1) {
		$_SESSION['user'] = $user;
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['id'] = $row['id'];
			$_SESSION['nome_user'] = $row['nome'];
			$_SESSION['imagem'] = $row['foto_perfil'];
			$_SESSION['acesso'] = $row['nivel_acesso'];
		}
		$id = $_SESSION['id'];
		//ir buscar a funcao do utilizador logado
		$query2 = "SELECT funcao FROM funcoesutilizadores WHERE id_user = $id";
		$result2 = mysqli_query($strcon, $query2);
		$row2 = mysqli_num_rows($result2);
		if ($row2 == 1) {
			while ($row2 = mysqli_fetch_array($result2)) {
				$_SESSION['function'] = $row2['funcao'];
			}
			header('Location: painel.php');
			exit();
		} else {
			$_SESSION['naoAutenticado'] = true; //session para informar que utilizador não está autenticado
			header('Location: index.php');
			exit();
		}
	} else {
		$_SESSION['naoAutenticado'] = true; //session para informar que utilizador não está autenticado
		header('Location: index.php');
		exit();
	}
?>