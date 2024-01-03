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
            <input type="hidden" name="id" value="<?= $register->id ?>">
        <?php endif ?>
        <div class="row">
            <div class="col-md-8">
                <div class="row">

                    <div class="col-md-6">
                        <label for="type" class="form-label">Tipo</label>
                        <select class="form-control select2" aria-label="type" name="type" id="type" value="<?= isset($register) ? $register->type : '' ?>">
                            <option selected>Selecione o Tipo</option>
                            <option value="1">Receita</option>
                            <option value="2">Despesa</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="financialCode" class="form-label">Código Financeiro</label>
                        <input type="text" class="form-control" name="financial_code" id="financial_code" value="<?= isset($register) ? $register->financial_code : '' ?>">
                    </div>

                    <div class="row">
                        <div class="mt-3 col-md-6">
                            <label for="description" class="form-label">Descrição</label>
                            <input type="text" name="description" class="form-control" id="description" value="<?= isset($register) ? $register->description : '' ?>">
                        </div>
                        <div class="mt-3 col-md-6">
                            <label for="plain_account" class="form-label">Conta Plano
                                <span class="badge text-bg-light show-text" data-text='Definir apenas para receita se for mensalidade/adesão.'>?</span>
                            </label>
                            <select class="form-control select2" name="plain_account" id="plain_account" aria-label="forma de pagamento" value="<?= isset($register) ? $register->plain_account : '' ?>">
                                <option value="1">Mensalidade Contrato</option>
                                <option value="2">Adesão Contrato</option>
                            </select>
                        </div>


                    </div>
                    <div class="row ">
                        <div class="mt-3 col-md-6">
                            <label for="sici_account" class="form-label">SICI Conta</label>
                            <select class="form-control select2" name="sici_account" id="sici_account" aria-label="forma de pagamento" value="<?= isset($register) ? $register->sici_account : '' ?>">
                                <option selected>Selecione a forma de pagamento</option>
                                <option value="1">Receita Operacional</option>
                                <option value="2">Despesa Envolvendo Interconexão</option>
                                <option value="3">Despesa Envolvendo Vendas</option>
                                <option value="4">Despesa Envolvendo Publicidade</option>
                                <option value="5">Despesa Envolvendo Operação e Manutenção</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-3">

                            <label for="ticket" class="form-label">Demonstrativo Boleto
                                <span class="badge text-bg-light show-text" data-text='Se informado será inserido no demonstrativo de boletos gerados automaticamente. Variáveis: GRUPO_SET, DATA_INI, DATA_FIM, REF_MES_ANTERIOR, REF_MES_ATUAL, MES_INI_DATA, MES_FIM_DATA. OBS: Variáveis não se aplicam a geração avulsa.'>?</span>
                            </label>
                            <input type="text" id="ticket" class="form-control" name="ticket" placeholder="" value="<?= isset($register) ? $register->ticket : '' ?>">
                        </div>

                    </div>

                </div>

            </div>
            <div class="col-md-4">
                <div class="row border mt-4">
                    <div class="col-md-6 mt-3">


                        <div class="form-check">
                            <label for="suspend" class="form-label">Suspender Serviço?
                                <span class="badge text-bg-light show-text" data-text='definido suspender e tiver débito no cliente com esse plano de conta, irá suspender o serviço do cliente. Conta Plano Adesão e Mensalidade suspendem serviço por padrão.'>?</span>
                            </label>
                            <input type="checkbox" name="suspend" id="suspend" class="form-check-input" <?= (isset($register) and $register->suspend == 1) ? 'checked' : '' ?>>
                        </div>
                        <div class="form-check">
                            <label for="charge" class="form-label">Enviar Cobrança Auto
                                <span class="badge text-bg-light show-text" data-text='Habilita o envio dos títulos com este C. Custo por email caso habilitado também no Portador.'>?</span>
                            </label>
                            <input type="checkbox" name="charge" id="charge" class="form-check-input" <?= (isset($register) and $register->charge == 1) ? 'checked' : '' ?>>
                        </div>

                        <div class="form-check">
                            <label for="dre" class="form-label">DRE</label>
                            <input type="checkbox" name="dre" class="form-check-input" id="dre" <?= (isset($register) and $register->dre == 1) ? 'checked' : '' ?>>
                        </div>
                    </div>

                    <div class="col-md-6 mt-3">
                        <div class="form-check">
                            <label for="sped" class="form-label">Incluir no Bloco 1601 do Arquivo SPED ?</label>
                            <input type="checkbox" name="sped" id="sped" class="form-check-input" <?= (isset($register) and $register->sped == 1) ? 'checked' : '' ?>>
                        </div>

                        <div class="form-check">
                            <label for="visibility" class="form-label">Visível</label>
                            <input type="checkbox" name="visibility" class="form-check-input" id="visibility" <?= (isset($register) and $register->visibility == 1) ? 'checked' : '' ?> >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mt-4 col-md-12">
                        <label for="dreType" class="form-label">Tipo da DRE</label>
                        <select class="form-control select2" id="dre_type" name="dre_type" aria-label="dre_type" value="<?= isset($register) ? $register->dre_type : '' ?>">
                            <option value="01">Receita</option>
                            <option value="02">Imposto s/ Faturamento</option>
                            <option value="03">Despesas Operacionais</option>
                            <option value="04">Custo da Mercadoria vendida</option>
                            <option value="05">Despesas Não Operacionais</option>
                        </select>
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