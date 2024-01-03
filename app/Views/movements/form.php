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
                    Editar Movimentação
                <?php else : ?>
                    Nova Movimentação
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
            <div class="mt-3 col-md-4">
                <label for="name" class="form-label">Fornecedor</label>
                <select class="form-control select2" id="supplier_name" aria-label="supplier_name" name="supplier_name">
                    <?php foreach ($suppliers as $supplier) : ?>
                        <option value="<?= $supplier['name'] ?>"><?= $supplier['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mt-3 col-md-4">
                <label for="name" class="form-label">Empresa</label>
                <input type="text" class="form-control" name="company_buy" id="company_buy" placeholder="" value="<?= isset($register) ? $register->company_buy : '' ?>">
            </div>
            <div class="mt-3 col-md-4">
                <label for="name" class="form-label">Nota fiscal</label>
                <input type="text" class="form-control" name="invoice_buy" id="invoice_buy" placeholder="" value="<?= isset($register) ? $register->invoice_buy : '' ?>">
            </div>
        </div>
        <div class="row">
            <div class="mt-5 col-md-12">
                <label for="name" class="form-label">Observação</label>
                <input type="text" class="form-control" name="obs_buy" id="obs_buy" placeholder="" value="<?= isset($register) ? $register->obs_buy : '' ?>">
            </div>
        </div>

        <!-- movimentações compras end -->

        <div class="row">
            <div class="mt-3 col-md-3">
                <label for="name" class="form-label">Cliente</label>
                <input type="text" class="form-control" name="customer" id="customer" placeholder="" value="<?= isset($register) ? $register->customer : '' ?>">
            </div>
            <div class="mt-3 col-md-3">
                <label for="name" class="form-label">Contract</label>
                <input type="text" class="form-control" name="contract" id="contract" placeholder="" value="<?= isset($register) ? $register->contract : '' ?>">
            </div>
            <div class="mt-3 col-md-3">
                <label for="name" class="form-label">Ordem de Serviço</label>
                <input type="text" class="form-control" name="os_sell" id="os_sell" placeholder="" value="<?= isset($register) ? $register->os_sell : '' ?>">
            </div>
            <div class="mt-3 col-md-3">
                <label for="name" class="form-label">Transportadora</label>
                <input type="text" class="form-control" name="shipping" id="shipping" placeholder="" value="<?= isset($register) ? $register->shipping : '' ?>">
            </div>
        </div>
        <div class="row">
            <div class="mt-3 col-md-4">
                <label for="name" class="form-label">Data de entrega</label>
                <input type="date" class="form-control" name="delivery_date" id="delivery_date" placeholder="" value="<?= isset($register) ? $register->delivery_date : '' ?>">
            </div>
            <div class="mt-3 col-md-4">
                <label for="name" class="form-label">Vendedor</label>
                <select class="form-control select2" id="seller_name" aria-label="seller_name" name="seller_name">
                    <?php foreach ($users as $user) : ?>
                        <option value="<?= $user['id'] ?>"><?= $user['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mt-3 col-md-4">
                <label for="name" class="form-label">Empresa que emitiu a nota fiscal</label>
                <input type="text" class="form-control" name="companyInvoice" id="companyInvoice" placeholder="" value="<?= isset($register) ? $register->companyInvoice : '' ?>">
            </div>
        </div>
        <div class="row">
            <div class="mt-5 col-md-12">
                <label for="name" class="form-label">Observação</label>
                <input type="text" class="form-control" name="obs_sell" id="obs_sell" placeholder="" value="<?= isset($register) ? $register->obs_sell : '' ?>">
            </div>
        </div>
        <!-- movimentações sell end -->
        <div class="row">
            <div class="mt-3 col-md-4">
                <label for="name" class="form-label">Contrato</label>
                <input type="text" class="form-control" name="contract" id="contract" placeholder="" value="<?= isset($register) ? $register->contract : '' ?>">
            </div>
            <div class="mt-3 col-md-4">
                <label for="name" class="form-label">Ordem de serviço</label>
                <input type="text" class="form-control" name="os_comodato" id="os_comodato" placeholder="" value="<?= isset($register) ? $register->os_comodato : '' ?>">
            </div>
            <div class="mt-3 col-md-4">
                <label for="name" class="form-label">Nota fiscal</label>
                <input type="text" class="form-control" name="invoice_comodato" id="invoice_comodato" placeholder="" value="<?= isset($register) ? $register->invoice_comodato : '' ?>">
            </div>
        </div>
        <div class="row">
            <div class="mt-5 col-md-12">
                <label for="name" class="form-label">Observação</label>
                <input type="text" class="form-control" name="obs_comodato" id="obs_comodato" placeholder="" value="<?= isset($register) ? $register->obs_comodato : '' ?>">
            </div>
        </div>
        <!-- movimentações comodato end -->
        <div class="row">
            <div class="mt-5 col-md-4">
                <label for="name" class="form-label">Local de Estoque</label>
                <select name="local_storage" id="local_storage">
                    <option value="almoxarifado fisico">Almoxarifado Físico</option>
                </select>
            </div>
            <div class="mt-5 col-md-4">
                <label for="name" class="form-label">Tipo de Movimentação</label>
                <select name="movement_type_correcao" id="movement_type_correcao">
                    <option value="entrada">Entrada no estoque</option>
                    <option value="saida">Saida do estoque</option>
                </select>
            </div>
            <div class="mt-3 col-md-4">
                <label for="name" class="form-label">Quantidade</label>
                <input type="text" class="form-control" name="amount" id="amount" placeholder="" value="<?= isset($register) ? $register->amount : '' ?>">
            </div>
        </div>
        <div class="row">
            <div class="mt-5 col-md-12">
                <label for="name" class="form-label">Referência</label>
                <input type="text" class="form-control" name="reference" id="reference" placeholder="" value="<?= isset($register) ? $register->reference : '' ?>">
            </div>
        </div>
        <div class="row">
            <div class="mt-5 col-md-12">
                <label for="name" class="form-label">Observação</label>
                <input type="text" class="form-control" name="obs_correcao" id="obs_correcao" placeholder="" value="<?= isset($register) ? $register->obs_correcao : '' ?>">
            </div>
        </div>
        <!-- movimentações correção end -->
        <div class="row">
            <div class="mt-3 col-md-4">
                <label for="name" class="form-label">Origem</label>
                <select name="origin" id="origin">
                    <option value="almoxarifado fisico">Almoxarifado Físico</option>
                </select>
            </div>
            <div class="mt-3 col-md-4">
                <label for="name" class="form-label">Destino</label>
                <select name="destiny" id="destiny">
                    <option value="almoxarifado fisico">Almoxarifado Físico</option>
                </select>
            </div>

            <div class="mt-3 col-md-4">
                <label for="name" class="form-label">Responsável do Envio</label>
                <select class="form-control select2" id="responsible" aria-label="responsible" name="responsible">
                    <?php foreach ($users as $user) : ?>
                        <option value="<?= $user['id'] ?>"><?= $user['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="mt-5 col-md-12">
                <label for="name" class="form-label">Observação</label>
                <input type="text" class="form-control" name="obs_transferencia" id="obs_transferencia" placeholder="" value="<?= isset($register) ? $register->obs_transferencia : '' ?>">
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