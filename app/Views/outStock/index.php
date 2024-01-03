<?= $this->extend('layout/index') ?>

<?= $this->section('content') ?>

<div >

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
            <button class="btn btn-success" onclick="openModalIpPool()" >Filtros</button>
            <a class="btn btn-success" href="<?= $baseRoute ?>/novo"><?= $addButtonText ?></a>
        </div>
        
    </div>

    <p>
        Saídas Localizadas: <span id="saidaCount">0</span>
    </p>

    <div class="d-flex justify-content " id="tableSaida" >
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Range</th>
                    <th scope="col">Total Ips</th>
                    <th scope="col">Fixos</th>
                    <th scope="col">Lease</th>
                    <th scope="col">Online</th>
                    <th scope="col">Livres</th>
                    <th scope="col">Nas</th>
                    <th scope="col">Obs</th>
                    <th scope='col'>Ações</th>
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
    const tableSaida = document.getElementById('tableSaida');
    const saidaCount = document.getElementById('saidaCount')
    const searchBtn = document.getElementById('searchBtn')

    const search = () => {
        const search = document.getElementById('search').value
        const url = '<?= $baseRoute ?>/search'
        const data = {
            search: search
        }

        saidaCount.innerText = 'Carregando...'

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
        saidaCount.innerText = data.length

        const tbody = document.querySelector('tbody')
        tbody.innerHTML = ''
        data.forEach(saida => {

            Object.keys(saida).forEach(key => {
                if (saida[key] === null) {
                    saida[key] = ''
                }
            });

            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${saida?.name}</td>
                <td>
                    ${saida?.email}<br>
                    ${saida?.phone1}
                </td>
                <td></td>
                <td></td>
                <td class='text-end'>
                    <div class="dropstart">
                        <button type="button" class="btn btn-outline-secondary text-white" data-bs-toggle="dropdown" aria-expanded="false">
                            Ações
                        </button>
                        <ul class="dropdown-menu text-center me-2" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(7px); border-radius: 15px; border: 2px solid #198754;">
                            <li class="dropdown-item" onclick="editSaida(${saida.id})">Editar</li>
                            <li class="dropdown-item" onclick="deleteSaida(${saida.id})">Excluir</li>
                        </ul>
                    </div>
                </td>
            `
            tbody.appendChild(tr);
        })
        
        tableSaida.classList.add('show');
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

    const deleteSaida = (id) => {
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

    const editSaida = (id) => {
        window.location.href = '<?= $baseRoute ?>/editar/' + id;
    }

</script>

<?= $this->endSection() ?>
