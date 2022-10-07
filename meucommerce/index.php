<?php
include_once('conexao.php');
if(!isset($_SESSION)){
    session_start();
}
$produtos = $conn->query('SELECT * FROM produtos');
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
<sccript src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

<div>
    <div style="height: 100px; background-color: lightblue; text-align: center">
        <div>
            <a href="?">Home</a>
        </div>
        <div style='margin-left: 1200px'>
        <?php if(!isset($_SESSION['id'])){?>
        <a href="login.php"><button class='btn btn-dark'>Login</button></a> // <a href="register.php"><button class='btn btn-dark'>Registrar</button></a>
        <?php } else{
            echo 'Olá: ' . $_SESSION['nome'];
        ?>
        <form method="post"><button name='sair' class='btn btn-danger'>Logout</button></form>
        <?php 
            if(isset($_POST['sair'])){
                $_SESSION['id'] = null;
                header("Refresh:0");
            }
        }
        ?>
        </div>
    </div>
    <div style="height: 1350px; widhth: 100%">
        <div style="margin-left: 5px; height: 1350px; width: 220px; background-color: lightyellow">
            <?php include_once('menu.php')?>
        </div>
        <div style='position: absolute; top: 100px; left: 225px; width: 85.8%; height: 1350px'>
            <?php
                
            if(!isset($_GET['categoria'])){
                foreach($produtos as $row){?>

                <div class="card" style="width: 18rem; margin-top: 10px; margin-left: 20px">
                    <img src="<?php echo $row['imagem']; ?>" class="card-img-top" alt="<?php echo $row['descricao']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['descricao']; ?></h5>
                    <p class="card-text"><?php echo $row['resumo']; ?></p>
                    <a href="?pagina=produto&id=<?php echo $row['id']; ?>" class="btn btn-primary">Detalhes</a>
                </div>
                </div>

            <?php
                }
            }

            else{
                $sql_produtos = 'SELECT * from produtos where categoria_id = :id';
                $consulta_produtos = $conn->prepare($sql_produtos);
                $consulta_produtos->execute(['id' => $_GET['categoria']]);

                while ($produto = $consulta_produtos->fetch()) { ?>
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $produto['imagem']; ?>" class="card-img-top" alt="<?php echo $produto['descricao']; ?>">
                    <div class="card-body">
                            <h5 class="card-title"><?php echo $produto['descricao']; ?></h5>
                            <p class="card-text"><?php echo $produto['resumo']; ?></p>
                            <a href="?pagina=produto&id=<?php echo $produto['id']; ?>" class="btn btn-primary">Detalhes</a>
                        </div>
                    </div>
                    <?php }
                    ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div style="height: 100px; background-color: lightblue">
            
    </div>
</div>