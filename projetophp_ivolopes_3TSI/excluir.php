<?php 
	session_start();

	if (!$_SESSION['user']) {
		header('Location: index.php');
		exit();
	}

	$cod_user = intval($_GET['utilizador']);

	$strcon = mysqli_connect('localhost', 'root', '');
	$escolheDB = mysqli_select_db($strcon, 'projetophp') or die("Erro na BD");

	if ($_SESSION['id'] == $cod_user) {
		echo "
			<script type='text/javascript'> 
				alert('Não se pode apagar a sí próprio!');
				location.href='painel.php';
			</script>";
		exit();
	}

	if ($_SESSION['acesso'] == 0) {
		$sql_code = "DELETE FROM utilizadores WHERE id = $cod_user";
		$sql_code2 = "DELETE FROM funcoesutilizadores WHERE id_user = $cod_user";
		$query = $strcon->query($sql_code) or die($strcon->error);
		$query2 = $strcon->query($sql_code2) or die($strcon->error);

		if ($query && $query2) {
			echo "<script type='text/javascript'> location.href='painel.php'; </script>";
			exit();
		} else {
			echo "
			<script type='text/javascript'> 
				alert('Não foi possível apagar o utilizador');
				location.href='painel.php';
			</script>";
			exit();
		}
	} else {
		echo "
			<script type='text/javascript'> 
				alert('Não tem permissão para excluir!');
				location.href='painel.php'; 
			</script>";
			exit();
	}

	
?>