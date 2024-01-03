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
                    Editar SMS
                <?php else : ?>
                    Novo SMS
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
            <div class="mt-3 col-md-4">
                <label for="description" class="form-label">Descrição</label>
                <input type="text" class="form-control" name="description" id="description" placeholder=""
                value="<?= isset($register) ? $register->description : '' ?>">
            </div>
            <div class="mt-3 col-md-4">
                <label for="gateway" class="form-label">Gateway SMS</label>
                <select class="form-control" name="gateway" id="gateway"
                value="<?= isset($register) ? $register->gateway : '' ?>">
                    <option value="">Whatsapp</option>
                </select>
            </div>
            <div class="mt-3 col-md-4">
            <span class="badge text-bg-light show-text" data-text="Ex: 2 dias antes do vencimento, inserir -2. 5 dias após vencimento inserir 5. No dia do vencimento inserir 0. Se quiser com 2,3,4 dias informar 2,3,4.">?</span>
                <label for="name" class="form-label" >Dias</label>
                <input type="text" class="form-control" name="days" id="days" placeholder=""
                value="<?= isset($register) ? $register->days : '' ?>">
            </div>
        </div>
        <div class="row">
            <div class="mt-3 col-md-12">
                <label for="name" class="form-label">Mensagem</label>
                <textarea name="mensage" id="mensage" class="form-control" cols="30" rows="10"><?= isset($register) ? $register->mensage : '' ?></textarea>
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