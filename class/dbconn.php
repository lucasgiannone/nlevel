<?php


//local com o site no local com conexao externa
$servername = "92.249.44.207";
$username = "u871029417_athon";
$password = "Vitor@123";
$dbname = "u871029417_athon";

//local com o site no ar
// $servername = "localhost";
// $username = "u871029417_athon";
// $password = "Vitor@123";
// $dbname = "u871029417_athon";

//local com o xampp
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "u871029417_athon";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function cadastrarConteudo($conn, $nome_imagem, $titulo, $descricao, $data, $link, $palestrante, $nome_imgpal){

  $sql = "INSERT INTO `conteudoParaAutorizar` (`imagem`, `titulo`, `descricao`, `data`, `url`, `palestrante`, `img_palestrante`)
          VALUES ('$nome_imagem', '$titulo', '$descricao', '$data', '$link', '$palestrante', '$nome_imgpal')";
          
  return mysqli_query($conn, $sql);
}

function registroconteudo($conn, $conteudo, $userid){
  $sql = "SELECT * FROM conteudoaluno WHERE id_usuario = $userid AND id_conteudo = $conteudo";
  $query = mysqli_query($conn, $sql);
  if (mysqli_num_rows($query) > 0){
    return "alert";
  }
  $sql = "INSERT into conteudoaluno (id_conteudo, id_usuario) VALUES ($conteudo, $userid)";
  return mysqli_query($conn, $sql);
}


function desregistroconteudo($conn, $conteudo, $userid){
  $sql = "DELETE FROM conteudoaluno WHERE id_usuario = $userid AND id_conteudo = $conteudo";
  if (mysqli_query($conn, $sql)){
    return true;
  }
  else{
    return false;
  }
}



function excluirconteudo ($conn, $conteudo){
  $versetaregistrado =  "SELECT * FROM conteudoaluno WHERE id_conteudo = $conteudo";
  $queryregistrado = mysqli_query($conn, $versetaregistrado);
   
  if (mysqli_num_rows($queryregistrado)>0)
          {
            $sql = "DELETE conteudo, conteudoaluno from conteudo inner join conteudoaluno on conteudo.id_conteudo = conteudoaluno.id_conteudo 
                    where conteudo.id_conteudo and conteudoaluno.id_conteudo = '$conteudo'";
          }else{
            $sql = "DELETE FROM conteudo where id_conteudo = $conteudo";
          }
  if (mysqli_query($conn, $sql)){
    return true;
  }
  else{
    return false;
  }
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