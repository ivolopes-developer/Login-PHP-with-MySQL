<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estilos2.css">
	<link rel="icon" href="imagens/iconSite.png" type="image/x-icon"/>
	<title>Painel</title>
	<?php 
		session_start();
		include('verificaLogin.php');

		$strcon = mysqli_connect('localhost', 'root', '');
		$escolheDB = mysqli_select_db($strcon, 'projetophp') or die("Erro na BD");

		$sql_code = "SELECT id, username, nome, funcao FROM utilizadores, funcoesutilizadores WHERE utilizadores.id = funcoesutilizadores.id_user";
		$query = mysqli_query($strcon, $sql_code);
	?>
</head>
<body>
	<!-- Divisão onde é mostrado o conteudo da base de dados em tabela -->
	<div id="principal">
		<h2>Gestão de utilizadores da base de dados</h2>
		<hr>
		<!-- apresentação da tabela de users -->
		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Procure por usernames..." title="Escreva aqui um username" style="margin-right: 50px;">
		<input type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Procure por nomes..." title="Escreva aqui um nome" style="margin-right: 50px;">
		<input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Procure por alcunhas..." title="Escreva aqui uma alcunha">
		<table id="myTable" align="center" style="box-shadow: 0px 0px 200px -50px black;">
			<tr>
				<th>Código</th>
				<th>Username</th>
				<th>Nome</th>
				<th>Alcunha</th>
				<th>Ação</th>
			</tr>
			<?php while($dado = $query->fetch_array()) { ?>
				<tr>
					<td><?php echo $dado['id']; ?></td>
					<td><?php echo $dado['username']; ?></td>
					<td><?php echo $dado['nome']; ?></td>
					<td><?php echo $dado['funcao']; ?></td>
					<td>
						<!-- Redireciona para as paginas editar/excluir e envia pelo URL o codigo que se quer apagar na base de dados -->
						<a href="javascript: if(confirm('Tem a certeza que deseja editar o utilizador <?php echo $dado['username']; ?>?')) location.href='editar.php?p=editar&utilizador=<?php echo $dado['id'] ?>&nome=<?php echo $dado['nome']; ?>'" ><input type="image" name="excluir" src="imagens/editar.png" width="25px"></a>
						<a href="javascript: if(confirm('Tem a certeza que deseja eliminar o utilizador <?php echo $dado['username']; ?>?')) location.href='excluir.php?p=excluir&utilizador=<?php echo $dado['id'] ?>'" ><input type="image" name="excluir" src="imagens/excluir.png" width="25px"></a>
					</td>
				</tr>
			<?php } ?>
		</table>
		<hr style="margin-top: 30px;">
	</div>
	<div id="header">
		<img src="<?php echo 'fotosPerfil/'. $_SESSION['imagem']; ?> " style="width: 30px; margin-left: 20px; height: 30px; border-radius: 5px; vertical-align: middle;">
		<label style="color: white; margin-left: 10px; margin-right: 10px; vertical-align: middle;">Olá, <?php echo $_SESSION['nome_user']; ?></label><b><label style=" vertical-align: middle; color: #37b0f2;">[<?php echo $_SESSION['function']; ?>]</label></b>
		<a href="logout.php"><input type="image" src="imagens/sair.png" name="sair" width="30px" style="float: right; margin-right: 20px;"></a>
		<hr>
	</div>
	<div id="footer">
		<label>Copyright&copy Ivo Lopes 2018</label>&nbsp&nbsp|&nbsp&nbsp<label>Se quer roubar tem que pagar</label>
	</div>
<!-- Procurar na tabela por nomes-->
<script>
	function myFunction() {
	  var input, filter, table, tr, td, i, txtValue;
	  input = document.getElementById("myInput");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("myTable");
	  tr = table.getElementsByTagName("tr");
	  for (i = 0; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[1];
	    if (td) {
	      txtValue = td.textContent || td.innerText;
	      if (txtValue.toUpperCase().indexOf(filter) > -1) {
	        tr[i].style.display = "";
	      } else {
	        tr[i].style.display = "none";
	      }
	    }
	  }
	}
	function myFunction1() {
	  var input, filter, table, tr, td, i, txtValue;
	  input = document.getElementById("myInput1");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("myTable");
	  tr = table.getElementsByTagName("tr");
	  for (i = 0; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[2];
	    if (td) {
	      txtValue = td.textContent || td.innerText;
	      if (txtValue.toUpperCase().indexOf(filter) > -1) {
	        tr[i].style.display = "";
	      } else {
	        tr[i].style.display = "none";
	      }
	    }
	  }
	}
	function myFunction2() {
	  var input, filter, table, tr, td, i, txtValue;
	  input = document.getElementById("myInput2");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("myTable");
	  tr = table.getElementsByTagName("tr");
	  for (i = 0; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[3];
	    if (td) {
	      txtValue = td.textContent || td.innerText;
	      if (txtValue.toUpperCase().indexOf(filter) > -1) {
	        tr[i].style.display = "";
	      } else {
	        tr[i].style.display = "none";
	      }
	    }
	  }
	}
</script>
</body>
</html>