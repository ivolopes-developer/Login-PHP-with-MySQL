<?php 
	//verifica se existe algum utilizador corrente no site
	if (!$_SESSION['user']) {
		header('Location: index.php');
		exit();
	}
?>