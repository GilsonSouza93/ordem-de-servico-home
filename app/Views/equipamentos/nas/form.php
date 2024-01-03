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
                    Editar NAS
                <?php else : ?>
                    Novo NAS
                <?php endif ?>
            </h4>
        </div>
        <div class="col-md-4 btn-group">
            <a class="btn btn-success" href="<?= $baseRoute ?>">Voltar</a>
            <button class="btn btn-success" id="submit-btn">Salvar</button>
        </div>
    </div>



    <form>

        <div class="row">
            <?php if (isset($register)) : ?>
                <input type="hidden" name="id" value="<?= $register->id ?>">
            <?php endif ?>

            <div class="mt-3 col-md-4">
                <label for="description" class="form-label">Descrição</label>
                <input type="text" class="form-control " aria-label="Default select example" name="description" id="description" value="<?= isset($register) ? $register->description : '' ?>">
            </div>
            <div class="mt-3 col-md-4">
                <label for="ip_radius" class="form-label">IP Radius</label>
                <select class="form-select" id="ip_radius" name="ip_radius" aria-label="plano" required>
                    <?php foreach ($radius as $radio) : ?>
                        <option value="<?= $radio['ip_address'] ?>"><?= $radio['ip_address'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mt-3 col-md-4">
                <label for="auth_port" class="form-label">Auth Porta</label>
                <input type="text" class="form-control " aria-label="Default select example" name="auth_port" id="auth_port" value="<?= isset($register) ? $register->auth_port : '' ?>">
            </div>
        </div>

        <div class="row">
            <div class="mt-3 col-md-3">
                <label for="acct_port" class="form-label">Acct Porta</label>
                <input type="text" class="form-control" name="acct_port" id="acct_port" value="<?= isset($register) ? $register->acct_port : '' ?>">
            </div>
            <div class="mt-3 col-md-3">
                <label for="timeout" class="form-label">Timeout</label>
                <input type="text" class="form-control" name="timeout" id="timeout" value="<?= isset($register) ? $register->timeout : '' ?>">
            </div>
            <div class="mt-3 col-md-3">
                <label for="block_port" class="form-label">Porta Bloqueio</label>
                <input type="text" class="form-control" name="block_port" id="block_port" value="<?= isset($register) ? $register->block_port : '' ?>">
            </div>
            <div class="mt-3 col-md-3">
                <label for="notice_port" class="form-label">Porta de Aviso</label>
                <input type="text" class="form-control" name="notice_port" id="notice_port" value="<?= isset($register) ? $register->notice_port : '' ?>">
            </div>
        </div>
        <div class="row">
            <div class="mt-3 col-md-4">
                <label for="vpn_type" class="form-label">Tipo da VPN</label>
                <select class="form-control" name="vpn_type" id="vpn_type" value="<?= isset($register) ? $register->vpn_type : '' ?>">
                    <option value="PPTP">PPTP</option>
                    <option value="openVpn">Open VPN</option>
                </select>
            </div>
            <div class="mt-3 col-md-4">
                <label for="host_vpn" class="form-label">Host da VPN</label>
                <input type="text" class="form-control" name="host_vpn" placeholder="" id="host_vpn" value="<?= isset($register) ? $register->host_vpn : '' ?>">
            </div>
            <div class="mt-3 col-md-4">
                <label for="vpn_port" class="form-label">Porta da VPN</label>
                <span class="badge text-bg-light show-text" data-text='Se nao definida, utilizar porta padrão'>?</span>
                <input type="text" class="form-control" name="vpn_port" placeholder="" id="vpn_port" value="<?= isset($register) ? $register->vpn_port : '' ?>">
            </div>
        </div>
        <div class="row">
            <div class="mt-3 col-md-4">
                <label for="user" class="form-label">Usuário</label>
                <input type="text" class="form-control" name="user" placeholder="" id="user" value="<?= isset($register) ? $register->user : '' ?>">
            </div>
            <div class="mt-3 col-md-4">
                <label for="password" class="form-label">Senha</label>
                <input type="text" class="form-control" name="password" placeholder="" id="password" value="<?= isset($register) ? $register->password : '' ?>">
            </div>
            <div class="mt-3 col-md-4">
                <label for="config_connection" class="form-label">Configuração de Conexão</label>
                <select class="form-control" name="config_connection" placeholder="" id="config_connection" value="<?= isset($register) ? $register->config_connection : '' ?>">
                    <option value="ssh">SSH</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="mt-3 col-md-6">
                <label for="config_user" class="form-label">Configuração do Usuário</label>
                <span class="badge text-bg-light show-text" data-text='Se deixado em branco, irá utilizar usuário e senha definido no NAS'>?</span>
                <input type="text" class="form-control" name="config_user" placeholder="" id="config_user" value="<?= isset($register) ? $register->config_user : '' ?>">
            </div>

            <div class="mt-3 col-md-5">
                <label for="config_password" class="form-label">Configuração da Senha</label>
                <input type="text" class="form-control" name="config_password" placeholder="" id="config_password" value="<?= isset($register) ? $register->config_password : '' ?>">
            </div>

            <div class="mt-5 col-md-1">
                <label for="active" class="form-check-label">Ativo</label>
                <input type="checkbox" name="active" id="active" class="form-check-input" <?= (isset($register) and $register->active == 1) ? 'checked' : '' ?>>
            </div>
        </div>

        <div class="row">

            <div class="mt-3 col-md-12">
                <label for="template" class="form-label">Template</label>
                <textarea type="text" class="form-control" name="template" cols="30" rows="10" placeholder="" id="template"><?= isset($register) ? $register->template : '' ?></textarea>
            </div>

        </div>
    </form>
</div>


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