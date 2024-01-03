<?= $this->extend('layout/index') ?>

<?= $this->section('content') ?>

<div class="card p-4">

    <h2>
        <?= $tittle ?>
    </h2>


    <form id="form">
        <input type="hidden" name="id" id="id" value="<?= $register->id ?? '' ?>">
        <div class="row py-3 my-3">
            <div class="col-md-8">
            </div>
            <div class="col-md-4 btn-group">
                <a class="btn btn-success" href="<?= $baseRoute ?>">Voltar</a>
                <button class="btn btn-success" id="submit-btn">Salvar</button>
            </div>
        </div>

        <div class="row mb-4">
                <div class="form-floating col-md-10 ">
                    <input type="text" class="form-control" id="name" placeholder="Nome" name="name" required value="<?= $register->name ?? '' ?>">
                    <label for="name">Nome do Grupo</label>
                </div>
                <div class="form-check form-switch mt-2 col-md-2">
                    <input class="form-check-input" type="checkbox" role="switch" id="admin" name="admin">
                    <label class="form-check-label" for="admin">Todas as permissões (Admin)</label>
                </div>
        </div>

        <div class="row " style="height: 300px;">
            <div class="col border m-3 ">
                <div class="d-flex">
                    <div class="d-flex flex-column justify-content-around">
                        <h5 class="m-4 text-white">Clientes</h5>
                        <div class="ms-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="AddCustomer" <?= (isset($register) and $register->AddCustomer == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="AddCustumer">Adicionar Clientes</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="consultCustomer" <?= (isset($register) and $register->consultCustomer == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="consultCustomer">Consultar Clientes</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="deleteCustomer" <?= (isset($register) and $register->deleteCustomer == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="deleteCustomer">Excluir Clientes</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="editCostumer" <?= (isset($register) and $register->editCostumer == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="editCostumer">Editar Clientes</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="all_costumer" name="all_costumer" <?= (isset($register) and $register->all_costumer == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="all_costumer">Todas as permissões de Clientes</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col border m-3 ">
                <div class="d-flex">
                    <div class="d-flex flex-column justify-content-around">
                        <h5 class="m-4 text-white">Administrativo</h5>
                        <div class="ms-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="createContract" <?= (isset($register) and $register->createContract == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="createContract">Criar Contrato</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="editContract" <?= (isset($register) and $register->editContract == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="editContract">Editar Contrato</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="SeeReports" <?= (isset($register) and $register->SeeReports == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="SeeReports">Ver Relatórios</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="all_administrative" name="all_administrative" <?= (isset($register) and $register->all_administrative == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="all_administrative">Todas as permissões de Administrativo</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col border m-3 ">
                <div class="d-flex">
                    <div class="d-flex flex-column justify-content-around">
                        <h5 class="m-4 text-white">Suporte</h5>
                        <div class="ms-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="consultCTO" <?= (isset($register) and $register->consultCTO == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="consultCTO">Consultar CTO's</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="addCTO" <?= (isset($register) and $register->addCTO == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="addCTO">Adicionar CTO</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="deleteCTO" <?= (isset($register) and $register->deleteCTO == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="deleteCTO">Excluir CTO</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="all_support" name="all_support" <?= (isset($register) and $register->all_support == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="all_support">Todas as permissões de Suporte</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col border m-3 ">
                <div class="d-flex">
                    <div class="d-flex flex-column justify-content-around">
                        <h5 class="m-4 text-white">Financeiro</h5>
                        <div class="ms-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="addPay" <?= (isset($register) and $register->addPay == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="addPay">Adicionar conta a
                                    pagar</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="issueDRE" <?= (isset($register) and $register->issueDRE == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="issueDRE">Emitir DRE</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="issueNf" <?= (isset($register) and $register->issueNf == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="issueNf">Emitir nota fiscal</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="issueTicket" <?= (isset($register) and $register->issueTicket == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="issueTicket">Emitir boleto</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="deleteTicket" <?= (isset($register) and $register->deleteTicket == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="deleteTicket">Excluir boleto</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="all_financial" name="all_financial" <?= (isset($register) and $register->all_financial == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="all_financial">Todas as permissões de Financeiro</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row " style="height: 300px;">
            <div class="col border m-3 ">
                <div class="d-flex">
                    <div class="d-flex flex-column justify-content-around">
                        <h5 class="m-4 text-white">Frota</h5>
                        <div class="ms-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="consultMap" <?= (isset($register) and $register->consultMap == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="consultMap">Consultar mapa</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="addVehicle" <?= (isset($register) and $register->addVehicle == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="addVehicle">Adicionar veiculo a
                                    rota</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="deleteVehicle" <?= (isset($register) and $register->deleteVehicle == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="deleteVehicle">Excluir veiculo a
                                    rota</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="all_fleet" name="all_fleet" <?= (isset($register) and $register->all_fleet == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="all_fleet">Todas as permissões de Frota</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col border m-3 ">
                <div class="d-flex">
                    <div class="d-flex flex-column justify-content-around">
                        <h5 class="m-4 text-white">Estoque</h5>
                        <div class="ms-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="addProduct" <?= (isset($register) and $register->addProduct == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="addProduct">Adicionar produto</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="editProduct" <?= (isset($register) and $register->editProduct == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="editProduct">Editar protudo</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="consultStock" <?= (isset($register) and $register->consultStock == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="consultStock">Consultar estoque</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="all_stock" name="all_stock" <?= (isset($register) and $register->all_stock == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="all_stock">Todas as permissões de Estoque</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col border m-3 ">
                <div class="d-flex">
                    <div class="d-flex flex-column justify-content-around">
                        <h5 class="m-4 text-white">Gerencial</h5>
                        <div class="ms-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="manage_email" name="manage_email" <?= (isset($register) and $register->manage_email == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="manage_email">Gerenciar E-mails</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="manage_pop" name="manage_pop" <?= (isset($register) and $register->manage_pop == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="manage_pop">Gerenciar POPS</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="manage_sms" name="manage_sms" <?= (isset($register) and $register->manage_sms == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="manage_sms">Gerenciar SMS</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="manage_vehicle" name="manage_vehicle" <?= (isset($register) and $register->manage_vehicle == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="manage_vehicle">Gerenciar Veículos</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="manage_all" name="manage_all" <?= (isset($register) and $register->manage_all == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="manage_all">Todas as Permissões de Gerencial</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col border m-3 ">
                <div class="d-flex">
                    <div class="d-flex flex-column justify-content-around">
                        <h5 class="m-4 text-white">Configuração</h5>
                        <div class="ms-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="addCount" <?= (isset($register) and $register->addCount == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="addCount">Adicionar conta</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="editCount" <?= (isset($register) and $register->editCount == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="editCount">Editar conta </label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="deleteCount" <?= (isset($register) and $register->deleteCount == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="deleteCount">Excluir conta</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="all_settings" name="all_settings" <?= (isset($register) and $register->all_settings == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="all_settings" >Todas as permissões de Configurações</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

</form>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script>
    const submitBtn = document.querySelector('#submit-btn');
    const form = document.querySelector('form');
    const url = '<?= $baseRoute ?>/save';

    submitBtn.addEventListener('click', event => {
        event.preventDefault();
        showLoading();

        const formData = new FormData(form);

        fetch(url, {
                method: 'POST',
                body: formData
            }).then(response => response.json())
            .then(data => {
                hideLoading();
                if (data.error) {
                    showToast(data.message, 'error');
                } else {
                    showToast(data.message, 'success');
                      window.location.href = '<?= $baseRoute ?>';
                }
            }).catch(error => {
                console.log(error);
            });
    });
</script>

<?= $this->endSection() ?>