<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "next_level";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function cadastrarConteudo($conn, $titulo, $descricao, $link, $data){
  $sql = "INSERT INTO conteudo(imagem, titulo, descricao, data) VALUES('$imagem', '$titulo', '$link', '$data')";
  $query = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($query)){
    array_push($rows, $row);
  }
  echo '<pre>';
  var_dump($rows);
  die();
}
?>