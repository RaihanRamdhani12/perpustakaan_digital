<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $judul ?></title>
        <link rel="stylesheet" href="<?= base_url(); ?>bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>fontawesome/css/all.min.css">
        <style>
        .footer {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
        }
        </style>
    </head>

    <body>
        <header class="p-2 bg-dark">
            <div class="container mb-5">
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
                    <div class="container">
                        <a class="navbar-brand" href="#">
                            <img src="<?= base_url() ?>img/logo2.png" width="70" height="70">
                        </a>
                        <a class="navbar-brand" href="#">LOGIN ADMIN / PETUGAS</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarMain">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="<?= base_url() ?>#">Home</a>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </nav>
            </div>
        </header>
        <div class="container mt-6">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mt-5">
                        <div class="card-header text-center">
                            LOGIN ADMIN / PETUGAS
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?= base_url(); ?>/proses_login_petugas">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="mb-3">
                                    <p>ID : raihanramdhani229@gmail.com</p>
                                    <p>Password : 1 (ADMIN)</p>
                                    <p>Password : qwerty (PETUGAS)</p>
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer py-3 mt-5 bg-primary">
            <div class="container">
                <ul class="nav justify-content-center pb-3 mb-3 ">
                    <li class="nav-item"><a href="<?= base_url() ?>#" class="nav-link px-2 text-white">Beranda</a></li>
                    <li class="nav-item"><a href="<?= base_url() ?>#" class="nav-link px-2 text-white">Tentang</a></li>
                </ul>
                <p class="text-center text-white">© 2024 Raihan Ramdhani (Rekayasa Perangkat Lunak)</p>
            </div>
        </footer>

        <!-- script jquery -->
        <script src="<?= base_url() ?>js/jq.js"></script>
        <!-- sweet allert -->
        <script src="<?= base_url() ?>alert/alert.js"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
        <link rel="stylesheet" type="text/css"
            href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css"> -->

        <script>
        $(function() {
            <?php if (session()->has("success")) { ?>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '<?= session("success") ?>'
            })
            <?php } ?>
        });

        $(function() {
            <?php if (session()->has("error")) { ?>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '<?= session("error") ?>'
            })
            <?php } ?>
        });
        </script>
    </body>

</html>