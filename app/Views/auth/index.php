<!doctype html>
<html lang="<?= esc($lang) ?>" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= esc($tittle) ?>
    </title>
    <link href="<?= base_url('assets/css/bootstrap_5.3.min.css') ?>" rel="stylesheet">
    <style>
        :root {
            --border-radius: 15px;
            --bs-body-bg-rgb: 0, 0, 0;
            --bs-body-bg-rgb: 33, 37, 41;
            --bs-primary-rgb: 13, 110, 253;
            --bd-accent-rgb: 255, 228, 132;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
            --bd-pink-rgb: 214, 51, 132;
        }

        body {
            background-image: linear-gradient(180deg, rgba(var(--bs-body-bg-rgb), 0.01), rgba(var(--bs-body-bg-rgb), 1) 85%), radial-gradient(ellipse at top left, rgba(var(--bs-primary-rgb), 0.5), transparent 50%), radial-gradient(ellipse at top right, rgba(var(--bd-accent-rgb), 0.5), transparent 50%), radial-gradient(ellipse at center right, rgba(var(--bd-violet-rgb), 0.5), transparent 50%), radial-gradient(ellipse at center left, rgba(var(--bd-pink-rgb), 0.5), transparent 50%);

            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        input {
            border: 1px solid #fff;
            background: transparent;
            border: none;
            border-bottom: 1px solid #fff;
            width: 100%;
            text-align: center;
        }

        form>* {
            margin-bottom: 2.5rem;
        }

        input::placeholder {
            text-align: center;
            color: #fff;
        }

        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 30px rgba(255, 255, 255, 0) inset;
            -webkit-text-fill-color: #fff;
            transition: background-color 5000s ease-in-out 0s;
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form id="form" style="            border-radius: var(--border-radius);
            background: rgba(50, 50, 50, 0.4);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(33, 37, 41, 0.2); opacity: 0" class="p-5">
            <div class="d-flex justify-content-center">
                <img src="<?= base_url('assets/imgs/logo.png') ?>" alt="logo" style="height: 75px;">
            </div>

            <input type="email" id="email" required placeholder="Email">

            <input type="password" id="password" required placeholder="Senha">

            <div class="d-flex justify-content-center mt-2">
                <button type="submit" class="btn btn-outline-light px-5">Entrar</button>
            </div>
        </form>
    </div>

    <script src="<?= base_url('assets/js/bootstrap_5.3.bundle.min.js') ?>"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        const createToast = (borderColor, message) => {
            const div = document.createElement('div');
            div.classList.add('position-fixed', 'bottom-0', 'start-0', 'p-3');

            const toast = document.createElement('div');
            toast.classList.add('toast', 'card', 'text-white', 'p-1', 'fs-6', 'w-100', 'bg-transparent');
            toast.style.borderLeft = `3px solid ${borderColor}`;
            toast.style.backdropFilter = 'blur(7px)';

            const toastBody = document.createElement('div');
            toastBody.classList.add('toast-body', 'text-white');

            toastBody.innerText = message;

            toast.appendChild(toastBody);
            div.appendChild(toast);

            document.body.appendChild(div);
        }

        const showToast = (message, type) => {
            $('.toast').remove();

            const borderColor = type === 'success' ? '#00bf63' : type === 'error' ? '#ff4e50' : type === 'warning' ? '#ffbd59' : '#00aeef';
            createToast(borderColor, message);

            $('.toast').toast({
                animation: true,
                autohide: true,
                delay: 5000
            });

            $('.toast').toast('show');
        }

        const showLoading = () => {
            const div = document.createElement('div');
            div.id = 'loading';
            div.classList.add('position-fixed', 'top-0', 'start-0', 'p-3', 'w-100', 'h-100', 'd-flex', 'justify-content-center', 'align-items-center', 'bg-transparent', 'fade');
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

        const showForm = () => {
            const form = document.querySelector('#form');

            form.style.transition = 'opacity 0.9s ease-in-out';
            form.style.opacity = '1';
        }

        const hideForm = () => {
            const form = document.querySelector('#form');

            form.style.transition = 'opacity 0.9s ease-in-out';
            form.style.opacity = '0';
        }
    </script>

    <script>
        $(document).ready(function() {

            showForm();

            setTimeout(function() {
                $('#email').removeAttr('disabled');
                $('#password').removeAttr('disabled');
            }, 300);

            $('#form').submit(function(e) {
                e.preventDefault();

                const email = $('#email').val();
                const password = $('#password').val();

                $.ajax({
                    url: '<?= base_url('login') ?>',
                    type: 'POST',
                    data: {
                        email: email,
                        password: password
                    },
                    beforeSend: function() {
                        showLoading();
                    },

                    success: function(result) {
                        hideLoading();

                        if (result.status == '200') {
                            setTimeout(function() {
                                window.location.href = '<?= base_url('dashboard') ?>';
                            }, 800);

                            hideForm();
                        } else {
                            showToast(result.message, 'error');
                        }
                    },
                    error: function() {
                        hideLoading();
                        showToast('Erro ao realizar login', 'error');
                    }
                });
            });
        });
    </script>
</body>

</html>