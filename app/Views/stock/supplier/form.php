<?= $this->extend('layout/index') ?>

<?= $this->section('content') ?>

<div class="card p-4">

    <h2>
        <?= $tittle ?>
    </h2>

    <form id="form"  enctype="multipart/form-data">
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
                <button class="btn btn-success" id="submit-btn">Salvar</button>
            </div>
        </div>

        
        <div class="row">
            <div class="col">

                <?php if (isset($register)) : ?>
                    <input type="hidden" id="id" name="id" value="<?= $register->id ?>">
                <?php endif ?>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" placeholder="Nome do Fornecedor" name="name" required
                        value="<?= isset($register) ? $register->name : '' ?>">
                    <label for="name">Nome do Fornecedor</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="contact_name" placeholder="Nome do Contato" name="contact_name"
                    value="<?= isset($register) ? $register->contact_name : '' ?>">
                    <label for="contact_name">Nome do Contato</label>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                    value="<?= isset($register) ? $register->email : '' ?>">
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="tel" class="form-control" id="phone" placeholder="Telefone" name="phone"
                    value="<?= isset($register) ? $register->phone : '' ?>">
                    <label for="phone">Telefone</label>
                </div>
            </div>
        </div>


        <div class="form-floating mb-3">
            <textarea class="form-control" id="address" placeholder="Endereço" name="address" rows="4"><?= isset($register) ? $register->address : '' ?></textarea>
            <label for="address">Endereço</label>
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
            contact_name: document.querySelector('#contact_name').value,
            email: document.querySelector('#email').value,
            phone: document.querySelector('#phone').value,
            address: document.querySelector('#address').value,
            id: document.querySelector('#id'),
        }

        return JSON.stringify(body);
    }
</script>

<?= $this->endSection() ?>