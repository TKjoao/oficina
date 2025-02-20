<?php include($_SERVER['DOCUMENT_ROOT']."/CRUD/cabecalho.php"); ?>

<?php 
$bucar_pedido = $conexao->prepare("SELECT * FROM pedidos where id = :id");
$bucar_pedido->bindParam(':id', $_GET["id"] , PDO::PARAM_STR);
$executa = $bucar_pedido->execute();
$pedido = $bucar_pedido->fetch(PDO::FETCH_ASSOC);
?>
<?php 

if(ISSET($_POST["pedido_itens_salvar"]))
{
    $adicionar = $conexao->prepare("insert into pedido_itens (fk_pedido, fk_produto, quantidade) values (:fk_pedido, :fk_produto, :quantidade)");
    $adicionar->bindParam(':fk_pedido', $_POST["item_fk_pedido"] , PDO::PARAM_STR);
    $adicionar->bindParam(':fk_produto', $_POST["item_fk_produto"] , PDO::PARAM_STR);
    $adicionar->bindParam(':quantidade', $_POST["item_quantidade"] , PDO::PARAM_STR);
    $executa = $adicionar->execute();

    if($executa)
    {
    ?>
        <div class="alert alert-success" role="alert">
            Item <?php echo $_POST["item_fk_produto"];?> cadastrado com sucesso!
        </div>
    <?php
    }
    else
    {
    ?>
        <div class="alert alert-danger" role="alert">
            Erro ao cadastrar: <?php echo $_POST["item_fk_produto"]; ?>
        </div>
    <?php
    }

}
?>

<?php 

if(ISSET($_POST["pedido_itens_excluir"]))
{
    $excluir = $conexao->prepare("delete from pedido_itens where id = :id");
    $excluir->bindParam(':id', $_POST["item_id"] , PDO::PARAM_STR);
    $executa = $excluir->execute();

    if($executa)
    {
    ?>
        <div class="alert alert-success" role="alert">
            Item <?php echo $_POST["item_id"];?> excluido com sucesso!
        </div>
    <?php
    }
    else
    {
    ?>
        <div class="alert alert-danger" role="alert">
            Erro ao excluir o item: <?php echo $_POST["item_id"]; ?>
        </div>
    <?php
    }

}
?>

<div class="container mt-2">
        <div class="row">
            <div class="col-md-8">
                <h1 class="display-6">#<?php echo $pedido["id"]; ?> - <?php echo $pedido["apelido"]; ?></h1>
            </div>
            <div class="col-md-1 ms-auto">
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-plus"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="#" method="POST">
                                <input type="hidden" name="item_fk_pedido" value="<?php echo $pedido["id"]; ?>">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Adicionar produto ao pedido</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                
                                    <div class="form-floating mb-3">
                                        <select class="form-select" aria-label="Nome do produto" id="item_fk_produto" name="item_fk_produto">
                                            <?php

                                            $selecionar = $conexao->prepare("SELECT * FROM produtos");
                                            $executa = $selecionar->execute();
                                            while ($resultado = $selecionar->fetch(PDO::FETCH_ASSOC)) 
                                            {
                                            ?>
                                                <option value="<?php echo $resultado["id"]; ?>"><?php echo $resultado["nome"]; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="item_fk_produto">Nome do produto</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="item_quantidade" name="item_quantidade" placeholder="Digite a quantidade">
                                        <label for="item_quantidade">Quantidade</label>
                                    </div>
                                
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="pedido_itens_salvar" class="btn btn-primary"><i class="fas fa-save"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive mt-2">  
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">PRODUTO</th>
                    <th scope="col">VALOR</th>
                    <th scope="col">QUANTIDADE</th>
                    <th scope="col">SUBTOTAL</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $selecionar = $conexao->prepare("SELECT * FROM pedido_itens where fk_pedido = :fk_pedido");
                    $selecionar->bindParam(':fk_pedido', $pedido["id"] , PDO::PARAM_STR);
                    $executa = $selecionar->execute();
                    while ($resultado = $selecionar->fetch(PDO::FETCH_ASSOC)) 
                    {
                        $selecionar_produto = $conexao->prepare("SELECT * FROM produtos where id = :id");
                        $selecionar_produto->bindParam(':id', $resultado["fk_produto"] , PDO::PARAM_STR);
                        $executa = $selecionar_produto->execute();
                        $resultado_produto = $selecionar_produto->fetch(PDO::FETCH_ASSOC);
                    ?>
                        <tr>
                            <th scope="row"><?php echo $resultado["id"]; ?></th>
                            <td>
                                <a class="btn btn-link" >
                                    <?php echo $resultado_produto["nome"]; ?>
                                </a>
                            </td>
                            <td><?php echo $resultado_produto["valor"]; ?></td>
                            <td><?php echo $resultado["quantidade"]; ?></td>
                            <td><?php echo $resultado["quantidade"] * $resultado_produto["valor"]; ?></td>
                            <td>
                                <center>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Modal_Delete_<?php echo $resultado["id"]; ?>">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </center>
                            </td>
                        </tr>

                        <div class="modal fade" id="Modal_Delete_<?php echo $resultado["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <form action="#" method="POST">
                                            <input type="hidden" name="item_id" value="<?php echo $resultado["id"]; ?>">
                                            <center>
                                                Confirma?<br>
                                                <h3><?php echo $resultado_produto["nome"]; ?></h3>
                                                <button type="submit" name="pedido_itens_excluir" class="btn btn-danger">Excluir</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>        
                                            </center>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php 
                    } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include($_SERVER['DOCUMENT_ROOT']."/avaliacao/rodape.php"); ?>