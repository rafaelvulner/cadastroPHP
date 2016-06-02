<?php

include_once '../DAO/CadastroDAO.php';

$dao = new CadastroDAO();



foreach ($dao->listarCadastros() as $dados) {

    $cadastro[] = array('id' => $dados->getId(), 'nome' => $dados->getNome(), 'email' => $dados->getEmail(), 'endereco' => $dados->getEndereco(), 'telefone' => $dados->getTelefone());
}

echo json_encode($cadastro);
die;


