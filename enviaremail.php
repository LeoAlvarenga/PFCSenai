							<?php
								session_start();
								include_once("conexao.php");
								include("verificarlogin.php");
								include('verificaradm.php');

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

							</head>

							  <body>
									
										<!--Cabeçalho do sistema onde contém os botões de acesso.-->
								<nav class="navbar navbar-expand-lg navbar-dark">
										<a class="navbar-brand" href="bemvindo.php" id="icon"> <img src = "novologo.png" alt = "Logo Senai" height="45px">NDI</a>
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
										


									<div class="enviar">

													<label>  </label>
												
											<div class ="form-row">
													<div class="form-group col-md-2 pl-2">
														<div class="prateleira">
															<label for="prateleira" style="font-size: 21px;">PRATELEIRA: </label>
															<p id="message-text" style="font-size: 21px;"> </p>
														</div>	
													</div>
													  
													<div class="form-group col-md-2 pl-5 ml-5">
														<div class="box">
															<label for="box" style="font-size: 21px; margin-left: 200px;">BOX: </label>
															<p id="message-text" style="font-size: 21px;">  </p>
															
														</div>	
													</div>
											</div>




											<div class ="form-row">
													<div class="form-group col-md-2 pl-2">
														<div class="cpf">
															<label for="cpf" style="font-size: 21px;">CPF: </label>
															<p id="message-text" style="font-size: 21px;"> </p>
														</div>	
													</div>
													  
													<div class="form-group col-md-2 pl-5 ml-5">
														<div class="rg">
															<label for="rg" style="font-size: 21px; margin-left: 200px;">RG: </label>
															<p id="message-text" style="font-size: 21px; ">  </p>
															
														</div>	
													</div>
											</div>


									<div class ="form-row">
												<div class="form-group col-md-2 pl-2">			
											<div class="nome">
															<label for="nome" style="font-size: 21px;">NOME: </label>
															<p id="message-text">  </p>
														</div>
									</div>
									</div>					

											<div class ="form-row">
												<div class="form-group col-md-2 pl-2">
														<div class="area">
															<label for="area" style="font-size: 21px;">ÁREA: </label>
															<p id="message-text" style="font-size: 21px;"> </p>
														</div>

												</div>
											</div>

											<div class ="form-row">
												<div class="form-group col-md-2 pl-2">
											<div class="curso">
														<label for="curso" style="font-size: 21px;">CURSO: </label>
														<p id="message-text" style="font-size: 21px;">  </p>
													</div>	
											</div>

											</div>


														  
												


											<div class ="form-row">
													<div class="form-group col-md-2 pl-2">
														<div class="turma">
															<label for="turma" style="font-size: 21px;">TURMA: </label>
															<p id="message-text" style="font-size: 21px;"> </p>
														</div>	
													</div>
													  
													<div class="form-group col-md-2 pl-2 ml-5">
														<div class="ano">
															<label for="ano" style="font-size: 21px; margin-left: 99px;">ANO: </label>
															<p id="message-text" style="font-size: 21px;">  </p>
															
														</div>	
													</div>	
													<div class="form-group col-md-2 pl-2 ml-5">
														<div class="duracao">
															<label for="duracao" style="font-size: 21px; margin-left: 120px;">DURAÇÃO: </label>
															<p id="message-text" style="font-size: 21px;">  </p>
															
														</div>		
													</div>
											</div>



														<div class ="form-row">
													<div class="form-group col-md-2 pl-2">
														<div class="cidade">
															<label for="cidade" style="font-size: 21px;">CIDADE: </label>
															<p id="message-text" style="font-size: 21px;"> </p>
														</div>	
													</div>
													  
													<div class="form-group col-md-2 pl-5 ml-5">
														<div class="unidade">
															<label for="unidade" style="font-size: 21px; margin-left: 150px;">UNIDADE: </label>
															<p id="message-text" style="font-size: 21px;">  </p>
															<p />
														</div>	
													</div>



										
							</div>

 						<button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
	   					<button type="button" class="btn btn-success" data-dismiss="modal">Enviar</button>
							</div>




							</div>
												
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


										
									</div>



								<footer class="f1">
									<p>Desenvolvido por:</p>Aline Medrado; Gleiciane Reis; Ícaro Oliveira; Leonardo Alvarenga; Tiago Gomes; Wagner Oliveira.
									<p>Técnico em Informática - 54089</p>	
								</footer>
								
							</body>
							</html>			