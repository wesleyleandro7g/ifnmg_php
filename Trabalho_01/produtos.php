<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/ResetCSS.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="./css/styles.css" media="screen" />
        <title>Renata Store</title>
    </head>
    <body>
        <?php
            require('./Classes/Conn.php');
            require('./Classes/Cadastro.php');

            $formDados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            if (!empty($formDados["SendCadProduct"])) {
                $verprod = new Produto();
                $verprod->formDados = $formDados;
                $prod = $verprod->productname();
                 if ($prod) {
                    echo '<script laguage="javascript">alert("Nome de produto existente!");</script>';
                 }
            } else if (!empty($formDados["SendCadProduct"])) {
                $cadProduct = new Produto();
                $cadProduct->formDados = $formDados;

                $valor = $cadProduct->cadastrar();

                if ($valor) {
                    echo '<script laguage="javascript">alert("Produto cadastrado!");</script>';                    
                } else {
                    echo '<script laguage="javascript">alert("Houve um erro! Tente novamente.");</script>';
                }
            }
            ?>

        <header class="header">
            <h1>Renata Store</h1>
            <div class="menu">
                <a href="index.php" class="categories">
                    Usuarios
                </a>
                <a class="categories">
                    Produtos
                </a>
            </div>
        </header>
        <div class="container">
            <div class="content">
                <h2>Cadastrar produtos</h2>
                <form action="scripts/handle_produtos.php" method="POST">
                    <input type="text" placeholder="Nome do produto" name="nome">
                    <input type="text" placeholder="Descrição" name="descricao">
                    <input type="text" placeholder="Preço de compra" name="preco_compra">
                    <input type="text" placeholder="Preço de venda" name="preco_venda">
                    <input type="text" placeholder="Quantidade" name="quantidade">
                    <button type="submit" class="submit" value="CADASTRAR" name="SendCadProduct">
                        cadastrar
                    </button>
                </form>
            </div>
        </div>
    </body>
</html>