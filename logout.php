<?php
session_start();
include_once('Class/Usuario.php');
$user= new Usuario();
$user->efetuarLogout()
?>