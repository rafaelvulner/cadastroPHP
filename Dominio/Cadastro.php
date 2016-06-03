<?php

class Cadastro {
    
    private $id;
    private $nome;
    private $email;
    private $endereco;
    private $telefone;
    
    
    public function getId(){
        
        return $this->id;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function getNome(){
        
        return $this->nome;
    }
    
    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setEmail($email){
        $this->email = $email;
    }
    
    public function getEndereco(){
        return $this->endereco;
    }
    
    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }
    
    public function getTelefone(){
        return $this->telefone;
    }
    
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
}
