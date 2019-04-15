<?php
	session_start();
	include_once("conexao.php");
	include("verificarlogin.php");
	


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
   			if (ok('Tem certeza que deseja apagar o Documento selecionado?')){ 
      			document.seuformulario.submit() 
   			} 
		} 
	</script>
	
</head>
	<body style= "background-color: #2a7a9f;">
		
			<!--Cabeçalho do sistema onde contém os botões de acesso.-->
		<nav class="navbar navbar-expand-lg navbar-dark">
			
			<a class="navbar-brand" href="bemvindo.php" id="icon"> <img src = "novologo.png" alt = "logo senai" height="35px">NDI</a>
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
		</nav>
			<!--Fim do cabeçalho.-->
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
			<!--Formulário campos: Tipo de arquivo, nome, cpf, ano, duração, turma, área, curso, cidade, unidade -->
		<label>  </label>
			<div class="btn-group-vertical" role="group" aria-label="Grupo de botões com dropdown aninhado" style="float:left; width: 250px; margin-left: 40px; margin-top: 25px;">
					<label for="tipoA" style="color: white;">Escolha um tipo de arquivo</label>
					<select class="form-control border border-dark" required name="tipo" id="tipoA">
						<option value="">Tipo de arquivo</option>
						<option value="certificados">Certificado</option>
						<option value="dossie">Dossiê</option>
						<option value="registros">Registro</option>
					</select>
				</div>
			<div>
				<button type="submit" class="btn btn-success ml-2" value="pesquisar" style="margin-top: 33px;">Pesquisar</button>
			</div>
			</form>
			
			
			<div class="buscar form-col pl-5" style="float:right; margin-right: 50px; margin-bottom: 50px; margin-top: -40px;" >
				<form class="form-inline my-2 my-lg-0 ">
					<input type="text"  class="form-control" id="txtBusca" placeholder="Ex: número cpf..." size= "30px;"/>
						<button class="btn btn-success ml-2" type="submit" value="Buscar">Buscar</button>
				</form>
			</div>


			<?php	
			if(isset($_POST['tipo'])){
				$tipo = $_POST['tipo'];
				$result_registros = "SELECT * FROM $tipo";
				$resultado_registros = mysqli_query($conn, $result_registros);
			?>
			
		<div class="container-fluid">
				<table class="table table-hover" style="margin-top: 13px; box-shadow: 0px 0px 10px rgba(0, 0, 0, .6); background-color: #ffffff; opacity:1.0;
	color: rgba(0, 0, 0, 1)">

				<form action="cadastrardocumento.php" method="POST">
					<button type="submit" class="btn btn-success" title="Adicionar" value="Adicionar" onClick="confirmAdc" style="margin-top: 40px;">Adicionar</button>
				</form> 
				
				  <thead>
						<tr>
						  <th scope="col">Código</th>
						  <th scope="col">CPF</th>
						  <th scope="col">RG</th>
						  <th scope="col">Nome</th>
						  <th scope="col">Curso</th>
						  <th scope="col">Ano</th>
						  <th scope="col">Turma</th>
						  <th scope="col">Duração</th>
						  <th scope="col">Área</th>
						  <th scope="col">Cidade</th>
						  <th scope="col">Unidade</th>
						  <th scope="col">Box</th>
						  <th scope="col">Prateleira</th>
						</tr>
				  </thead>
				  <tbody>
					<?php while($rows_registros = mysqli_fetch_assoc($resultado_registros)) { ?>
						
					
						<tr>
						  
						  <td><?php echo $rows_registros['id_'.$tipo]; ?></td>
						  <td><?php echo $rows_registros['cpf']; ?></td>
						  <td><?php echo $rows_registros['rg']; ?></td>
						  <td><?php echo $rows_registros['nome']; ?></td>
						  <td><?php echo $rows_registros['curso']; ?></td>
						  <td><?php echo $rows_registros['ano']; ?></td>
						  <td><?php echo $rows_registros['turma']; ?></td>
						  <td><?php echo $rows_registros['duracao']; ?></td>
						  <td><?php echo $rows_registros['area']; ?></td>
						  <td><?php echo $rows_registros['cidade']; ?></td>
						  <td><?php echo $rows_registros['unidade']; ?></td>
						  <td><?php echo $rows_registros['box']; ?></td>
						  <td><?php echo $rows_registros['prateleira']; ?></td>
						  
						    <td>
							<input type="hidden" name="editarid" value="<?php echo $rows_registros['id_'.$tipo]; ?>" >
						    <a href="editararquivo.php?tipo=<?php echo $tipo?>&id=<?php echo $rows_registros['id_'.$tipo]; ?>" ><button type="button" title="Editar" class="btn btn-success btn-sm">Editar</button></a>
						 </td>	

						  <td>
						    <a href="funcaoexcluir.php?tipo=<?php echo $tipo;?>&id=<?php echo $rows_registros['id_'.$tipo]; ?>"><button type="button" title="Excluir" onclick="return confirm('Tem certeza que deseja apagar o Documento selecionado?')"  class="btn btn-danger btn-sm">Excluir</button></a>
						 </td>	
						 
						</tr>
					<tr>
					
					<?php }
						}
					?>

					<?php if(isset($_GET['ok'])) { ?> 
						<div class="alert alert-success" role="alert">
							Documento Excluído com Sucesso!
						</div>
					<?php } ?>

					<?php if(isset($_GET['erro'])) { 
						$erro = $_GET['erro'];?> 
						<div class="alert alert-danger" role="alert">
							Documento não pode ser Excluído! ERRO: <?php echo $erro;?>
						</div>
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