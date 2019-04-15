<?php
	session_start();
	include_once("conexao.php");
	include("verificarlogin.php");
	include('verificaradm.php');
        
		// buscando usuário no banco de dados
		
	$id = $_GET['id'];

	$result = mysqli_query($conn,"SELECT * FROM usuarios WHERE id='$id'");
	$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Gestão de Arquivos NDI.</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="rodape.css">
	<link rel="stylesheet" type="text/css" href="bemvindo.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script>
		<?php
		if($_GET['adm'] == 0){
			echo "alert('Usuário não possui permissões de Administrador!');";
		}?>
	</script>
</head>
  <body >
		
			<!--Cabeçalho do sistema onde contém os botões de acesso.-->
		<nav class="navbar navbar-expand-lg navbar-dark">
			<a class="navbar-brand" href="bemvindo.php" id="icon"> <img src = "novologo.png" alt = "logo senai" height="45px">NDI</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item">
								<a class="nav-link" href="bemvindo.php">Pesquisar</a>
							</li>
							<div class="dropdown nav-item">
							  <a class="dropdown-toggle nav-link" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    Gerenciar
							  </a>
							  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							    <a class="dropdown-item" href="configuracao.php">Funcionário</a>
							    <a class="dropdown-item" href="documento.php">Documentos</a>
							  </div>
							</div>
							
							<li class="nav-item">
								<a class="nav-link" href="suporte.php">Suporte</a>
							 </li>
							 
						</ul>
							<form class="form-inline my-2 my-lg-0 font-weight">
								<label style="margin-right: 15px; color: white"><?php echo $_SESSION['usuario']?></label>
							   <a class="nav-link" href="logout.php" title="Sair" style="color:white; "><i class="fas fa-sign-out-alt" style="color: white; font-size:23px; margin-right:10px;"></i></a>

							</form>
				</div>
		</nav><br><br>
		
	
		<div class="container-fluid">
			<form method="POST" action="funcaoeditarfunc.php?id=<?php echo $id?>" >

			<table class="table table-hover" style="margin-top: 150px; box-shadow: 0px 0px 10px rgba(0, 0, 0, .6); background-color: #ffffff; opacity: 1.0;
	color: rgba(0, 0, 0, 1)">
					  <thead>
							<tr>
								<th scope="col" style="width: 30%;">Nome Completo</th>
								<th scope="col" style="width: 20%;">Login</th>
								<th scope="col" style="width: 27%;">E-mail</th>
								<th scope="col" style="width: 27%;">Senha</th>
								<th scope="col" style="width: 5%;">Administrador</th>

							</tr>
							<tr>
									
								<td ><input type="text" name="nome" size="40px" value="<?php echo $row['usuario']?>" style="border: 1px light; border-radius: 3px"></td>
								<td ><input type="text" name="login" value="<?php echo $row['login']?>" style="border: 1px light; border-radius: 3px"></td>
								<td ><input type="text" name="email" size="35px" value="<?php echo $row['email']?>" style="border: 1px light; border-radius: 3px"></td>
								<td ><input type="text" name="senha" size="35px" value="<?php echo $row['senha']?>" style="border: 1px light; border-radius: 3px"></td>
								<td ><input type="radio" name="administrador" value="1"><p>Sim</p></td>	
								<td><input type="radio" name=administrador value="0"> Não</td>	

								<td><button type="submit" title="Salvar" onclick="return confirm('Tem certeza que deseja Editar o Funcionário ?')" class="btn btn-success ml-3" value="Salvar">Salvar</button></td>
							</tr>
					  </thead>
					 	 <tbody>
							<?php while($row = mysqli_fetch_assoc($result)){ 
								if($row['adm'] == 1){
									$adm = "Sim";
								} else {
									$adm = "Não";
								} 
								$id = $row['id']?>
							
							<?php } ?>	
						</tbody>
			</table>

		</div>	

	<footer class="f1">
		<p>Desenvolvido por:</p>Aline Medrado; Gleiciane Reis; Ícaro Oliveira; Leonardo Alvarenga; Tiago Gomes; Wagner Oliveira.
		<p>Técnico em Informática - 54089</p>	
	</footer>

	</body>
</html>	