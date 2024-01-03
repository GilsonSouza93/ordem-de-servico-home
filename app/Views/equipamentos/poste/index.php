<?= $this->extend('layout/index') ?>

<?= $this->section('content') ?>

<div >

    <h2><?= $tittle ?></h2>

    <div class="row card-2 py-3 my-3">
        <div class="col-md-4">
            <input type="text" name="search" id="search" class="form-control" placeholder="Buscar" style="background-color: transparent;">
        </div>

        <div class="col-md-4 btn-group">
            <button class="btn btn-success">Exportar Arquivo CSV</button>
            <button class="btn btn-success">Importar</button>
        </div>

        <div class="col-md-4 btn-group">
            <button class="btn btn-success" id="searchBtn">Pesquisar</button>
            <button class="btn btn-success" onclick="openModalPost()" >Filtros</button>
            <a class="btn btn-success" href="<?= $baseRoute ?>/novo"><?= $addButtonText ?></a>
        </div>

    </div>

    <p>
        Postes localizados: <span id="postesCount">0</span>
    </p>

    <div class="d-flex justify-content-center mt-4">
        <div class="spinner-border text-success fade" role="status" id="spinner">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <div id="tableDiv" class="card p-4 fade" style="transition: 1s;">

    </div>

</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    const renderTableOptions = {
        urlFetch: window.location.href + '/search',
        tableDiv: document.getElementById('tableDiv'),
        theadElements: ['Latitude', 'Longitude', 'Localização','POP','Observação', 'ações'],
        tbodyElements: ['latitude', 'longitude','localizacao', 'pop','observacao', ['edit', 'delete']],
        searchField: document.getElementById('search'),
    }

    document.addEventListener('DOMContentLoaded', () => {
        advancedSearchEngine(renderTableOptions);
        console.log('teste');
    });

    const btnSearch = document.getElementById('searchBtn');

    btnSearch.addEventListener('click', () => {
        advancedSearchEngine(renderTableOptions);
    });
</script>

<?= $this->endSection() ?>
