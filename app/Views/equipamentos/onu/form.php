<?= $this->extend('layout/index') ?>

<?= $this->section('content') ?>

<div class="card p-4">

  <h2>
    <?= $tittle ?>
  </h2>

  <div class="row card-2 py-3 my-3">
    <div class="col-md-8">
      <h4>
        <?php if (isset($register)) : ?>
          Editar Onu
        <?php else : ?>
          Nova Onu
        <?php endif ?>
      </h4>
    </div>
    <div class="col-md-4 btn-group">
      <a class="btn btn-success" href="<?= $baseRoute ?>">Voltar</a>
      <button class="btn btn-success" id="submit-btn">Salvar</button>
    </div>
  </div>

  <form>

    <?php if (isset($register)) : ?>
      <input type="hidden" name="id" value="<?= $register->id ?>">
    <?php endif ?>

    <div class="row">
      <div class="mt-3 col-md-3">
        <label for="name" class="form-label">Código</label>
        <input type="text" class="form-control" name="code" id="code" placeholder="Insira o código da onu" value="<?= isset($register) ? $register->code : '' ?>">
      </div>
      <div class="mt-3 col-md-4">
        <label for="model" class="form-label">Nome</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Insira o nome" value="<?= isset($register) ? $register->name : '' ?>">
      </div>
      <div class="mt-3 col-md-4">
        <label for="qty" class="form-label">Porta</label>
        <input type="text" class="form-control" name="port" id="port" placeholder="Insira a porta" value="<?= isset($register) ? $register->port : '' ?>">
      </div>

    </div>

    <div class="row">
      <div class="mt-3 col-md-6">
        <label for="price" class="form-label">Parâmetros</label>
        <input type="text" class="form-control" name="parameters" id="parameters" placeholder="Insira o parâmetro" value="<?= isset($register) ? $register->parameters : '' ?>">
      </div>
      <div class="mt-3 col-md-6">
        <label for="olt" class="form-label">OLT</label>
        <select class="form-control" id="olt" aria-label="olt" value="<?= isset($register) ? $register->olt : '' ?>">
          <?php foreach ($olts as $olt) : ?>
            <option value="<?= $olt['id'] ?>"><?= $olt['name'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>


  </form>


  <?= $this->endSection() ?>

  <?= $this->section('script') ?>

  <script>
    const submitBtn = document.querySelector('#submit-btn');
    const form = document.querySelector('form');
    const url = '<?= $baseRoute ?>/save';

    submitBtn.addEventListener('click', event => {
      event.preventDefault();
      showLoading();

      const formData = new FormData(form);

      fetch(url, {
          method: 'POST',
          body: formData
        }).then(response => response.json())
        .then(data => {
          hideLoading();
          if (data.error) {
            showToast(data.message, 'error');
          } else {
            showToast(data.message, 'success');
            window.location.href = '<?= $baseRoute ?>';
          }
        }).catch(error => {
          console.log(error);
        });
    });
  </script>

  <?= $this->endSection() ?>