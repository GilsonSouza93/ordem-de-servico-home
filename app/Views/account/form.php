<?= $this->extend('layout/index') ?>

<?= $this->section('content') ?>

<div class="card p-4">

    <h2>
        <?= $tittle ?>
    </h2>


    <form id="form">
        <input type="hidden" name="id" id="id" value="<?= $register->id ?? '' ?>">
        <div class="row py-3 my-3">
            <div class="col-md-8">
            </div>
            <div class="col-md-4 btn-group">
                <a class="btn btn-success" href="<?= $baseRoute ?>">Voltar</a>
                <button class="btn btn-success" id="submit-btn">Salvar</button>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" placeholder="Nome" name="name" required value="<?= $register->name ?? '' ?>">
                    <label for="name">Nome</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="email" placeholder="Email" name="email" required value="<?= $register->email ?? '' ?>">
                    <label for="email">Email</label>
                </div>
            </div>

            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="phone1" placeholder="Celular" name="phone1" required value="<?= $register->phone1 ?? '' ?>">
                    <label for="phone1">Celular</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="mt-3 col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="password" placeholder="Senha" name="password" <?= isset($register) ? '' : 'required' ?>>
                    <label class="form-label" for="password">Senha</label>
                </div>
            </div>

            <div class="mt-3 col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="passwordConfirm" placeholder="Confirmar Senha" name="passwordConfirm" <?= isset($register) ? '' : 'required' ?>>
                    <label class="form-label" for="passwordConfirm">Confirma Senha</label>
                </div>
            </div>
            <div class="mt-3 col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="setor" placeholder="Digite o setor" name="setor" <?= isset($register) ? '' : 'required' ?>>
                    <label class="form-label" for="setor">Setor</label>
                </div>
            </div>
        </div>
    </form>
</div>

</form>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script>
    const submitBtn = document.querySelector('#submit-btn');
    const form = document.querySelector('form');
    const url = '<?= $baseRoute ?>/save';

    form.addEventListener('submit', event => {
        event.preventDefault();
        const data = formatBody();
        if (!data) return;

        showLoading();

        fetch(url, {
                method: 'POST',
                body: data
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

    function formatBody() {
        const body = {
            name: document.querySelector('#name').value,    
            email: document.querySelector('#email').value,
            password: document.querySelector('#password').value,
            phone1: document.querySelector('#phone1').value,
            passwordConfirm: document.querySelector('#passwordConfirm').value,
            setor: document.querySelector('#setor').value,
        }

        if (body.password != body.passwordConfirm) {
            showToast('As senhas não conferem', 'error');
            return;
        }

        if (body.password.length < 6 && !body.id) {
            showToast('A senha deve ter no mínimo 6 caracteres', 'error');
            return;
        }

        return JSON.stringify(body);
    }
</script>

<?= $this->endSection() ?>