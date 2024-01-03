<?= $this->extend('layout/index') ?>

<?= $this->section('content') ?>

<div class="card p-4">

    <h2>
        <?= $tittle ?>
    </h2>

    <div class="row card-2 py-3 my-3">
        <div class="col-md-8">
            <h4>Adicionar Veículo</h4>
        </div>
        <div class="col-md-4 btn-group">
            <a class="btn btn-success" href="<?= $baseRoute ?>">Voltar</a>
            <button class="btn btn-success" id='submit-btn' onclick="submit()">Salvar</button>
        </div>
    </div>

    <form id="form">
        <input type="hidden" name="id" id="id" value="<?= isset($register) ? $register->id : '' ?>">

        <div class="row">
            <div class="mt-3 col-md-4">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" id="model" class="form-control" name="model" <?= isset($register) ? "value='{$register->model}'" : '' ?>>
            </div>
            <div class="mt-3 col-md-4">
                <label for="placa" class="form-label">Placa</label>
                <input type="text" id="plate" class="form-control" name="plate" <?= isset($register) ? "value='{$register->plate}'" : '' ?>>
            </div>
            <div class="mt-3 col-md-4">
                <label for="uf" class="form-label">UF</label>
                <select class="form-control select2" id="uf" name="uf" <?= isset($register) ? "value='{$register->uf}'" : '' ?>>
                    <option selected>UF</option>
                    <option value="1">Acre</option>
                    <option value="2">Alagoas</option>
                    <option value="2">amapá</option>
                    <option value="2">Amazonas</option>
                    <option value="2">Bahia</option>
                    <option value="2">Ceará</option>
                    <option value="2">Espírito Santo</option>
                    <option value="2">Goiás</option>
                    <option value="2">Maranhão</option>
                    <option value="2">Mato Grosso</option>
                    <option value="2">Mato Grosso do Sul</option>
                    <option value="2">Minas</option>
                    <option value="2">Pará</option>
                    <option value="2">Paraíba</option>
                    <option value="2">Pernambuco</option>
                    <option value="2">Piauí</option>
                    <option value="2">Rio Grande do Norte</option>
                    <option value="2">Rio Grande do Sul</option>
                    <option value="2">Rondônia</option>
                    <option value="2">Roraima</option>
                    <option value="2">Santa Catarina</option>
                    <option value="2">São Paulo</option>
                    <option value="2">Sergipe</option>
                    <option value="2">Tocatins</option>
                    <option value="2">Distrito Federal</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="mt-3 col-md-4">
                <label for="local" class="form-label">Local</label>
                <input type="text" id="locate" class="form-control" name="locate" <?= isset($register) ? "value='{$register->locate}'" : '' ?>>
            </div>
            <div class="mt-3 col-md-4">
                <label for="obs" class="form-label">Observação</label>
                <input type="text" id="obs" class="form-control" name="obs" <?= isset($register) ? "value='{$register->obs}'" : '' ?>>
            </div>
            <div class="mt-5 col-md-4">
                <input type="checkbox" name="" id="available" names="available" <?= (isset($register) and $register->available == 1) ? 'checked' : '' ?>>
                <label for="disponivel" class="form-label ">Disponível para OS?</label>
            </div>
        </div>

    </form>
</div>
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
                if (data.status === 'success') {
                    showToast(data.message, 'success');
                    setTimeout(() => {
                        window.location.href = '<?= $baseRoute ?>';
                    }, 1000);
                } else {
                    showToast(data.message, 'error');
                }
            }).catch(error => {
                console.log(error);
            });
    });
</script>

<?= $this->endSection() ?>