<?= $this->extend('layout/index') ?>

<?= $this->section('content') ?>

<div>
    <h2>
        <?= $tittle ?>
    </h2>

    <div class="row p-1 mb-4">
        <div class="col gradient-1 p-3">
            <div class="d-flex justify-content-around align-items-center h-100">
                <div class="d-flex">
                    <div class="d-flex flex-column justify-content-around">
                        <h5 class="mb-0 text-white">Clientes</h5>
                        <h1 class="me-2 mb-0 text-white" id="customerQty">0</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col gradient-2 p-3">
            <div class="d-flex justify-content-around align-items-center h-100">
                <div class="d-flex">
                    <div class="d-flex flex-column justify-content-around">
                        <h5 class="mb-0 text-white">Postes</h5>
                        <h1 class="me-2 mb-0 text-white" id="postQty">0</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="col gradient-3 p-3">
            <div class="d-flex justify-content-around align-items-center h-100">
                <div class="d-flex">
                    <div class="d-flex flex-column justify-content-around">
                        <h5 class="mb-0 text-white">Entrada</h5>
                        <h1 class="me-2 mb-0 text-white" id="withdrawValue">R$ 0.00</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col gradient-4 p-3">
            <div class="d-flex justify-content-around align-items-center h-100">
                <div class="d-flex">
                    <div class="d-flex flex-column justify-content-around">
                        <h5 class="mb-0 text-white">Notificações</h5>
                        <h1 class="me-2 mb-0 text-white" id="notifications">0</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4 card-2">
        <div class="col-md-8">
            <input type="text" name="search" id="search" class="form-control" placeholder="Buscar" style="background-color: transparent;">
        </div>
        <div class="col-md-4 btn-group">
            <button class="btn btn-success">Pesquisar</button>
            <button class="btn btn-success" onclick="openModalFilterPost()">Filtrar Endereço</button>

        </div>
    </div>


    <div class="row rounded m-0" id="map" style="height: 40vh">
    </div>
</div>


</div>
<!-- Conteudo Modal Filtro para postes -->
<div id='modalFilterPost' class="modal" tabindex="-1" style="backdrop-filter: blur(7px);">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Filtrar Postes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id='formFilter'>
                    <label for="uf" class="form-label">UF</label>
                    <select class="form-control form-select select2" name="uf" aria-label="Estado">
                        <option selected="">Selecione o Estado</option>
                        <option value="1">Pernambuco</option>
                        <option value="1">Paraíba</option>
                        <option value="1">Alagoas</option>
                        <option value="1">Bahia</option>
                        <option value="1">Piauí</option>
                        <option value="1">Natal</option>
                    </select>
                    <div class="mt-3 col">
                        <label for="cep" class="form-label">CEP</label>
                        <input type="number" class="form-control" id="cep" name="cep" placeholder="CEP">
                    </div>
                    <div class="mt-3 col">
                        <label for="address" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="andress" name="address" placeholder="Avenida/Rua">
                    </div>
                    <div class="mt-3 col">
                        <label for="city" class="form-label">Cidade</label>
                        <input type="text" class="form-control" id="text" name="text" placeholder="Cidade">
                    </div>
                    <div class="mt-3 col">
                        <label for="district" class="form-label">Bairro</label>
                        <input type="text" class="form-control" id="district" name="district" placeholder="Bairro">
                    </div>
                    <div class="mt-3 col">
                        <label for="numberHouse" class="form-label">Número</label>
                        <input type="number" class="form-control" id="numberHouse" name="numberHouse" placeholder="Número">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('script') ?>

<script>
    const openModalFilterPost = () => {
        const modalFilter = new bootstrap.Modal('#modalFilterPost', {
            keyboard: true,
        });

        modalFilter.show();
    }

    function initMap() {
        var mapOptions = {
            center: {
                lat: -9.719727,
                lng: -50.911177
            },
            zoom: 3,
            mapTypeId: google.maps.MapTypeId.SATELLITE
        };

        var map = new google.maps.Map(document.getElementById('map'), mapOptions);
        var markers = []; // Array para armazenar os marcadores

        function addDotMarker(position, active) {
            var marker = new google.maps.Marker({
                position: position,
                map: map,
                icon: {
                    path: google.maps.SymbolPath.CIRCLE,
                    scale: 7,
                    fillColor: active == "1" ? '#00FF00' : '#FF0000',
                    fillOpacity: 1,
                    strokeWeight: 0
                }
            });
            markers.push(marker); // Adicione o marcador ao array
        }

        fetch('<?= base_url('map/postes') ?>')
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    for (var i = 0; i < markers.length; i++) {
                        markers[i].setMap(null);
                    }

                    data.data.forEach(poste => {
                        addDotMarker({
                            lat: parseFloat(poste.latitude),
                            lng: parseFloat(poste.longitude)
                        }, poste.active);
                    });

                    var bounds = new google.maps.LatLngBounds();
                    for (var i = 0; i < markers.length; i++) {
                        bounds.extend(markers[i].getPosition());
                    }
                    map.fitBounds(bounds);
                }
            });
    }
    document.addEventListener('DOMContentLoaded', () => {
        initMap();
        renderInfoCards();
    });

    const renderInfoCards = () => {
        const customersCard = document.querySelector('#customerQty');
        const postCard = document.querySelector('#postQty');
        const withdrawCard = document.querySelector('#withdrawValue');
        const notificationsCard = document.querySelector('#notifications');

        fetch('<?= base_url('dashboard/info') ?>')
            .then(response => response.json())
            .then(data => {
                customersCard.innerHTML = data.customerQty;
                postCard.innerHTML = data.postQty;
                withdrawCard.innerHTML = data.withdrawValue;
                notificationsCard.innerHTML = data.notifications.length;
            });
    }
</script>



<?= $this->endSection() ?>