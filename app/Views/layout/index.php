<!doctype html>
<html lang="<?= esc($lang) ?>" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($tittle) ?></title>
    <link rel="icon" href="assets/imgs/logo.png" type="image/x-icon">
    <link href="<?= base_url('assets/css/bootstrap_5.3.min.css') ?>" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhZX90O1QnNedic9Z1XgY3P9HzA9AjbN4&libraries=places"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        :root {
            --border-radius: 16px;
            --border-color: rgba(255, 255, 255, 0.1)
        }

        body {
            background-image: linear-gradient(180deg, rgba(33, 37, 41, 0.01), rgba(33, 37, 41, 1) 85%),
                radial-gradient(ellipse at top left, rgba(25, 93, 168, 0.5), transparent 100%),
                radial-gradient(ellipse at top right, rgba(255, 228, 132, 0.5), transparent 50%),
                radial-gradient(ellipse at center left, rgba(151, 231, 255, 0.5), transparent 50%);

            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .hr {
            border: 1px solid var(--border-color);
        }

        .card {
            border-radius: var(--border-radius);
            border: none;
            background: rgba(10, 10, 10, 0.6);
        }

        .border {
            border-radius: var(--border-radius);
        }

        .gradient-1 {
            background: linear-gradient(to right, #ffbd59, #ff914d);
            margin: 0 5px;
            border-radius: var(--border-radius);
        }

        .gradient-2 {
            background: linear-gradient(to right, #00bf63, #7ed957);
            margin: 0 5px;
            border-radius: var(--border-radius);
        }

        .gradient-3 {
            background: linear-gradient(to right, #ff4e50, #f9d423);
            margin: 0 5px;
            border-radius: var(--border-radius);
        }

        .gradient-4 {
            background: linear-gradient(to right, #00aeef, #5271ff);
            margin: 0 5px;
            border-radius: var(--border-radius);
        }

        .table tr {
            background-color: transparent;
        }

        select {
            background: var(--border-color) !important;
        }

        #particles-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            /* Place particles behind other content */
        }

        #content {
            position: relative;
            z-index: 1;
        }

        /* Adicione estilos para um tema escuro */
        .select2-container--default .select2-selection--single,
        .select2-container--default .select2-selection--multiple {
            display: block;
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            height: calc(1.5em + .75rem + 2px);
            color: var(--bs-body-color);
            background-color: var(--bs-body-bg);
            background-clip: padding-box;
            border: var(--bs-border-width) solid var(--bs-border-color);
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: var(--bs-border-radius);
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out
        }

        /* Adicione estilos para as opções na lista suspensa */
        .select2-results__option {
            background-color: #282a2d;
            color: var(--bs-body-color);
        }

        /* Adicione estilos para o texto realçado durante a pesquisa */
        .select2-results__option--highlighted {
            background-color: #555;
            color: #fff;
        }

        .select2-search__field,
        .select2-search,
        .select2-search--dropdown {
            background-color: #282a2d;
            border: none;
        }

        .select2-search__field:focus {
            outline: none;
        }

        .select2-no-results {
            display: none !important;
        }

        @keyframes scaleAnimation {
            0% {
                transform: scale(1);
            }


            7% {
                transform: scaleX(0.99) scaleY(0.8);
            }

            20% {
                transform: scaleX(1.009) scaleY(1.2);
            }

            85% {
                transform: scaleX(1.009) scaleY(1.2);
            }

            100% {
                transform: scale(1);
            }
        }

        header.scaled {
            animation: scaleAnimation 3s;
        }

        .dropdown-item {
            cursor: pointer;
        }
    </style>
</head>

<body id="particles-js" class="bg-dark text-white">
    <div id="particles-container"></div>
    <div id="content" class='p-4'>
        <header class="card mb-4" style="transition: 1s ease-in-out;border-bottom: 2px solid transparent;">
            <nav class="d-flex flex-row p-2">
                <img src="<?= base_url('assets/imgs/logo.png') ?>" alt="logo" class="ms-3 nav-bar-items" style="height: 50px" id="logo-img">

                <div class="d-flex flex-row align-items-center" id="nav-bar-items" style="transition:0.3s;">
                    <?php foreach ($navigation_bar_items as $item) : ?>
                        <?php if ($item['show_subitems']) : ?>
                            <div class="nav-item mx-3 subitems">
                                <a class="nav-link dropdown-toggle text-white" href="<?= $item['href'] ?>" data-bs-toggle="dropdown">
                                    <?= $item['title'] ?>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark mt-4" style="background: rgba(10, 10, 10, 0.6); backdrop-filter: blur(7px); border-radius: 15px;">
                                    <?php foreach ($item['subitems'] as $subitem) : ?>
                                        <li class="m-3">
                                            <a class="dropdown-item text-white rounded" href="<?= $subitem['href'] ?>"><?= $subitem['title'] ?></a>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        <?php else : ?>
                            <div class="nav-item mx-4">
                                <a class="nav-link text-white" href="<?= $item['href'] ?>"><?= $item['title'] ?></a>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>
                <h3 id="nav-bar-toast-alert" class="d-none ms-4 mt-2 text-white" style="transition: 0.3s;">

                </h3>
            </nav>
        </header>

        <div>
            <?= $this->renderSection('content') ?>
        </div>
    </div>

    <div class="modal" id="generateBillModal" tabindex="1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="d-flex justify-content-center flex-column p-4">
                        <h4 class="text-center mb-4">
                            Criar Pagamento
                        </h4>

                        <!-- metodos de pagamento -->


                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/bootstrap_5.3.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/autoNumeric.js') ?>"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('.subitems').hover(function() {
            $(this).find('.dropdown-menu').first().stop(true, true).slideDown();

        }, function() {
            $(this).find('.dropdown-menu').first().stop(true, true).delay(200).slideUp();
        });

        const showToast = (message, type) => {
            const header = document.querySelector('header');
            header.classList.add('scaled');

            const borderColor = type === 'success' ? '#00bf63' : type === 'error' ? '#ff4e50' : type === 'warning' ? '#ffbd59' : '#00aeef';
            header.style.borderBottom = `2px solid ${borderColor}`;

            const navBarItems = document.querySelector('#nav-bar-items');
            navBarItems.style.opacity = '0';

            const toast = document.querySelector('#nav-bar-toast-alert');
            toast.style.opacity = '0';

            setTimeout(() => {

                navBarItems.classList.add('d-none');
                toast.classList.remove('d-none');
                toast.innerText = message;
                toast.style.opacity = '1';

                setTimeout(() => {
                    header.style.borderBottom = `2px solid transparent`;

                    toast.style.opacity = '0';
                    toast.addEventListener('transitionend', () => {
                        toast.classList.add('d-none');
                        navBarItems.classList.remove('d-none');
                        navBarItems.style.opacity = '1';
                        header.classList.remove('scaled');
                    });
                }, 3500);
            }, 600);

        }

        const showLoading = () => {
            const div = document.createElement('div');
            div.id = 'loading';
            div.classList.add('position-fixed', 'top-0', 'start-0', 'p-3', 'w-100', 'h-100', 'd-flex', 'justify-content-center', 'align-items-center', 'bg-transparent', 'fade', 'd-flex', 'justify-content-center', 'align-items-center', );
            div.style.zIndex = '10';
            div.style.backdropFilter = 'blur(7px)';
            div.style.transition = 'opacity 0.5s ease-in-out';

            const spinner = document.createElement('div');
            spinner.classList.add('spinner-grow', 'text-light');
            spinner.setAttribute('role', 'status');

            const span = document.createElement('span');
            span.classList.add('visually-hidden');
            span.innerText = 'Loading...';

            spinner.appendChild(span);
            div.appendChild(spinner);

            document.body.appendChild(div);

            setTimeout(() => {
                div.style.opacity = '1';
            }, 10);
        };

        const hideLoading = () => {
            const loadingDiv = document.querySelector('#loading');
            if (loadingDiv) {
                loadingDiv.style.opacity = '0';

                loadingDiv.addEventListener('transitionend', () => {
                    loadingDiv.remove();
                });
            }
        };

        const advancedSearchEngine = (options) => {
            const tableDiv = options.tableDiv;
            const theadElements = options.theadElements;
            const tbodyElements = options.tbodyElements;
            const searchField = options.searchField;
            const urlFetch = options.urlFetch;

            const data = {
                search: searchField.value
            }

            searchField.addEventListener('keyup', () => {
                data.search = searchField.value;
                renderTable();
            });

            showLoading();
            tableDiv.style.opacity = '0';

            tableDiv.innerHTML = '';
            tableDiv.classList.add('card', 'p-4')

            const registerCounter = document.createElement('div');
            registerCounter.classList.add('d-flex', 'flex-row', 'justify-content-between', 'align-items-center', 'mb-3');

            const registerCounterText = document.createElement('h5');
            registerCounterText.id = 'registerCounterText';

            registerCounter.appendChild(registerCounterText);

            tableDiv.appendChild(registerCounter);

            const table = document.createElement('table');
            table.classList.add('table');

            const thead = document.createElement('thead');

            const tr = document.createElement('tr');

            theadElements.forEach(element => {
                const th = document.createElement('th');
                th.classList.add('text-center');
                th.innerText = element;
                tr.appendChild(th);
            });

            thead.appendChild(tr);

            const tbody = document.createElement('tbody');
            table.appendChild(tbody);

            fetch(urlFetch, {
                    method: 'POST',
                    body: JSON.stringify(data),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    hideLoading();

                    if (data.status == 'success') {

                        const registerQuantity = data.data.length;

                        registerCounterText.innerText = `Foram encontrados ${registerQuantity} registros`;

                        data.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tbodyElements.forEach(element => {
                                const td = document.createElement('td');
                                td.classList.add('text-center');

                                if (Array.isArray(element)) {
                                    const dropdown = document.createElement('div');
                                    dropdown.classList.add('dropdown', 'dropstart', 'dropdown-dark', 'me-2');

                                    const dropdownButton = document.createElement('button');
                                    dropdownButton.classList.add('btn', 'btn-outline-secondary', 'dropdown-toggle', 'text-white');
                                    dropdownButton.setAttribute('type', 'button');
                                    dropdownButton.setAttribute('id', 'dropdownMenuButton1');
                                    dropdownButton.setAttribute('data-bs-toggle', 'dropdown');
                                    dropdownButton.setAttribute('aria-expanded', 'false');
                                    dropdownButton.innerText = 'Ações';

                                    const dropdownMenu = document.createElement('ul');
                                    dropdownMenu.style = "background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(7px); border-radius: 15px; border: 2px solid #198754;"
                                    dropdownMenu.classList.add('dropdown-menu', 'text-center', 'me-2');

                                    if (element.includes('edit')) {
                                        const editButton = document.createElement('li');
                                        editButton.classList.add('dropdown-item');
                                        editButton.addEventListener('click', () => {
                                            edit(row['id']);
                                        });
                                        editButton.innerText = 'Editar';

                                        dropdownMenu.appendChild(editButton);
                                    };


                                    if (element.includes('delete')) {
                                        const deleteButton = document.createElement('li');
                                        deleteButton.classList.add('dropdown-item');
                                        deleteButton.addEventListener('click', () => {
                                            deleteRegister(row['id']);
                                        });

                                        deleteButton.innerText = 'Excluir';

                                        dropdownMenu.appendChild(deleteButton);
                                    };

                                    if (element.includes('whatsapp')) {
                                        const numbersToWhatsapp = ['https://wa.me/message/5RGAMANRRVRCP1', 'https://wa.me/qr/UTHYIT5Y6NWCA1'];

                                        const whatsappButton = document.createElement('li');
                                        whatsappButton.classList.add('dropdown-item');

                                        const whatsappButtonLink = document.createElement('a');
                                        whatsappButtonLink.classList.add('text-white');
                                        whatsappButtonLink.setAttribute('href', numbersToWhatsapp[Math.floor(Math.random() * numbersToWhatsapp.length)]);
                                        whatsappButtonLink.setAttribute('target', '_blank');
                                        whatsappButtonLink.innerText = 'Whatsapp';

                                        whatsappButton.appendChild(whatsappButtonLink);
                                        dropdownMenu.appendChild(whatsappButton);
                                    }

                                    if (element.includes('generate_bill')) {
                                        const generateBillButton = document.createElement('li');
                                        generateBillButton.classList.add('dropdown-item');
                                        generateBillButton.addEventListener('click', () => {
                                            generateBill(row['id']);
                                        });
                                        generateBillButton.innerText = 'Gerar Pagamento';

                                        dropdownMenu.appendChild(generateBillButton);
                                    }

                                    if (element.includes('create_service_order')) {
                                        const createServiceOrderButton = document.createElement('li');
                                        createServiceOrderButton.classList.add('dropdown-item');
                                        createServiceOrderButton.addEventListener('click', () => {
                                            createServiceOrder(row['id']);
                                        });
                                        createServiceOrderButton.innerText = 'Criar Ordem de Serviço';

                                        dropdownMenu.appendChild(createServiceOrderButton);
                                    }

                                    dropdown.appendChild(dropdownButton);
                                    dropdown.appendChild(dropdownMenu);

                                    td.appendChild(dropdown);
                                } else if (element === 'active' || element === 'available') {
                                    const dot = document.createElement('div');
                                    dot.classList.add('rounded-circle', 'mx-auto');

                                    dot.style.width = '15px';
                                    dot.style.height = '15px';
                                    dot.style.backgroundColor = row[element] == 1 ? '#00bf63' : '#ff4e50';

                                    td.appendChild(dot);
                                } else if (element === 'price') {
                                    td.innerText = formatToBRL(row[element]);
                                } else {
                                    td.innerText = row[element];
                                }
                                tr.appendChild(td);
                            });

                            tbody.appendChild(tr);
                        });

                        table.appendChild(tbody);
                        tableDiv.appendChild(table);

                        setTimeout(() => {
                            tableDiv.style.opacity = '1';
                        }, 100);
                    } else {
                        showToast(data.message, 'error');
                    }
                })
                .catch(error => {
                    console.log(error);
                    showToast('Erro ao carregar dados da tabela', 'error');
                })

            table.appendChild(thead);
            tableDiv.appendChild(table);
        }

        const edit = (id) => {
            window.location.href = `<?= $baseRoute ?>/editar/${id}`;
        }
        const generateBill = (id) => {
            $('#generateBillModal').modal('show');
        }

        const createServiceOrder = (id) => {
            showToast('Função em desenvolvimento', 'warning');
        }

        const deleteRegister = (id) => {
            const url = `<?= $baseRoute ?>/delete`;
            const data = {
                id: id,
            }

            Swal.fire({
                title: "Você deseja mesmo apagar esse registro?",
                icon: 'question',
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: "Apagar",
                cancelButtonText: "Cancelar",
                
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    showLoading();

                    fetch(url, {
                            method: 'POST',
                            body: JSON.stringify(data),
                        }).then(response => response.json())
                        .then(data => {
                            hideLoading();
                            if (data.status === 'success') {
                                showToast(data.message, 'success');
                                setTimeout(() => {
                                    window.location.href = '<?= $baseRoute ?>';
                                }, 100);
                            } else {
                                showToast(data.message, 'error');
                            }
                        }).catch(error => {
                            console.log(error);
                        });
                }
            });


        }

        const formatToBRL = (value) => {
            const formatter = new Intl.NumberFormat('pt-BR', {
                style: 'currency',
                currency: 'BRL',
            });

            return formatter.format(value);
        }

        document.addEventListener('DOMContentLoaded', function() {
            particlesJS('particles-container', {
                particles: {
                    number: {
                        value: 80, // Adjust the number of particles
                        density: {
                            enable: true,
                            value_area: 800
                        }
                    },
                    color: {
                        value: '#3498db' // Blue color for particles
                    },
                    shape: {
                        type: 'circle',
                        stroke: {
                            width: 0,
                            color: '#3498db'
                        },
                        polygon: {
                            nb_sides: 5
                        }
                    },
                    opacity: {
                        value: 0.1,
                        random: true,
                        anim: {
                            enable: true,
                            speed: 1,
                            opacity_min: 0.1,
                            sync: false
                        }
                    },
                    size: {
                        value: 3,
                        random: true,
                        anim: {
                            enable: false,
                            speed: 40,
                            size_min: 0.1,
                            sync: false
                        }
                    },
                    line_linked: {
                        enable: true,
                        distance: 150,
                        color: '#3498db',
                        opacity: 0.1,
                        width: 1
                    },
                    move: {
                        enable: false,
                        speed: 0.15,
                        direction: 'none',
                        random: false,
                        straight: false,
                        out_mode: 'out',
                        bounce: false,
                        attract: {
                            enable: false,
                            rotateX: 600,
                            rotateY: 1200
                        }
                    }
                },
                interactivity: {
                    detect_on: 'canvas',
                    events: {
                        onhover: {
                            enable: false,
                            mode: 'grab'
                        },
                        onclick: {
                            enable: false,
                            mode: 'push'
                        },
                        resize: true
                    },
                    modes: {
                        grab: {
                            distance: 140,
                            line_linked: {
                                opacity: 1
                            }
                        },
                        bubble: {
                            distance: 400,
                            size: 40,
                            duration: 2,
                            opacity: 8,
                            speed: 3
                        },
                        repulse: {
                            distance: 200,
                            duration: 0.4
                        },
                        push: {
                            particles_nb: 4
                        },
                        remove: {
                            particles_nb: 2
                        }
                    }
                },
                retina_detect: true
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            $('.select2').select2({
                placeholder: 'Selecione uma opção',
                noResults: function() {
                    return 'Nenhum resultado encontrado';
                }
            });

            new AutoNumeric('.currency_auto_numeric', {
                currencySymbol: 'R$ ',
                decimalCharacter: ',',
                digitGroupSeparator: '.',
                decimalPlaces: 2,
                minimumValue: '0',
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

    <?= $this->renderSection('script') ?>
</body>

</html>