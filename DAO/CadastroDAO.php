<?php

include_once '../Dominio/Cadastro.php';
require_once '../conexao/Conexao.php';

/**
 * Classe CadastroDAO 
 * Contem os métodos de persistencia com banco de dados mysql
 */

class CadastroDAO {
    
     
    
    public function inserirCadastro(Cadastro $cadastro) {
        //Cria conexao
        $conn = \Database::conexao();
        //Cria SQL para inserir no banco
        $sql = "insert into cadastro(nome, email, endereco, telefone) values (?,?,?,?)";
        //Cria o prepared para inserir com segurança no banco
        $ps = $conn->prepare($sql);
        
        try {
            $ps->bindValue(1,$cadastro->getNome());
            $ps->bindValue(2,$cadastro->getEmail());
            $ps->bindValue(3,$cadastro->getEndereco());
            $ps->bindValue(4,$cadastro->getTelefone());
            $ps->execute();
            
        } catch (PDOException $ex) {
            echo 'Erro ao conectar no banco!'.$ex;
        }
        
    }
    
    public function listarCadastros(){
        //Cria uma lista
        $lista = array();
        //Cria conexão
        $conn = Database::conexao();
        //Cria SQL para buscar no banco
        $sql = "select * from cadastro order by Id desc";
        //Prepara a conexão
        $ps = $conn->query($sql);
        
        //Looping para pegar todas informações do banco
        while ($row = $ps->fetch(PDO::FETCH_ASSOC)) {
            //Faz a instancia de um novo cadastro a cada looping
            $cadastro = new Cadastro();
            //Busca as informações no banco e inseri no objeto
            $cadastro->setId($row['Id']);
            $cadastro->setNome($row['nome']);
            $cadastro->setEmail($row['email']);
            $cadastro->setEndereco($row['endereco']);
            $cadastro->setTelefone($row['telefone']);
            //Inseri cada objeto dentro do array
            $lista[] = $cadastro;
        }
        
        //Retorna o array para o usuario
        return $lista;
    }
}
