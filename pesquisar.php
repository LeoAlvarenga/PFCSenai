<?php
	
	session_start();
	include_once("conexao.php");
	include('verificarlogin.php');
	include_once('Class/Arquivo.php');
	include_once('Class/Usuario.php');
	
	$arquivo = new Arquivo();
	$user = new Usuario();
	
	$nomet = $_POST['nome'];
	$cpft = $_POST['cpf'];
	$anot = $_POST['ano'];
	$cursot = $_POST['curso'];
	$turmat = $_POST['turma'];
	$duracaot = $_POST['duracao'];
	$areat = $_POST['area'];
	$cidadet = $_POST['cidade'];
	$unidadet = $_POST['unidade'];
	$tipo = $_POST['tipo'];
	$rgt = $_POST['rg'];
	
        
	

	if(empty($nomet)){
		$nome = "";
	}else{
		$nome = " AND nome='$nomet'";
	}

	if(empty($cpft)){
		$cpf = "";
	} else {
		$cpf = " AND cpf='$cpft'";
	}

	if(empty($rgt)){
		$rg = "";
	} else {
		$rg = " AND rg='$rgt'"; 
	}
	
	if(empty($anot)){
		$ano = "";
	}else{
		$ano = " AND ano='$anot'";
	}
	
	if(empty($cursot)){
		$curso = "";
	}else{
		$curso = " AND curso='$cursot'";
	}
	
	if(empty($turmat)){
		$turma = "";
	}else{
		$turma = " AND turma='$turmat'";
	}
	
	if(empty($duracaot)){
		$duracao = "";
	}else{
		$duracao = " AND duracao='$duracaot'";
	}
	
	if(empty($areat)){
		$area = "";
	}else{
		$area = " AND area='$areat'";
	}
	
	if(empty($cidadet)){
		$cidade = "";
	}else{
		$cidade = " AND cidade='$cidadet'";
	}
	
	if(empty($unidadet)){
		$unidade = "";
	}else{
		$unidade = " AND unidade='$unidadet'";
	}
	
        

	
	$result = $user->pesquisarArquivo($conn, $tipo, $cpf, $rg, $nome, $ano, $area, $cidade, $curso, $duracao, $turma, $unidade);
	
$array = array($result);

$row = mysqli_num_rows($result);


?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Gestão de Arquivos NDI.</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="bemvindo.css">	
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>				
	</head>
    <body>
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
								<a class="nav-link" href="logout.php" title="Sair" style="color:white; "><i class="fas fa-sign-out-alt" style="color: white; font-size:23px;margin-right:10px;"></i>
								</a>
						</form>
			</div>
		</nav>

		<!--Fim do cabeçalho.-->

		<div class="container-fluid">
			<table class="table table-hover" style="margin-top: 8%; 
													box-shadow: 0px 0px 10px rgba(0, 0, 0, .6); 
													background-color: #ffffff; opacity:1.0; 
													color: rgba(0, 0, 0, 1)">
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
				  

				<?php 
					if($row == 0){
						echo '<div class="alert alert-danger" role="alert">
							Documento Não Encontrado!
							</div>';
						
					}else{
						while($rows_registros = mysqli_fetch_assoc($result)) { ?>
						
					<tr>
						<td><?php echo $rows_registros['id']; ?></td>
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
						  	<!-- BOTÃO MODAL -->
							<button type="button" class="btn btn-success" title="Enviar" data-toggle="modal" data-target="#exampleModal" style="margin-bottom: 7px; 
																																				box-sh); 
																																			">
							Enviar</button>	
						</td>	
					</tr>

						<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  	<div class="modal-dialog" role="document">
					    	<div class="modal-content">
					     		<div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Informações</h5>
								    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								        <span aria-hidden="true">&times;</span>
								    </button>
						      	</div>
							    <div class="modal-body">
							        <form>
							        	<div class="form-group">
								            <label for="recipient-name" class="col-form-label">Email:</label>
									        <select  class="form-control border-dark" required name="tipo">
												<option value=""></option>
											</select>	
							          	</div>
							            <div class="form-group">
								            <label for="message-text" class="col-form-label">Mensagem:</label>


								            <p id="message-text"> <?php echo $rows_registros['id']; ?> </p>
								            <p id="message-text"> CPF: <?php echo $rows_registros['cpf']; ?> </p>
								            <p id="message-text"> Nome: <?php echo $rows_registros['nome']; ?> </p>
								            <p id="message-text"> RG: <?php echo $rows_registros['rg']; ?> </p>
								            <p id="message-text"> Curso: <?php echo $rows_registros['curso']; ?> </p>
								            <p id="message-text"> Ano: <?php echo $rows_registros['ano']; ?> </p>
								            <p id="message-text"> Turma: <?php echo $rows_registros['turma']; ?> </p>
								            <p id="message-text"> Duração: <?php echo $rows_registros['duracao']; ?> </p>
								            <p id="message-text"> Área: <?php echo $rows_registros['area']; ?> </p>
								            <p id="message-text"> Cidade: <?php echo $rows_registros['cidade']; ?> </p>
								            <p id="message-text"> Unidade: <?php echo $rows_registros['unidade']; ?> </p>
								            <p id="message-text"> Box: <?php echo $rows_registros['box']; ?> </p>
								            <p id="message-text"> Prateleira: <?php echo $rows_registros['prateleira']; ?> </p>    				            
							          	</div>
							        </form>
							    </div>
						        <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
							        <button type="button" class="btn btn-success" data-dismiss="modal">Enviar</button>
							    </div>
					     	</div>
					    </div>
					</div>
				<?php } }?>	
			</table>	
		</div>
				
			

		<footer class="f1">
			<p>Desenvolvido por:</p>Aline Medrado; Gleiciane Reis; Ícaro Oliveira; Leonardo Alvarenga; Tiago Gomes; Wagner Oliveira.
			<p>Técnico em Informática - 54089</p>	
		</footer>
	</body>
</html>			