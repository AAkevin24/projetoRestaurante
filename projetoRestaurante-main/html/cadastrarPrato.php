<?php
    session_start();
    $erro = false;
    

      require_once '../tela_login/classes/produtos.php';
      $produto = new Produto;
      $produto->conectar();
      if($produto->msgErro == "")
      {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_NUMBER_FLOAT);
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);

        if(!empty($nome) && !empty($preco) && !empty($descricao))
        {
         if( $produto->cadastre($nome, $preco, $descricao) )
         {
          echo "Produto cadastrado com sucesso";
         }
         else
         {
          $erro = true;
         }
        }
      }
      if (!isset($_SESSION['id_usuario']) && $_SESSION['cargo'] == 3) {
        header("location: index.php");
        exit;
    }
      
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Site em desenvolvimento</title>
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
  <?php
  
  
  ?>
  </header>
  <div id="body-form">
    <h1>Cadastrar</h1>
    <?php
      if($erro = true){
        foreach($produto->erros as $erro)
        {
          echo "$erro[0]", "<br> <br>";
        }

      }
    ?>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome Produto" maxlength="30">
        <input type="number" name="preco" placeholder="Preço" maxlength="5">
        <input type="text" name="descricao" placeholder="Descrição" maxlength="100">
        <input class="btn-sbmt" type="submit" value="CADASTRAR">
    </form>
</div>
  
</body>

</html>