<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- bootsrap -->
        <link rel="stylesheet" href="<?= base_url() ?>bootstrap/css/bootstrap.min.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?= base_url() ?>public/css/style.css">

        <!-- Fontawesome -->
        <link rel="stylesheet" href="<?= base_url() ?>fontawesome/css/all.min.css">

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
                                    <a class="nav-link active" aria-current="page"
                                        href="<?= base_url() ?>profil_akun">Kembali</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <div class="container-lg" style="margin-top: 110px">
            <div class="row">
                <?php if (!empty($buku_dipinjam_by_member)): ?>
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Riwayat Peminjaman</h5>
                    </div>
                    <div class="card-body">
                        <table id="tablePeminjaman" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sampul Buku</th>
                                    <th>Judul</th>
                                    <th>Nama Kategori</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tenggat Pengembalian</th>
                                    <th>Total Pinjam</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($buku_dipinjam_by_member as $buku_dipinjam): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><img src="<?= base_url() ?>buku/<?= $buku_dipinjam['sampul_buku'] ?>"
                                            alt="sampul" width="50"></td>
                                    <td><?= $buku_dipinjam['judul'] ?></td>
                                    <td><?= $buku_dipinjam['nama_kategori_buku'] ?></td>
                                    <td><?= $buku_dipinjam['tanggal_peminjaman'] ?></td>
                                    <td><?= $buku_dipinjam['tanggal_pengembalian'] ?></td>
                                    <td><?= $buku_dipinjam['total_pinjam'] ?></td>
                                    <td><span class="badge bg-success"><?= $buku_dipinjam['status_peminjaman'] ?></span>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php else: ?>
                <div class="alert alert-info text-center mt-5" role="alert">
                    Anda belum meminjam buku.
                </div>
                <p></p>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <?php endif; ?>
            </div>
        </div>

        <footer class="py-3 mt-5 bg-primary">
            <ul class="nav justify-content-center pb-3 mb-3 ">
                <li class="nav-item"><a href="<?= base_url() ?>" class="nav-link px-2 text-white">Beranda</a></li>
                <li class="nav-item"><a href="<?= base_url() ?>#tentang" class="nav-link px-2 text-white">Tentang</a>
                </li>
            </ul>
            <p class="text-center text-white">© 2024 Raihan Ramdhani (Rekayasa Perangkat Lunak)</p>
        </footer>

        <!-- Jquery -->
        <script src="<?= base_url() ?>js/jq.js"></script>

        <!-- script sweeetalert -->
        <script src="<?= base_url() ?>alert/alert.js"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
        <link rel="stylesheet" type="text/css"
            href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css"> -->

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