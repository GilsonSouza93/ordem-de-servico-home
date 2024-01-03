<?= $this->extend('layout/index') ?>

<?= $this->section('content') ?>

<div class="card p-4">

    <h2>
        <?= $tittle ?>
    </h2>

    <form id="form"  enctype="multipart/form-data">
        <div class="row card-2 py-3 my-3">
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
                    <input type="text" class="form-control" id="name" placeholder="Nome da Marca" name="name" required>
                    <label for="name">Nome da Marca</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="description" placeholder="Descrição" name="description">
                    <label for="description">Descrição</label>
                </div>
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
            description: document.querySelector('#description').value,
        }

        return JSON.stringify(body);
    }
</script>

<?= $this->endSection() ?>