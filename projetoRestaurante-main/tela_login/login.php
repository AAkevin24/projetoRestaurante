<?php
require_once './classes/usuarios.php';
$u = new Usuario;
?>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <div id="body-form">
        <h1>Login</h1>
            <form method="POST">
            <input type="email" name="email" placeholder="Usuário">
            <input type="password" name="senha" placeholder="Senha">
            <input class="btn-sbmt" type="submit" value="ACESSAR">
            <a href="cadastrar.php">Ainda não é inscrito?<strong>Cadastre-se!</strong> </a>
        </form>
    </div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

        if (!empty($email) && !empty($senha)) {
            $u->conectar("login", "localhost", "root", "");
            if ($u->msgErro == "") {
                if ($u->logar($email, $senha)) 
                {
                    
                }
                
                 else {
    ?>
                    <div class="msg-erro">
                        Email e/ou senha estão incorretos;
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="msg-erro">
                    <?php echo "Erro: " . $u->msgErro; ?>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="msg-erro">
                Preencha todos os campos
            </div>
    <?php
        }
    }
    ?>
</body>
</html>