<?php 
session_start();
include_once('conexao.php');




if(isset($_POST['apagarSelecao'])){
    
        foreach ($_POST['apagarSelecao'] as $id) {
        echo $id;
        $useradm = new Administrador();
        $useradm->setId($id);
        
        $useradm->excluirUsuario($conn);
    }

    if(mysqli_affected_rows($conn)){
        header('Location: configuracao.php?ok=true');
    } else {
    header('Location: configuracao.php?erro='.mysqli_error($conn));
    }
    
} else {
    header('Location: configuracao.php?vazio=ok');
}
?>