<?= $this->extend('layout/index') ?>

<?= $this->section('content') ?>

<div>

    <h2><?= $tittle ?></h2>

    <div class="row card-2 py-3 my-3">
        <div class="col-md-8">
            <input type="text" name="search" id="search" class="form-control" placeholder="Buscar" style="background-color: transparent;">
        </div>
        <div class="col-md-4 btn-group">
            <button class="btn btn-success" onclick="search()">Pesquisar</button>
            <button class="btn btn-success" id="accountFilter">Filtros</button>
            <a class="btn btn-success" href="<?= $baseRoute ?>/novo"><?= $addButtonText ?></a>
        </div>
    </div>

    <div class="card p-4 d-flex flex-row justify-content-between mt-3">

        <h4>
            Clientes: <span class="badge bg-danger" id="clientes"> 0

            </span>
        </h4>

        <h4>
            Abertos: <span class="badge bg-success" id="abertos">
                0
            </span>
        </h4>

        <h4>
            Em andamento: <span class="badge bg-secondary" id="andamento">
                0
            </span>
        </h4>

        <h4>
            Concluídos: <span class="badge bg-warning" id="concluidos">
                0
            </span>
        </h4>

        <h4>
            Pendente: <span class="badge bg-info" id="pendente">
                0
            </span>
        </h4>

        <h4>
            Cancelados: <span class="badge bg-info" id="cancelados">
                0
            </span>
        </h4>

        <button class="btn btn-outline-light">
            Detalhes
        </button>
    </div>

    <div id="tableDiv" class="mt-3">

    </div>


</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script>
    const collapseTable = document.getElementById('collapseTable');
    const customerCount = document.getElementById('customerCount');
    const searchBtn = document.getElementById('searchBtn');



    const renderTableOptions = {
        urlFetch: window.location.href + '/search',
        tableDiv: document.getElementById('tableDiv'),
        theadElements: ['ID', 'Nome', 'Status', 'Responsável', 'Descrição', 'Entrada', 'ações'],
        tbodyElements: ['id', 'name', 'status', 'user', 'description', 'date_of_birth', ['edit', 'delete']],
        searchField: document.getElementById('search'),
    }

    document.addEventListener('DOMContentLoaded', () => {
        advancedSearchEngine(renderTableOptions);
    });

    const search = () => {
        advancedSearchEngine(renderTableOptions);
    }
    const btnSearch = document.getElementById('searchBtn');

    btnSearch.addEventListener('click', () => {
        advancedSearchEngine(renderTableOptions);
    });
</script>

<?= $this->endSection() ?>