<?php
	session_start();
	include_once("conexao.php");
	include("verificarlogin.php");
	include('verificaradm.php');
        
        // buscando usuário no banco de dados
	$result = mysqli_query($conn,"SELECT * FROM usuarios");

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
	<script language="JavaScript"> 
		function pergunta(){ 
   			if (confirm('Tem certeza que deseja apagar os usuários selecionados?')){ 
      			document.seuformulario.submit() 
   			} 
		} 
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
			<form method="POST" action="excluirusuario.php" >
			
			<a class="btn btn-success btn-sm" title="Cadastrar Funcionário" value="cadastrarFuncionario" href="cadastrarfuncionario.php" style="margin:8px;">Cadastrar Funcionário</a> 

			<br>
			<table class="table table-hover" style="margin-top: 13px; box-shadow: 0px 0px 10px rgba(0, 0, 0, .6); background-color: #ffffff; opacity: 1.0;
	color: rgba(0, 0, 0, 1)">
					  <thead>
							<tr>
								<th scope="col" style="width: 15%;">Excluir Funcionário</th>
								<th scope="col" style="width: 18%;">Nome Completo</th>
								<th scope="col" style="width: 14%;">Login</th>
								<th scope="col" style="width: 20%;">E-mail</th>
								<th scope="col" style="width: 25%;">Administrador</th>

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
							<tr>
							  
								<td>
									<input type="checkbox" name=apagarSelecao[] value="<?php echo $id ?>">
							    </td>
									
								  <td><?php echo $row['usuario'];?></td>
								  <td><?php echo $row['login'];?></td>
								  <td><?php echo $row['email'];?></td>
								  <td><?php echo $adm?></td>

								<td>
									<a class="btn btn-success btn-sm" title="Cadastrar Funcionário" value="cadastrarFuncionario" href="editarfuncionario.php?id=<?php echo $row['id'];?>" style="margin:8px;">Editar</a>
								</td>

							</tr>
							<?php } ?>	
						</tbody>
			</table>

			<button type="submit" title="Apagar Seleção" onclick="return confirm('Tem certeza que deseja Excluir Usuário ?')"  class="btn btn-danger btn-sm" style="margin:8px;">Apagar Seleção</button>
						
			</form>
		</div>	

				<?php if(isset($_GET['ok'])) { ?> 
					<div class="alert alert-success" role="alert">
						Usuário(s) Excluído com Sucesso!
					</div>
				<?php } ?>

				<?php if(isset($_GET['erro'])) { 
					$erro = $_GET['erro'];?> 
					<div class="alert alert-danger" role="alert">
						Usuário não pode ser Excluído! ERRO: <?php echo $erro;?>
					</div>
				<?php } ?>

				<?php if(isset($_GET['vazio'])) { ?> 
					<div class="alert alert-danger" role="alert">
						Nenhum Usuário Selecionado!
					</div>
				<?php } ?>

				<?php if(isset($_GET['okay'])) { ?> 
						<div class="alert alert-success" role="alert" style="margin-top: 40px;">
							Funcionário Editado com Sucesso!
						</div>
					<?php } ?>

					<?php if(isset($_GET['cancelar'])) { 
						$erro = $_GET['cancelar'];?> 
						<div class="alert alert-danger" role="alert">
							Funcionário não pode ser Editado! ERRO: <?php echo $erro;?>
						</div>
					<?php } ?>

	<footer class="f1">
		<p>Desenvolvido por:</p>Aline Medrado; Gleiciane Reis; Ícaro Oliveira; Leonardo Alvarenga; Tiago Gomes; Wagner Oliveira.
		<p>Técnico em Informática - 54089</p>	
	</footer>

	</body>
</html>	