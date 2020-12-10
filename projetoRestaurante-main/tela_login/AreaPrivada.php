<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("location: index.php");
    exit;
}
include('../html/main.html');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
 
<body>
<header>
    <nav class="desk">
      <div class="bar" id="bar">
        <p>
          <title>Menu Dropdown - Linha de Código</title>
          <link rel="stylesheet" type="text/css" href="estilo.css" />
          </head>

          <body>
            <ul id="nav">
              <li><i class="fa fa-bars fa-2x" aria-hidden="true"></i>
                <ul>
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Sobre nós</a></li>
                  <li><a href="#">Contatos</a></li>
                </ul>
              </li>
            </ul>
          </body>
        </p>
      </div>
      <div class="logo">
        <img src="../img/logo.jpg" alt="Logo">
      </div>
      <div class="login">

      </div>
    </nav>
    <div id="mei" class="menu-vertical">
      <div class="menu">
        ALISON
      </div>
    </div>
</header>   
<div id="body-form">
    <h1>Faça seu pedido</h1>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome Produto" maxlength="30">
        <input type="number" name="qntd" placeholder="Quantidade" maxlength="30">
        <input type="text" name="observacao" placeholder="Observação" maxlength="100">
        <input class="btn-sbmt" type="submit" value="PEDIR">
    </form>
</div>
</body>

</html>