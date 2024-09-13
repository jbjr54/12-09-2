
function LoadPagePublic(page) {
    const content = document.getElementById('content');
    fetch(`public/${page}`)
        .then(response => response.text())
        .then(data => {
            content.innerHTML = data;
        })
        .catch(error => {
            content.innerHTML = '<p>Erro ao carregar a página.</p>';
        });
}


function LoadPagePrivate(page) {
    const content = document.getElementById('content');
    fetch(`private/${page}`)
        .then(response => response.text())
        .then(data => {
            content.innerHTML = data;
        })
        .catch(error => {
            content.innerHTML = '<p>Erro ao carregar a página.</p>';
        });
}

  function navigate(page) 
  {
    const content = document.getElementById('content');
    if (page === 'formadocao') 
    {
            content.innerHTML = `
            <br>
            <br> 
            <div class="form-container"> 
                <form id="formadocao" action="/patinhasunidas/private/create_adocao.php" method="post" >
                <!-- Informações do Animal -->
                <fieldset>
                    <legend><b>Cadastro do Animal</b></legend>
                    <hr>

                    <div class="upload-container">
                        <label for="foto_adocao" class="botao">
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
         <br>
         <br>
         <br>       
            `;
            document.getElementById('formadocao').addEventListener('submit', function(event) 
            {
                event.preventDefault();
                const formData = new FormData(this);
                fetch('/patinhasunidas/private/create_adocao.php', 
                {
                    method: 'POST',
                    body: formData
                }).then(response => response.text()).then(data => 
                {
                    alert(data);
                });
                document.getElementById("foto").value=""
                document.getElementById("nome").value=""
                document.getElementById("especie").value=""
                document.getElementById("raca").value=""
                document.getElementById("sexo").value=""
                document.getElementById("saude").value=""
                document.getElementById("caract").value=""
                document.getElementById("tutor_email").value=""
                document.getElementById("tutor_cell").value=""
            });
    }
  
    if (page === 'formencontre') 
      {
          content.innerHTML = `
          <br>
          <br> 
          <div class="form-container"> 
                <form id="formencontre" action="/patinhasunidas/private/create_encontre.php" method="post" >
                <!-- Informações do Animal -->
                <fieldset>
                    <legend><b>Cadastro do Animal</b></legend>
                    <hr>   

                    <div class="upload-container">
                        <label for="foto_adocao" class="botao">
                        <span>Escolha uma foto do animal</span>
                        </label>
                        <input type="file" class="input_foto" id="foto_encont" name="foto_encont" accept="image/*" required>
                    </div>
                    
                    <label for="nome_encont">Nome do Animal:</label>
                    <input type="text" id="nome_encont" name="nome_encont" required>
                    
                    <label for="especie_encont">Espécie:</label>
                    <input type="text" id="especie_encont" name="especie_encont" required>
                    
                    <label for="raca_encont">Raça:</label>
                    <input type="text" id="raca_encont" name="raca_encont" required>
                    
                    <label for="sexo_encont">Sexo:</label>
                    <select id="sexo_encont" name="sexo_encont" required>
                        <option value="">Selecione</option>
                        <option value="Macho">Macho</option>
                        <option value="Fêmea">Fêmea</option>
                    </select>
                    
                    <label for="dta_nasc_encont">Data de Nascimento:</label>
                    <input type="date" id="dta_nasc_encont" name="dta_nasc_encont" required>

                    <label for="saude_encont">Situação de Saúde:</label>
                    <textarea id="saude_encont" name="saude_encont" required></textarea>   

                    <label for="caract_encont">Características Físicas:</label>
                    <textarea id="caract_encont" name="caract_encont" required></textarea>

                    <label for="desap_encont">Sobre o desaparecimento:</label>
                    <textarea id="desap_encont" name="desap_encont" required></textarea>
                    <br>
                </fieldset>
                
                <!-- Informações do Tutor -->
                <fieldset>
                    <legend><b>Contato do Tutor</b></legend>
                    <hr>
                    <label for="email_encont">Email:</label>
                    <input type="email" id="email_encont" name="tutor_email_encont" required>
                    
                    <label for="celular_encont">Número de Celular:</label>
                    <input type="tel" id="celular_encont" name="tutor_cell_encont" required>
                </fieldset>
                <br>
                <button type="submit" class="botao">Cadastrar</button>
            </form>
         </div>
         <br>
         <br>
         <br>       
          `;
          document.getElementById('formencontre').addEventListener('submit', function(event) 
          {
              event.preventDefault();
              const formData = new FormData(this);
              fetch('/patinhasunidas/private/create_encontre.php', {
                  method: 'POST',
                  body: formData
              }).then(response => response.text()).then(data => 
              {
                  alert(data);
              });
              document.getElementById("foto").value=""
              document.getElementById("nome").value=""
              document.getElementById("especie").value=""
              document.getElementById("raca").value=""
              document.getElementById("sexo").value=""
              document.getElementById("saude").value=""
              document.getElementById("caract").value=""
              document.getElementById("desap").value=""
              document.getElementById("tutor_email").value=""
              document.getElementById("tutor_cell").value=""
          });
      }
    
      if (page === 'faleconosco') 
        {
            content.innerHTML = `
                <br>
                <br>
                <br>
            <div id="faleconosco" class="form-container">
                <div class="form-container-cabeca">     
                    <h2>Fale Conosco</h2>
                </div>
                <hr>
                <fieldset>
                <form id="form_fconosco" name="form_fconosco" method="post" action="mailto:jbarbosajr16@gmail.com">
                <br>
                  <label>Nome:<br>  <input name="nome" type="text" placeholder="Nome" required></label>
                  <label>Assunto:<br>  <input name="assunto" type="text" placeholder="Assunto" required></label>
                  <label>Mensagem:<br> <textarea name="mensagem" placeholder="Mensagem" cols="24" rows="5" required></textarea></label>
                    <div class="botoes">
                        <table>
                        <tr>
                        <td><button class="botao" type="submit">Enviar</button><td>
                        <td><button class="botao" type="reset">Limpar</button><td>
                        <tr>
                        </table>
                    </div>
                </form>
                </fieldset>
            </div>
            `;
            document.getElementById('faleconosco').addEventListener('submit', function(event) 
            {
                event.preventDefault();
                const formData = new FormData(this);
                fetch('', {
                    method: 'POST',
                    body: formData
                }).then(response => response.text()).then(data => 
                {
                    alert(data);
                });
                document.getElementById("nome").value=""
                document.getElementById("assunto").value=""
                document.getElementById("mensage,").value=""
            });
        }
        if (page === 'index') 
            {
                content.innerHTML = `    <!-- Carousel -->
                    <div id="demo" class="carousel slide" data-bs-ride="carousel">

                        <!-- Indicators/dots -->
                        <div class="carousel-indicators">
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                        </div>
                    
                        <!-- The slideshow/carousel -->
                        <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../projeto/carrossel1.png" alt="AAAAAA" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="../projeto/carrossel2.avif" alt="BBBBBB" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="../projeto/carrossel3.jpg" alt="CCCCC" class="d-block w-100">
                        </div>
                        </div>
                    
                        <!-- Left and right controls/icons -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>`
                }
}

function pegarId(id) {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `./cadastrar_jogos/alterar.php?id=${encodeURIComponent(id)}`, true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            document.getElementById('modal-body').innerHTML = xhr.responseText;
            const myModal = new bootstrap.Modal(document.getElementById('formModal'));
            myModal.show();
        } else {
            console.error('Falha ao carregar o formulário.');
        }
    };
    xhr.send();
}
function enviarFormulario() {
    const formData = new FormData(document.querySelector('#modal-body form'));

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../private/cadastrar_jogos/update.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            try {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    alert('Produto atualizado com sucesso!');
                    const myModal = bootstrap.Modal.getInstance(document.getElementById('formModal'));
                    myModal.hide(); // Fecha o modal
                    location.reload(); // Atualiza a página
                } else {
                    alert('Erro ao atualizar o produto: ' + response.error);
                }
            } catch (e) {
                alert('Erro ao processar a resposta: ' + e.message);
            }
        } else {
            alert('Falha ao atualizar o produto. Status: ' + xhr.status);
        }
    };
    xhr.onerror = function () {
        alert('Erro na solicitação.');
    };
    xhr.send(formData);
}

function deletarFormulario() {
    const form = document.querySelector('#modal-body form');
    const formData = new FormData(form);
    
    // Verifica se o ID está presente no FormData
    if (!formData.has('id')) {
    alert('ID do produto não encontrado.');
    return;
    }
    
    const xhr = new XMLHttpRequest();
    xhr.open('POST', './cadastrar_jogos/deletar.php', true);
    xhr.onload = function () {
    if (xhr.status === 200) {
        try {
            const response = JSON.parse(xhr.responseText);
            if (response.success) {
                alert('Produto deletado com sucesso!');
                const myModal = bootstrap.Modal.getInstance(document.getElementById('formModal'));
                myModal.hide(); // Fecha o modal
                location.reload(); // Atualiza a página
            } else {
                alert('Erro ao deletar o produto: ' + response.error);
            }
        } catch (e) {
            alert('Erro ao processar a resposta: ' + e.message);
        }
    } else {
        alert('Falha ao deletar o produto. Status: ' + xhr.status);
    }
    };
    xhr.onerror = function () {
    alert('Erro na solicitação.');
    };
    xhr.send(formData);
}

