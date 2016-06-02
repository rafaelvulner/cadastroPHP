<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/jquery.mask.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                $('#telefone').mask('(99)99999-9999');
            });
        </script>
        <script>
            $(document).ready(function () {
                
                $('#enviar').click(function (event) {
                    
                    if($('#nome').val()===""||$('#email').val()===""||$('#endereco').val()===""||$('#telefone').val()===""){
                        
                        $('#resultado').html('Existem campos vazios').fadeIn().delay(1000).fadeOut();
                        
                        event.default;
                    }else{
                    
                    var $btn = $(this).button('loading');
                    $.ajax({
                        url: "../Controller/CadastroController.php",
                        data: 'nome='+$('#nome').val()+'&email='+$('#email').val()+'&endereco='+$('#endereco').val()+'&telefone='+$('#telefone').val(),
                        dataType: 'json',
                        type: 'post',
                        success: function (data) {
                            
                            $('#resultado').html(data).fadeIn().delay(2000).fadeOut();
                            
                            $('#nome').val('');
                            $('#email').val('');
                            $('#endereco').val('');
                            $('#telefone').val('');
                            
                            $btn.button('reset');
                        }
                    });

        }
                });
            });
        </script>
        <title>Cadastro</title>
    </head>
    <body>
        <div class="container">
            <div class="col-md-12">
                <div class="col-md-3 cadastro" id="cadastro">
                    
                    
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" class="form-control" name="nome">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="endereco">Endereco</label>
                            <input type="text" id="endereco" class="form-control" name="endereco">
                        </div>
                        <div class="form-group">
                            <label for="endereco">Telefone</label>
                            <input type="text" id="telefone" class="form-control" name="telefone">
                        </div>
                        <div class="">
                            <button class="btn btn-primary" id="enviar" data-loading-text="Loading...">Enviar</button>
                            <a href="cadastro.php"><button class="btn btn-danger">Acessar cadastro</button></a>
                        </div>
                        
                    
                </div>
                <div id="resultado" class=" alert-success col-md-3 mensagem  text-center"></div>
                
            </div>
        </div>
    </body>
</html>
