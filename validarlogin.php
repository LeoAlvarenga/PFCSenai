<?php
session_start();
include('conexao.php');


//checar se os campos estão vazios
if(empty($_POST['username']) || empty($_POST['password'])) {
	header('Location: index.html');
}
//criação das variaveis
$usuario = mysqli_real_escape_string($conn,$_POST['username']);
$senha = mysqli_real_escape_string($conn,$_POST['password']);

$user = new Usuario();
$user->setLogin($usuario);
$user->setSenha($senha);


$result = $user->efetuarLogin($conn);

$row = mysqli_num_rows($result);

$resultado = mysqli_fetch_assoc($result);

if($row == 1){
	$nomeusuario = $resultado['usuario'];
	$_SESSION['usuario'] = $nomeusuario;
	$adm = $resultado['adm'];
	$_SESSION['adm'] = $adm;
	header('Location: bemvindo.php');
} else {
	$_SESSION['loginErro'] = true;
	header('Location: index.php');

}

?>