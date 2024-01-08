<?= $this->extend('layout/index') ?>

<?= $this->section('content') ?>

<div>
    <h2><?= $tittle ?></h2>

    <div class="row card-2 py-3 my-3">
        <div class="col-md-8">
            <input type="text" id="search" class="form-control" placeholder="Buscar" style="background-color: transparent;">
        </div>
        <div class="col-md-4 btn-group">
            <button class="btn btn-success" id="searchBtn">Pesquisar</button>
            <button class="btn btn-success" id="accountFilter">Filtros</button>
            <a class="btn btn-success" href="<?= base_url("configuracoes/grupo-permissao") ?>">Criar Grupo de Permissões</a>
            <a class="btn btn-success" href="<?= $baseRoute ?>/novo"><?= $addButtonText ?></a>
        </div>
    </div>

    <!-- tabela gerada por script -->
    <div id="tableDiv"></div>

</div>
<?= $this->endSection() ?>


<?= $this->section('script') ?>

<script>
    const renderTableOptions = {
        urlFetch: window.location.href + '/search',
        tableDiv: document.getElementById('tableDiv'),
        theadElements: ['nome', 'email', 'telefone', 'Setor', 'ações'],
        tbodyElements: ['name', 'email', 'phone1', 'setor', ['edit', 'delete']],
        searchField: document.getElementById('search'),
    }

    document.addEventListener('DOMContentLoaded', () => {
        advancedSearchEngine(renderTableOptions);
    });

    const btnSearch = document.getElementById('searchBtn');

    btnSearch.addEventListener('click', () => {
        advancedSearchEngine(renderTableOptions);
    });
</script>

<?= $this->endSection() ?>