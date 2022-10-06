<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div id='site'>
        <div class='topo'>
            Menu <br> <a href="...">Lista</a> <a href="?pagina=adicionar"> Criar</a>
        </div>
    <?php 
        if(isset($_GET['pagina']) && $_GET['pagina'] != 'deletar'){
            if(file_exists($_GET['pagina'] . '.php')){
                include $_GET['pagina'] . '.php';
            }
        }
        else{
            $arquivo = file_get_contents('lista.txt');
            $partes = explode(PHP_EOL, $arquivo);

            for($i = 0; $i <= count($partes); $i++){
                if(isset($partes[$i]) && !$partes[$i] == ''){
                    print_r($partes[$i]);
                    echo " <a href='deletar.php?linha=$i'>Deletar</a><br>";
                }
            }
        }
      
    ?>    
    </div>

    
</body>
</html>