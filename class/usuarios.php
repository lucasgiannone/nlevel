<?php

    class Usuario{
        private $pdo;
        public $msgErro = "";
        
        public function conectar($nome, $host, $usuario, $senha){
            global $pdo;
            global $msgErro;

            try {
                $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
            } catch (PDOException $e) {
                $msgErro = $e->getMessage();
            }
        }

        public function cadastrar($nome, $telefone, $dt_nasc, $estado, $cidade, $perfil, $genero, $email, $senha){
            global $pdo;
            //verificar se existe o cadastro
            $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
            $sql->bindValue(":e",$email);
            $sql->execute();
            


            if ($sql->rowCount() > 0){
                return false;
            } else {
                $sql = $pdo->prepare("INSERT INTO usuarios (nome, telefone, dt_nasc, estado, cidade, perfil, genero, email, senha) 
                VALUES (:n, :t, :dt, :es, :ci, :p, :g, :e, :s)");
                $sql->bindValue(":n",$nome);
                $sql->bindValue(":t",$telefone);
                $sql->bindValue(":dt",$dt_nasc);
                $sql->bindValue(":es",$estado);
                $sql->bindValue(":ci",$cidade);
                $sql->bindValue(":p",$perfil);                
                $sql->bindValue(":g",$genero);
                $sql->bindValue(":e",$email);
                $sql->bindValue(":s",md5($senha));
                $sql->execute();
                return true;
            }
        }

        public function logar($email, $senha){
            global $pdo;
            //verificar se existe o login
            $sql=$pdo->prepare("SELECT * FROM usuarios WHERE email = :e AND senha = :s");
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();

            if ($sql->rowCount() > 0){
                //entra no sistema
                $dado = $sql->fetch();
                session_start();
                $_SESSION['id_usuario'] = $dado['id_usuario'];
                $_SESSION['time_start'] = date('Y/m/d H:i');
                $_SESSION['perfil'] = $dado['perfil'];
                $_SESSION['nome'] = $dado['nome'];
                return true;
            } else {
                //login não encontrado
                return false;
            }
        }
    }
?>