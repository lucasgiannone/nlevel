<?php
setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );
date_default_timezone_set( 'America/Sao_Paulo' );
require('./fpdf/alphapdf.php');


// --------- Variáveis do Formulário ----- //
$id       = $_POST['id_usuario'];
$email    = $_POST['email'];
$nome     = utf8_decode($_POST['nome']);

// --------- Variáveis que podem vir de um banco de dados por exemplo ----- //
$empresa  = "NextLevel - Athon Ensino Superior";
$curso    = $_POST['titulo'];
$data     = $_POST['dtconclusao'];
$carga_h  = $_POST['duration'];


$texto1 = utf8_decode($empresa);
$texto2 = utf8_decode("pela participação na palestra de ".$curso." \n realizado em ".$data." com carga horária total de ".$carga_h."");
$texto3 = utf8_decode("São Paulo, ".utf8_encode(strftime( '%d de %B de %Y', strtotime( date( 'Y-m-d' ) ) )));


$pdf = new AlphaPDF();

// Orientação Landing Page ///
$pdf->AddPage('L');

$pdf->SetLineWidth(1.5);


// desenha a imagem do certificado
$pdf->Image('certificado.jpg',0,0,295);

// opacidade total
$pdf->SetAlpha(1);

// Mostrar texto no topo
$pdf->SetFont('Arial', '', 15); // Tipo de fonte e tamanho
$pdf->SetXY(109,46); //Parte chata onde tem que ficar ajustando a posição X e Y
$pdf->MultiCell(265, 10, $texto1, '', 'L', 0); // Tamanho width e height e posição

// Mostrar o nome
$pdf->SetFont('Arial', '', 30); // Tipo de fonte e tamanho
$pdf->SetXY(20,86); //Parte chata onde tem que ficar ajustando a posição X e Y
$pdf->MultiCell(265, 10, $nome, '', 'C', 0); // Tamanho width e height e posição

// Mostrar o corpo
$pdf->SetFont('Arial', '', 15); // Tipo de fonte e tamanho
$pdf->SetXY(20,110); //Parte chata onde tem que ficar ajustando a posição X e Y
$pdf->MultiCell(265, 10, $texto2, '', 'C', 0); // Tamanho width e height e posição

$pdfdoc = $pdf->Output(''.$curso.' - '.$nome.'.pdf','D');


$pdf->Output(); // Mostrar o certificado na tela do navegador

?>
