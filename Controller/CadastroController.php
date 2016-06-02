<?php

include_once '../Dominio/Cadastro.php';
include_once '../DAO/CadastroDAO.php';

$cadastro = new Cadastro();
$cadastroDAO = new CadastroDAO();
        
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        
        $cadastro->setNome($nome);
        $cadastro->setEmail($email);
        $cadastro->setEndereco($endereco);
        $cadastro->setTelefone($telefone);
        
        $cadastroDAO->inserirCadastro($cadastro);
        
        $resposta = 'Cadastrado com sucesso';
        
        echo json_encode($resposta);
        die;

