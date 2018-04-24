<?php
//echo var_dump($_POST); // somente para verificar os valores vindos do FORM
//Valor que virão de acordo com o preenchimento da modalGerarRelatorio.php
/*$tipoImpressao = filter_input(INPUT_POST, 'tipoImpressao');
$calendar = filter_input(INPUT_POST, 'calendar');
$calendar_semana = filter_input(INPUT_POST, 'calendar-semana');
$calendar_semana2 = filter_input(INPUT_POST, 'calendar-semana2');
$calendar_mes = filter_input(INPUT_POST, 'calendar-mes');
$calendar_mes2 = filter_input(INPUT_POST, 'calendar-ano-mes');
$calendar_ano = filter_input(INPUT_POST, 'calendar-ano');

echo '<br>Imprimir ' . $imprimir;
echo '<br>Calendar_ano ' . $calendar_ano;
echo '<br>Calendar_mes ' . $calendar_mes;
echo '<br>Calendar_semana ' . $calendar_semana;
echo '<br>Calendar_semana2 ' . $calendar_semana2;
echo '<br>Calendar ' . $calendar;

echo '<br><br>';
 
 */
//switch de acordo com a combo preenchida no modalGerarRelatorio.php
/*switch ($tipoImpressao) {
    case 'Por dia':
        $pesquisa = 'SELECT * FROM produtos INNER JOIN data_venda ON produtos.id_produto = data_venda.id_produto WHERE data_venda.dtV'
            . ' = "' . $calendar .'" AND data_venda.acao="verificado"';
        break;
    case 'Por semana':
        $pesquisa = 'SELECT * FROM produtos INNER JOIN data_venda ON produtos.id_produto = data_venda.id_produto WHERE data_venda.dtV'
            . ' BETWEEN "' . $calendar_semana . '" AND "' . $calendar_semana2.'" AND data_venda.acao="verificado"';
        break;
    case 'Por mês':
        $pesquisa = 'SELECT * FROM produtos WHERE dtVenda LIKE "'%$calendar_mes%'"';
        var_dump($pesquisa);
        die();
        $pesquisa = 'SELECT * FROM produtos WHERE dtVenda LIKE "'%$calendar_mes2%'"';
        break;
    case 'Por ano':
        $pesquisa = 'SELECT * FROM produtos WHERE dtVenda LIKE = "' . $calendar_ano.'"';
        break;
}*/
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
define('FPDF_FONTPATH', 'font/');
require_once '../view/static/fpdf/fpdf.php';
$pdf = new FPDF ('P', 'cm', 'A4');
$pdf->Open();
$pdf->AddPage();
//$pdf->SetFont('Arial', 'B', '12');
$sql = $pesquisa;
include_once '../bd/conexao.php';
include "../view/admin/controle.php";

//Recupera o nome da empresa
$id_empresa = $_POST['id_empresa'];
$query = "SELECT razao_socia, nome_fantasia, cnpj FROM empresa WHERE id = $id_empresa";
$result = mysqli_query($conexao, $query) or die(mysqli_error($conexao));
$resultado = mysqli_fetch_assoc($result);

//Recupera campos
$nome = $_POST['nome'];
$nascimento = $_POST['nascimento'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$placa = $_POST['placa'];
$modelo = $_POST['modelo'];
$fabricante = $_POST['fabricante'];
$seguradora = $_POST['seguradora'];
$corretor = $_POST['corretor'];
$expediente = $_POST['expediente'];
$carta = $_POST['carta'];

//$exe_sql = mysql_query($sql) or die (mysql_error());
    //Primeira linha com o cabecalho do que irá apresentar
    $pdf->SetFillColor(255);
    $pdf->SetTextColor(0);
    //Inicio cabeçalho
    $pdf->SetFont('Arial', 'B', '25');
    $pdf->Cell(7,1,utf8_decode($resultado['nome_fantasia']),0,0,'L', true);
    $pdf->SetFont('Arial', '', '13');    
    $pdf->MultiCell(12,1,utf8_decode('Seguradora: '.$seguradora),0,'R', true);
    $pdf->SetFont('Arial', 'B', '15');
    $pdf->Cell(7,0.5,utf8_decode($resultado['razao_socia']),0,1,'L', true);
    $pdf->SetFont('Arial', '', '10');
    $pdf->Cell(7,0.4,utf8_decode($resultado['cnpj']),0,0,'L', true);
    $pdf->SetFont('Arial', '', '13');    
    $pdf->MultiCell(12,0.4,utf8_decode('Corretor: ' .$corretor),0,'R', true);
    $pdf->ln();
    $pdf->SetLineWidth(0.05);
    $pdf->Line(1,3.2,20,3.2);
    $pdf->ln();
    //Fim
    //Inicio dados do cliente
    $pdf->SetFont('Arial', 'B', '20');
    $pdf->MultiCell(0,1,utf8_decode($nome),0,'C', true);
    $pdf->SetFont('Arial', '', '13');
    $pdf->cell(5,1,utf8_decode('CPF: '.$cpf),0,0,'L', true);
    $pdf->cell(14,1,utf8_decode('Data de nascimento: '.$nascimento),0,1,'R', true);
    $pdf->cell(19,1,utf8_decode('E-mail: '.$email),0,1,'L', true);
    $pdf->cell(19,1,utf8_decode('Telefone: '.$telefone.' / Celular: '.$celular),0,1,'L', true);
    $pdf->cell(4,1,utf8_decode('CEP: '.$cep),0,0,'L', true);
    $pdf->cell(15,1,utf8_decode('Endereço: '.$endereco),0,1,'R', true);
    $pdf->cell(15,1,utf8_decode('Cidade: '.$cidade),0,0,'L', true);
    $pdf->cell(4,1,utf8_decode('UF: '.$uf),0,1,'R', true);
    $pdf->SetLineWidth(0.05);
    $pdf->Line(1,10,20,10);
    $pdf->ln();
    //Fim
    //Inicio dados do veiculo
    $pdf->SetFont('Arial', 'B', '20');
    $pdf->MultiCell(0,1,utf8_decode($placa),0,'C', true);
    $pdf->SetFont('Arial', '', '13');
    $pdf->Cell(10,1,utf8_decode('Veículo: '.$modelo),0,0,'L', true);
    $pdf->Cell(9,1,utf8_decode('Fabricante: '.$fabricante),0,1,'R', true);

    $pdf->SetLineWidth(0.05);
    $pdf->Line(1,13,20,13);
    $pdf->ln();
    //Fim
    //Inicio descrição do expediente
    $pdf->SetFont('Arial', 'I', '20');
    $pdf->MultiCell(0,1,utf8_decode($carta),0,'C', true);
    $pdf->SetFont('Arial', '', '13');
    $pdf->MultiCell(0,1,utf8_decode($expediente),0,'C', true);
    //Fim
    
$pdf->Output("../expedientes/expediente.pdf","F");

print 'sucesso';

/*print '<div class="alert alert-success alert-dismissible" role="alert">'
. '<strong>Sucesso!</strong> Relatório gerado com sucesso.</div>'
        . '<a href="../output/pdf/relatorio.pdf" target="_blank" class="btn btn-info" name="download" title="Download do relatório gerado">
                    <span class="fa fa-download" aria-hidden="true"></span> Download Relatório
                </a>'
        . '<br><a href="../resultados.php" class="btn btn-danger" name="voltar" title="Voltar para página anterior">
                    <span class="fa fa-arrow-left" aria-hidden="true"></span> Voltar
                </a>';*/