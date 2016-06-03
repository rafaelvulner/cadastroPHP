<?php
/**
 * Controller para buscar o cadastro do banco de dados
 */
include_once '../DAO/CadastroDAO.php';


//Faz a instancia da classe DAO para buscar as informações no banco de dados
$dao = new CadastroDAO();


//ForEach para ler todas informações do retorno do banco de dados
foreach ($dao->listarCadastros() as $dados) {

    //Cria uma lista de objetos com suas respectivas informações
    $cadastro[] = array('id' => $dados->getId(), 'nome' => $dados->getNome(), 'email' => $dados->getEmail(), 'endereco' => $dados->getEndereco(), 'telefone' => $dados->getTelefone());
}

//Retorna o array codificado em JSON para ler na VIEW via JQUERY 
echo json_encode($cadastro);
die;
