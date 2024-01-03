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
                    Editar Roteador
                <?php else : ?>
                    Novo Roteador
                <?php endif ?>
            </h4>
        </div>
        <div class="col-md-4 btn-group">
            <a class="btn btn-success" href="<?= $baseRoute ?>">Voltar</a>
            <button class="btn btn-success" id="submit-btn" >Salvar</button>
        </div>
    </div>

    <form>

        <?php if (isset($register)) : ?>
            <input type="hidden" name="id" value="<?= $register->id ?>">
        <?php endif ?>

        <div class="row">
            <div class="mt-3 col-md-3">
                <label for="thel" class="form-label">Fonte</label>
                <select class="form-control select2" id="font" name="font"
                value="<?= isset($register) ? $register->font : '' ?>">
                    <option selected>Selecione a Fonte</option>
                    <option value="Fonte 01">Fonte 01</option>
                    <option value="Fonte 02">Fonte 02</option>
                </select>
            </div>
            <div class="mt-3 col-md-3">
                <label for="name" class="form-label">Código</label>
                <input type="text" class="form-control" name="code" placeholder="Insira o código da onu" id="code"
                value="<?= isset($register) ? $register->code : '' ?>">
            </div>
            <div class="mt-3 col-md-3">
                <label for="model" class="form-label">Descrição</label>
                <input type="text" class="form-control" name="description" placeholder="Insira a descrição" id="description"
                value="<?= isset($register) ? $register->description : '' ?>">
            </div>
            <div class="mt-3 col-md-3">
                <label for="qty" class="form-label">Portas</label>
                <input type="text" class="form-control" name="port" placeholder="Insira a porta" id="port"
                value="<?= isset($register) ? $register->port : '' ?>">
            </div>

        </div>

        <div class="row">
            <div class="mt-3 col-md-6">
                <label for="price" class="form-label">Parâmetros</label>
                <input type="text" class="form-control" name="parameter" placeholder="Insira o parâmetro" id="parameter"
                value="<?= isset($register) ? $register->parameter : '' ?>">
            </div>
            <div class="mt-3 col-md-6">
                <label for="id_valor_custo" class="form-label">Olts</label>
                <select class="form-select" id="olt_id" name="olt_id" value="<?= isset($register) ? $register->olt_id : '' ?>">
                        <?php foreach ($olts as $olt) : ?>
                            <option value="<?= $olt['id'] ?>"><?= $olt['name'] ?></option>
                        <?php endforeach ?>
                    </select>            </div>
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