<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="js/excellentexport.js" type="text/javascript"></script>
        <script src="js/jquery.js" type="text/javascript"></script>
        <script>
        $(document).ready(function () {
                    $.ajax({
                        url: "../Controller/BuscarCadastroController.php",
                        dataType: 'json',
                        success: function (data) {
                            
                            $.each(data, function (idx, obj){
                                $('#tabela > tbody').append('<tr><td><a href="cliente.php?id='+obj.id+'">'+obj.nome+'</td><td>'+obj.email+'</td><td>'+obj.endereco+'</td><td>'+obj.telefone+'</td></tr>');
                            });
                        }
                    });

        
                });
         
        </script>
        <title>Buscar cadastro</title>
    </head>
    <body>
        <div class="container">
            
            <div class="col-md-8 tabela">
                <div class="excel btn-group">
                    <a download="tabela.xls" href="#" onclick="return ExcellentExport.excel(this, 'tabela', 'Sheet Name Here');"><button class="btn btn-primary botao">Exportar para Excel</button></a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Informações</div>
                    <table class="table table-bordered" id="tabela">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Endereço</th>
                                <th>Telefone</th>
                            </tr>
                        </thead>

                        <tbody>
                           
                        </tbody>
                    </table>
                </div>
                <div>
                    <a href="index.php"><button class="btn bg-primary">Voltar</button></a>
                </div>
                <div id="teste"></div>
            </div>
                
        </div>
    </body>
</html>
