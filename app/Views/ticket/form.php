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
                    Editar Boletos em Lote
                <?php else : ?>
                    Novo Lote de Boletos
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
                <label for="bairro" class="form-label">Bairro</label>
                <input type="text" id="district" class="form-control" name="district">
            </div>
            <div class="mt-3 col-md-3">
                <label for="rua" class="form-label">Rua</label>
                <input type="text" id="andress" name="andress" class="form-control">
            </div>
            <div class="mt-3 col-md-3">
                <label for="pop_id" class="form-label">POP</label>
                <select class="form-select" id="pop_id" required name="pop_id">
                        <?php foreach ($pops as $pop) : ?>
                            <option value="<?= $pop['id'] ?>"><?= $pop['city'] ?></option>
                        <?php endforeach ?>
                    </select>
            </div>

            <div class="mt-3 col-md-3">
                <label for="nas" class="form-label">NAS</label>
                <select class="form-control select2"  id="nas" aria-label="Default select example" name="nas">
                    <option selected>Selecione o NAS</option>
                    <option value="1">Monsenhor Tabosa</option>
                    <option value="1">Ria Rural</option>
                </select>
            </div>
        </div>
       
        <div class="row">
            <div class="mt-3 col-md-4">
                <label for="parcela" class="form-label">Parcela</label>
                <input type="text" class="form-control" id="parcel" name="parcel" placeholder="">
            </div>

            <div class="mt-3 col-md-4">
                <label for="portador" class="form-label">Mês/ano</label>
                <select class="form-control select2" id="date" aria-label="Default select example" name="date">
                    <option selected>Selecione o período</option>
                    <option value="1">08/2023</option>
                    <option value="2">09/2023</option>
                    <option value="3">10/2023</option>
                    <option value="4">11/2023</option>
                    <option value="5">12/2023</option>                  
                </select>
            </div>
            <div class="mt-3 col-md-4">
                <label for="portador" class="form-label">Portador</label>
                <select class="form-control select2" id="carrier" aria-label="Default select example" name="carrier">
                    <option selected>-------</option>
                    <option value="1">Caixa Economica Federal</option>
                    <option value="2">Banco Rural</option>
                    <option value="3">Banco do Brasil</option>
                    <option value="4">Banco Itáu</option>
                </select>
            </div>
        </div>


        <div class="row">
            <div class="mt-3 col-md-4">
                <label for="plano" class="form-label">Plano</label>
                <label for="plano" class="form-label">Plano</label>
                <select class="form-control select2" name="plans_id" required id="plans_id" aria-label="plans_id">
                    <option value="">Selecione o plano</option>
                    <?php foreach ($subscription as $plan) : ?>
                        <option value="<?= $plan['id'] ?>"><?= $plan['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mt-3 col-md-4">
                <label for="condominio" class="form-label">Condominio</label>
                <select class="form-control select2" id="edf" aria-label="Default select example" name="edf">
                    <option selected>Selecione o Condominio</option>
                    <option value="1">Edf. Luis Castro - Monsenhor Tabosa</option>
                    <option value="1">VogVille - Caruaru</option>
                </select>
            </div>
            <div class="mt-3 col-md-4">
                <label for="vencimento" class="form-label">Vencimento</label>
                <select class="form-control select2" id="payment" aria-label="Default select example" name="payment">
                    <option selected>---------</option>
                    <option value="1">5</option>
                    <option value="2">10</option>
                    <option value="3">15</option>
                    <option value="4">20</option>
                    <option value="5">25</option>
                    <option value="6">30</option>
                </select>
            </div>
        </div>


        <div class="row">
            <div class="mt-3 col-md-3">
                <label for="datainicial" class="form-label">Data Cad. Inicial:</label>
                <input type="date" class="form-control" id="datestart" name="datestart" placeholder="">
            </div>
            <div class="mt-3 col-md-3">
                <label for="datafdateendinal" class="form-label">Data Cad. Final:</label>
                <input type="date" class="form-control" id="date_end" name="date_end" placeholder="">
            </div>
            <div class="mt-5 col-md-3">
                <label for="carneaberto" class="form-label"></label>
                <input type="checkbox" name="ticket_open" id="ticket_open" <?= (isset($register) and $register->ticket_open == 1) ? 'checked' : '' ?>> Exibe Carnê em Aberto
            </div>
            <div class="mt-5 col-md-3">
                <label for="pix" class="form-label"></label>
                <input type="checkbox" name="pix" id="pix" <?= (isset($register) and $register->pix == 1) ? 'checked' : '' ?>> Gerar PIX
            </div>
        </div>

        <div class="row">
            <div class="mt-3 col-md-6">
                <label for="tituloinicial" class="form-label">Títulos Emitidos (Não) - Inicial:</label>
                <input type="date" class="form-control" name="title_issued_start" id="title_issued_start" >
            </div>
            <div class="mt-3 col-md-6">
                <label for="titulofinal" class="form-label">Títulos Emitidos (Não) - Final:</label>
                <input type="date" class="form-control" name="title_issued_end" id="title_issued_end" >
            </div>
        </div>
        
        <div class="row">
            <div class="mt-3 col-md-12">
                <label for="obs" class="form-label">Observação</label>
                <input type="text" class="form-control" id="obs" name="obs" placeholder="">
            </div>
        </div>

    </form>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    const modelo = document.getElementById('modelo');
    const placa = document.getElementById('placa');
    const uf = document.getElementById('u7f');
    const local = document.getElementById('local');
    const obs = document.getElementById('local');
    const disponivel = document.getElementById('disponivel');
    
    const submit = () => {
        const body = formatBody();

        try {
            validate(body);

            fetch('<?= $baseRoute ?>/save', {
                method: 'POST',
                body: JSON.stringify(body)
            }).then(response => response.json())
            .then(data => {
                if (data.error == false) {
                    window.location.href = '<?= $baseRoute ?>';
                } else {
                    showToast('Houve um erro', 'error');
                }
            }).catch(error => {
                showToast('Houve um erro', 'error');
            });

        } catch (error) {
            showToast('Preencha todo os campos requeridos', 'warning');

            document.getElementById(error).classList.add('is-invalid');
        }
        
    }

    const formatBody = () => {
        return {
            model: modelo.value,
            plate: placa.value,
            uf: uf.value,
            locate: local.value,
            obs: obs.value,
            available: disponivel.checked
        }
    }

    const validate = (body) => {
        if(!body.model)
            throw 'modelo'

        if(!body.plate)
            throw 'placa'
    }

    const inputs = document.querySelectorAll('input');

    for (var i = 0, len = inputs.length; i < len; i++) {
        inputs[i].addEventListener('keyup', function(e){
            document.getElementById($(e.target).attr("id")).classList.remove('is-invalid');
        });
    }
</script>
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