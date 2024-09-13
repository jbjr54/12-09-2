<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
</head>
<body>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "viadaspatinhas";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Comando SQL para listagem dos registros
$consulta = "SELECT * FROM tb_adocao ORDER BY ID DESC";

// Guarda dados retornados em um array (matriz)
$result = $conn->query($consulta);

// Verifica se a consulta foi bem-sucedida
if ($result === false) {
    die("Erro na consulta: " . $conn->error);
}
?>
<div class="cardzao">      
        <?php
        // Caso o banco de dados retorne 1 linha ou mais, inicia uma estrutura de repetição para listar
        if ($result->num_rows > 0) {
            // Escreve os dados do Array (matriz) e a cada volta no loop do while escreve um registro na tela
            while ($row = $result->fetch_assoc()) 
            {
        ?>
                <div class="card">     
                    <img class="card-img" src="<?php echo htmlspecialchars("../../patinhasunidas/assets/img/adocao/" . $row["FOTO_ADOCAO"], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($row["NOME"], ENT_QUOTES, 'UTF-8'); ?>">
                    <div class="card-body">
                        <!-- Exibe o nome do animal com a função htmlspecialchars para segurança -->
                        <h4><b><?php echo htmlspecialchars($row["NOME"], ENT_QUOTES, 'UTF-8'); ?></b></h4>
                        <h5><b><?php echo $ano_ado; ?> anos e <?php echo $mes_ado; ?> meses </b></h5>

                        <p class="card-text"><?php echo htmlspecialchars($row["SEXO"], ENT_QUOTES, 'UTF-8'); ?></p>
                        <!-- Botão de adoção -->
                        <a href="adotar.php?id=<?php echo htmlspecialchars($row['ID'], ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-primary">Quero Adotar</a>
                    </div>
                </div>
                
                <?php
            }
?>
<div></div>
<?php
        } 
        else 
        {
            // Em caso de tabela vazia, exibe mensagem
            echo "<p>Nenhuma informação retornada do Banco de Dados.</p>";
        }
        // Fechar conexão com o Banco de Dados
        $conn->close();
        ?>
    </div>
    </div>    
</section>
</body>
</html>
<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel"><i class="fa-solid fa-gears"></i> Editar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal-body">
                <!-- O conteúdo do formulário será carregado aqui -->
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-outline-success" onclick="enviarFormulario()"><i class="fa-solid fa-check"></i> Salvar configurações</button>
            <button type="button" class="btn btn-outline-danger" onclick="deletarFormulario()"><i class="fa-solid fa-trash"></i> Deletar jogo</button>
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Fechar</button>
            </div>
        </div>
    </div>
</div>