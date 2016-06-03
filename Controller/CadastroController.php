<?php
/**
 * Controller do cadastro
 * Recebe os dados do formulário
 * Seta os valores no objeto $cadastro
 * Seta todas informações no cadastroDAO para inserir no banco de dados
 * Se der tudo certo ele retorna a mensagem
 */
include_once '../Dominio/Cadastro.php';
include_once '../DAO/CadastroDAO.php';

$cadastro = new Cadastro();
$cadastroDAO = new CadastroDAO();

try {
    //Verificação do lado servidor, não pode entrar campos vazios
    if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['endereco']) || empty($_POST['telefone'])) {
        echo "Existem campos vazios, favor preencher!";
    }  else {
        
        //Se tudo ocorrer bem ele pega os dados do formulário para inserir no objeto
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        
        //Seta todos os valores no objeto
        $cadastro->setNome($nome);
        $cadastro->setEmail($email);
        $cadastro->setEndereco($endereco);
        $cadastro->setTelefone($telefone);
        
        //Faz a persistencia no banco de dados
        $cadastroDAO->inserirCadastro($cadastro);
        
        //Retorna a resposta
        $resposta = 'Cadastrado com sucesso';
        
        //Codifica para JSON
        echo json_encode($resposta);
        die;
    }
        
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}



        

