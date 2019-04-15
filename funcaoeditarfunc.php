<?php       
  session_start();
  include_once('conexao.php');
  include_once('verificarlogin.php');


  $id = $_GET['id'];
  
  $sql = "SELECT * FROM usuarios WHERE id = $id";
 
  $pesquisar = mysqli_query($conn,$sql);
  $rows = mysqli_fetch_assoc($pesquisar);

    $adm = new Administrador();

    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $admin = $_POST['administrador'];
	

    
    if(empty($admin)){
		$adminp = $rows['adm'];
	}else{
		$adminp = $admin;
	}
	
	
    echo '--'.$nome.$login.$email.$admin.$id;

    $adm->setNome($nome);
    $adm->setLogin($login);
    $adm->setEmail($email);
    $adm->setSenha($senha);
    $adm->setAdm($admin);
	

    $editar = $adm->editarFuncionario($conn, $id, $nome, $login, $email, $senha, $admin);

    if(mysqli_affected_rows($conn)){
        header('Location:configuracao.php?okay=true');
    } else {
      header('Location: configuracao.php?erro='.mysqli_error($conn));
	}
	


?>