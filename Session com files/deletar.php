<?php 
    

    function deletalinha(){
    $texto = file_get_contents('lista.txt');
    $arquivo = $texto;

    $texto = explode(PHP_EOL, $texto);
        $linha = $_GET['linha'];
        $tamanho = count($texto);

        unset($texto[$linha]);

        $texto = implode(PHP_EOL, $texto);

        echo $texto;

        $textorigin = fopen('lista.txt', 'w');

        fwrite($textorigin, $texto);

        header('location: /Victor/Session%20com%20files/index.php');

    }

    deletalinha();

?>