<?php


 class Usuario{
    private $pdo;
    public $msgErro = "";
     public function conectar($nome, $host, $usuario, $senha){
        
        global $pdo;
        try{
        $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        }catch (PDOException $e){
                $msgErro = $e-> getMessage();
        }
     }
     public function cadastrar($nome, $telefone, $email, $senha){
        global $pdo;
        
            $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = e");
            $sql->bindValue(":e", $email);
            $sql->execute();
            if($sql->rowCount() > 0) {
               return false;  //ja cadastrado
            }
            else{
               echo $nome, $telefone, $email, $senha;
               $sql= $pdo->prepare("INSERT INTO usuarios (nome, telefone, email, senha) VALUES (:n, :t, :e, :s);");
               $sql->bindValue(":n", $nome);
               $sql->bindValue(":t", $telefone);
               $sql->bindValue(":e", $email);
               $sql->bindValue(":s", md5($senha));
               $sql->execute();
               return true;
         }
            
            
         }
     public function logar($email, $senha){
        global $pdo;
            $sql = $pdo->prepare("SELECT id_usuario, cargo FROM usuarios WHERE email = :e AND senha = :s");
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", md5($senha));
            $sql->execute();   
      if($sql->rowCount() > 0)
      {
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            $_SESSION['cargo'] = $dado['cargo'];
                    if( $dado['cargo']== 1)
                    
                    { 
                        header("Location:http://localhost/projetoRestaurante-main/html/tabelaPedidos.php"); 
                    }
                    if( $dado['cargo'] == 2)
                    { 
                        header("Location:http://localhost/projetoRestaurante-main/html/cozinha.php "); 
                    }
                    if( $dado['cargo'] == 3)
                    { 
                        header("Location:http://localhost/projetoRestaurante-main/html/cadastrarPrato.php"); 
                    }
                    return true;
      }
      else{
            return false; 
      }

     }
 }
