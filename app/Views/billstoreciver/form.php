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
                    Editar Contas a Receber
                <?php else : ?>
                    Nova Conta a Receber
                <?php endif ?>
            </h4>
        </div>
        <div class="col-md-4 btn-group">
            <a class="btn btn-success" href="<?= $baseRoute ?>">Voltar</a>
            <button class="btn btn-success" id="submit-btn" onclick="save()"  >Salvar</button>
        </div>
    </div>

    <form>

        <?php if (isset($register)) : ?>
            <input type="hidden" name="id" value="<?= $register->id ?>">
        <?php endif ?>

        <div class="row">
            <div class="mt-3 col-md-2">
                <label for="pop" class="form-label">POP</label>
                <select class="form-control select2" id="pop_id" aria-label="pop_id" name="pop_id" >
                    <?php foreach ($pops as $pop) : ?>
                        <option value="<?= $pop['id'] ?>"><?= $pop['city'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mt-3 col-md-3">
                <label for="supplier_id" class="form-label">Fornecedor</label>
                <select class="form-control select2" id="supplier_id" aria-label="supplier_id" name="supplier_id" >
                        <?php foreach ($suppliers as $supplier) : ?>
                            <option value="<?= $supplier['id'] ?>"><?= $supplier['name'] ?></option>
                        <?php endforeach; ?>
                </select>
            </div>

            <div class="mt-3 col-md-2">
                <label for="form_payment" class="form-label">Forma de Pagamento</label>
                <select class="form-control select2" id="form_payment" aria-label="Default select example" name="form_payment" >
                    <option value="1">Pix</option>
                    <option value="2">Caixa reserva</option>
                    <option value="1">Dinheiro</option>
                    <option value="1">Débito</option>
                    <option value="1">Crédito</option>
                    <option value="1">Cheque</option>
                </select>
            </div>
            <div class="mt-3 col-md-3">
                <label for="value" class="form-label">Valor</label>
                <input type="text" id="value" class="form-control" name="value" placeholder="">
            </div>
            <div class="mt-5 col-md-2 py-2 px-5 form-check">
                <label class="form-check-label" for="fix_value"></label>
                <input type="checkbox" id="fix_value" class="form-check-input" name="fix_value" <?= (isset($register) and $register->fix_value == 1) ? 'checked' : '' ?>> Valor Fixo:
            </div>
        </div>

        

        <div class="row">
            <div class="mt-3 col-md-6">
                <label for="obs" class="form-label">Observação</label>
                <input type="text" id="obs" class="form-control" name="obs" placeholder="">
            </div>
            <div class="mt-3 col-md-6">
                <label for="form_payment" class="form-label">Plano de Contas</label>
                <select class="form-control select2" id="form_payment" aria-label="Default select example" name="account_plains" id="account_plains" >
                    <option value="1">Mensalidade Fibra</option>
                    <option value="2">Mensalidade Rádio</option>
                    <option value="1">Mensalidade Cabo</option>
                    <option value="1">Mensalidade aluguel de equipamentos</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="mt-3 col-md-3">
                <label for="doc_type" class="form-label">Tipo do Documento</label>
                <select class="form-control select2" id="doc_type" aria-label="Default select example" name="doc_type" >
                    <option selected>Selecione o Tipo de Pagamento</option>
                </select>
            </div>
            <div class="mt-3 col-md-3">
                <label for="description" class="form-label">Descrição</label>
                <input type="text" id="description" class="form-control" name="description" placeholder="">
            </div>
            <div class="mt-3 col-md-3">
                <label for="invoice" class="form-label">Nota Fiscal</label>
                <input type="text" id="invoice" class="form-control" name="invoice" placeholder="">
            </div>
            <div class="mt-3 col-md-3">
                <label for="date_issue" class="form-label">Data de Emissão</label>
                <input type="date" id="date_issue" class="form-control" name="date_issue" placeholder="">
            </div>
        </div>
        <div class="row">
        <div class="mt-3 col-md-6">
                <label for="payout" class="form-label">Vencimento</label>
                <input type="date" id="payout" class="form-control" name="payout" placeholder="">
            </div>
            <div class="mt-3 col-md-6 form-check">
                <label for="portion" class="form-label">Tipo de Parcela</label>
                    <select class="form-control select2" id="portion" aria-label="Tipo de parcela" name="portion" >
                        <option selected>Selecione o Tipo de Parcela</option>
                        <option value="1">Fixo</option>
                        <option value="1">Dinâmico</option>
                    </select>
                </div>
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