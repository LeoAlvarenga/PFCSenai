<?php

session_start();
include_once('conexao.php');
include('verificarlogin.php');

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
	$ano = $_POST['ano'];
	$curso = $_POST['curso'];
	$turma = $_POST['turma'];
	$duracao = $_POST['duracao'];
	$area = $_POST['area'];
	$cidade = $_POST['cidade'];
    $unidade = $_POST['unidade'];
    $box = $_POST['box'];
    $prateleira = $_POST['prateleira'];
    $tipo = $_POST['tipo'];

     $useradm = new Administrador();

    if($useradm->adicionarDocumento($conn, $tipo, $cpf, $rg, $nome, $curso, $ano, $turma, $duracao, $area, $cidade, $unidade, $box, $prateleira)){
        header("Location: adicionar.php?ok=true");
    } else{
        header("Location: adicionar.php?erro=".mysqli_error($conn)); 
    }
       
?>