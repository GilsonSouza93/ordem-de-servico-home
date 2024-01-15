<?= $this->extend('layout/index') ?>

<?= $this->section('content') ?>

<div>
    <h2>
        <?= $tittle ?>
    </h2>
      


<!-- 
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
    </div> -->

    <div class="row mb-4 card-2">
        <div class="col-md-8">
            <input type="text" name="search" id="search" class="form-control" placeholder="Buscar" style="background-color: transparent;">
        </div>
        <div class="col-md-4 btn-group">
            <button class="btn btn-success">Pesquisar</button>
            <button class="btn btn-success" onclick="openModalFilterPost()">Filtrar Endereço</button>

        </div>
    </div>

    <div class="card p-4 d-flex flex-row justify-content-between mt-3">
        <h4>
            Clientes: <span class="badge bg-danger" id="clientes">
                0
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

    
    <!-- <div class="row rounded m-0" id="map" style="height: 40vh">
    </div> -->

    <div id='calendar' class="mt-5"></div>

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

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    initialDate: '2023-11-07',
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    events: [
      {
        title: 'All Day Event',
        start: '2023-11-01'
      },
      {
        title: 'Long Event',
        start: '2023-11-07',
        end: '2023-11-10'
      },
      {
        groupId: '999',
        title: 'Repeating Event',
        start: '2023-11-09T16:00:00'
      },
      {
        groupId: '999',
        title: 'Repeating Event',
        start: '2023-11-16T16:00:00'
      },
      {
        title: 'Conference',
        start: '2023-11-11',
        end: '2023-11-13'
      },
      {
        title: 'Meeting',
        start: '2023-11-12T10:30:00',
        end: '2023-11-12T12:30:00'
      },
      {
        title: 'Lunch',
        start: '2023-11-12T12:00:00'
      },
      {
        title: 'Meeting',
        start: '2023-11-12T14:30:00'
      },
      {
        title: 'Birthday Party',
        start: '2023-11-13T07:00:00'
      },
      {
        title: 'Click for Google',
        url: 'https://google.com/',
        start: '2023-11-28'
      }
    ]
  });

  calendar.render();
});
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
        info();
    });

    const info = () => {
        const customersCard = document.querySelector('#clientes');
        // const abertoCard = document.querySelector('#abertoQty');
        // const andamentoCard = document.querySelector('#andamentoQty');
        // const concluidosCard = document.querySelector('#concluidosQty');
        // const pendenteCard = document.querySelector('#pendenteQty');
        // const canceladosCard = document.querySelector('#canceladosQty');

        fetch('<?= base_url('dashboard/info') ?>')
            .then(response => response.json())
            .then(data => {
                customersCard.innerHTML = data.customerQty;
x
            });
    }


    const getDashboardData = async () => {
        const response = await fetch (indow.location.href + '/getDashboardData');
        console.log(response);
        const data = await response.json();

        if (data.status === 'success') {
            const {
                clientes,
                aberto,
                andamento,
                concluidos,
                pendente,
                cancelados
            } = data.data;

            document.getElementById('clientes').innerText = clientes;
            document.getElementById('aberto').innerText = abertos;
            document.getElementById('andamento').innerText = andamento;
            document.getElementById('concluidos').innerText = concluidos;
            document.getElementById('pendente').innerText = pendente;
            document.getElementById('cancelados').innerText = cancelados;
        }
    }


    // document.addEventListener('DOMContentLoaded', function() {
    //     var calendarEl = document.getElementById('calendar');
    //     var calendar = new FullCalendar.Calendar(calendarEl, {
    //       initialView: 'resourceTimelineWeek'
    //     });
    //     calendar.render();
    //   });
</script>



<?= $this->endSection() ?>