<?= $this->extend('layout/index') ?>

<?= $this->section('content') ?>

<div >

    <h2><?= $tittle ?></h2>

    <div class="row card-2 py-3 my-3">
        <div class="col-md-8">
            <input type="text" name="search" id="search" class="form-control" placeholder="Buscar" style="background-color: transparent;">
        </div>
        <div class="col-md-4 btn-group">
            <button class="btn btn-success" id="searchBtn">Pesquisar</button>
            <button class="btn btn-success" onclick="openModalFilter()">Filtros</button>
            <a class="btn btn-success" href="<?= $baseRoute ?>/novo"><?= $addButtonText ?></a>
        </div>
    </div>
    <div id="tableDiv"></div>
</div>
<!-- Filtro modal -->
<div id='modalFilter' class="modal" tabindex="-1" style="backdrop-filter: blur(7px);">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id='formFilter'>
                    <label for="plano" class="form-label">Plano</label>
                    <select class="form-control form-select select2" name="plano" aria-label="Selecione um plano">
                    <th scope="col">ID</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Tipo</th>
                    <th scope='col'>Host</th>
                    <th scope='col'>Secret</th>
                    <th scope='col'>Cadastro</th>
                    <th scope='col'>Serviço</th>
                    <th scope='col'>Status</th>
                    <th scope='col'>Ativo</th>
                    <th scope='col'>Ação</th>
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Consultar</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script>
    const collapseTable = document.getElementById('collapseTable');
    const radiusCount = document.getElementById('radiusCount')
    const searchBtn = document.getElementById('searchBtn')

    const renderTableOptions = {
        urlFetch: window.location.href + '/search',
        tableDiv: document.getElementById('tableDiv'),

        // ID	Descrição	Tipo	Host	Secret	Cadastro	Serviço	Status	Ativo	Ação
        theadElements: ['ID', 'Descrição', 'Host','Tipo','Secret','Data de Cadastro','Ativo', 'ações'],
        tbodyElements: ['id', 'description', 'ip_radius','vpn_type','password','created_at','active', ['edit', 'delete']],
        searchField: document.getElementById('search'),
    }

    document.addEventListener('DOMContentLoaded', () => {
        advancedSearchEngine(renderTableOptions);
    });
</script>

<?= $this->endSection() ?>