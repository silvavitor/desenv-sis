<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Carteira - ADS Carteiras</title>

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">    
    <!-- Custom styles for this template -->
    <!-- <link href="home.css" rel="stylesheet"> -->
  </head>
  <body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
      
      <div class="container-fluid">
        <a class="navbar-brand" href="home.html">
          <img class="mb-4" src="assets/ifrs.png" alt="" width="45" height="50">ADS Carteiras
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-flex">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown btn btn-md btn-success">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Perfil
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="user-edit.html">Alterar perfil</a></li>
                  <li><a class="dropdown-item" href="alterar-senha.html">Alterar senha</a></li>
                </ul>
            </ul>
          </div>
        </div>
      </div>
    </nav> 
    <main class="mx-5">
      <!-- Nome carteira, editar e excluir -->
      <div class="w-100">
        <div class="row mb-3">
          <div class="col-md-12">
            <div class="h-100 p-5 text-white bg-success bg-gradient rounded-3 row">
              <div class="col-10">
                <h2>Nome da carteira</h2>
              </div>
              <div class="col-2 d-flex">
                <a href="carteira-info-1.html" class="me-3"><button class="w-100 btn btn-lg btn-primary" type="submit">Editar</button></a>
                <a href="carteira-excluir.html"><button class="w-100 btn btn-lg btn-danger" type="submit">Excluir</button></a>
              </div>
            </div>
        </div>
      </div>

      <!-- Investimento, Add operação e histórico de operações -->
      <div class="w-100 row">
        <div class="h-100 p-5 row">
          <div class="col">
            <a href="investimento.html" class="me-3"><button class="w-100 btn btn-lg btn-primary" type="submit">Adicionar investimento</button></a>
          </div>

          <div class="col">
            <a href="add-operacao.html" class="me-3"><button class="w-100 btn btn-lg btn-primary" type="submit">Adicionar operação</button></a>
          </div>

          <div class="col">
            <a href="historico-operacoes.html" class="me-3"><button class="w-100 btn btn-lg btn-primary" type="submit">Histórico de operações</button></a>
          </div>
        </div>
      </div>

      <!-- Filtro -->
      <h4 class="mb-3 fw-normal">Filtro:</h4>
      <div class="w-100 row mb-5 mt-3">
        <div class="form-floating col">        
          <select id="lado" class="form-select pt-2" aria-label="Default select example">
            <option selected value="1">Segmento 1</option>
            <option value="2">Segmento 2</option>
            <option value="3">Segmento 3</option>
          </select>
        </div>
        <div class="form-floating col-2">        
          <button class="w-100 h-100 btn btn-lg btn-success" type="submit">Filtrar</button>
        </div>
      </div>

      <!-- Tabela -->
      <div class="fw-bold w-100">       
        <div class="row mb-3 bg-success bg-gradient p-3 rounded text-white">
          <div class="col"><span>Ativo</span></div>
          <div class="col"><span>Setor</span></div>
          <div class="col"><span>Quantidade</span></div>
          <div class="col"><span>Cotação atual</span></div>
          <div class="col"><span>Patrimônio atualizado</span></div>
          <div class="col"><span>Participação (%)</span></div>
          <div class="col"><span>Objetivo (%)</span></div>
          <div class="col"><span>Distância do objetivo</span></div>
        </div>
        <div class="row mb-3 bg-secondary bg-gradient p-3 rounded text-white">
          <div class="col"><span>PETR4</span></div>
          <div class="col"><span>Petróleo</span></div>
          <div class="col"><span>1200</span></div>
          <div class="col"><span>R$ 20.20</span></div>
          <div class="col"><span>R$ 20.000</span></div>
          <div class="col"><span>15%</span></div>
          <div class="col"><span>25%</span></div>
          <div class="col"><span>10%</span></div>
        </div>
        <div class="row mb-3 bg-secondary bg-gradient p-3 rounded text-white">
          <div class="col"><span>PETR4</span></div>
          <div class="col"><span>Petróleo</span></div>
          <div class="col"><span>1200</span></div>
          <div class="col"><span>R$ 20.20</span></div>
          <div class="col"><span>R$ 20.000</span></div>
          <div class="col"><span>15%</span></div>
          <div class="col"><span>25%</span></div>
          <div class="col"><span>10%</span></div>
        </div>
        <div class="row mb-3 bg-secondary bg-gradient p-3 rounded text-white">
          <div class="col"><span>PETR4</span></div>
          <div class="col"><span>Petróleo</span></div>
          <div class="col"><span>1200</span></div>
          <div class="col"><span>R$ 20.20</span></div>
          <div class="col"><span>R$ 20.000</span></div>
          <div class="col"><span>15%</span></div>
          <div class="col"><span>25%</span></div>
          <div class="col"><span>10%</span></div>
        </div>
        <div class="row mb-3 bg-secondary bg-gradient p-3 rounded text-white">
          <div class="col"><span>PETR4</span></div>
          <div class="col"><span>Petróleo</span></div>
          <div class="col"><span>1200</span></div>
          <div class="col"><span>R$ 20.20</span></div>
          <div class="col"><span>R$ 20.000</span></div>
          <div class="col"><span>15%</span></div>
          <div class="col"><span>25%</span></div>
          <div class="col"><span>10%</span></div>
        </div>
        
     </div>
    </main>

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>