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
                    Editar Olt
                <?php else : ?>
                    Novo Olt
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
                    <div class="mt-3 col-md-4">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Insira o nome">
                    </div>
                    <div class="mt-3 col-md-4">
                        <label for="host" class="form-label">Host</label>
                        <input type="text" class="form-control" name="host" id="host" placeholder="Insira o host">
                    </div>
                    <div class="mt-3 col-md-4">
                        <label for="slot" class="form-label">Slot</label>
                        <input type="text" class="form-control" name="slot" id="slot" placeholder="Insira o slot">
                    </div>

                </div>

                <div class="row">
                    <div class="mt-3 col-md-6">
                        <label for="type" class="form-label">Tipo</label>
                        <select class="form-control select2" name="type" id="type" aria-label="Selecione o tipo">
                            <option selected>Selecione o Tipo</option>
                            <option value="1">FiberHome</option>
                            <option value="2">FibeHome RP1000</option>
                            <option value="2">FibeHome RP1000 551606</option>
                            <option value="2">Huawei</option>
                            <option value="2">ZTE</option>
                            <option value="2">DataCom</option>
                            <option value="2">Parks</option>
                            <option value="2">Nokia</option>
                            <option value="2">Outros</option>
                        </select>
                    </div>
                    <div class="mt-3 col-md-6">
                        <label for="user" class="form-label">Usuário</label>
                        <input type="text" class="form-control" name="user" id="user" placeholder="Digite o nome do usuário">
                    </div>
                </div>

                <div class="row">

                    <div class="mt-3 col-md-6">
                        <label for="password" class="form-label">Senha</label>
                        <input type="text" class="form-control" name="password" id="password" placeholder="Digite uma senha para o usuário">
                    </div>
                    <div class="mt-3 col-md-6">
                        <label for="password_admin" class="form-label">Senha do admin</label>
                        <input type="text" class="form-control" id="password_admin" name="password_admin" placeholder="Insiria a senha do admin">
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5 border">
                <div class="row ">
                    <div class="col-md-6">
                        <div class="form-check mt-1">
                            <label for="debug" class="form-label"></label>
                            <input type="checkbox" id="debug" name="debug" class="form-check-input" <?= (isset($register) and $register->debug == 1) ? 'checked' : '' ?>> Debug
                        </div>
                        <div class="form-check mt-1">
                            <label for="auto_save" class="form-label"></label>
                            <input type="checkbox" name="auto_save" id="auto_save" class="form-check-input" <?= (isset($register) and $register->auto_save == 1) ? 'checked' : '' ?>> Auto Salvar?
                        </div>
                        <div class="form-check mt-1">
                            <label for="template_onu" class="form-label"></label>
                            <input type="checkbox" name="template_onu" id="template_onu" class="form-check-input" <?= (isset($register) and $register->template_onu == 1) ? 'checked' : '' ?>> Requer ONU Template?
                        </div>
                        <div class="form-check mt-1">
                            <label for="cto" class="form-label"></label>
                            <input type="checkbox" name="cto" id="cto" class="form-check-input" <?= (isset($register) and $register->cto == 1) ? 'checked' : '' ?>> Requer Definir CTO na Autorização?
                        </div>
                        <div class="form-check mt-1">
                            <label for="plot_sign" class="form-label"></label>
                            <input type="checkbox" name="plot_sign" id="plot_sign" class="form-check-input" <?= (isset($register) and $register->plot_sign == 1) ? 'checked' : '' ?>> Coletar sinal do lote
                        </div>
                        <div class="form-check mt-1">
                            <label for="onu_filter" class="form-label" class="form-label"></label>
                            <input type="checkbox" name="onu_filter" class="form-check-input" <?= (isset($register) and $register->onu_filter == 1) ? 'checked' : '' ?>> Filtrar Tipos de ONU
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check mt-1">
                            <label for="authorization" class="form-label"></label>
                            <input type="checkbox" name="authorization" class="form-check-input" <?= (isset($register) and $register->authorization == 1) ? 'checked' : '' ?>> Requer Definir Serviço na Autorização?
                        </div>
                        <div class="form-check mt-1">
                            <label for="vlan" class="form-label"></label>
                            <input type="checkbox" name="vlan" id="vlan" class="form-check-input" <?= (isset($register) and $register->vlan == 1) ? 'checked' : '' ?>> Requer Definir VLAN Manualmente ?
                        </div>
                        <div class="form-check mt-1">
                            <label for="disable_onu" class="form-label"></label>
                            <input type="checkbox" name="disable_onu" id="disable_onu" class="form-check-input" <?= (isset($register) and $register->disable_onu == 1) ? 'checked' : '' ?>> Desativar ONU:
                        </div>
                        <div class="form-check mt-1">
                            <label for="pop_filter" class="form-label"></label>
                            <input type="checkbox" name="pop_filter" id="pop_filter" class="form-check-input" <?= (isset($register) and $register->pop_filter == 1) ? 'checked' : '' ?>> Filtrar por POP?
                        </div>
                        <div class="form-check mt-1">
                            <label for="active" class="form-label"></label>
                            <input type="checkbox" name="active" id="active" class="form-check-input" <?= (isset($register) and $register->active == 1) ? 'checked' : '' ?>> Ativa?
                        </div>
                        <div class="form-check mt-1">
                            <label for="template_filter" class="form-label" class="form-label"></label>
                            <input type="checkbox" id="template_filter" name="template_filter" class="form-check-input" <?= (isset($register) and $register->template_filter == 1) ? 'checked' : '' ?>> Filtrar Templete
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="mt-3 col-md-3">
                <label for="snmp_version" class="form-label">SNMP Versão</label>
                <input type="text" class="form-control" name="snmp_version" id="snmp_version" placeholder="Digite a SNMP">
            </div>
            <div class="mt-3 col-md-3">
                <label for="snmp_community" class="form-label">SNMP Community</label>
                <input type="text" class="form-control" name="snmp_community" id="snmp_community" placeholder="Digite a Community">
            </div>
            <div class="mt-3 col-md-3">
                <label for="snmp_port" class="form-label">SNMP Porta</label>
                <input type="text" class="form-control" name="snmp_port" id="snmp_port" placeholder="Insiria a Porta">
            </div>
            <div class="mt-3 col-md-3">
                <label for="coord" class="form-label">Latitude, Longitude</label>
                <input type="text" class="form-control" name="coord" id="coord" placeholder="Insiria a latitude e a longitude">
            </div>
        </div>



        <div class="row">
            <div class="mt-3 col-md-6">
                <label for="pop" class="form-label">POPs</label>
                <select class="form-control" id="pop" name="pop" aria-label="Default select example">
                    <option selected>Selecione o POP</option>
                    <option value="1">Caruaru - PE</option>
                    <option value="2">SHH</option>
                </select>
            </div>

            <div class="mt-3 col-md-6">
                <label for="integration" class="form-label">Integração</label>
                <input type="text" class="form-control" id="integration" name="integration" placeholder="">
            </div>


        </div>

        <div class="row">
            <div class="mt-3 col-md-6">
                <label for="telnet" class="form-label">Telnet/SSH Porta</label>
                <input type="text" class="form-control" name="telnet" id="telnet" placeholder="Digite o Telnet">
            </div>
            <div class="mt-3 col-md-6">
                <label for="protocol" class="form-label">Protocolo</label>
                <select class="form-control select2" name="protocol" id="protocol" aria-label="Default select example">
                    <option selected>Selecione Protoloco</option>
                    <option value="1">Telnet</option>
                    <option value="2">SSH</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="mt-3 col-md-12">
                <label for="obs" class="form-label">Observações</label>
                <input type="text" class="form-control" name="obs" id="obs" placeholder="Observações">
            </div>
        </div>
        <div class="row">
            <div class="mt-3 col-md-3">
                <label for="tl1_ip" class="form-label">TL1 IP</label>
                <input type="text" class="form-control" name="tl1_ip" id="tl1_ip" placeholder="">
            </div>
            <div class="mt-3 col-md-3">
                <label for="tl1_port" class="form-label">TL1 Porta</label>
                <input type="text" class="form-control" name="tl1_port" id="tl1_port" placeholder="">
            </div>
            <div class="mt-3 col-md-3">
                <label for="tl1_user" class="form-label">TL1 Usuário</label>
                <input type="text" class="form-control" name="tl1_user" id="tl1_user" placeholder="">
            </div>
            <div class="mt-3 col-md-3">
                <label for="tl1_password" class="form-label">TL1 Senha</label>
                <input type="text" class="form-control" name="tl1_password" id="tl1_password" placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="mt-3 col-md-6">
                <label for="wait" class="form-label">Aguardar</label>
                <input type="text" class="form-control" name="wait" id="wait" placeholder="">
            </div>
            <div class="mt-3 col-md-6">
                <label for="parameters" class="form-label">Parâmetros</label>
                <input type="text" class="form-control" name="parameters" id="parameters" placeholder="">
            </div>
        </div>

        <div class="row">
            <div class="mt-3 col-md-4">
                <label for="high_signal" class="form-label">Limite do Sinal Alto</label>
                <input type="text" class="form-control" name="high_signal" id="high_signal" placeholder="Insira o limite do sinal">
            </div>
            <div class="mt-3 col-md-4">
                <label for="low_signal" class="form-label">Limite do Sinal baixo</label>
                <input type="text" class="form-control" name="low_signal" id="low_signal" placeholder="Insira o limite do sinal">
            </div>
            <div class="mt-3 col-md-2">
                <label for="high_signal_color" class="form-label">Cor do Sinal Alto</label>
                <select class="form-control select2" name="high_signal_color" id="high_signal_color" aria-label="Default select example">
                    <option selected>Selecione a Cor</option>
                    <option value="1">Azul</option>
                    <option value="2">Preto</option>
                </select>
            </div>
            <div class="mt-3 col-md-2">
                <label for="low_signal_color" class="form-label">Cor do Sinal Baixo</label>
                <select class="form-control select2" id="low_signal_color" name="low_signal_color" aria-label="Default select example">
                    <option selected>Selecione a Cor</option>
                    <option value="1">Azul</option>
                    <option value="2">Preto</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="mt-3 col-md-3">
                <label for="voip_ip" class="form-label">Voip IP</label>
                <input type="text" class="form-control" name="voip_ip" id="voip_ip" placeholder="">
            </div>
            <div class="mt-3 col-md-3">
                <label for="voip_mask" class="form-label">Voip Máscara</label>
                <input type="text" class="form-control" name="voip_mask" id="voip_mask" placeholder="">
            </div>
            <div class="mt-3 col-md-3">
                <label for="voip_gateway" class="form-label">Voip Gateway</label>
                <input type="text" class="form-control" name="voip_gateway" id="voip_gateway" placeholder="">
            </div>
            <div class="mt-3 col-md-3">
                <label for="voip_port" class="form-label">Porta Voip</label>
                <input type="text" class="form-control" name="voip_port" id="voip_port" placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="mt-3 col-md-12">
                <label for="parameters_json" class="form-label">Parâmetros JSON</label>
                <input type="text" class="form-control" name="parameters_json" id="parameters_json" placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="mt-3 col-md-4">
                <label for="service_active" class="form-label">Comando para Ativar Serviço</label>
                <select class="form-control select2" id="service_active" name="service_active" aria-label="Default select example">
                    <option selected>Selecione o Comando</option>
                    <option value="1">CMD 01</option>
                </select>
            </div>
            <div class="mt-3 col-md-4">
                <label for="service_suspend" class="form-label">Comando para Suspender Serviço</label>
                <select class="form-control select2" id="service_suspend" name="service_suspend" aria-label="Default select example">
                    <option selected>Selecione o Comando</option>
                    <option value="1">CMD 01</option>
                </select>
            </div>
            <div class="mt-3 col-md-4">
                <label for="change_plan" class="form-label">Comando para Alterar Plano</label>
                <select class="form-control select2" id="change_plan" name="change_plan" aria-label="Default select example">
                    <option selected>Selecione o Comando</option>
                    <option value="1">CMD 01</option>
                </select>
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