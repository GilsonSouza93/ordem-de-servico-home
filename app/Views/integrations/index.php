<?= $this->extend('layout/index') ?>

<?= $this->section('content') ?>

<div>

    <h2><?= $tittle ?></h2>

    <div class="card p-4 mt-4">
        <h4>
            Asaas
        </h4>
        <div class="row mt-4">
            <div class="col-md-8">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="Asaas_api_key" name="Asaas_api_key" placeholder="Chave Api" disabled>
                    <label for="name">
                        Chave API
                    </label>
                </div>
                <span class="mt-2">
                    Sua chave de API oferece acesso total para visualizar e modificar seus dados do Asaas. Trate a chave como uma senha e tenha cuidado ao compartilhá-la.
                    <span class="text-danger d-none"  onclick="removeAsaas()" style="cursor: pointer;" id="removeAsaasBtn">Remover chave de API</span>
                </span>
            </div>
            <div class="col-md-4">
                <button class="btn btn-success p-3 me-2" onclick="saveApiKeyAsaas()" id="saveAsaasBtn" disabled>Salvar</button>
                <button class="btn btn-success p-3" onclick="testApiKeyAsaas()" id="testAsaasBtn" disabled>Testar</button>
            </div>
        </div>
    </div>

    <div class="card p-4 mt-4">
        <h4>
            Outras integrações
        </h4>
    </div>
</div>
</div>
<!-- Filtro modal -->

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        checkCompanyAsaasApi();
    });

    const saveApiKeyAsaas = () => {
        const input = document.querySelector('#Asaas_api_key');

        if (!input.value) {
            showToast('Informe a chave de API', 'warning');
            return;
        }

        showLoading();

        const formData = new FormData();

        formData.append('asaas_api_key', input.value);

        fetch('<?= $baseRoute ?>/save-asaas', {
                method: 'POST',
                body: formData
            }).then(response => response.json())
            .then(data => {
                hideLoading();

                if (data.status === 'success') {
                    showToast(data.message, 'success');
                    checkCompanyAsaasApi();
                } else {
                    showToast(data.message, 'error');
                }
            }).catch(error => {
                console.log(error);
            });
    }

    const checkCompanyAsaasApi = () => {
        const input = document.querySelector('#Asaas_api_key');
        const removeAsaasBtn = document.querySelector('#removeAsaasBtn');
        const saveAsaasBtn = document.querySelector('#saveAsaasBtn');
        const testAsaasBtn = document.querySelector('#testAsaasBtn');

        fetch('<?= $baseRoute ?>/check-company-asaas-api')
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    input.setAttribute('disabled', true);
                    input.value = "*".repeat(data.length);

                    removeAsaasBtn.classList.remove('d-none');
                    saveAsaasBtn.setAttribute('disabled', true);
                    testAsaasBtn.removeAttribute('disabled');
                } else {
                    input.removeAttribute('disabled');
                    input.value = "";
                    removeAsaasBtn.classList.add('d-none');
                    saveAsaasBtn.removeAttribute('disabled');
                    testAsaasBtn.setAttribute('disabled', true);
                }
            }).catch(error => {
                console.log(error);
            });
    }

    const removeAsaas = () => {
        showLoading();

        fetch('<?= $baseRoute ?>/remove-asaas')
            .then(response => response.json())
            .then(data => {
                hideLoading();

                if (data.status === 'success') {
                    showToast(data.message, 'success');
                    checkCompanyAsaasApi();
                } else {
                    showToast(data.message, 'error');
                }
            }).catch(error => {
                console.log(error);
            });
    }

    const testApiKeyAsaas = () => {
        showLoading();

        fetch('<?= $baseRoute ?>/test-asaas-api-key')
            .then(response => response.json())
            .then(data => {
                hideLoading();

                if (data.status === 'success') {
                    showToast(data.message, 'success');
                } else {
                    showToast(data.message, 'error');
                }
            }).catch(error => {
                console.log(error);
            });
    }
</script>
<?= $this->endSection() ?>