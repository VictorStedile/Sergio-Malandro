<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
<sccript src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

<?php 
    $dados = $conn->query("SELECT *, categorias.descricaocate FROM produtos, categorias WHERE produtos.id='" . $_GET['id'] . "' AND categorias.cid = produtos.categoria_id");
    $dados2 = $conn->query("SELECT *, categorias.descricaocate FROM produtos INNER JOIN categorias on produtos.categoria_id = categorias.cid ")
?>

<div style='position: relative; left: 40px;width: 100%; height: 100%; background-color: lightgray'>
    <div style='position: relative; width: 100%; height: auto; background-color: gray'>
        <?php
            foreach($dados as $row){
        ?>
        <center><img src=<?php echo $row['imagem']; ?>></center>
        
    </div>
    <div style='position: relative; height: 910px; width: 100%'>
        <center>
            <h3>Nome: <?php echo $row['descricao']?></h3>
            <h3>Caracteristicas: </h3><textarea readonly cols="60" rows="10"><?php echo $row['caracteristicas']?></textarea>
            <h3>Categoria: <?php echo $row['descricaocate'] ?></h3>
            <h3>Valor: <?php echo $row['valor']?></h3>
            <h3>Caracteristicas principais: <?php echo $row['resumo']?></h3>
            <h3>Estoque: <?php echo $row['estoque']?></h3>
            <form method="post"><a href="carrinho.php"><button name='adicionarcar' class='btn btn-dark'>Adicionar ao carrinho</button></form></a>
        </center>
    </div>
    <?php } 
        if(isset($_POST['adicionarcar'])){
            if(!isset($_SESSION['carrinho'])){
                $_SESSION['carrinho'] = array();
                array_push($_SESSION['carrinho'], $_GET['id']);
            }
            else{
                array_push($_SESSION['carrinho'], $_GET['id']);
            }
        }

    ?>
</div>
