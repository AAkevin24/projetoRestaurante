<?php
require_once '../tela_login/classes/pedidos.php';
$produto = new Pedido;
$produto->conectar();
$produtos = implode("," , $_POST['produtos']);
$produto->cadastrar($produtos, $_POST['mesa']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Pedido</title>
</head>
<body>
    
    <h1>Seu pedido foi:</h1>
    <p><?=$produtos?></p>
    <H2>Aguarde na sua respectiva mesa enquanto concluimos seu pedido</H2>
</body>
</html>