<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap 5 CSS -->
        <link rel="stylesheet" href="<?= base_url() ?>bootstrap/css/bootstrap.min.css">

        <!-- Favicon -->
        <link rel="icon" href="<?= base_url() ?>img/logo2.png">

        <!-- FontAwesome -->
        <link rel="stylesheet" href="<?= base_url() ?>fontawesome/css/all.min.css">

        <style>
        a.link {
            text-decoration: none;
            color: black;
        }

        .footer {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
        }


        #scroll-btn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: rgb(27, 27, 27);
            color: white;
            cursor: pointer;
            padding: 11px 19px;
            border-radius: 100px;
        }
        </style>

        <title>Beranda</title>
    </head>

    <body>
        <header class="p-4 bg-dark">
            <div class="container">
                <nav class="navbar navbar-expand navbar-dark bg-primary fixed-top">
                    <div class="container">
                        <a class="navbar-brand" href="#">
                            <img src="<?= base_url() ?>img/logo2.png" width="50" height="50">
                        </a>
                        <a class="navbar-brand" href="#">Perpustakaan Online</a>
                        <div class="col-2 d-flex justify-content-end">
                        </div>
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
                                <?php if ($status_login == TRUE) {
                                echo
                                "<div class='nav-item dropdown'>
                                    <a class='nav-link dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>
                                        $nama_lengkap
                                    </a>
                                    <ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                                        <li><a class='dropdown-item' href='keluar'> <i class='fa-solid fa-right-from-bracket'></i> Logout</a></li>
                                    </ul>
                                </div>";
                            } else {
                                echo
                                "
                                    <li class='nav-item'>
                                        <a class='nav-link' href='login'>
                                            Masuk | Daftar
                                        </a>
                                    </li>
                                ";
                            }
                            ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <?php if ($jenis_kelamin == 'P'): ?>
                            <img src="<?= base_url() ?>img/P.png" alt="avatar" class="rounded-circle img-fluid"
                                style="width: 150px;">
                            <?php elseif ($jenis_kelamin == 'L'): ?>
                            <img src="<?= base_url() ?>img/L.png" alt="avatar" class="rounded-circle img-fluid"
                                style="width: 150px;">
                            <?php endif; ?>
                            <hr>
                            <h5 class="my-3"><?= $username ?></h5>
                            <a class="btn btn-warning" href="<?= base_url() ?>koleksi_buku"> Koleksi </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nama Lengkap</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $nama_lengkap ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $email ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nomor Handphone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $no_telpon ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"> Peminjaman</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <a href="<?= base_url() ?>riwayat_peminjaman" class="btn btn-success">Buku
                                            Dipinjam</a>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"> Pengembalian</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <a href="<?= base_url() ?>riwayat_pengembalian" class="btn btn-danger">Buku
                                            Dikembalikan</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <footer class="py-3 mt-5 bg-primary">
                <ul class="nav justify-content-center pb-3 mb-3 ">
                    <li class="nav-item"><a href="<?= base_url() ?>" class="nav-link px-2 text-white">Beranda</a></li>
                    <li class="nav-item"><a href="<?= base_url() ?>#tentang"
                            class="nav-link px-2 text-white">Tentang</a>
                    </li>
                </ul>
                <p class="text-center text-white">© 2024 Raihan Ramdhani (Rekayasa Perangkat Lunak)</p>
            </footer>
        </div>

        <!-- Script Button Up -->
        <script>
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("scroll-btn").style.display = "block";
            } else {
                document.getElementById("scroll-btn").style.display = "none";
            }
        }

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
        </script>

        <button onclick="topFunction()" id="scroll-btn" title="Top"><i class="fa-solid fa-angles-up"></i></button>

        <!-- jquery -->
        <script src="<?= base_url() ?>js/jq.js"></script>
        <!-- script popper -->
        <script src="<?= base_url() ?>popper/popper.js"></script>
        <!-- script bootsrap -->
        <script src="<?= base_url() ?>bootstrap/js/bootstrap.min.js"></script>
        <!-- script sweeetalert -->
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
        </script>

        <script>
        $(function() {
            <?php if (session()->has("error")) { ?>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '<?= session("error") ?>'
            })
            <?php } ?>
        });
        </script>
    </body>