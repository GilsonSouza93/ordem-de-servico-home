<?= $this->extend('layout/index') ?>

<?= $this->section('content') ?>

<div class="card p-4">

    <h2>
        <?= $tittle ?>
    </h2>

    <div class="row py-3 my-3">
        <div class="col-md-8">
            <h4>Adicionar Ponto de Recebimento</h4>
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
            <div class="mt-3 col-md-6">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" name="name" id="name" value="<?= isset($register) ? $register->name : '' ?>">

            </div>
            <div class="mt-3 col-md-3">
                <label for="portador" class="form-label">Portador</label>
                <input type="text" class="form-control" name="carrier" id="carrier" value="<?= isset($register) ? $register->carrier : '' ?>">
            </div>
            <div class="mt-3 col-md-3">
                <label for="carriers" class="form-label">Portadores</label>
                <select class="form-control select2" id="carriers" name="carriers" value="<?= isset($register) ? $register->carriers : '' ?>">
                    <option selected>-------</option>
                    <option value="1">Banco do Brasil</option>
                    <option value="2">Banco Santander</option>
                    <option value="3">Pulsarpay</option>
                    <option value="4">Safe2pay</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="mt-3 col-md-4">
                <label for="uf" class="form-label">Empresas</label>
                <select class="form-control select2" id="companies" name="companies" value="<?= isset($register) ? $register->companies : '' ?>">
                    <option selected>-------</option>
                    <option value="1">Brisatel Telecom</option>
                    <option value="2">CR Telecom</option>
                    <option value="3">LinkTop</option>
                    <option value="4">NAVIX ISP</option>
                </select>
                <span class="badge text-bg-light show-text" data-text='Se apenas 1 empresa, não é necessário definir.'>?</span>
            </div>

            <div class="mt-3 col-md-4">
                <label for="saldo_maximo" class="form-label">Saldo Máximo Permitido por Dia</label>
                <input type="text" class="form-control" id="balance" name="balance" value="<?= isset($register) ? $register->balance : '' ?>">
                <span class="badge text-bg-light show-text" data-text='Limitar recebimento para o caixa por dia. (Definir valor apenas se quiser limitar valor máximo para receber por caixa)'>?</span>
            </div>

            <div class="mt-3 col-md-4">
                <label for="bills_discount" class="form-label">% Desconto Caixa.</label>
                <input type="text" class="form-control" id="bills_discount" name="bills_discount" value="<?= isset($register) ? $register->bills_discount : '' ?>">
                <span class="badge text-bg-light show-text" data-text='Porcentagem permitida para desconto nesse ponto de recebimento.(Usuários Normais)'>?</span>
            </div>
        </div>
        <div class="row">
            <div class="mt-3 col-md-4">
                <label for="admin_discount" class="form-label">% Desconto Admin.</label>
                <input type="text" id="admin_discount" name="admin_discount" class="form-control" value="<?= isset($register) ? $register->admin_discount : '' ?>">
                <span class="badge text-bg-light show-text" data-text='Porcentagem permitida para desconto nesse ponto de recebimento.(Usuários Admin)'>?</span>
            </div>

            <div class="mt-3 col-md-4">
                <label for="method" class="form-label">Formas De Pagamento</label>
                <select class="form-control select2" id="method" name="method" value="<?= isset($register) ? $register->method : '' ?>">
                    <option selected>-------</option>
                    <option value="1">Dinheiro</option>
                    <option value="2">Transferencia Bancária</option>
                    <option value="3">Cartão de Credito</option>
                    <option value="4">Cartão de Débito</option>
                    <option value="5">Cheque à Vista</option>
                    <option value="6">PIX</option>
                </select>
                <span class="badge text-bg-light show-text" data-text='Se não informado formas de pagamento que o caixa aceita, serão consideradas todas as formas'>?</span>
            </div>

            <div class="mt-3 col-md-4">
                <label for="receiver" class="form-label">Formas de Recebimento</label>
                <select class="form-control select2" id="receiver" name="receiver" value="<?= isset($register) ? $register->receiver : '' ?>">
                    <option selected>Selecione o Plano</option>
                    <option value="1">Valor Total</option>
                    <option value="2">Valor Parcial</option>
                </select>
                <span class="badge text-bg-light show-text" data-text='Se não informado formas de recebimento, serão consideradas todas as formas'>?</span>
            </div>
        </div>

        <div class="row">
            <div class="mt-3 col-md-4">
                <label for="pops" class="form-label">Pops</label>
                <select class="form-control select2" id="pops" name="pops" value="<?= isset($register) ? $register->pops : '' ?>">
                    <option selected>Selecione o Local</option>
                    <option value="1">Pop Caruaru</option>
                    <option value="2">Pop Garanhuns</option>
                </select>
                <span class="badge text-bg-light show-text" data-text='Filtrar por Pop nos recebimentos via Retorno / Gateway. Requer ativar no portador filtrar pop.'>?</span>
            </div>

            <div class="mt-3 col-md-4">
                <label for="return_release" class="form-label">Dias Lançamento Retorno</label>
                <input type="text" class="form-control" id="return_release" name="return_release" value="<?= isset($register) ? $register->return_release : '' ?>">
                <span class="badge text-bg-light show-text" data-text='Se definido, lançamento no caixa será data atual + dias informados. Se não definido, data do lançamento = data da leitura do retorno.'>?</span>
            </div>

            <div class="mt-3 col-md-4">
                <label for="card_release" class="form-label">Dias Lançamento Cartão</label>
                <input type="text" class="form-control" id="card_release" name="card_release" value="<?= isset($register) ? $register->card_release : '' ?>">
                <span class="badge text-bg-light show-text" data-text='Se definido, lançamento no caixa será data atual + dias informados. Se não definido, data do lançamento = data da captura no cartão.'>?</span>
            </div>
        </div>
        <div class="row">
            <div class="mt-3 col-md-4">
                <label for="debit_release" class="form-label">Dias Lançamento Cartão (Debito)</label>
                <input type="text" class="form-control" id="debit_release" name="debit_release" value="<?= isset($register) ? $register->debit_release : '' ?>">
                <span class="badge text-bg-light show-text" data-text='Se definido, lançamento no caixa será data atual + dias informados. Se não definido, data do lançamento = data da captura no cartão.'>?</span>


            </div>
            <div class="mt-3 col-md-4">
                <label for="generate_invoice" class="form-label">Gerar NF na Baixa do Título ?</label>
                <select class="form-control select2" id="generate_invoice" name="generate_invoice" value="<?= isset($register) ? $register->generate_invoice : '' ?>">
                    <option selected>----------</option>
                    <option value="1">Na baixa (automática) do título.</option>
                    <option value="2">Na baixa (automática e manual) do título.</option>
                    <option value="3">Na baixa (automática) do título c/ NF marcada na cobrança.</option>
                    <option value="4">Na baixa (automática e manual) do título c/ NF marcada na cobrança. </option>
                </select>
            </div>



            <div class="mt-3 col-md-4">
                <label for="invoice" class="form-label">Gerar NF na Baixa do Título ?</label>
                <select class="form-control select2" id="invoice" name="invoice" value="<?= isset($register) ? $register->invoice : '' ?>">
                    <option selected>----------</option>
                    <option value="1">Boleto + Nota Fiscal</option>
                    <option value="2">Somente Nota Fiscal</option>

                </select>
            </div>
        </div>
</div>
<div class="row mt-5">
    <div class="col-md-8">
        <label for="schedule" class="form-label"> Horários</label>
        <textarea class="form-control" name="schedule" id="schedule" rows="5"><?= isset($register) ? $register->schedule : '' ?></textarea>
    </div>
    <div class="col-md-4">
        <div class="row mt-4 border mx-1 p-3">
            <div class="col">
                <div class="form-check">
                    <input type="checkbox" id="refinance" name="refinance" <?= (isset($register) and $register->refinance == 1) ? 'checked' : '' ?>>
                    <label class="form-label" for="refinance">Refinanciar Valor?</label>
                    <span class="badge text-bg-light show-text" data-text='Refinanciar valor se houver diferença entre valor pago com o valor total - desconto.'>?</span>
                </div>
                <div class="form-check">
                    <input type="checkbox" id="allow_discount" name="allow_discount" <?= (isset($register) and $register->allow_discount == 1) ? 'checked' : '' ?>>
                    <label class="form-label" for="allow_discount">Permitir Desconto ?</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" id="plan" name="plan" <?= (isset($register) and $register->plan == 1) ? 'checked' : '' ?>>
                    <label class="form-label" for="plan">Exigir Plano de Conta em Lançamento ?</label>
                    <span class="badge text-bg-light show-text" data-text='Marcar opção para somente permitir lançamento no caixa com plano de conta'>?</span>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="canceled" id="canceled" <?= (isset($register) and $register->canceled == 1) ? 'checked' : '' ?>>
                    <label class="form-label" for="canceled">Receber Cancelados</label>
                    <span class="badge text-bg-light show-text" data-text='Receber titulos de contratos cancelados'>?</span>
                </div>
            </div>
            <div class="col">
                <div class="form-check">
                    <input type="checkbox" id="send_invoice" name="send_invoice" <?= (isset($register) and $register->send_invoice == 1) ? 'checked' : '' ?>>
                    <label class="form-label" for="send_invoice">Enviar NF</label>
                    <span class="badge text-bg-light show-text" data-text='Enviar nota fiscal automáticamente após a NF ser gerada se houver baixa do título.'>?</span>
                </div>

                <div class="form-check">
                    <input type="checkbox" name="filter" id="filter" <?= (isset($register) and $register->filter == 1) ? 'checked' : '' ?>>
                    <label class="form-label" for="filter">Filtrar Empresa nos Relatórios</label>
                    <span class="badge text-bg-light show-text" data-text='Se marcado, filtra a empresa definida do ponto de recebimento nos relatórios de caixa, dre etc. Se não definido, verifica a empresa no cadastro do Portador'>?</span>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="cash_reports" id="cash_reports" <?= (isset($register) and $register->cash_reports == 1) ? 'checked' : '' ?>>
                    <label class="form-label" for="cash_reports">Ativo Relatório de Caixa</label>
                    <span class="badge text-bg-light show-text" data-text='Se desmarcado, os lançamentos realizados neste ponto serão ocultados dos relatórios de lançamentos de caixa.'>?</span>
                </div>


                <div class="form-check">
                    <input type="checkbox" id="active" name="active" <?= (isset($register) and $register->active == 1) ? 'checked' : '' ?>>
                    <label class="form-label" for="active">Ativo</label>
                </div>
            </div>
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