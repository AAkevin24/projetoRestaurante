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
        <h1>Cadastrar</h1>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
            <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
            <input type="email" name="email" placeholder="Usuário" maxlength="40">
            <input type="password" name="senha" placeholder="Senha" maxlength="15">
            <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
            <input class="btn-sbmt" type="submit" value="CADASTRAR">
        </form>
    </div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
        $confSenha = filter_input(INPUT_POST, 'confSenha', FILTER_SANITIZE_STRING);

        if (!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confSenha)) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            }
            $u->conectar("login", "localhost", "root", "");
            if ($u->msgErro == "") {
                if ($senha == $confSenha) {
                    if ($u->cadastrar($nome, $telefone, $email, $senha)) {
                        ?>
                        <div class="msg-sucesso">
                         Cadastrado com sucesso;
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="msg-erro">
                         Email ja cadastrado;
                        </div>
                        <?php
                    }
                } else {
                    ?>
                        <div class="msg-erro">
                         Senha e confirmar senha não correspondem;
                        </div>
                        <?php
                }
            } else {
                ?>
                        <div class="msg-erro">
                         <?php echo "Erro: ".$u->msgErro;?>
                        </div>
                        <?php
            }
        } else {
            ?>
                        <div class="msg-erro">
                         Preencha todos os campos;
                        </div>
                        <?php
        }
    }
    ?>
</body>

</html>