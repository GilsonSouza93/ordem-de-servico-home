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
                    Editar Contrato
                <?php else : ?>
                    Novo Contrato
                <?php endif ?>
            </h4>
        </div>
        <div class="col-md-4 btn-group">
            <a class="btn btn-success" href="<?= $baseRoute ?>">Voltar</a>
            <button class="btn btn-success" id="submit-btn" >Salvar</button>
        </div>
    </div>

    <form class="card p-4">
        <?php if (isset($register)) : ?>
            <input type="hidden" name="id" value="<?= $register->id ?>">
        <?php endif ?>


        <div class="row">

            <div class="mt-3 col-md-4">
                <label for="group" class="form-label">Grupo</label>
                <select class="form-control" id="group" name="group" aria-label="Default select example"
                value="<?= isset($register) ? $register->group : '' ?>">
                    <option selected>Selecione se é entrada ou saída</option>
                    <option value="1">Entrada</option>
                    <option value="2">Saída</option>
                </select>
            </div>
            <div class="mt-3 col-md-4">
                <label for="description" class="form-label">Descrição</label>
                <input type="text" id="description" name="description" class="form-control" placeholder=""
                value="<?= isset($register) ? $register->description : '' ?>">
            </div>
            <div class="mt-5 col-md-4 form-check">
                <label class="form-check-label" for="flexCheckDefault"></label>
                <input type="checkbox" class="form-check-input" name="avaiable" id="avaiable"  checked
                value="<?= isset($register) ? $register->avaiable : '' ?>"> Disponível:
            </div>
        </div>

    
        <div class="row">
        <div class="mt-4 col-md-6">
                <label for="checking_copy" class="form-label">Comprovante</label>
                <input type="file" class="btn btn-outline-secondary" name="checking_copy" id="checking_copy"
                value="<?= isset($register) ? $register->checking_copy : '' ?>">
            </div>
            <div class="mt-3 col-md-6">
                <label for="competence" class="form-label">Data da Competência</label>
                <input type="date" id="competence" class="form-control" name="competence" placeholder=""
                value="<?= isset($register) ? $register->competence : '' ?>">
            </div>
        </div>

        <div class="row">
            <div class="mt-3 col-md-6">
                <label for="obs" class="form-label">Observação</label>
                <input type="text" id="obs" class="form-control" name="obs" placeholder=""
                value="<?= isset($register) ? $register->obs : '' ?>">
            </div>
            <div class="mt-3 col-md-6">
                <label for="abstract_data" class="form-label">Dados Abstratos</label>
                <input type="text" id="abstract_data" class="form-control" name="abstract_data" placeholder=""
                value="<?= isset($register) ? $register->abstract_data : '' ?>">
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