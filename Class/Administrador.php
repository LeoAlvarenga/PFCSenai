<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Administrador
 *
 * @author leoal
 */
class Administrador extends Usuario {
    private $adm;
    
    
    function getAdm() {
        return $this->adm;
    }

    function setAdm($adm) {
        $this->adm = $adm;
    }
    
    public function adicionarDocumento($conn,$tipo,$cpf,$rg,$nome,$curso,$ano,$turma,$duracao,$area,$cidade,$unidade,$box,$prateleira) {
        include_once ('Arquivo.php');
        $arq = new Arquivo();
        
        $arq->setAno($ano);
        $arq->setArea($area);
        $arq->setBox($box);
        $arq->setCidade($cidade);
        $arq->setCpf($cpf);
        $arq->setCurso($curso);
        $arq->setDuracao($duracao);
        $arq->setNome($nome);
        $arq->setPrateleira($prateleira);
        $arq->setTipo($tipo);
        $arq->setTurma($turma);
        $arq->setUnidade($unidade);
        $arq->setRg($rg);
        
        $cadastrar = "INSERT INTO arquivos (tipo,cpf,rg,nome,curso,ano,turma,duracao,area,cidade,unidade,box,prateleira) Values ('{$arq->getTipo()}','{$arq->getCpf()}','{$arq->getRg()}','{$arq->getNome()}','{$arq->getCurso()}','{$arq->getAno()}','{$arq->getTurma()}','{$arq->getDuracao()}','{$arq->getArea()}','{$arq->getCidade()}','{$arq->getUnidade()}','{$arq->getBox()}','{$arq->getPrateleira()}')";
        
        return mysqli_query($conn, $cadastrar);
        
    }
    
    public function adicionarUsuario($conn) {
        
        $procurar = mysqli_query($conn, "SELECT * FROM usuarios WHERE login='{$this->getLogin()}'");
        
			$rows = mysqli_num_rows($procurar);

			if($rows == 0){
				$salvar =  "INSERT INTO usuarios (usuario,email,login,senha,adm) VALUES ('{$this->getNome()}','{$this->getEmail()}','{$this->getLogin()}','{$this->getSenha()}','{$this->getAdm()}')";

				if(mysqli_query($conn, $salvar)){
					echo '<div class="alert alert-success" role="alert">
					Funcionário Adicionado com Sucesso!
					</div>';
				} else{
					$erro = mysqli_error($conn);
					echo '<div class="alert alert-danger" role="alert">
					Funcionário não pode ser adicionado! ERRO: <?php echo $erro;?>
					</div>'; 
				}
			} else {
				echo '<div class="alert alert-danger" role="alert">
					Usuário já existe!
					</div>';
			}
    }
    
    public function excluirUsuario($conn) {
        $result = mysqli_query($conn,"DELETE FROM usuarios WHERE id={$this->getId()}");
        return $result;
        
    }

    public function excluirDocumento($conn,$id){
        $result = mysqli_query($conn, "DELETE FROM arquivos WHERE id = '$id'");
        return $result;
    }

    public function editarDocumento($conn,$id,$nomep,$cpfp,$rgp,$cursop,$anop,$turmap,$duracaop,$areap,$cidadep,$unidadep,$boxp,$prateleirap){
    
        $sql = mysqli_query($conn, "UPDATE arquivos SET nome='$nomep', cpf='$cpfp', rg='$rgp', curso='$cursop', ano='$anop', turma='$turmap', duracao='$duracaop', area='$areap', cidade='$cidadep', unidade='$unidadep', box='$boxp', prateleira='$prateleirap' WHERE id = $id");

        return $sql;
    }

    public function editarFuncionario($conn, $id, $nome, $login, $email, $senha, $admin){
        $sql = mysqli_query($conn, "UPDATE usuarios SET usuario='$nome', login='$login', email='$email', senha='$senha', adm='$admin' WHERE id = '$id' ");

        return $sql;
    }


}
