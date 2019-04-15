<?php
session_start();
include_once("conexao.php");
include('verificarlogin.php');




$id = $_GET['id'];

 $sql = "SELECT * FROM arquivos WHERE id = $id";

$pesquisar = mysqli_query($conn,$sql);
$rows = mysqli_fetch_assoc($pesquisar);

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
	 //validação de administrador
		<?php
		if($_GET['adm'] == 0){
			echo "alert('Usuário não possui permissões de Administrador!');";
		}?>
    </script>
	
</head>
  <body style= "background-image: url(bg.jpg);">
		
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
        
        <form method="POST" action="funcaoeditar.php?id=<?php echo $id?>">
			<!--Formulário campos: Tipo de arquivo, nome, cpf, ano, duração, turma, área, curso, cidade, unidade -->
		<label>  </label>
		
		<div class="arquivo"> 
				<div class="form-group col-md-9 pl-3">
					<div class="nome">
						<label for="nome" style="margin-top: 15px;">Nome</label>
						<input type="nome" name="nome" id="nome" value="<?php echo $rows['nome'] ?>" class="form-control border border-dark"/>
					</div>
				</div>	

				<div class="form-group col-md-4 pl-3">
					<div class="cpf">
						<label for="cpf">CPF</label>
						<input type="text" name="cpf" value="<?php echo $rows['cpf'] ?>" id="cpf" maxlength="11" class="form-control border border-dark" onkeypress="formatar ('###.###.###-##',this);"/>
					</div>
				</div>

				<div class="form-group col-md-4 pl-3">
					<div class="rg">
						<label for="rg">RG</label>
						<input type="text" name="rg" value="<?php echo $rows['rg'] ?>" id="rg" maxlength="10" class="form-control border border-dark"/>
					</div>
				</div>
			
			<div class ="form-row pl-1">
			  <div class="form-group col-md-2 pl-3">
					<div class="ano">
						<label for="ano">Ano</label>
						<input type="text" name="ano" value="<?php echo $rows['ano'] ?>" id="ano" class="form-control border border-dark">
					</div>	
			  </div>
			  
			  <div class="form-group col-md-2 pl-3">
					<div class="duracao">
						<label for="duracao">Duração</label>
						<input type="text" name="duracao" id="duracao" value="<?php echo $rows['duracao'] ?>"  class="form-control border border-dark">
					</div>	
			  </div>
			  <div class="form-group col-md-2 pl-3">
					<div class="turma">
						<label for="turma">Turma</label>
						<input type="text" name="turma" value="<?php echo $rows['turma'] ?>" id="turma" class="form-control border border-dark"/>
					</div>	
			  </div>
			  
		    </div>
			<div class="form-row pl-1">
				<div class="form-group col-md-4 pl-3">
					<label for="area"> Área </label>
						<select name="area" class="form-control border border-dark">
							<option value="">Escolha uma area</option>
							<option value="1">Tecnologia</option>
							<option value="2">Alimentos</option>
						</select>
				  </select>
				</div>
				
				<div class="form-group col-md-4 pl-3">
					<label for="curso">Curso</label>				
						<select name="curso" class="form-control border border-dark">
							<option value="">Escolha um curso</option>
							<option value="1">Informática</option>
							<option value="1">Segurança do Trabalho</option>
						</select>
				</div>
    
			</div>
			
			<div class="form-row pl-1">
				<div class="form-group col-md-4 pl-3">
					<label for="cidade"> Cidade</label>
						<select name="cidade" class="form-control border border-dark">
							<option value="">Escolha uma cidade</option>
							<option value="1">Lauro de Freitas</option>
							<option value="1">Salvador</option>
						</select>
				</div>
				
				<div class="form-group col-md-4 pl-3">
					 <label for="unidade">Unidade</label>
						<select name="unidade" class="form-control border border-dark">
							<option value="">Escolha uma unidade</option>
							<option value="1">Cimatec</option>
							<option value="1">Cetind</option>
							<option value="1">Dendezeiros</option>
						</select>
                </div>  
                
                <div class="form-group col-2 pl-2">
					<div class="ano">
						<label for="Box">Box</label>
						<input type="text" name="box" id="box" value="<?php echo $rows['box'] ?>" class="form-control border border-dark" >
					</div>	
			  </div>

			  <div class="form-group col-2 pl-2 ">
					<div class="ano">
						<label for="prateleira">Prateleira</label>
						<input type="text" name="prateleira" value="<?php echo $rows['prateleira'] ?>" id="prateleira" class="form-control border border-dark" >
					</div>	
			  </div>
            
            <input type="hidden" name="ok" value="true" /> 
            </div>
  
			<button type="submit" title="Salvar" onclick="return confirm('Tem certeza que deseja Salvar o Documento ?')" class="btn btn-success ml-3" value="Salvar" style="margin-top: 40px;">Salvar</button>

		</div>
		<!--Fim do formulário -->	

</form>

	<footer class="f1">
		<p>Desenvolvido por:</p>Aline Medrado; Gleiciane Reis; Ícaro Oliveira; Leonardo Alvarenga; Tiago Gomes; Wagner Oliveira.
		<p>Técnico em Informática - 54089</p>	
	</footer>
       
	</body>	
</html>