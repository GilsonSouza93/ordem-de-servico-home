<?= $this->extend('layout/index') ?>

<?= $this->section('content') ?>

<div class="card p-4">
  <div class="row py-3 my-3 justify-content-center">
    <div class="col-md-4">
      <input type="text" name="search" id="search" class="form-control" placeholder="Buscar" style="background-color: transparent;">
    </div>

    <!-- <div class="col-md-4 btn-group">
      <button class="btn btn-success">Exportar Arquivo CSV</button>
      <button class="btn btn-success">Importar</button>
    </div> -->

    <div class="col-md-4 btn-group">
      <button class="btn btn-success">Pesquisar</button>
      <!-- <button class="btn btn-success" onclick="openModalIpPool()">Filtros</button> -->
      <a class="btn btn-success" href="<?= $baseRoute ?>/novo"><?= $addButtonText ?></a>
    </div>
  </div>


  <div class="row d-flex mt-1 justify-content-center">
    <div class="col-md-3 mx-3">
      <label for="payments" class="mt-2">Receita</label>
      <canvas id="payments" height="300"></canvas>
    </div>
    <div class="col-md-3  mx-3">
      <label for="payments" class="mt-2">Clientes</label>
      <canvas id="customers"></canvas>
    </div>
    <div class="col-md-3  mx-3">
      <label for="payments" class="mt-2">Clientes por Plano</label>
      <canvas id="popChart"></canvas>
    </div>
  </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script>
  const ctx = document.getElementById('payments');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
      datasets: [{
          label: 'Entrada',
          data: [12, 19, 3, 5, 2, 3, 8],
          borderWidth: 1
        },
        {
          label: 'Saída',
          data: [6, 7, 2, 2, 1, 2, 4, 3],
          borderWidth: 1
        },
      ]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
  const customers = document.getElementById('customers');

  new Chart(customers, {
    type: 'pie',
    data: {
      labels: ['Ativo', 'Suspenso', 'Reduzido', 'Cancelado'],
      datasets: [{
        label: 'Quantidade de clientes',
        data: [120, 17, 29, 7],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }

      }
    }
  });

  var popsChart = document.getElementById('popChart').getContext('2d');
  var myChart = new Chart(popsChart, {
    type: 'doughnut',
    data: {
      labels: ['50Mb', '100Mb', '200Mb', '300Mb'],
      datasets: [{
        label: 'Clientes por Plano',
        data: [100, 50, 34, 20],
        //  
      }]
    }
  });
</script>

<?= $this->endSection() ?>