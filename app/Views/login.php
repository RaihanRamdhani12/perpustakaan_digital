<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap 5 CSS -->
        <link rel="stylesheet" href="<?= base_url() ?>bootstrap/css/bootstrap.min.css">

        <!-- Fontawesome -->
        <link rel="stylesheet" href="<?= base_url() ?>fontawesome/css/all.min.css">

        <!-- Favicon -->
        <link rel="icon" href="<?= base_url() ?>img/logo2.png">

        <style>
        .footer {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
        }
        </style>
        <title>
            Login
        </title>
    </head>

    <body>
        <header class="p-2 bg-dark">
            <div class="container mb-5">
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
                    <div class="container">
                        <a class="navbar-brand" href="#">
                            <img src="<?= base_url() ?>img/logo2.png" width="70" height="70">
                        </a>
                        <a class="navbar-brand" href="#">Perpustakaan Online</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarMain">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="<?= base_url() ?>">Home</a>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </nav>
            </div>
        </header>

        <div class="container mt-4 mb-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mt-5 shadow-lg">
                        <!-- Menambahkan bayangan menggunakan shadow-lg -->
                        <div class="card-header text-center bg-primary text-white">
                            <!-- Mengubah warna latar belakang dan teks header -->
                            LOGIN
                        </div>
                        <div class="card-body">
                            <form class="container mt-5 m-lg-4" method="post"
                                action="<?= base_url() ?>proses_login_member">
                                <div class="row">
                                    <div class="col-md-8 mx-auto">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="email"
                                                aria-describedby="emailHelp" placeholder="Email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                placeholder="********">
                                        </div>
                                        <div class="mb-3">
                                            <label>Belum punya akun? <a
                                                    href="<?= base_url(); ?>/register">Daftar</a></label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="mt-5">
                <footer class="py-3 bg-primary">
                    <ul class="nav justify-content-center pb-3 mb-3 ">
                        <li class="nav-item"><a href="<?= base_url() ?>" class="nav-link px-2 text-white">Beranda</a>
                        </li>
                        <li class="nav-item"><a href="<?= base_url() ?>#tentang"
                                class="nav-link px-2 text-white">Tentang</a>
                        </li>
                    </ul>
                    <p class="text-center text-white">© 2024 Raihan Ramdhani (Rekayasa Perangkat Lunak)</p>
                </footer>
            </div>
        </div>

        <!-- jquery -->
        <script src="<?= base_url() ?>js/jq.js"></script>

        <!-- Sweet Alert -->
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
        <link rel="stylesheet" type="text/css"
            href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css"> -->
        <script src="<?= base_url() ?>alert/alert.js"></script>


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
        </script>

        <script>
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