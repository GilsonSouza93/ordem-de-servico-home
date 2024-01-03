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
                    Editar Ip v6 Pool
                <?php else : ?>
                    Novo Ip v6 Pool
                <?php endif ?>
            </h4>        </div>
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
            <div class="mt-3 col-md-4">
                <label for="name" class="form-label">Nome do Pool</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="" value="<?= isset($register) ? $register->name : '' ?>">
            </div>
            <div class="mt-3 col-md-4">
                <label for="name" class="form-label">Range</label>
                <input type="text" class="form-control" name="range" id="range" placeholder="" value="<?= isset($register) ? $register->range : '' ?>">
            </div>
            <div class="mt-3 col-md-4">
                <label for="name" class="form-label">Next Range</label>
                <input type="text" class="form-control" name="next_range" id="next_range" placeholder="" value="<?= isset($register) ? $register->next_range : '' ?>">
            </div>
        </div>
        <div class="row">
            <div class="mt-5 col-md-4">
                <label for="name" class="form-label">Radius Args</label>
                <input type="text" class="form-control" name="radius" id="radius" placeholder="" value="<?= isset($register) ? $register->radius : '' ?>">
            </div>
            <div class="mt-5 col-md-4 form-check">
                <label class="form-check-label" for="flexCheckDefault"></label>
                <input type="checkbox" class="form-check-input" name="order" id="order" <?= (isset($register) and $register->order == 1) ? 'checked' : '' ?>>Ordenar IPs por Rede /24:
            </div>

            <div class="mt-5 col-md-4 form-check">
                <label class="form-check-label" for="flexCheckDefault"></label>
                <input type="checkbox" class="form-check-input" name="active" id="active" <?= (isset($register) and $register->active == 1) ? 'checked' : '' ?>>Ativo?
            </div>
        </div>
        <div class="row">
            <div class="mt-3 col-md-12">
                <label for="name" class="form-label">Observação</label>
                <input type="text" class="form-control" name="obs" id="obs" placeholder="" value="<?= isset($register) ? $register->obs : '' ?>">
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