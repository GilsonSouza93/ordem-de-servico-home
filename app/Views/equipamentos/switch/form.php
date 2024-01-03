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
                    Editar Cliente
                <?php else : ?>
                    Novo Cliente
                <?php endif ?>
            </h4>
        </div>
        <div class="col-md-4 btn-group">
            <a class="btn btn-success" href="<?= $baseRoute ?>">Voltar</a>
            <button class="btn btn-success" id="submit-btn" >Salvar</button>
        </div>
    </div>

    <form>

        <?php if (isset($register)) : ?>
            <input type="hidden" name="id" value="<?= $register->id ?>">
        <?php endif ?>

        <div class="row">
            <div class="mt-3 col-md-3">
                <label for="source" class="form-label">Fonte</label>
                <select class="form-control select2" aria-label="Default select example"name="source" id="source">
                    <option selected>Selecione a Fonte</option>
                    <option value="teste_1">Fonte 01</option>
                    <option value="teste_2">Fonte 02</option>
                </select>
            </div>
            <div class="mt-3 col-md-3">
                <label for="route" class="form-label">Rota</label>
                <input type="text" class="form-control" name="route" placeholder="Insira o código da onu" id="route">
            </div>
            <div class="mt-3 col-md-3">
                <label for="initial_port" class="form-label">Porta Inicial</label>
                <input type="text" class="form-control" name="initial_port" placeholder="Insira a porta inicial" id="initial_port">
            </div>
            <div class="mt-3 col-md-3">
                <label for="total_ports" class="form-label">Total de portas</label>
                <input type="text" class="form-control" name="total_ports" placeholder="Insira o total de portas"id="total_ports">
            </div>

        </div>

        <div class="row">
            <div class="mt-3 col-md-4">
                <label for="pole_id" class="form-label">Poste</label>
                <select name="pole_id" class="form-select" id="pole_id">
                    <?php foreach($poles as $pole) : ?>
                        <option value="<?= $pole['id'] ?>"><?= $pole['name'] ?></option>
                    <?php endforeach?>
                </select>
            </div>

            <div class="mt-3 col-md-4">
                <label for="unavailable" class="form-label">Portas não disponíveis</label>
                <span class="badge text-bg-light show-text" data-text='Separe por vírgula se for mais de uma porta. Ex: 5,6'>?</span>
                <input type="text" class="form-control" name="unavailable" placeholder="Insira o total de portas"id="unavailable">
            </div>

            <div class="mt-3 col-md-4">
                <label for="description" class="form-label">Descrição</label>
                <input type="text" class="form-control" name="description" placeholder="Insira a descrição"id="description">
            </div>
        </div>

        <div class="row">
            <div class="mt-3 col-md-4">
                <label for="ip" class="form-label">IP</label>
                <input type="text" class="form-control" name="ip" id="ip">
            </div>

            <div class="mt-3 col-md-4">
                <label for="port" class="form-label">Porta</label>
                <input type="text" class="form-control" name="port" id="port" >
            </div>

            <div class="mt-3 col-md-4">
                <label for="access_type" class="form-label">Tipo de Acesso</label>
                <select name="access_type" class="form-control" id="access_type">
                    <option value="web">Web</option>
                    <option value="telnet">Telnet</option>
                    <option value="ssh">SSH</option>
                </select>
            </div>
        </div>
        
        <div class="row">
            <div class="mt-3 col-4">
                <label for="user" class="form-label">Usuário</label>
                <input type="text" class="form-control" id="user" name="user">
            </div>

            <div class="mt-3 col-4">
                <label for="password" class="form-label">Senha</label>
                <input type="text" class="form-control" id="password" name="password">
            </div>

            <div class="mt-3 col-4">
                <label for="switch_model" class="form-label">Modelo do Switch</label>
                <input type="text" class="form-control" id="switch_model" name="switch_model">
            </div>
        </div>
    
        <div class="row">
            <div class="mt-3 col-4">
                <label for="template_switch" class="form-label">Switch template padrão</label>
                <select type="text" class="form-control" id="template_switch" name="template_switch">
                    <option value="template_1">Template 1</option>
                </select>
            </div>
            
            <div class="mt-3 col-4">
                <label for="snmp_community" class="form-label">SNMP Community</label>
                <input type="text" class="form-control" id="snmp_community" name="snmp_community">
            </div>

            <div class="mt-3 col-4">
                <label for="snmp_version" class="form-label">SNMP Version</label>
                <input type="text" class="form-control" id="snmp_version" name="snmp_version">
            </div>
        </div>

        <div class="row">
            <div class="mt-3 col-6">
                <label for="lat_long" class="form-label">Latitude e Longitude</label>
                <input type="text" class="form-control" id="lat_long" name="lat_long">
            </div>
            
            <div class="mt-3 col-6">
                <label for="location" class="form-label">Localização</label>
                <input type="text" class="form-control" id="location" name="location">
            </div>

        </div>
        
        <div class="row">

            <div class="mt-3 col-12">
                <label for="obs" class="form-label">Observação</label>
                <input type="text" class="form-control" id="obs" name="obs">
            </div>
            
        </div>
    </form>


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