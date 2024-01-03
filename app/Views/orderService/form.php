<?= $this->extend('layout/index') ?>

<?= $this->section('content') ?>

<div class="card p-4">

    <h2>
        <?= $tittle ?>
    </h2>

    <div class="row card-2 py-3 my-3">
        <div class="col-md-8">
            <h4>Adicionar Ordem de Serviço</h4>
        </div>
        <div class="col-md-4 btn-group">
            <a class="btn btn-success" href="<?= $baseRoute ?>">Voltar</a>
            <button class="btn btn-success" id='submit-btn' onclick="submit()">Salvar</button>
        </div>
    </div>

    <form id="form">
        <input type="hidden" name="id" id="id" value="<?= isset($register) ? $register->id : '' ?>">

        <div class="row">
            <div class="mt-3 col-md-4">
                <label for="uf" class="form-label">Contrato</label>
                <select class="form-control select2" id="contract" name="contract" <?= isset($register) ? "value='{$register->contract}'" : '' ?>>
                    <option selected>Contrato</option>
                </select>
            </div>
            <div class="mt-3 col-md-4">
                <label for="uf" class="form-label">Serviço</label>
                <select class="form-control select2" id="service" name="service" <?= isset($register) ? "value='{$register->service}'" : '' ?>>
                    <option selected>Serviço</option>
                </select>
            </div>
            <div class="mt-3 col-md-4">
                <label for="uf" class="form-label">Empresa</label>
                <select class="form-control select2" id="company" name="company" <?= isset($register) ? "value='{$register->company}'" : '' ?>>
                    <option selected>Empresa</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="mt-3 col-md-4">
                <label for="uf" class="form-label">Setor</label>
                <select class="form-control select2" id="deposit" name="deposit" <?= isset($register) ? "value='{$register->deposit}'" : '' ?>>
                    <option selected>Setor</option>
                    <option value="1">Comercial</option>
                    <option value="2">Suporte técnico TI</option>
                    <option value="3">Financeiro</option>
                    <option value="4">Técnico de rua</option>
                    <option value="4">Técnico de redes</option>
                </select>
            </div>
            <div class="mt-3 col-md-4">
                <label for="uf" class="form-label">Usuário Responsável</label>
                <select class="form-control select2" id="user" name="user" <?= isset($register) ? "value='{$register->user}'" : '' ?>>
                    <option selected>Usuário</option>
                    <option value="1">Técnico - TI</option>
                    <option value="2">Técnico - Redes</option>
                    <option value="3">Financeiro</option>
                    <option value="4">Administrativo</option>
                </select>
            </div>
            <!-- esse input tem que estudar uma forma de cadastrar o tipo de ocorrencia -->
            <div class="mt-3 col-md-4">
                <label for="uf" class="form-label">Tipo de Ocorrência</label>
                <select class="form-control select2" id="type" name="type" <?= isset($register) ? "value='{$register->type}'" : '' ?>>
                    <option selected> Tipo de ocorrência</option>
                    <option value="1">Técnico - TI - Erro no banco de dados</option>
                    <option value="2">Técnico - Redes configurar radius</option>
                    <option value="3">Financeiro - emitir boleto</option>
                    <option value="4">Administrativo - alterar endereço</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="mt-3 col-md-6">
                <label for="uf" class="form-label">Origem</label>
                <select class="form-control select2" id="origin" name="origin" <?= isset($register) ? "value='{$register->origin}'" : '' ?>>
                    <option selected>Origem</option>
                    <option value="1">Telefone</option>
                    <option value="2">Email</option>
                    <option value="3">Suporte Online</option>
                    <option value="4">Pessoa no local</option>
                </select>
            </div>
            <div class="mt-3 col-md-6">
                <label for="uf" class="form-label">Status</label>
                <select class="form-control select2" id="status" name="status" <?= isset($register) ? "value='{$register->status}'" : '' ?>>
                    <option selected>Status</option>
                    <option value="1">Aberto</option>
                    <option value="2">Em execução</option>
                    <option value="3">Pendente</option>
                    <option value="4">Encerrada</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="mt-3 col-md-3">
                <label for="modelo" class="form-label">Nome</label>
                <input type="text" id="name" class="form-control" name="name" <?= isset($register) ? "value='{$register->name}'" : '' ?>>
            </div>
            <!-- Iserir oa função que adiciona mais de um telefone -->
            <div class="mt-3 col-md-3">
                <label for="placa" class="form-label">Telefone contato</label>
                <input type="text" id="phone" class="form-control" name="phone" <?= isset($register) ? "value='{$register->phone}'" : '' ?>>
            </div>

            <div class="mt-3 col-md-3">
                <label for="modelo" class="form-label">Observação</label>
                <input type="text" id="obs" class="form-control" name="obs" <?= isset($register) ? "value='{$register->obs}'" : '' ?>>
            </div>
            <div class="mt-3 col-md-3">
                <label for="placa" class="form-label">Observação interna</label>
                <input type="text" id="obsin" class="form-control" name="obsin" <?= isset($register) ? "value='{$register->obsin}'" : '' ?>>
            </div>
        </div>

        <div class="row">
            <div class="mt-3 col-md-8">
                <label for="local" class="form-label">Local</label>
                <input type="text" id="locate" class="form-control" name="locate" <?= isset($register) ? "value='{$register->locate}'" : '' ?>>
            </div>
            <div class="mt-5 col-md-2">
                <input type="checkbox" name="" id="available" names="available" <?= isset($register) ? "value='{$register->available}'" : '' ?>>
                <label for="disponivel" class="form-label ">Disponível para OS?</label>
            </div>
            <div class="mt-5 col-md-2">
                <input type="checkbox" name="" id="notification" names="notification" <?= isset($register) ? "value='{$register->notification}'" : '' ?>>
                <label for="disponivel" class="form-label ">Notificar Clientes</label>
                <!-- as notificações de abertura de OS será enviado para os contatos cadastrados, pode ser via SMS, Via email, wpp, etc... -->
            </div>
        </div>

    </form>
</div>
<?= $this->endSection() ?>

<!-- <?= $this->section('script') ?>

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

<?= $this->endSection() ?> -->