<?php
	session_start();
	if (empty($_POST['c_user']) || empty($_POST['c_nome']) || empty($_POST['c_pass']) || empty($_POST['c_func'])) {
		header('Location: registar.php');
		exit();
	}
	//conexao com BD
	$strcon = mysqli_connect('localhost', 'root', '');
	$escolheDB = mysqli_select_db($strcon, 'projetophp') or die("Erro na BD");
	//---------------------------------------------
	$user = $_POST['c_user'];
	$nome = $_POST['c_nome'];
	$pass = $_POST['c_pass'];
	$func = $_POST['c_func'];
	
	//tratamento do upload de foto
	$extensao = strtolower(substr($_FILES['fotoPerfil']['name'], -4)); //transforma a extenção do ficheiro todo em minusculas

	if (($extensao == '.png') || ($extensao == '.jpg')) {
		$novo_nome = md5(time()) . $extensao; //encripta o nome do ficheiro para evitar que existam nomes de ficheiros iguais mas de imagens diferentes
		$pasta_fotos = 'fotosPerfil/';

		//faz upload no diretorio em que é suposto
		move_uploaded_file($_FILES['fotoPerfil']['tmp_name'], $pasta_fotos.$novo_nome);

		//insere os dados do registo na base de dados
		$sql = "INSERT INTO utilizadores VALUES(null, '$user', md5('$pass'), '$nome', '$novo_nome', DEFAULT)";
		if (mysqli_query($strcon, $sql)) {
			$query = "SELECT id FROM utilizadores WHERE username = '$user'";
			$result = mysqli_query($strcon, $query);
			$row = mysqli_num_rows($result);
			if ($row == 1) {
				while ($row = mysqli_fetch_array($result)) {
					$id = $row['id'];
				}
			}
			$sql2 = "INSERT INTO funcoesutilizadores VALUES($id, '$func')";
			if (mysqli_query($strcon, $sql2)) {
				$_SESSION['sucesso'] = true;
			} else {
				$_SESSION['failed'] = true;
			}
		} else {
			$_SESSION['failed'] = true;
		}
		mysqli_close($strcon);
		header('Location: registar.php');
		exit();
	} else {
		$_SESSION['extincao'] = true;
		header('Location: registar.php');
		exit();
	}
?>