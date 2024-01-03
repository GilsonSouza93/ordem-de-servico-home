<?= $this->extend('layout/index') ?>

<?= $this->section('content') ?>

<div class="card p-4">

    <h2>
        <?= $tittle ?>
    </h2>

    <div class="row card-2 py-3 my-3">
        <div class="col-md-8">
            <h4>Adicionar POP</h4>
        </div>
        <div class="col-md-4 btn-group">
            <a class="btn btn-success" href="<?= $baseRoute ?>">Voltar</a>
            <button class="btn btn-success" onclick="save()">Salvar</button>
        </div>
    </div>

    <form>
        <h4>Informações Gerais</h4>

        <input type="hidden" id="id" name="id" <?= isset($register) ? 'value="' . $register->id . '"' : '' ?>>
        <div class="row">
            <div class="mt-3 col-md-6">
                <label for="portador_padrao" class="form-label">Portador Padrão</label>
                <select class="form-control select2" id="carrier" name="carrier" <?= isset($register) ? 'value="' . $register->carrier . '"' : '' ?>>
                    <option value="1">Banco do Brasil</option>
                    <option value="2">Caixa Economica Federal</option>
                    <option value="3">Banco do Nordente</option>
                    <option value="4">Banco Itau</option>
                </select>
            </div>
            <div class="mt-3 col-md-5">
                <label for="identificador" class="form-label">Identificador</label>
                <input type="text" id="identification" class="form-control" name="identification" <?= isset($register) ? 'value="' . $register->identification . '"' : '' ?>>
            </div>

            <div class="mt-5 col py-1 form-check">
                <label class="form-check-label" for="active">Ativo</label>
                <input type="checkbox" class="form-check-input" id="active" name="active" <?= (isset($register) and $register->active == 1) ? 'checked' : '' ?>>
            </div>
        </div>
        <div class="row">
            <div class="my-3 col-md-4">
                <label for="typo" class="form-label">Plano</label>
                <select class="form-control select2" id="plan" name="plan" <?= isset($register) ? 'value="' . $register->plan . '"' : '' ?>>
                    <?php foreach ($plans as $item) : ?>
                        <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mt-3 col-md-4">
                <label for="typo" class="form-label">NAS</label>
                <select class="form-select" id="nas" name="nas">
                    <?php foreach ($nas as $na) : ?>
                        <option value="<?= $na['id'] ?>"><?= $na['description'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mt-3 col-md-4">
                <label for="typo" class="form-label">Usuário</label>
                <select class="form-select" id="user" name="user">
                    <?php foreach ($users as $user) : ?>
                        <option value="<?= $user['id'] ?>"><?= $user['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>

        </div>

        <h4>Endereço</h4>

        <div class="row">
            <div class="mt-3 col-md-3">
                <label for="" class="form-label">CEP</label>
                <input type="text" name="cep" id="cep" class="form-control" <?= isset($register) ? 'value="' . $register->cep . '"' : '' ?>>
            </div>
            <div class="mt-3 col-md-3">
                <label for="" class="form-label">Rua</label>
                <input type="text" name="street" id="street" class="form-control" <?= isset($register) ? 'value="' . $register->street . '"' : '' ?>>
            </div>
            <div class="mt-3 col-md-3">
                <label for="" class="form-label">Bairro</label>
                <input type="text" name="district" id="district" class="form-control" <?= isset($register) ? 'value="' . $register->district . '"' : '' ?>>
            </div>
            <div class="mt-3 col-md-3">
                <label for="" class="form-label">Número</label>
                <input type="text" name="number" id="number" class="form-control" <?= isset($register) ? 'value="' . $register->number . '"' : '' ?>>
            </div>

            <div class="mt-3">
                <button type="button" class="btn btn-success" onclick="searchCep()">Buscar Cep</button>
            </div>
        </div>

        <div class="row">
            <div class="mt-3 col-md-3">
                <label for="" class="form-label">Complemento</label>
                <input type="text" name="complement" id="complement" class="form-control" <?= isset($register) ? 'value="' . $register->complement . '"' : '' ?>>
            </div>
            <div class="mt-3 col-md-3">
                <label for="" class="form-label">Cidade</label>
                <input type="text" id="city" name="city" class="form-control" <?= isset($register) ? 'value="' . $register->city . '"' : '' ?>>
            </div>
            <div class="mt-3 col-md-3">
                <label for="" class="form-label">Estado</label>
                <input type="text" id="state" name="state" class="form-control" <?= isset($register) ? 'value="' . $register->state . '"' : '' ?>>
            </div>
            <div class="mt-3 col-md-3">
                <label for="" class="form-label">Ponto de Referência</label>
                <input type="text" class="form-control" id="reference_point" name="reference_point" <?= isset($register) ? 'value="' . $register->reference_point . '"' : '' ?>>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    const save = async () => {
        const form = document.querySelector('form');

        const formData = new FormData(form);

        showLoading();

        try {
            await fetch('<?= $baseRoute ?>/save', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    hideLoading();

                    if (data.status === 'success') {
                        showToast('Salvo com sucesso', 'success');

                        setTimeout(() => {
                            window.location.href = '<?= $baseRoute ?>';
                        }, 2000);
                    } else {
                        showToast('Houve um erro', 'error');
                    }
                });

        } catch (error) {
            hideLoading();
            showToast('Houve um erro', 'error');
        }
    }

    function getValue(id) {
        return document.getElementById(id).value;
    }

    const searchCep = () => {
        const cepValue = cep.value.replace('-', '');
        if (!cepValue) {
            showToast('Preencha o CEP primeiro', 'warning');
            return;
        }
        const url = `https://viacep.com.br/ws/${cepValue}/json/`;


        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data.erro) {
                    showToast('CEP não encontrado', 'error');
                } else {
                    document.querySelector('#street').value = data.logradouro;
                    document.querySelector('#district').value = data.bairro;
                    document.querySelector('#city').value = data.localidade;
                    document.querySelector('#state').value = data.uf;

                    showToast('CEP encontrado', 'success');
                }
            })
            .catch(error => {
                showToast('CEP não encontrado', 'error');
                console.log(error);
            });
    };
</script>
<?= $this->endSection() ?>