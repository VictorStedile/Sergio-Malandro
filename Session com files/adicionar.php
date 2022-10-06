<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        if(isset($_POST['entrega'])){
            $novalinha = PHP_EOL.$_POST['nome'] . " / " . $_POST['idade'] .  " / " . $_POST['profissao'];
            $texto = file_get_contents('lista.txt');
            $textorigin = fopen('lista.txt', 'w');

            $texto = $texto . $novalinha;
            fwrite($textorigin, $texto);

            header('location: /Victor/Session%20com%20files/index.php');

        }
    ?>

    <form method="POST">
        Nome:<input type="text" id='nome' name='nome'><br>
        Idade:<input type="number" id='idade' name='idade'><br>
        Profissão:<input type="text" id='profissao' name='profissao'><br>

        <input type="submit" name='entrega'>
    </form>
</body>
</html>