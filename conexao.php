<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "ndi";
	
	//criar conexão
	$conn = mysqli_connect($servidor,$usuario,$senha,$dbname);

	//Autoloading de classes
        
	function carregaClasse($nomeDaClasse) {
		require_once("class/".$nomeDaClasse.".php");
	}
	spl_autoload_register("carregaClasse");
	
	//checar a conexão
	if(!$conn) {
		die("falha na conexão:" . mysqli_connect_error());
	} else {
		
	}

?>