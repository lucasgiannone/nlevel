<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "next_level";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function cadastrarConteudo($conn, $nome_imagem, $titulo, $descricao, $data, $link){

  $sql = "INSERT INTO `conteudo` (`imagem`, `titulo`, `descricao`, `data`, `url`)
          VALUES ('$nome_imagem', '$titulo', '$descricao', '$data', '$link')";
          
  return mysqli_query($conn, $sql);
}

function verificaNomeImagem($conn, $nome_imagem){
  $valid = false;
  $i = 0;
  do{
    $sql = "SELECT imagem FROM conteudo WHERE imagem LIKE '$nome_imagem%'";
    $query = mysqli_query($conn, $sql);  
    if (mysqli_num_rows($query) > 0){
      $explode = explode(".", $nome_imagem);
      $nome_imagem = "$explode[0]".$i.".$explode[1]";      
      $i++;
    } else {
      $valid = true;
    }
  }while (!$valid);
  return $nome_imagem;
}
?>