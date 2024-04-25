<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- bootsrap -->
        <link rel="stylesheet" href="<?= base_url() ?>bootstrap/css/bootstrap.min.css">

        <!-- fontawesome -->
        <link rel="stylesheet" href="<?= base_url() ?>fontawesome/css/all.min.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?= base_url() ?>public/css/style.css">

        <!-- Favicon -->
        <link rel="icon" href="<?= base_url() ?>img/logo2.png">
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
        </style>
        <title>Koleksi Buku</title>
    </head>

    <body>
        <header class="p-4 bg-dark">
            <div class="container">
                <nav class="navbar navbar-expand navbar-dark bg-primary fixed-top text-white">
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
                                    <a class="nav-link active" aria-current="page" href="<?= base_url() ?>#">Home</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <div class="populer mt-5">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h1 align="center"><b>Koleksi Buku</b></h1>
                    </div>
                </div>
                <hr>
                <div
                    class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4 justify-content-center">
                    <?php if (empty($semua_koleksi_by_member)): ?>
                    <div class="card-body alert alert-danger text-center mt-5" role="alert">
                        <p class="text-center">Belum ada koleksi buku.</p>
                    </div>
                    <?php else: ?>
                    <?php foreach ($semua_koleksi_by_member as $koleksi_buku) : ?>
                    <div class="col">
                        <div class="card mb-3" style="border: none; background: ">
                            <a href="<?= base_url() ?>pinjam_buku/<?= $koleksi_buku['id_buku'] ?>">
                                <div class="img-card-produk mt-3 mb-3" style="max-height: 350px; overflow: hidden;">
                                    <img src="<?= base_url() ?>buku/<?= $koleksi_buku['sampul_buku'] ?>"
                                        class="card-img-top img-fluid" alt="course">
                                </div>
                            </a>
                            <div class="kategori mt-2">
                                <p class="text-center"><a class="a. link" href="#">Kategori :
                                        <?= $koleksi_buku['nama_kategori_buku'] ?></a>
                                </p>
                            </div>
                            <a class="text-center a. link"
                                href="<?= base_url() ?>pinjam_buku/<?= $koleksi_buku['id_buku'] ?>">Judul :
                                <?= $koleksi_buku['judul'] ?></a>

                            <div class="card-footer kategori mt-2">
                                <p class="text-center">
                                    <a class="btn btn-primary"
                                        href="<?= base_url() ?>pinjam_buku/<?= $koleksi_buku['id_buku'] ?>">Pinjam
                                    </a>
                                </p>
                                <p class="text-center">
                                    <a class="btn btn-danger"
                                        onclick="hapus_koleksi_buku('<?= $koleksi_buku['id_buku'] ?>', '<?= $koleksi_buku['judul'] ?>')">
                                        Hapus Koleksi
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                    <?php endif; ?>
                </div>

            </div>
        </div>

        <?php if (empty($semua_koleksi_by_member)): ?>
        <div class="footer">
            <footer class="py-3 mt-5 bg-primary">
                <ul class="nav justify-content-center pb-3 mb-3 ">
                    <li class="nav-item"><a href="<?= base_url() ?>" class="nav-link px-2 text-white">Beranda</a></li>
                    <li class="nav-item"><a href="<?= base_url() ?>#tentang"
                            class="nav-link px-2 text-white">Tentang</a></li>
                </ul>
                <p class="text-center text-white">© 2024 Raihan Ramdhani (Rekayasa Perangkat Lunak)</p>
            </footer>
        </div>
        <?php else: ?>
        <footer class="py-3 mt-5 bg-primary">
            <ul class="nav justify-content-center pb-3 mb-3 ">
                <li class="nav-item"><a href="<?= base_url() ?>" class="nav-link px-2 text-white">Beranda</a></li>
                <li class="nav-item"><a href="<?= base_url() ?>#tentang" class="nav-link px-2 text-white">Tentang</a>
                </li>
            </ul>
            <p class="text-center text-white">© 2024 Raihan Ramdhani (Rekayasa Perangkat Lunak)</p>
        </footer>
        <?php endif; ?>



        <!-- script sweeetalert -->
        <script src="<?= base_url() ?>alert/alert.js"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script> -->


        <script>
        function hapus_koleksi_buku(id_koleksi, judul_buku) {
            Swal.fire({
                title: "Apa anda yakin?",
                text: "Buku " + judul_buku + " ini akan terhapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '<?= base_url() ?>hapus_koleksi_buku/' + id_koleksi;
                }
            });
        }
        </script>

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
    </body>

</html>