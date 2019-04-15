<?php 
    session_start();
?>	

<!DOCTYPE html>
<html>
<head>
	<title>Gestão de Arquivos NDI.</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">	
	<link rel="stylesheet" type="text/css" href="login.css">   

	
	
</head>
<body> 
		<!--Login e senha para acesso dos usuários ao sistema -->
		<div class="login-box">

			<!--<img src="avatar.png" class="avatar">
			<h1>NDI</h1>-->
				
					<form action="validarlogin.php" method="POST">
						<p>Usuário</p>
						<input type="text" name="username" autocomplete="current-login" required autofocus>
						<p>Senha</p>
						<input type="password" name="password" >
						<input type="submit" name="submit" value="Login" required autofocus>
					</form>
			
        </div>

        <!--Alerta caso usuário ou senha estejam incorretos-->
        <?php if(isset($_SESSION['loginErro'])) {?>   
            <div class="alert alert-danger" role="alert">
                Usuário ou senha incorreto(s).
            </div>
        <?php unset($_SESSION['loginErro']);
                }
        ?>

       
        <footer>
        <!--	<img src="novologo.png"> -->
        	<a class="navbar-brand" id="index"> <img src = "novologo.png" alt = "logo senai">NDI</a>
		

        </footer>
   

</body>
</html>