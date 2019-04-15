<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Arquivo
 *
 * @author leoal
 */
class Arquivo {
    
    private $id;
    private $cpf;
    private $nome;
    private $rg;
    private $curso;
    private $ano;
    private $turma;
    private $duracao;
    private $area;
    private $cidade;
    private $unidade;
    private $box;
    private $prateleira;
    private $tipo;
    
     function getId() {
        return $this->id;
    }
    
     function getTipo() {
        return $this->tipo;        
    }
    
     function setTipo($tipo) {
        $this->tipo = $tipo;        
    }
    
     function getCpf() {
        return $this->cpf;
    }

     function getNome() {
        return $this->nome;
    }

     function getRg() {
         return $this->rg;
     }

     function getCurso() {
        return $this->curso;
    }

     function getAno() {
        return $this->ano;
    }

     function getTurma() {
        return $this->turma;
    }

     function getDuracao() {
        return $this->duracao;
    }

     function getArea() {
        return $this->area;
    }

     function getCidade() {
        return $this->cidade;
    }

     function getUnidade() {
        return $this->unidade;
    }

     function getBox() {
        return $this->box;
    }

     function getPrateleira() {
        return $this->prateleira;
    }

     function setCpf($cpf) {
        $this->cpf = $cpf;
    }

     function setNome($nome) {
        $this->nome = $nome;
    }

     function setRg($rg) {
         $this->rg = $rg;
     }

     function setCurso($curso) {
        $this->curso = $curso;
    }

     function setAno($ano) {
        $this->ano = $ano;
    }

     function setTurma($turma) {
        $this->turma = $turma;
    }

     function setDuracao($duracao) {
        $this->duracao = $duracao;
    }

     function setArea($area) {
        $this->area = $area;
    }

     function setCidade($cidade) {
        $this->cidade = $cidade;
    }

     function setUnidade($unidade) {
        $this->unidade = $unidade;
    }

     function setBox($box) {
        $this->box = $box;
    }

     function setPrateleira($prateleira) {
        $this->prateleira = $prateleira;
    }
    
    


}
