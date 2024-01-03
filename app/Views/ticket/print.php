<?= $this->extend('layout/index') ?>

<?= $this->section('content') ?>

<div class="card p-4">

    <h2>
        <?= $tittle ?>
    </h2>

    <div class="row card-2 py-3 my-3">
        <div class="col-md-8">
            <h4>Adicionar Boletos em Lote</h4>
        </div>
        <div class="col-md-4 btn-group">
            <a class="btn btn-success" href="<?= $baseRoute ?>">Voltar</a>
            <button class="btn btn-success">Salvar</button>
        </div>
    </div>

    <form>


    <div class="row">
            
            <div class="mt-3 col-md-4">
                <label for="typo" class="form-label">POP</label>
                <select class="form-control select2" aria-label="Default select example">
                    <option selected>Selecione o local POP</option>
                    <option value="1">Caruaru</option>
                    <option value="2">Olinda</option>
                    <option value="2">Recife</option>
                    <option value="2">Surubim</option>
                    <option value="2">Garanhuns</option>
                </select>
            </div>
            <div class="mt-3 col-md-4">
                <label for="typo" class="form-label">Plano</label>
                <select class="form-control select2" aria-label="Default select example">
                    <option selected>Selecione o Plano</option>
                    <option value="1">100mb -</option>
                    <option value="2">50 mb</option>
                    <option value="3">1GB</option>
                    <option value="3">Rádio - 1GB</option>
                </select>
            </div>
            <div class="mt-3 col-md-4">
                <label for="typo" class="form-label">NAS</label>
                <select class="form-control select2" aria-label="Default select example">
                    <option selected>Selecione o NAS</option>
                    <option value="1">ACCEL-</option>
                    <option value="2">Indentificador 1 </option>
                    <option value="2">Indentificador 2 </option>
                    <option value="2">Indentificador 3 </option>
                </select>
            </div>

        </div>
        <div class="row">
            <div class="mt-3 col-md-12">
                <label for="typo" class="form-label">OLT</label>
                <select class="form-control select2" aria-label="selecione OLT">
                    <option selected>Selecione OLT</option>
                    <option value="1">OLT ZTE SIA - PE 172.16.12.1 SLOT1 - PON10</option>
                    <option value="2">OLT ZTE SIA - PE 172.16.12.1 SLOT1 - PON10</option>
                    <option value="3">OLT ZTE SIA - PE 172.16.12.1 SLOT1 - PON10</option>
                    <option value="4">OLT ZTE SIA - PE 172.16.12.1 SLOT1 - PON10</option>
                    <option value="5">OLT ZTE SIA - PE 172.16.12.1 SLOT1 - PON10</option>
                    <option value="6">OLT ZTE SIA - PE 172.16.12.1 SLOT1 - PON10</option>
                    <option value="7">OLT ZTE SIA - PE 172.16.12.1 SLOT1 - PON10</option>
                    <option value="8">OLT ZTE SIA - PE 172.16.12.1 SLOT1 - PON10</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="mt-3 col-md-6">
                <label for="typo" class="form-label">Portador</label>
                <select class="form-control select2" aria-label="Default select example">
                    <option selected>Selecione a Instituição</option>
                    <option value="1">Banco Bradesco</option>
                    <option value="2">Caixa Economica Federa</option>
                    <option value="3">Banco do Brasil</option>                    
                </select>
            </div>
            <div class="mt-3 col-md-6">
                <label for="typo" class="form-label">Vencimento</label>
                <select class="form-control select2" aria-label="Default select example">
                    <option selected>Selecione o Dia do Vencimento</option>
                    <option value="1">5</option>
                    <option value="1">10</option>
                    <option value="1">15</option>
                    <option value="1">20</option>
                    <option value="1">25</option>
                    <option value="1">30</option>
                </select>
            </div>

        </div>
        <div class="row">
            <div class="mt-3 col-md-4">
                <label for="typo" class="form-label">Status do Contrato</label>
                <select class="form-control select2" aria-label="status do contrato">
                    <option selected>----------</option>
                    <option value="1">Ativo</option>
                    <option value="2">Ativo B. Reduzida</option>
                    <option value="2">Suspenso</option>
                    <option value="2">Cancelado</option>
                    <option value="2">Inviabilidade Tec.</option>
                </select>
            </div>
            <div class="mt-3 col-md-4">
                <label for="typo" class="form-label">Gerado Por:</label>
                <select class="form-control select2" aria-label="status do contrato">
                    <option selected>----------</option>
                    <option value="1">SGP</option>
                    <option value="2">Tecnico</option>
                    <option value="3">Fabiana - Financeiro</option>
                    <option value="2">Eduarda - Financeiro</option>
                    <option value="2">Inviabilidade Tec.</option>
                </select>
            </div>
            <div class="mt-3 col-md-4">
                <label for="typo" class="form-label">Layout Página:</label>
                <select class="form-control select2" aria-label="status do contrato">
                    <option selected>----------</option>
                    <option value="1">11,4x22,9 Envelope</option>
                    <option value="2">A4 Paisagem</option>
                    <option value="3">A4 Retrato<option>
                    <option value="4">A3</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="mt-5 col-md-2 py-2 px-5 form-check">
                <label class="form-check-label" for="flexCheckDefault"></label>
                <input type="checkbox" class="form-check-input" name="" id="" checked> Imprimir protocolo
            </div>            
            <div class="mt-5 col-md-2 py-2 px-5 form-check">
                <label class="form-check-label" for="flexCheckDefault"></label>
                <input type="checkbox" class="form-check-input" name="" id="" checked> Somente Protocolo
            </div>            
            <div class="mt-5 col-md-2 py-2 px-5 form-check">
                <label class="form-check-label" for="flexCheckDefault"></label>
                <input type="checkbox" class="form-check-input" name="" id="" checked> Imprimir Capa
            </div>            
            <div class="mt-5 col-md-2 py-2 px-5 form-check">
                <label class="form-check-label" for="flexCheckDefault"></label>
                <input type="checkbox" class="form-check-input" name="" id="" checked> Somente Capa
            </div>
            <div class="mt-5 col-md-2 py-2 px-5 form-check">
                <label class="form-check-label" for="flexCheckDefault"></label>
                <input type="checkbox" class="form-check-input" name="" id="" checked> Imprimir separado
            </div>
        </div>





        <div class="row">
            <div class="mt-3 col-md-4">
                <label for="typo" class="form-label">Bairro</label>
                <input type="text" class="form-control" name="name" placeholder="">
            </div>
            <div class="mt-3 col-md-4">
                <label for="typo" class="form-label">Rua</label>
                <input type="text" class="form-control" name="name" placeholder="">
            </div>
            <div class="mt-3 col-md-4">
                <label for="typo" class="form-label">Condominio</label>
                <select class="form-control select2" aria-label="Default select example">
                    <option selected>---------</option>
                    <option value="1">Vog Ville - Caruaru</option>
                    <option value="2">Alpha Ville</option>
                    <option value="3">Cidade Jardim</option>
                    <option value="4">Cond. Baraúnas</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="mt-3 col-md-3">
                <label for="typo" class="form-label">Parcela</label>
                <input type="text" class="form-control" name="name" placeholder="">
            </div>
            <div class="mt-3 col-md-3">
                <label for="typo" class="form-label">Gerados a Partir de:</label>
                <input type="date" class="form-control" name="gerados" id="" >
            </div>
            <div class="mt-3 col-md-3">
                <label for="typo" class="form-label">Vencidos a Partir de:</label>
                <input type="date" class="form-control" name="gerados" id="" >
            </div>
            <div class="mt-3 col-md-3">
                <label for="typo" class="form-label">Modo de Geração</label>
                <select class="form-control select2" aria-label="Default select example">
                    <option selected>----------</option>
                    <option value="1">Todos</option>
                    <option value="2">Avulso</option>
                    <option value="3">Lote</option>                    
                </select>
            </div>
        </div>
        <div class="row">
            <div class="mt-5 col-md-3 py-2 px-5 form-check">
                <label for="name" class="form-label"></label>
                <input type="checkbox" name="" id=""> Imprimir Somente Títulos em Aberto ?
            </div>
            <div class="mt-3 col-md-9">
                <label for="typo" class="form-label">Formas de Entregas</label>
                <select class="form-control select2" aria-label="Default select example">
                    <option selected>----------</option>
                    <option value="1">Cartão</option>
                    <option value="2">Correiro</option>
                    <option value="3">E-mail</option>
                    <option value="4">SMS</option>
                </select>
            </div>
        </div>


    </form>
</div>
<?= $this->endSection() ?>