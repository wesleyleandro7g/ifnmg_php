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

        if (!empty($formDados["SendCadUser"])) {
            $veruser = new Usuario();
            $veruser->formDados = $formDados;
            $veru = $veruser->username();
             if ($veru) {
                echo '<script laguage="javascript">alert("Nome de usuário existente!");</script>';
             }
        } else if (!empty($formDados["SendCadUser"])) {
            $cadUser = new Usuario();
            $cadUser->formDados = $formDados;

            $valor = $cadUser->cadastrar();

            if ($valor) {
                echo '<script laguage="javascript">alert("Usuário cadastrado!");</script>';                    
            } else {
                echo '<script laguage="javascript">alert("Houve um erro! Tente novamente.");</script>';
            }
        }
        ?>

        <header class="header">
            <h1>Renata Store</h1>
            <div class="menu">
                <a class="categories">
                    Usuarios
                </a>
                <a href="produtos.php" class="categories">
                    Produtos
                </a>
            </div>
        </header>
        <div class="container">
            <div class="content">
                <h2>Cadastrar usuário</h2>
                <form name="CadUser" action="" method="POST">
                    <input type="text" placeholder="Nome" name="nome">
                    <input type="text" placeholder="CPF" name="cpf">
                    <input type="text" placeholder="Telefone" name="telefone">
                    <input type="text" placeholder="Nome de usuário" name="nome_usuario">
                    <input type="text" placeholder="Email" name="email">
                    <input type="text" placeholder="Senha" name="senha">
                    <button type="submit" class="submit" value="cadastrar" name="SendCadUser">
                        Cadastrar
                    </button>
                </form>
            </div>
        </div>
    </body>
</html>