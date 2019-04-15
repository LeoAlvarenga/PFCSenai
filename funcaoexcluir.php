<?php
session_start();
include_once('conexao.php');

//declaração de variável
$id = $_GET['id'];

//instanciar classe
$adm = new Administrador();

$adm->excluirDocumento($conn,$id);

    if(mysqli_affected_rows($conn)){
        header('Location: excluir.php?ok=true');
    } else {
      header('Location: excluir.php?erro='.mysqli_error($conn));
    }

?>