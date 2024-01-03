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
            <button class="btn btn-success" onclick="openModalOnu()" >Filtros</button>
            <a class="btn btn-success" href="<?= $baseRoute ?>/novo"><?= $addButtonText ?></a>
        </div>
        
    </div>

    <div id="tableDiv" class="collapsed p-4 justify-content card">
        
    </div>
</div>

<?= $this->endSection() ?>


<?= $this->section('script') ?>

<script>
    const renderTableOptions = {
        urlFetch: window.location.href + '/search',
        tableDiv: document.getElementById('tableDiv'),
        theadElements: ['Nome', 'Código', 'Porta', 'Parâmetros', 'ações'],
        tbodyElements: ['name', 'code', 'port', 'parameter', ['edit', 'delete']],
        searchField: document.getElementById('search'),
    }

    document.addEventListener('DOMContentLoaded', () => {
        advancedSearchEngine(renderTableOptions);
    });

</script>

<?= $this->endSection() ?>
