<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="funcs.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <sccript src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <?php 
        include_once('conexao.php')
    ?>
    <div>
        <div style="height: 100px; background-color: lightblue; text-align: center">
                <a href="?" class='menu'>Home</a>
                <a href="?pagina=listaprodutos" class='menu'>Listagem de produtos</a>
                <a href="?pagina=listafornecedores" class='menu'>Listagem de fornecedores</a>
                <a href="?pagina=cadastropro" class='menu'>Cadastro de produto</a>
                <a href="?pagina=cadastrofor" class='menu'>Cadastro de fornecedor</a>
        </div>
        <div style="height: 589px; widhth: 100%; background-color: lightyellow">
         <center>
            <?php 
            if(isset($_GET['pagina'])){
                if(file_exists($_GET['pagina'] . '.php')){
                    include($_GET['pagina'] . '.php');
                }
                else {
                    include('error.php');
                }
            }
            else{
                include('informacoes.php');
            }
            ?>
            </center>
        </div>
        <div style="height: 100px; background-color: lightblue">
            
        </div>
    </div>

    
</body>
</html>