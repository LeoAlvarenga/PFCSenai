<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author leoal
 */
class Usuario {
    
    private $id;
    private $nome;
    private $login;
    private $senha;
    private $email;

    function getEmail(){
        return $this->email;
    }
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }
    
    public function efetuarLogin($conn){
        
        $query = "select * from usuarios where login = '{$this->login}' and senha = '{$this->senha}'";
        
        return mysqli_query($conn,$query);
    }
    
    public function efetuarLogout() {
        session_destroy();
        header('Location: index.php');
        exit();
    }

    public function pesquisarArquivo($conn,$tipo,$cpf,$rg,$nome,$ano,$area,$cidade,$curso,$duracao,$turma,$unidade) {
        
        include_once('Arquivo.php');
        $arquivo = new Arquivo();
        
        $arquivo->setCpf($cpf);
        $arquivo->setTipo($tipo);
        $arquivo->setRg($rg);
        $arquivo->setNome($nome);
        $arquivo->setAno($ano);
        $arquivo->setArea($area);
        $arquivo->setCidade($cidade);
        $arquivo->setCurso($curso);
        $arquivo->setDuracao($duracao);
        $arquivo->setTurma($turma);
        $arquivo->setUnidade($unidade);
        
       
       return mysqli_query($conn, "SELECT * FROM arquivos WHERE tipo='{$arquivo->getTipo()}'".$arquivo->getCpf().$arquivo->getNome().$arquivo->getRg().$arquivo->getCurso().$arquivo->getAno().$arquivo->getTurma().$arquivo->getDuracao().$arquivo->getArea().$arquivo->getCidade().$arquivo->getUnidade());
    }
}
