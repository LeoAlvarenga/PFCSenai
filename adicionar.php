<?php
	
	session_start();
	include_once("conexao.php");
	include('verificarlogin.php');


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
		//mascara para cpf
		function formatar(mascara, documento){
			 var i = documento.value.length;
			 var saida = mascara.substring(0,1);
			 var texto = mascara.substring(i)
			  
			if (texto.substring(0,1) != saida){
				documento.value += texto.substring(0,1);
			}	  
		}
	</script>

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
							   <a class="nav-link" href="logout.php" title="Sair" style="color:white; "><i class="fas fa-sign-out-alt" style="color: white; font-size:23px; margin-right:10px;"></i></a>

							</form>
				</div>
		</nav>
		
		<div class="adicionar" style=" width:730px; margin: 0, auto; padding: 17px; height: 50%;">
			<form action="cadastrardocumento.php" method="POST">
				<!--Formulário campos: Tipo de arquivo, nome, cpf, ano, duração, turma, área, curso, cidade, unidade -->
				<label>  </label>
				<div class="form-group col-md-4 pl-1">
					<label for="tipoA">Escolha um tipo de arquivo</label>
					<select class="form-control border-dark" required name="tipo">
						<option value="">Tipo de arquivo</option>
						<option value="certificado">Certificado</option>
						<option value="dossie">Dossiê</option>
						<option value="registro">Registro</option>
					</select>
				</div>
				
			
				<div class="form-group">
					<div class="form-group col-md-9 pl-1">
						<div class="nome">
							<label for="nome">Nome</label>
							<input type="nome" name="nome" id="nome" required class="form-control border-dark"/>
						</div>
					</div>	
					
					
					<div class="form-group col-md-4 pl-1">
						<label for="cpf">CPF</label>
						<input type="text" name="cpf" id="cpf" required maxlength="11"  class="form-control border-dark"/>
						
					</div>

					<div class="form-group col-md-4 pl-1">
						<label for="rg">RG</label>
						<input type="text" name="cpf" id="rg" required maxlength="11"  class="form-control border-dark"/>
						
					</div>
				</div>	
				
				<div class="form-row">
				    <div class="form-group col-md-2 pl-2">
						<div class="ano">
							<label for="ano">Ano</label>
							<input type="text" name="ano" id="ano" class="form-control border-dark" required maxlength="4" required>
						</div>	
				    </div>
				  
				    <div class="form-group col-md-2 pl-2 ml-5">
						<div class="duracao">
							<label for="duracao">Duração</label>
							<input type="text" name="duracao" id="duracao" required class="form-control border-dark">
						</div>	
				    </div>
				    <div class="form-group col-md-2 pl-2 ml-5">
						<div class="turma">
							<label for="turma">Turma</label>
							<input type="text" name="turma" id="turma" class="form-control border-dark" required>
						</div>	
				    </div>  
			    </div>

				<div class="form-row">
					<div class="form-group col-md-4 pl-2">
						<label for="area"> Área </label>
						<select class="form-control border-dark" name="area" required>
							<option value="">Escolha uma area</option>
							<option value="Tecnologia">Tecnologia</option>
							<option value="Alimentos">Alimentos</option>
						</select>
					</div>
					
					<div class="form-group col-md-4 pl-2">
						<label for="curso">Curso</label>				
						<select class="form-control border-dark" name="curso" required >
							<option value="">Escolha um curso</option>
							<option value="Informática">Informática</option>
							<option value="Segurança de Trabalho">Segurança do Trabalho</option>
						</select>
					</div>
				</div>
				
				<div class="form-row">
					<div class="form-group col-md-4 pl-2">
						<label for="cidade"> Cidade</label>
						<select class="form-control border-dark" name="cidade" required>
							<option value="">Escolha uma cidade</option>
							<option value="Lauro de Freitas">Lauro de Freitas</option>
							<option value="Salvador">Salvador</option>
						</select>
					</div>
					
					<div class="form-group col-md-4 pl-2">
						<label for="unidade">Unidade</label>
						<select class="form-control border-dark" name="unidade" required >
							<option value="">Escolha uma unidade</option>
							<option value="Cimatec">Cimatec</option>
							<option value="Cetind">Cetind</option>
							<option value="Dendezeiros">Dendezeiros</option>
						</select>
					</div>  

					<div class="form-group col-2 pl-2">
						<div class="ano">
							<label for="Box">Box</label>
							<input type="text" name="box" id="box" class="form-control border-dark" required>
						</div>	
				    </div>

				    <div class="form-group col-2 pl-2">
						<div class="ano">
							<label for="prateleira">Prateleira</label>
							<input type="text" name="prateleira" id="prateleira" class="form-control border-dark" required>
						</div>	
				    </div>
				</div>

				<button type="submit" class="btn btn-success" title="Adicionar" value="Adicionar" onclick="confirmAdc" style="margin-top: 1px;">Adicionar</button>
			
				<!--Fim do formulário -->
				
		       <script src="jquery-2.1.4.min.js"></script>
		       <script src="jquery.validate.min.js"></script>
		       <script>
		             $(function(){
		                    $("#form_contato").validate();
		             });
		       </script>	
			</form>
		</div>	
		<?php if(isset($_GET['ok'])) { ?> 
			<div class="alert alert-success" role="alert">
				Documento Adicionado com Sucesso!
			</div>
		<?php } ?>

	<footer class="f1">
		<p>Desenvolvido por:</p>Aline Medrado; Gleiciane Reis; Ícaro Oliveira; Leonardo Alvarenga; Tiago Gomes; Wagner Oliveira.
		<p>Técnico em Informática - 54089</p>	
	</footer>

 	</body>
</html>
