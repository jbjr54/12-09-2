   <div class="botao2">
    <a href="#"  onclick="navigate('formadocao')" >Tem um PET para adoção?</a>
    </div>
<?php 
    // Chamada de conexão com o Banco de Dados através do arquivo externo
    include("../private/db/conexao.php");

    // Comando SQL para listagem dos registros vindos do MySQL em ordem decrescente
    $consulta = "SELECT ID, FOTO_ADOCAO, NOME, ESPECIE, RACA, SEXO, DTA_NASC, CARACT, SAUDE, TUTOR_EMAIL, TUTOR_CELL FROM viadaspatinhas.tb_adocao ORDER BY ID DESC" ;

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
                $id = htmlspecialchars(string: $row["ID"]);
                $foto_adocao = htmlspecialchars($row["FOTO_ADOCAO"]);
                $nome_adocao = htmlspecialchars($row["NOME"]);
                $especie_adocao = htmlspecialchars($row["ESPECIE"]);
                $raca_adocao = htmlspecialchars($row["RACA"]);
                $sexo_adocao = htmlspecialchars($row["SEXO"]);
                $dta_nasc_adocao = htmlspecialchars($row["DTA_NASC"]);
                $caract_adocao = htmlspecialchars($row["CARACT"]);
                $saude_adocao = htmlspecialchars($row["SAUDE"]);
                $tutor_email_adocao = htmlspecialchars($row["TUTOR_EMAIL"]);
                $tutor_cell_adocao = htmlspecialchars($row["TUTOR_CELL"]);
                $birthdate = new DateTime($row["DTA_NASC"]);
                $today = new DateTime('today');
                $interval = $today->diff($birthdate);
                    
                // Obtém anos e meses
                $ano_ado = $interval->y;
                $mes_ado = $interval->m;               
                
?>
            <!-- Fim do bloco PHP -->

                    <!-- Exibe a imagem com o caminho completo e usa a função htmlspecialchars para escapar o atributo alt -->
                <div class="card">     
                    <img class="card-img" src="<?php echo htmlspecialchars("../../patinhasunidas/assets/img/adocao/" . $row["FOTO_ADOCAO"], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($row["NOME"], ENT_QUOTES, 'UTF-8'); ?>">
                    <div class="card-body">
                        <!-- Exibe o nome do animal com a função htmlspecialchars para segurança -->
                        <h4 class="card-title"><b><?php echo htmlspecialchars($row["NOME"], ENT_QUOTES, 'UTF-8'); ?></b></h4>
                        <h5><b><?php echo $ano_ado; ?> anos e <?php echo $mes_ado; ?> meses </b></h5>

                        <p class="card-text"><?php echo htmlspecialchars($row["SEXO"], ENT_QUOTES, 'UTF-8'); ?></p>
                        <!-- Botão de adoção -->
                        <a href="adotar.php?id=<?php echo htmlspecialchars($row['ID'], ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-primary">Quero Adotar</a>
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
<!-- Fim do bloco PHP -->

