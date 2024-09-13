<?php
    // Recebe o id para ser atualizado
    if (!isset($_GET['id'])) {
        die("ID não fornecido.");
    }
    $id = $_GET['id'];

    // Chamada de conexão com o Banco de Dados
    include("./db/conexao.php");

    // Verifica se a conexão foi bem-sucedida
    if (!$conn) {
        die("Falha na conexão com o banco de dados.");
    }

    // Comando SQL para selecionar o produto com base no ID
    $consulta = "SELECT * FROM viadaspatinhas.tb_adocao WHERE id=?";
    $stmt = $conn->prepare($consulta);
    if (!$stmt) {
        die("Falha ao preparar a consulta: " . $conn->error);
    }
    
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Produto</title>
    <script>
        function atualizarProduto(event) {
            event.preventDefault(); // Evita o envio padrão do formulário

            const formData = new FormData(document.getElementById('ProdForm'));

            const xhr = new XMLHttpRequest();
            xhr.open('POST', './update_adocao.php', true);
            xhr.onload = function () {
                console.log(xhr.responseText); // Adicione esta linha para ver a resposta
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        alert('Produto atualizado com sucesso!');
                        // window.location.reload(); // Recarregamento da página, se necessário
                    } else {
                        alert('Erro ao atualizar o produto: ' + response.error);
                    }
                } else {
                    alert('Falha ao atualizar o produto.');
                }
            };
            xhr.send(formData);
        }
    </script>
</head>
<body>
    <div class="form-container"> 
            <form id="formadocao" action="/patinhasunidas/private/create_adocao.php" method="post" >
                <!-- Informações do Animal -->
                <fieldset>
                    <legend><b>Cadastro do Animal</b></legend>
                    <hr>

                    <div class="upload-container">
                        <label for="foto_adocao" class="upload-label">
                        <span>Escolha uma foto do animal</span>
                        </label>
                        <input type="file" class="input_foto" id="foto_adocao" name="foto_adocao" accept="image/*" required>
                    </div>
                    
                    <label for="nome_adocao">Nome do Animal:</label>
                    <input type="text" id="nome_adocao" name="nome_adocao" required>
                    
                    <label for="especie_adocao">Espécie:</label>
                    <input type="text" id="especie_adocao" name="especie_adocao" required>
                    
                    <label for="raca_adocao">Raça:</label>
                    <input type="text" id="raca_adocao" name="raca_adocao" required>
                    
                    <label for="sexo_adocao">Sexo:</label>
                    <select id="sexo_adocao" name="sexo_adocao" required>
                        <option value="">Selecione</option>
                        <option value="Macho">Macho</option>
                        <option value="Fêmea">Fêmea</option>
                    </select>
                    
                    <label for="dta_nasc_adocao">Data de Nascimento:</label>
                    <input type="date" id="dta_nasc_adocao" name="dta_nasc_adocao" required>

                    <label for="saude_adocao">Situação de Saúde:</label>
                    <textarea id="saude_adocao" name="saude_adocao" required></textarea>   

                    <label for="caract_adocao">Características Físicas:</label>
                    <textarea id="caract_adocao" name="caract_adocao" required></textarea>
                    <br>
                </fieldset>
                
                <!-- Informações do Tutor -->
                <fieldset>
                    <legend><b>Contato do Tutor</b></legend>
                    <hr>
                    <label for="email_adocao">Email:</label>
                    <input type="email" id="email_adocao" name="tutor_email_adocao" required>
                    
                    <label for="celular_adocao">Número de Celular:</label>
                    <input type="tel" id="celular_adocao" name="tutor_cell_adocao" required>
                </fieldset>
                <br>
                <button type="submit" class="botao">Cadastrar</button>
            </form>
    </div>
</body>
</html>
<?php
    } else {
        echo "Nenhuma informação retornada do Banco de Dados.";
    }
    $stmt->close();
    $conn->close();
?>