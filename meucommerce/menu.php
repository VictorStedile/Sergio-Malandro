<?php
include_once('conexao.php');
$dados = $conn -> query('SELECT * FROM categorias');

foreach($dados as $row){
    echo "<a href=?categoria=" . $row['cid'] . ">" . $row['descricaocate'] . "<br> </a>";
}
?>

