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
    <?php include_once('header.php'); ?> 
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
                <a href="carteira-info-1.php" class="me-3"><button class="w-100 btn btn-lg btn-primary" type="submit">Editar</button></a>
                <a href="carteira-excluir.php"><button class="w-100 btn btn-lg btn-danger" type="submit">Excluir</button></a>
              </div>
            </div>
        </div>
      </div>

      <!-- Investimento, Add operação e histórico de operações -->
      <div class="w-100 row">
        <div class="h-100 p-5 row">
          <div class="col">
            <a href="investimento.php" class="me-3"><button class="w-100 btn btn-lg btn-primary" type="submit">Adicionar investimento</button></a>
          </div>

          <div class="col">
            <a href="add-operacao.php" class="me-3"><button class="w-100 btn btn-lg btn-primary" type="submit">Adicionar operação</button></a>
          </div>

          <div class="col">
            <a href="historico-operacoes.php" class="me-3"><button class="w-100 btn btn-lg btn-primary" type="submit">Histórico de operações</button></a>
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