<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if($_SESSION['adm'] == 0){
        header('location: bemvindo.php?adm=0');
    }

?>