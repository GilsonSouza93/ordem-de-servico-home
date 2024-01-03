<?= $this->extend('layout/index') ?>

<?= $this->section('content') ?>

<div class="card p-4">

    <h2>
        <?= $tittle ?>
    </h2>

    <div class="row card-2 py-3 my-3">
        <div class="col mt-4-md-8">
            <h4>
                <?php if (isset($register)) : ?>
                    Editar Lançamento
                <?php else : ?>
                    Novo Lançamento
                <?php endif ?>
            </h4>
        </div>
        <div class="col mt-4-md-4 btn-group">
            <a class="btn btn-success" href="<?= $baseRoute ?>">Voltar</a>
            <button class="btn btn-success" id="submit-btn">Salvar</button>
        </div>
    </div>

    <form>

        <?php if (isset($register)) : ?>
            <input type="hidden" name="id" value="<?= $register->id ?>">
        <?php endif ?>

        <div class="row">
            <div class="col mt-4">
                <div class="form-floating">
                    <select class="form-select" id="pop_id" name="pop_id">
                        <option value="">Selecione o local do pop</option>
                        <?php foreach ($pops as $pop) : ?>
                            <option value="<?= $pop['id'] ?>"><?= $pop['city'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <label for="pop">POP</label>
                </div>
            </div>
            <div class="col mt-4">
                <div class="form-floating">
                    <select class="form-select" id="supplier_id" name="supplier_id" required>
                        <option value="">Selecione o fornecedor</option>
                        <?php foreach ($suppliers as $supplier) : ?>
                            <option value="<?= $supplier['id'] ?>"><?= $supplier['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="supplier_id">Fornecedor</label>
                </div>
            </div>

            <div class="col mt-4">
                <div class="form-floating">
                    <select class="form-select" id="payment_form" aria-label="payment_form" name="payment_form">
                        <option value="1">Pix</option>
                        <option value="2">Caixa Reserva</option>
                        <option value="1">Dinheiro</option>
                        <option value="1">Débito</option>
                        <option value="1">Crédito</option>
                        <option value="1">Cheque</option>
                    </select>
                    <label for="payment_form">Forma de pagamento</label>
                </div>
            </div>
            <div class="col mt-4">
                <div class="form-floating">
                    <input type="text" class="form-control currency_auto_numeric" id="value" name="value" placeholder="value">
                    <label for="valor">Valor</label>
                </div>
            </div>
            <div class="col mt-4 mx-1">
                <label class="form-check-label" for="fix_value"></label>
                <input type="checkbox" class="form-check-input" name="fix_value" id="fix_value" <?= (isset($register) and $register->fix_value == 1) ? 'checked' : '' ?>> Valor Fixo:
            </div>
        </div>
        
        
        <div class="row">
            <div class="col mt-4">
                <div class="form-floating">
                    <select class="form-select" name="doc_type" id="doc_type" aria-label="tipo do documento">
                        <option value="1">Boleto</option>
                        <option value="2">Dinheiro</option>
                        <option value="3">Cheque</option>
                        <option value="4">Pix</option>
                        <option value="5">Transferência</option>
                        <option value="6">Cartão de Crédito</option>
                        <option value="7">Cartão de Débito</option>
                    </select>
                    <label for="doc_type">Tipo Do Documento</label>
                </div>
            </div>
            <div class="col mt-4">
                <div class="form-floating">
                    <input type="text" id="invoice" class="form-control" name="invoice" placeholder="">
                    <label for="invoice">Nota Fiscal</label>
                </div>
            </div>
            <div class="col mt-4">
                <div class="form-floating">
                    <input type="date" id="issue" class="form-control" name="issue" placeholder="">
                    <label for="issue">Data de Emissão</label>
                </div>
            </div>
            
            <div class="col mt-4">
                <div class="form-floating">
                    <input type="date" id="payment" class="form-control" name="Fpa" placeholder="">
                    <label for="payment">Vencimento</label>
                </div>
            </div>
            <div class="col mt-4 form-check">
                <div class="form-floating">
                    <select class="form-select" name="installment" id="installment" aria-label="Default select example">
                        <option value="Fixo">Fixo</option>
                        <option value="Dinâmico">Dinâmico</option>
                    </select>
                    <label for="installment">Tipo de Parcela</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col mt-4">
                <div class="form-floating">
                    <textarea class="form-control" id="obs" name="obs" placeholder="Digite aqui"></textarea>
                    <label for="obs">Observações</label>
                </div>
            </div>
            <div class="col mt-4">
                <div class="form-floating">
                    <textarea class="form-control" id="description" name="description" placeholder="Digite aqui"></textarea>
                    <label for="description">Descrição</label>
                </div>
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