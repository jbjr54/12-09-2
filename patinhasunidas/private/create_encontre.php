<?php
// Inclui o arquivo externo de conexão com o banco de dados.
include("./db/conexao.php");

// Recebe os dados do formulário usando o método POST e armazena nas variáveis.
$foto_encont = $_FILES["foto_encont"];
$nome_encont = $_POST["nome_encont"];
$especie_encont = $_POST["especie_encont"];
$raca_encont = $_POST["raca_encont"];
$sexo_encont = $_POST["sexo_encont"];
$dta_nasc_encont = $_POST["dta_nasc_encont"]; // Data de nascimento
$caract_encont = $_POST["caract_encont"];
$saude_encont = $_POST["saude_encont"];
$desap = $_POST["desap_encont"];
$tutor_email_encont = $_POST["tutor_email_encont"];
$tutor_cell_encont = $_POST["tutor_cell_encont"];

$target_dir = "../assets/img/adocao/";
$target_file = $target_dir . basename($foto_encont["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Verifica se o arquivo é uma imagem.
if(isset($_POST["submit"])) {
    $check = getimagesize($foto_encont["tmp_name"]);
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
if ($foto_encont["size"] > 500000) { // 500 KB
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
    if (move_uploaded_file($foto_encont["tmp_name"], $target_file)) {
        echo "A foto " . htmlspecialchars(basename($foto_encont["name"])) . " foi enviada com sucesso.";
        $foto_adocao_nome = $foto_encont["name"];
        
        // Prepara a consulta para inserir os dados no banco.
        $stmt = $conn->prepare("INSERT INTO viadaspatinhas.tb_encontre (FOTO_ENCONT, NOME, ESPECIE, RACA, SEXO, DTA_NASC, CARACT, SAUDE, DESAP, TUTOR_EMAIL, TUTOR_CELL) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("ssssssssss", $foto_adocao_nome, $nome_adocao, $especie_adocao, $raca_adocao, $sexo_adocao, $dta_nasc_adocao, $caract_adocao, $saude_adocao, $desap, $tutor_email_adocao, $tutor_cell_adocao);

            if ($stmt->execute()) {
                // Calcula a idade com base na data de nascimento
                $birthdate = new DateTime($dta_nasc_encont);
                $today = new DateTime('today');
                $interval = $today->diff($birthdate);
    
                // Obtém anos e meses
                $ano_encont = $interval->y;
                $mes_encont = $interval->m;

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
