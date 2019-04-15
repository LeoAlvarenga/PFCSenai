<?php       
  session_start();
  include_once('conexao.php');
  include_once('verificarlogin.php');


  $id = $_GET['id'];
  
  $sql = "SELECT * FROM arquivos WHERE id = $id";
 
  $pesquisar = mysqli_query($conn,$sql);
  $rows = mysqli_fetch_assoc($pesquisar);

    $adm = new Administrador();

    $nomet = $_POST['nome'];
	$cpft = $_POST['cpf'];
	$rgt = $_POST['rg'];
	$anot = $_POST['ano'];
	$cursot = $_POST['curso'];
	$turmat = $_POST['turma'];
	$duracaot = $_POST['duracao'];
	$areat = $_POST['area'];
	$cidadet = $_POST['cidade'];
	$unidadet = $_POST['unidade'];
    $boxt = $_POST['box'];
    $prateleirat = $_POST['prateleira'];
	

    
    if(empty($nomet)){
		$nomep = $rows['nome'];
	}else{
		$nomep = $nomet;
	}
	
	if(empty($anot)){
		$anop = $rows['ano'];
	}else{
		$anop = $anot;
	}
	
	if(empty($cursot)){
		$cursop = $rows['curso'];
	}else{
		$cursop = $cursot;
	}
	
	if(empty($turmat)){
		$turmap = $rows['turma'];
	}else{
		$turmap = $turmat;
	}
	
	if(empty($duracaot)){
		$duracaop = $rows['duracao'];
	}else{
		$duracaop = $duracaot;
	}
	
	if(empty($areat)){
		$areap = $rows['area'];
	}else{
		$areap = $areat;
	}
	
	if(empty($cidadet)){
		$cidadep = $rows['cidade'];
	}else{
		$cidadep = $cidadet;
	}
	
	if(empty($unidadet)){
		$unidadep = $rows['unidade'];
	}else{
		$unidadep = $unidadet;
    }
    
    if(empty($cpft)){
        $cpfp = $rows['cpf'];
    }else{
        $cpfp = $cpft;
    }

    if(empty($boxt)){
        $boxp = $rows['box'];
    }else{
        $boxp = $boxt;
    }

    if(empty($prateleirat)){
        $prateleirap = $rows['prateleira'];
    }else{
        $prateleirap = $prateleirat;
	}
	
	if(empty($rgt)){
        $rgp = $rows['rg'];
    }else{
        $rgp = $rgt;
	}

	

	
    echo '--'. $nomep.$cpfp.$cursop.$anop.$turmap.$duracaop.$areap.$cidadep.$unidadep.$boxp.$prateleirap.$id.$_POST['ok'];
	

    $editar = $adm->editarDocumento($conn,$id,$nomep,$cpfp,$rgp,$cursop,$anop,$turmap,$duracaop,$areap,$cidadep,$unidadep,$boxp,$prateleirap);

    if(mysqli_affected_rows($conn)){
        header('Location:documento.php?ok=true');
    } else {
      header('Location: documento.php?erro='.mysqli_error($conn));
	}
	


?>