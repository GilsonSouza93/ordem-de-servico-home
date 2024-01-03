<?= $this->extend('layout/index') ?>

<?= $this->section('content') ?>

<div class="card p-4">

    <h2><?= $tittle ?></h2>
    
    <div class="row py-3 my-3">
        <div class="col-md-4">
            <input type="text" name="search" id="search" class="form-control" placeholder="Buscar" style="background-color: transparent;">
        </div>
        
        <div class="col-md-4 btn-group">
            <button class="btn btn-success">Exportar Arquivo CSV</button>
            <button class="btn btn-success">Importar</button>
        </div>
        
        <div class="col-md-4 btn-group">
            <button class="btn btn-success">Pesquisar</button>
            <button class="btn btn-success" onclick="openModalStorage()" >Filtros</button>
            <a class="btn btn-success" href="<?= $baseRoute ?>/novo"><?= $addButtonText ?></a>
        </div>
        
    </div>

    <p>
        Storages Localizados: <span id="storageCount">0</span>
    </p>

    <div id="tableStorage" class="collapsed p-4 justify-content card">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">POP</th>
                    <th scope='col'>Endereço</th>
                    <th scope='col'>Altura</th>
                    <th scope='col'>Serv. Internet</th>
                    <th scope='col'>Sustentável</th>
                    <th scope='col'>Ação</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>


<?= $this->section('script') ?>

<script>
    const tableStorage = document.getElementById('tableStorage');
    const storageCount = document.getElementById('storageCount')
    const searchBtn = document.getElementById('searchBtn')

    const search = () => {
        const search = document.getElementById('search').value
        const url = '<?= $baseRoute ?>/search'
        const data = {
            search: search
        }

        storageCount.innerText = 'Carregando...'

        fetch(url, {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            renderTableTwo(data);
        })
        .catch(error => {
            showToast('Erro ao buscar clientes !', 'error')
        })

    }

    const renderTableTwo = (data) => {
        storageCount.innerText = data.length

        const tbody = document.querySelector('tbody')
        tbody.innerHTML = ''
        data.forEach(storage => {

            Object.keys(storage).forEach(key => {
                if (storage[key] === null) {
                    storage[key] = ''
                }
            });

            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${storage?.name}</td>
                <td>
                    ${storage?.email}<br>
                    ${storage?.phone1}
                </td>
                <td></td>
                <td></td>
                <td class='text-end'>
                    <div class="dropstart">
                        <button type="button" class="btn btn-outline-secondary text-white" data-bs-toggle="dropdown" aria-expanded="false">
                            Ações
                        </button>
                        <ul class="dropdown-menu text-center me-2" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(7px); border-radius: 15px; border: 2px solid #198754;">
                            <li class="dropdown-item" onclick="editStorage(${storage.id})">Editar</li>
                            <li class="dropdown-item" onclick="deleteStorage(${storage.id})">Excluir</li>
                        </ul>
                    </div>
                </td>
            `
            tbody.appendChild(tr);
        })
        
        tableStorage.classList.add('show');
    }

    const openModalFilter = () => {
        const modalFilter = new bootstrap.Modal('#modalFilter', {
            keyboard: true,
        });

        modalFilter.show();
    }


    document.addEventListener('DOMContentLoaded', () => {
        search()
    });

    searchBtn.addEventListener('click', () => {
        search()
    });

    const deleteStorage = (id) => {
        url = '<?= $baseRoute ?>/delete';
        showLoading();

        fetch(url, {
            method: 'POST',
            body: JSON.stringify({id: id}),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(response => response.json())
        .then(data => {
            hideLoading();

            if (data.success === true) {
                showToast('Cliente excluído com sucesso !', 'success')
                search()
            } else {
                showToast('Erro ao excluir cliente !', 'error')
            }
        })
    }

    const editStorage = (id) => {
        window.location.href = '<?= $baseRoute ?>/editar/' + id;
    }

</script>

<?= $this->endSection() ?>
