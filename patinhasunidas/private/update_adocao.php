<?php
header('Content-Type: application/json');

// Chamada de conexão com o Banco de Dados
include("./db/conexao.php");

// Recupera os dados do POST
$nome_adocao = isset($_POST['nome_adocao']) ? intval($_POST['nome_adocao']) : '';
$especie_adocao = isset($_POST['especie_adocao']) ? intval($_POST['especie_adocao']) : '';
$raca_adocao = isset($_POST['raca_adocao']) ? intval($_POST['raca_adocao']) : '';
$sexo_adocao = isset($_POST['sexo_adocao']) ? intval($_POST['sexo_adocao']) : '';
$dta_nasc_adocao = isset($_POST['dta_nasc_adocao']) ? intval($_POST['dta_nasc_adocao']) : ''; // Data de nascimento
$caract_adocao = isset($_POST['caract_adocao']) ? intval($_POST['caract_adocao']) : '';
$saude_adocao = isset($_POST['saude_adocao']) ? intval($_POST['sexo_adocao']) : '';
$tutor_email_adocao = isset($_POST['tutor_email_adocao']) ? intval($_POST['tutor_email_adocao']) : '';
$tutor_cell_adocao = isset($_POST['tutor_cell_adocao']) ? intval($_POST['tutor_cell_adocao']) : '';;
// Lida com o upload do arquivo
$foto_adocao = isset($_POST['foto_old']) ? $_POST['foto_old'] : ''; // Default to old photo

if (isset($_FILES['foto_adocao']) && $_FILES['foto_adocao']['error'] == UPLOAD_ERR_OK) {
    $foto_name = basename($_FILES['foto_adocao']['name']);
    $foto_tmp = $_FILES['foto_adocao']['tmp_name'];
    $upload_dir = "../assets/img/adocao/";
    $foto_path = $upload_dir . $foto_name;

    // Verifica se o diretório de upload existe e é gravável
    if (!is_dir($upload_dir) || !is_writable($upload_dir)) {
        echo json_encode(['success' => false, 'error' => 'Diretório de upload não encontrado ou não é gravável!']);
        exit;
    }

    // Move o arquivo para o diretório
    if (!move_uploaded_file($foto_tmp, $foto_path)) {
        echo json_encode(['success' => false, 'error' => 'Falha ao mover o arquivo para o diretório de upload.']);
        exit;
    }

    // Atualiza a foto se uma nova foi enviada
    $foto_adocao = $foto_name;
}

// Atualiza o banco de dados
$sql = "UPDATE viadaspatinhas.tb_adocao SET FOTO_ADOCAO=?, NOME=?, ESPECIE=?, RACA=?, SEXO=?, DTA_NASC=?, CARACT=?, SAUDE=?, TUTOR_EMAIL=?, TUTOR_CELL=? WHERE ID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $foto_adocao_nome, $nome_adocao, $especie_adocao, $raca_adocao, $sexo_adocao, $dta_nasc_adocao, $caract_adocao, $saude_adocao, $tutor_email_adocao, $tutor_cell_adocao

$response = [];
if ($stmt->execute()) {
    $response['success'] = true;
} else {
    $response['success'] = false;
    $response['error'] = 'Erro ao atualizar o banco de dados: ' . $stmt->error;
}

$stmt->close();
$conn->close();

echo json_encode($response);
?>