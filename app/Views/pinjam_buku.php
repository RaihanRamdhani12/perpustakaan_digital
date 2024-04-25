<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- bootsrap -->
        <link rel="stylesheet" href="<?= base_url() ?>bootstrap/css/bootstrap.min.css">

        <!-- FontAwesome -->
        <link rel="stylesheet" href="<?= base_url() ?>fontawesome/css/all.min.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?= base_url() ?>public/css/style.css">

        <!-- rateyo -->
        <link rel="stylesheet" href="<?= base_url() ?>rateyo/jquery.rateyo.min.css" />

        <!-- Favicon -->
        <link rel="icon" href="<?= base_url() ?>img/logo2.png">

        <title>Pinjam Buku</title>
    </head>

    <body>
        <header class="p-4 bg-dark">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
                    <div class="container">
                        <a class="navbar-brand" href="#">
                            <img src="<?= base_url() ?>img/logo2.png" width="50" height="50">
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
                    </div>
                </nav>
            </div>
        </header>

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mt-3">
                        <img src="<?= base_url() ?>buku/<?= $sampul_buku ?>" class="card-img-top" alt="...">
                        <form action="<?= base_url() ?>proses_tambah_koleksi" method="post">
                            <div class="card-body">

                                <h5 class="card-title" align="center"><b>Sinopsis</b></h5>
                                <p class="card-text"><i><?= $sinopsis ?></i></p>
                                <div class="d-flex justify-content-center">
                                    <input type="hidden" name="id_member" value="<?= $id_member?>">
                                    <input type="hidden" name="id_buku" value="<?= $id_buku?>">
                                    <input type="hidden" name="id_kategori_buku" value="<?= $id_kategori_buku?>">
                                </div>
                                <button type="submit" class="btn btn-warning">Tambah Koleksi </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-8">
                    <form>
                        <fieldset disabled>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label"><b>Judul</b></label>
                                <input type="text" id="disabledTextInput" class="form-control"
                                    placeholder="<?= $judul ?>">
                            </div>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label"><b>Penulis</b></label>
                                <input type="text" id="disabledTextInput" class="form-control"
                                    placeholder="<?= $penulis ?>">
                            </div>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label"><b>Penerbit</b></label>
                                <input type="text" id="disabledTextInput" class="form-control"
                                    placeholder="<?= $penerbit ?>">
                            </div>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label"><b>Tahun Terbit</b></label>
                                <input type="text" id="disabledTextInput" class="form-control"
                                    placeholder="<?= $tahun_terbit ?>">
                            </div>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label"><b>Kategori</b></label>
                                <input type="text" id="disabledTextInput" class="form-control"
                                    placeholder="<?= $nama_kategori_buku ?>">
                            </div>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label"><b>Stok</b></label>
                                <!-- Tambahkan kondisi untuk menampilkan pesan stok habis -->
                                <?php if ($stok == 0): ?>
                                <div class="alert alert-danger" role="alert">
                                    "Maaf Stok Buku Sudah Habis" </div>
                                <?php else: ?>
                                <input type="text" id="disabledTextInput" class="form-control"
                                    placeholder="<?= $stok ?>">
                                <?php endif; ?>
                            </div>
                        </fieldset>
                    </form>

                    </fieldset>
                    </form>
                    <form action="<?= base_url() ?>proses_ulasan" method="post">
                        <input type="hidden" name="id_member" value="<?= $id_member ?>">
                        <input type="hidden" name="id_buku" value="<?= $id_buku ?>">
                        <div class="form-floating mt-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                                name="ulasan"></textarea>
                            <label for="floatingTextarea" class="text-secondary">Berikan Ulasan</label>
                        </div>

                        <div id="rateYo" class="mt-2 mb-2" data-rateyo-rating="0" data-rateyo-num-stars="5"
                            data-rateyo-score="3"></div>
                        <span class="result mt-3">Rating: 0</span>
                        <input type="hidden" name="rating">
                        <button class="btn btn-success w-100 mt-3">Kirim</button>

                    </form>

                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <div class="mb-3">
                        <div class="card-header text-center mb-3">
                            <b>Ulasan</b>
                        </div>
                        <?php if (empty($semua_ulasan)): ?>
                        <!-- Jika tidak ada ulasan, tampilkan pesan bahwa tidak ada ulasan -->
                        <div class="card mb-3">
                            <input type="text" id="disabledTextInput" class="form-control mb-2"
                                placeholder="Tidak Ada Ulasan" readonly>
                        </div>
                        <?php else: ?>
                        <!-- Jika ada ulasan, tampilkan ulasan-ulasannya -->
                        <?php foreach($semua_ulasan as $ulasan): ?>
                        <div class="card mb-3">
                            <label for="disabledTextInput" class="form-label m-lg-2">
                                <span class="m-lg-2 mb-2"><b><i>"<?= $ulasan['username'] ?>"</i></b></span>
                                <div class="rating" data-rating="<?= $ulasan['rating'] ?>"
                                    id="rating-data<?= $ulasan['id_member'] ?>"></div>
                            </label>
                            <input type="text" id="disabledTextInput" class="form-control mb-2 "
                                placeholder="<?= $ulasan['ulasan']?>" readonly>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Tampilkan alert jika ada pesan kesalahan -->
            <?php if(session()->has('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->get('error') ?>
            </div>
            <?php endif; ?>

            <div class="card mt-5">
                <div class="card-header text-center mb-3">
                    <b>FORM PINJAM BUKU</b>
                </div>
                <form method="post" action="<?= base_url() ?>proses_pinjam_buku">
                    <input type="hidden" class="form-control" value="<?= $id_member ?>" name="id_member" readonly>
                    <input type="hidden" class="form-control" value="<?= $id_buku ?>" name="id_buku" readonly>
                    <div>
                        <div class="mb-3 m-lg-4">
                            <label for="exampleInputPassword1" class="form-label">Nama</label>
                            <input type="text" id="disabledTextInput" class="form-control" readonly
                                placeholder="<?= $nama_lengkap ?>">
                        </div>
                        <div class="mb-3 m-lg-4">
                            <label for="exampleInputPassword1" class="form-label">Email</label>
                            <input type="text" id="disabledTextInput" class="form-control" readonly
                                placeholder="<?= $email ?>">
                            </select>
                        </div>
                        <div class="mb-3 m-lg-4">
                            <label for="exampleInputPassword1" class="form-label">Tanggal Pinjam</label><span
                                clas></span>
                            <input type="date" class="form-control" value="<?= $tanggal_pinjam ?>"
                                id="tanggal_peminjaman" name="tanggal_peminjaman" readonly>
                        </div>
                        <div class="mb-3 m-lg-4">
                            <label for="exampleInputPassword1" class="form-label">Tanggal Pengembalian <span
                                    class="text-danger">* Wajib isi</span></label>
                            <input type="date" class="form-control" id="tanggal_pengembalian"
                                name="tanggal_pengembalian" required onchange="validasiTanggal()">
                        </div>
                        <div class="mb-3 m-lg-4">
                            <label for="exampleInputPassword1" class="form-label">Total Pinjam</label>
                            <input type="number" class="form-control" name="total_pinjam" required>
                        </div>
                        <div class="d-grid gap-2 m-lg-4">
                            <button class="btn btn-primary" type="submit">Pinjam Sekarang</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <footer class="py-3 mt-5 bg-primary ">
            <div class="container">
                <ul class="nav justify-content-center pb-3 mb-3">
                    <li class="nav-item"><a href="<?= base_url() ?>" class="nav-link px-2 text-white">Beranda</a></li>
                    <li class="nav-item"><a href="<?= base_url() ?>#tentang"
                            class="nav-link px-2 text-white">Tentang</a>
                    </li>
                </ul>
                <p class="text-center text-white">© 2024 Raihan Ramdhani (Rekayasa Perangkat Lunak)</p>
            </div>
        </footer>

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
            <?php if (session()->has("info")) { ?>
            Swal.fire({
                icon: 'info',
                title: 'Info',
                text: '<?= session("info") ?>'
            })
            <?php } ?>
        });
        </script>

        <!-- rateyo -->
        <script src="<?= base_url() ?>rateyo/jquery.rateyo.min.js"></script>
        <script>
        $(function() {
            $("#rateYo").rateYo({
                onChange: function(rating, rateYoInstance) {
                    $(this).parent().find('.result').text('Rating: ' + rating);
                    $(this).parent().find('input[name=rating]').val(rating);
                }
            });
        });
        </script>

        <script>
        $(function() {
            <?php foreach ($semua_ulasan as  $ulasan): ?>
            $("#rating-data<?= $ulasan['id_member'] ?>").rateYo({
                rating: <?= $ulasan['rating'] ?>,
                readOnly: true,
            });
            <?php endforeach; ?>
        });
        </script>

        <!-- script sweeetalert -->
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
            <?php if (session()->has("info")) { ?>
            Swal.fire({
                icon: 'info',
                title: 'Info',
                text: '<?= session("info") ?>'
            })
            <?php } ?>
        });
        </script>

        <script>
        function validasiTanggal() {
            var tanggal_peminjaman = new Date(document.getElementById("tanggal_peminjaman").value);
            var tanggalPengembalian = new Date(document.getElementById("tanggal_pengembalian").value);
            // Menghitung selisih hari
            var selisihHari = (tanggalPengembalian - tanggal_peminjaman) / (1000 * 3600 * 24);

            if (tanggal_peminjaman > tanggalPengembalian) {
                alert("Tanggal pengembalian tidak boleh kurang dari tanggal peminjaman.");
                // Atur tanggal pengembalian kembali ke tanggal peminjaman atau ambil tindakan lain sesuai kebutuhan.
                document.getElementById("tanggal_pengembalian").value = "";
            } else if (selisihHari > 7) {
                alert("Peminjaman buku dibatasi hingga 7 hari.");
                // Atur tanggal pengembalian kembali ke tanggal peminjaman atau ambil tindakan lain sesuai kebutuhan.
                document.getElementById("tanggal_pengembalian").value = "";
            }
        }
        </script>
    </body>

</html>