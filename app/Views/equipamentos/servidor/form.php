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
                    Editar Servidor
                <?php else : ?>
                    Novo Servidor
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
                <label for="name" class="form-label">Descrição</label>
                <input type="text" class="form-control" name="description" placeholder="" id="description" value="<?= isset($register) ? $register->description : '' ?>">
            </div>
            <div class="mt-3 col-md-3">
                <label for="name" class="form-label">Altura</label>
                <input type="text" class="form-control" name="heigth" id="heigth" placeholder="" value="<?= isset($register) ? $register->heigth : '' ?>">
            </div>
            <div class="mt-3 col-md-3">
                <label for="price" class="form-label"></label>
                <input type="checkbox" name="sustainable" id="sustainable" class="form-check-input" <?= (isset($register) and $register->sustainable == 1) ? 'checked' : '' ?>>Sustentável
            </div>
            <div class="mt-3 col-md-3">
                <label for="thel" class="form-label">POP</label>
                <select class="form-select" id="pop_id" name="pop_id" value="<?= isset($register) ? $register->pop_id : '' ?>">
                        <?php foreach ($pops as $pop) : ?>
                            <option value="<?= $pop['id'] ?>"><?= $pop['city'] ?></option>
                        <?php endforeach ?>
                    </select>
            </div>
        </div>
        <div class="row">
            <div class="mt-3 col-md-4">
                <label for="name" class="form-label">Endereço</label>
                <input type="text" class="form-control" name="address" id="address" placeholder=""value="<?= isset($register) ? $register->address : '' ?>">
            </div>
            <div class="mt-3 col-md-4">
                <label for="name" class="form-label">Latitude/Longitude</label>
                <input type="text" class="form-control" name="lat" id="lat" placeholder=""value="<?= isset($register) ? $register->lat : '' ?>">
            </div>
            <div class="mt-3 col-md-4">
                <label for="price" class="form-label"></label>
                <input type="checkbox" name="active" id="active" <?= (isset($register) and $register->active == 1) ? 'checked' : '' ?>>Ativo
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