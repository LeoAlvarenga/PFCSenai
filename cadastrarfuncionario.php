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
	<link rel="stylesheet" type="text/css" href="bootstrap/css/box.css">
	<link rel="stylesheet" type="text/css" href="rodape.css"> 
	<link rel="stylesheet" type="text/css" href="bemvindo.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</head>
  <body style= "background-image: url(bg.jpg);">
		
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
		</nav>
		<br><br>

<div class="container-fluid">	

		<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" style="margin: 4%;">

			<div class="box" style=" width: 550px; margin: 0, auto; margin-top: 100px;>		
				<div class="centralizar">
					<div class="form-group col-md-11 pl-3">
						<label style="color: white;">Nome Completo </label>
						<input type="nome" name="nomeFuncionario" id="nomeFuncionario" class="form-control border border-dark" required/>
					</div>

					<div class="form-group col-md-11 pl-3">
						<label style="color: white;">E-mail </label>
						<input type="nome" name="email" id="email" class="form-control border border-dark" required/>
					</div>
				

					<div class="form-group col-md-6 pl-3">
						<label style="color: white;">Login</label>
						<input type="nome" name="loginFuncionario" id="loginFuncionario" class="form-control border border-dark" required/>
					</div>  
					
					<div class="form-group col-md-6 pl-3">
						<label style="color: white;">Senha</label>
						<input type="passowrd" name="senhaFuncionario" id="senhaFuncionario" class="form-control border border-dark" required/>
					</div> 
					
					<div class="form-group col-md-7 pl-3">
						<label style="color: white;">Estado</label><br>
						<input type="radio" name="Permitir" value="1" id="sim"> Sim
						<input type="radio" name="Permitir" required="" value="0"> Não
						
						<p>Permitir acesso à área administrativa.</p>

					</div> 		
					
					<button type="submit" title="Salvar" onclick="return confirm('Tem certeza que deseja Cadastrar Usuário ?')" class="btn btn-success ml-3" value="salvarCadastro">Salvar</button>	
				</div>
		</form>
</div>
		<?php
                // validação do envio de dados do formulário
		if(isset($_POST['nomeFuncionario'])){
                        
                        // declaração de variáveis
			$nome = $_POST['nomeFuncionario'];
			$email = $_POST['email'];
			$login = $_POST['loginFuncionario'];
			$senha = $_POST['senhaFuncionario'];
			if (isset($_POST['Permitir'])){
				$adm = $_POST['Permitir'];
			}

			if(isset($_POST['Permitir'])){
				$adm = $_POST['Permitir'];
			}
                        // criação do objeto Administrador
                        $useradm = new Administrador();
                        
						$useradm->setNome($nome);
						$useradm->setEmail($email);
                        $useradm->setLogin($login);
                        $useradm->setSenha($senha);
                        $useradm->setAdm($adm);

			$useradm->adicionarUsuario($conn);
			

		}
		?>

	<footer class="f1">
		<p>Desenvolvido por:</p>Aline Medrado; Gleiciane Reis; Ícaro Oliveira; Leonardo Alvarenga; Tiago Gomes; Wagner Oliveira.
		<p>Técnico em Informática - 54089</p>	
	</footer>

	</body>
</html>	