<?php
    include_once('conexao.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $delete = $conn->query('SET foreign_key_checks = 0; DELETE FROM produtos WHERE IDProduto = ' . $id);
        header('location: /Victor/projeto/?pagina=listaprodutos');
    }
    else if(isset($_GET['idf'])){
        $id = $_GET['idf'];
        $delete = $conn->query('SET foreign_key_checks = 0; DELETE FROM fornecedores WHERE IDFornecedor = ' . $id);
        header('location: /Victor/projeto/?pagina=listafornecedores');
    }
?>