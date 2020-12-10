<?php

define('HOST', '127.0.0.1');
define('USUARIO', 'root');
define('SENHA', '135055');
define('DB', 'kevindb');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB);

if (!$conexao)
{
  die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";
