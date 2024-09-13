<?php 
    // Chamada de conexão com o Banco de Dados através do arquivo externo
    include("../private/db/conexao.php");

    // Comando SQL para listagem dos registros vindos do MySQL em ordem decrescente
    $consulta = "SELECT ID, FOTO_ENCONT, NOME, ESPECIE, RACA, SEXO, DTA_NASC, CARACT, SAUDE, DESAP, TUTOR_EMAIL, TUTOR_CELL FROM viadaspatinhas.tb_encontre ORDER BY ID DESC" ;

    // Guarda dados retornados em um array (matriz)
    $result = $conn->query($consulta);

    // Verifica se a consulta foi bem-sucedida
    if ($result === false) {
        die("Erro na consulta: " . $conn->error);
    }

    // Caso o banco de dados retorne 1 linha ou mais, inicia uma estrutura de repetição para listar
    if ($result->num_rows > 0) 
    {
        // Escreve os dados do Array (matriz) e a cada volta no loop do while escreve um registro na tela
?>
<div class="cardzao">
<?php
        while ($row = $result->fetch_assoc()) 
        {
                $id = htmlspecialchars($row["ID"]);
                $foto_encont = htmlspecialchars($row["FOTO_ENCONT"]);
                $nome_encont = htmlspecialchars($row["NOME"]);
                $especie_encont = htmlspecialchars($row["ESPECIE"]);
                $raca_encont = htmlspecialchars($row["RACA"]);
                $sexo_encont = htmlspecialchars($row["SEXO"]);
                $dta_nasc_encont = htmlspecialchars($row["DTA_NASC"]);
                $caract_encont = htmlspecialchars($row["CARACT"]);
                $saude_encont = htmlspecialchars($row["SAUDE"]);
                $desap = htmlspecialchars($row["DESAP"]);
                $tutor_email_encont = htmlspecialchars($row["TUTOR_EMAIL"]);
                $tutor_cell_encont = htmlspecialchars($row["TUTOR_CELL"]);
                $birthdate = new DateTime($row["DTA_NASC"]);
$today = new DateTime('today');
$interval = $today->diff($birthdate);
    
// Obtém anos e meses
$ano_encont = $interval->y;
$mes_encont = $interval->m;
                
?>

            <!-- Fim do bloco PHP -->
                <div class="card">
                    <!-- Exibe a imagem com o caminho completo e usa a função htmlspecialchars para escapar o atributo alt -->
                    <img class="card-img" src="<?php echo htmlspecialchars("../../patinhasunidas/assets/img/encontre/" . $row["FOTO_ENCONT"], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($row["NOME"], ENT_QUOTES, 'UTF-8'); ?>">
                    <div class="card-body">
                        <!-- Exibe o nome do animal com a função htmlspecialchars para segurança -->
                        <h4><b><?php echo htmlspecialchars($row["NOME"], ENT_QUOTES, 'UTF-8'); ?></b></h4>
                        <h5><b><?php echo $ano_encont; ?> anos e <?php echo $mes_encont; ?> meses </b></h5>

                        <p class="card-text"><?php echo htmlspecialchars($row["SEXO"], ENT_QUOTES, 'UTF-8'); ?></p>
                        <!-- Botão de adoção -->
                        <a href="adotar.php?id=<?php echo htmlspecialchars($row['ID'], ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-primary">Tenho informações</a>
                    </div>
                </div>
<?php 
        }
?>
</div>
<?php
    }
    else 
    {
        // Em caso de tabela vazia, exibe mensagem
        echo "Nenhuma informação retornada do Banco de Dados.";
    }
    
    // Fechar conexão com o Banco de Dados
    $conn->close();

?>
