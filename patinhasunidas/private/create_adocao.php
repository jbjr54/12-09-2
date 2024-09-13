<?php
// Inclui o arquivo externo de conexão com o banco de dados.
include("./db/conexao.php");

// Recebe os dados do formulário usando o método POST e armazena nas variáveis.
$foto_adocao = $_FILES["foto_adocao"];
$nome_adocao = $_POST["nome_adocao"];
$especie_adocao = $_POST["especie_adocao"];
$raca_adocao = $_POST["raca_adocao"];
$sexo_adocao = $_POST["sexo_adocao"];
$dta_nasc_adocao = $_POST["dta_nasc_adocao"]; // Data de nascimento
$caract_adocao = $_POST["caract_adocao"];
$saude_adocao = $_POST["saude_adocao"];
$tutor_email_adocao = $_POST["tutor_email_adocao"];
$tutor_cell_adocao = $_POST["tutor_cell_adocao"];

$target_dir = "../assets/img/adocao/";
$target_file = $target_dir . basename($foto_adocao["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Verifica se o arquivo é uma imagem.
if(isset($_POST["submit"])) {
    $check = getimagesize($foto_adocao["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Arquivo não é uma imagem válida.";
        $uploadOk = 0;
    }
}

// Verifica se o arquivo já existe.
if (file_exists($target_file)) {
    echo "O arquivo já existe. Escolha um arquivo diferente.";
    $uploadOk = 0;
}

// Verifica o tamanho do arquivo.
if ($foto_adocao["size"] > 500000) { // 500 KB
    echo "O arquivo excede o tamanho máximo permitido de 500 KB.";
    $uploadOk = 0;
}

// Verifica a extensão do arquivo.
if(!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
    echo "Apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
    $uploadOk = 0;
}

// Verifica se o upload foi bem-sucedido.
if ($uploadOk == 0) {
    echo "O arquivo não foi enviado. Corrija o erro e tente novamente.";
} else {
    if (move_uploaded_file($foto_adocao["tmp_name"], $target_file)) {
        echo "A foto " . htmlspecialchars(basename($foto_adocao["name"])) . " foi enviada com sucesso.";
        $foto_adocao_nome = $foto_adocao["name"];
        
        // Prepara a consulta para inserir os dados no banco.
        $stmt = $conn->prepare("INSERT INTO viadaspatinhas.tb_adocao (FOTO_ADOCAO, NOME, ESPECIE, RACA, SEXO, DTA_NASC, CARACT, SAUDE, TUTOR_EMAIL, TUTOR_CELL) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("ssssssssss", $foto_adocao_nome, $nome_adocao, $especie_adocao, $raca_adocao, $sexo_adocao, $dta_nasc_adocao, $caract_adocao, $saude_adocao, $tutor_email_adocao, $tutor_cell_adocao);

            if ($stmt->execute()) {
                // Calcula a idade com base na data de nascimento
                $birthdate = new DateTime($dta_nasc_adocao);
                $today = new DateTime('today');
                $interval = $today->diff($birthdate);
    
                // Obtém anos e meses
                $ano_ado = $interval->y;
                $mes_ado = $interval->m;

                echo "Registro salvo com sucesso! A idade calculada é: $age anos.";
            } else {
                echo "Erro ao salvar o registro no banco de dados.";
            }

            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta.";
        }
    } else {
        echo "Houve um erro ao enviar o arquivo.";
    }
}

// Fecha a conexão com o banco de dados.
$conn->close();
?>
