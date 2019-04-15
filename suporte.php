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
	<link href="bootstrap/css/estilocss.css" rel="stylesheet" type="text/css" />
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
	
	 <style type="text/css">
	   	.hidden {
	   		display:none;
	   	}

	   	input {
	   		display:block;
	   	}
	   </style>

	   <script>
	   		function mostra(id) {
	   			if(document.getElementById(id).style.display == 'block') {
	   				document.getElementById(id).style.display = 'none';
	   			} else { document.getElementById(id).style.display = 'block';}
}
	   </script>

</head>
  <body>
		
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
		

		<body>

			


   
 
 <div class="suporte">

		<div class="title">
				<a name="login" value="Login" onclick="mostra('login')"> LOGIN</a>
		</div>		
				<div id="login" class="hidden">
				  <div class= "subtitulo">	
					<p>TELA DE LOGIN</p>
				  </div>	
				<div class="corpo">
					<p>O usuário deverá inserir o login e senha (corretos) que estarão previamente cadastrados no sistema.
						Caso o usuário digite dados incorretos recberá um alerta indicando o erro, devendo fazer uma nova tentativa de inserção dos mesmos.
					</p>
					</div>	
				</div>
<br>
			<div class= "title">
				<a name="pesquisar"  value="Pesquisar" onclick="mostra('pesquisar')"> PESQUISAR </a> 
			</div>

				<div id="pesquisar" class="hidden">
					 <div class="subtitulo">
						<p>TELA DE PESQUISA</p>
					</div> 
						
				<div class="corpo">
					<p>Para efetuar pesqusisa no sistema, o usuário deverá preencher os dados solicitados na tela. 
						Escolhendo sempre a opção do tipo de arquivo o qual deseja a busca, em seguida clicar no botão <button type="button" class="btn btn-primary btn-sm btn-success">Pesquisar</button> para obter os resultados.
					</p>

					</div>	

				</div>
<br>
			<div class="title">
				<a name="gerenciar" value="Gerenciar" onclick="mostra('gerenciar')"> GERENCIAR</a>
			</div>
					
				<div id="gerenciar" class="hidden">
					<div class="texto">
						<p>Na opção 'Gerenciar' no menu é possível escolher entre as opções 'Documentos' e 'Funcionário'</p>
					</div>
<br>
					<div class="subtitulo">	
						<a name="gerenciarfuncionario" value="GerenciarFuncionario" onclick="mostra('gerenciarfuncionario')"> GERENCIAR FUNCIONÁRIOS</a><br>			
			        </div>	

				
					<div class="corpo">
						<br>
						<p>A página de gerenciar funcionário exibirá os funcionários cadastrados no sistema, e qual nível de acesso o mesmo possui. Clicando no botão <button type="button" class="btn btn-primary btn-sm btn-danger">Apagar Seleção</button> é possível apagar as contas dos funcionários que estiverem selecionadas na função 'Excluir Usuário'.<br>
						<p>Clicando no botão <button type="button" class="btn btn-primary btn-sm btn-success">Cadastrar Funcionário</button> o usuário será direcionado para a página de cadastro, onde irá inserir os dados do novo funcionário e em seguida pressionar o botão <button type="button" class="btn btn-primary btn-sm btn-success">Salvar</button> </p>
						
					</div>

					<div class="subtitulo">	
						<a name="gerenciardocumento" value="GerenciarDocumento" onclick="mostra('gerenciardocumento')"> GERENCIAR DOCUMENTOS</a><br>			
			        </div>

			        <div class="corpo">
						<br>
					A página de gerenciar documentos exibirá em tabela os dados de todos os alunos(de acordo com a escolha do tipo de arquivo a ser exibido), podendo <button type="button" class="btn btn-primary btn-sm btn-success">Adicionar</button>  novos alunos, e também <button type="button" class="btn btn-primary btn-sm btn-success">Editar</button> e <button type="button" class="btn btn-primary btn-sm btn-danger">Excluir</button> dados de alunos já cadastrados.
						
					</div>
			</div>	
		
<br>		

</div>

	<footer>
		<p>Desenvolvido por:</p>Aline Medrado, Gleiciane Reis, Ícaro Oliveira, Leonardo Alvarenga, Tiago Gomes e Wagner Oliveira.
		<p>Técnico em Informática - 54089</p>	
	</footer>

	</body>	
</html>