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
        <h4>
            Dados do Cliente
        </h4>
        <div class="row">
            <!-- ADICONARO FUNCAO DE AUTO COMPLETE -->
            <div class="mt-3 col-md-3">
                <label for="uf" class="form-label">Nome do Cliente</label>
                <select class="form-control select2" id="name" name="name" <?= isset($register) ? "value='{$register->name}'" : '' ?>>
                    <?php foreach ($costumer as $costumer) : ?>
                        <option value="<?= $costumer['id'] ?>"><?= $costumer['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mt-3 col-md-3">
                <label for="placa" class="form-label">Telefone contato</label>
                <input type="text" id="phone" class="form-control" name="phone" <?= isset($register) ? "value='{$register->phone}'" : '' ?>>
            </div>
            <div class="mt-3 col-md-3">
                <label for="placa" class="form-label">CPF / CNPJ</label>
                <input type="text" id="cpf" class="form-control" name="cpf" <?= isset($register) ? "value='{$register->cpf}'" : '' ?>>
            </div>
            <div class="mt-3 col-md-3">
                <label for="uf" class="form-label">Empresa</label>
                <select class="form-control select2" id="company" name="company" <?= isset($register) ? "value='{$register->company}'" : '' ?>>
                    <option selected>Empresa</option>
                </select>
            </div>
        </div>
        <h4 class="mt-4">O.S</h4>
        <div class="row">
            <div class="mt-3 col-md-3">
                <label for="uf" class="form-label">Setor</label>
                <select class="form-control select2" id="setor" name="setor" <?= isset($register) ? "value='{$register->setor}'" : '' ?>>
                    <option selected>Setor</option>
                    <option value="1">Comercial</option>
                    <option value="2">Suporte técnico TI</option>
                    <option value="3">Financeiro</option>
                    <option value="4">Técnico de rua</option>
                    <option value="4">Técnico de redes</option>
                </select>
            </div>
            <div class="mt-3 col-md-3">
                <label for="modelo" class="form-label">Serviço</label>
                <input type="text" id="service" class="form-control" name="service" <?= isset($register) ? "value='{$register->service}'" : '' ?>>
            </div>
            <div class="mt-3 col-md-3">
                <label for="uf" class="form-label">Responsável</label>
                <select class="form-control select2" id="user" name="user" <?= isset($register) ? "value='{$register->user}'" : '' ?>>
                    <!-- Puxar os usuários cadastrados -->
                    <option selected>Usuário</option>
                    <option value="1">Técnico - TI Gilson Souza</option>
                    <option value="2">Técnico - Redes e Produtos - Gilson Moura</option>
                    <option value="3">Financeiro - Fabiana</option>
                    <option value="4">Financeiro - Eduarda</option>
                </select>
            </div>
            <!-- esse input tem que estudar uma forma de cadastrar o tipo de ocorrencia -->
            <div class="mt-3 col-md-3">
                <label for="modelo" class="form-label">Tipo da Ocorrencia</label>
                <input type="text" id="type" class="form-control" name="type" <?= isset($register) ? "value='{$register->type}'" : '' ?>>
            </div>
        </div>
        <div class="row">
            <div class="mt-3 col-md-4">
                <label for="uf" class="form-label">Status</label>
                <select class="form-control select2" id="status" name="status" <?= isset($register) ? "value='{$register->status}'" : '' ?>>
                    <option selected>Status</option>
                    <option value="1">Aberto</option>
                    <option value="2">Em execução</option>
                    <option value="3">Pendente</option>
                    <option value="4">Encerrada</option>
                </select>
            </div>
            <div class="mt-3 col-md-4">
                <label for="uf" class="form-label">Produto</label>
                <select class="form-control select2" id="product" name="product" <?= isset($register) ? "value='{$register->product}'" : '' ?>>
                    <option selected>Estoque</option>
                        <!-- Foreach de produtos -->
                </select>
            </div>
            <div class="mt-3 col-md-4">
                <label for="uf" class="form-label">Origem</label>
                <select class="form-control select2" id="origin" name="origin" <?= isset($register) ? "value='{$register->origin}'" : '' ?>>
                    <option selected>Origem</option>
                    <option value="1">Telefone</option>
                    <option value="2">Email</option>
                    <option value="3">Suporte Online</option>
                    <option value="4">Pessoa no local</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="mt-3 col-md-12">
                <label for="modelo" class="form-label">Observação</label>
                <input type="text" id="obs" class="form-control" name="obs" <?= isset($register) ? "value='{$register->obs}'" : '' ?>>
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