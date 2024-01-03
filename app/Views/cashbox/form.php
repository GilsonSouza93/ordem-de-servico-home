<?= $this->extend('layout/index') ?>

<?= $this->section('content') ?>

<div class="card p-4">

    <h2>
        <?= $tittle ?>
    </h2>

    <div class="row card-2 py-3 my-3">
        <div class="col-md-8">

            <h4>
                <h4>
                    <?php if (isset($register)) : ?>
                        Editar Lançamento
                    <?php else : ?>
                        Novo Lançamento
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
            <input type="hidden" name="id" id="id" value="<?= $register->id ?>">
        <?php endif ?>

        <div class="row">
            <div class=" mt-3 col-md-4">
                <label for="tipo" class="form-label">Tipo</label>
                <select class="form-control select2" id="type" name="type">
                    <option value="1">Entrada</option>
                    <option value="2">Saída</option>
                </select>
            </div>
            <div class="mt-3 col-md-4">
                <label for="pop_id" class="form-label">POP</label>
                <select class="form-control select2" id="pop_id" name="pop_id">
                    <?php foreach ($pops as $pop) : ?>
                        <option value="<?= $pop['id'] ?>"><?= $pop['city'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mt-3 col-md-4">
                <label for="payment_point" class="form-label">Ponto de Pagamento</label>
                <select class="form-control select2" id="payment_point" name="payment_point">
                    <option selected>Selecione o Ponto de Pagamento</option>
                    <option value="1">Principal</option>
                    <option value="2">Caixa Reserva</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="mt-3 col">
                <label for="payment_plans" class="form-label">Plano de Contas</label>
                <select class="form-control select2" name="payment_plans" id="payment_plans">
                    <option selected>Selecione o Ponto de Contas</option>
                    <option value="1">Principal</option>
                    <option value="2">Caixa Reserva</option>
                </select>
            </div>
            <div class="mt-3 col">
                <label for="payment_form" class="form-label">Forma de Pagamento</label>
                <select class="form-control select2" name="payment_form" id="payment_form">
                    <option selected>Selecione o Ponto de Contas</option>
                    <option value="1">Pix</option>
                    <option value="2">Caixa Reserva</option>
                    <option value="1">Dinheiro</option>
                    <option value="1">Débito</option>
                    <option value="1">Crédito</option>
                    <option value="1">Cheque</option>
                </select>
            </div>
            <div class="mt-3 col">
                <label for="value" class="form-label">Valor</label>
                <input type="text" id="value" class="form-control" name="value">
            </div>
        </div>

        <div class="row">
            <div class="mt-4 col-md-6">
                <label for="checking_proof" class="form-label">Comprovante</label>
                <input type="file" class="btn btn-outline-secondary form-control" name="checking_proof" id="checking_proof">
            </div>
            <div class="mt-3 col-md-6">
                <label for="date" class="form-label">Data da Competência</label>
                <input type="date" id="date" class="form-control" name="date">
            </div>
        </div>

        <div class="row">
            <div class="mt-3 col-md-6">
                <label for="obs" class="form-label">Observação</label>
                <input type="text" name="obs" class="form-control" id="obs">
            </div>
            <div class="mt-3 col-md-6">
                <label for="data" class="form-label">Dados Abstratos</label>
                <input type="text" id="data" class="form-control" name="data">
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