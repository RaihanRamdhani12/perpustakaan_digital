<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- bootsrap -->
        <link rel="stylesheet" href="<?= base_url() ?>bootstrap/css/bootstrap.min.css">

        <!-- Fontaswesome -->
        <link rel="stylesheet" href="<?= base_url() ?>fontawesome/css/all.min.css">

        <title>Register</title>
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

        <div class="container-lg mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h4 class="alert-heading" align="center">Peringatan</h4>
                        <hr>
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                    <?php endif; ?>
                    <div class="card shadow-lg">
                        <!-- Menambahkan bayangan menggunakan shadow-lg -->
                        <div class="card-header bg-primary text-white text-center">
                            <!-- Mengubah warna latar belakang dan teks header -->
                            Formulir Pendaftaran
                        </div>
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <form method="post" action="<?= base_url() ?>proses_register_member">
                                <div class="mb-3">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap"
                                        value="<?= old('email'); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin ( L / P )</label>
                                    <!-- Menyesuaikan id -->
                                    <input type="text" name="jenis_kelamin" class="form-control" id="jenis_kelamin"
                                        placeholder="L / P">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" id="alamat">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email">
                                </div>
                                <div class="mb-3">
                                    <label for="no_telpon" class="form-label">No Handphone</label>
                                    <input type="tel" name="no_telpon" class="form-control" id="no_telpon"
                                        placeholder="08******">
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" id="username">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                </div>
                                <div class="mb-3">
                                    <label>Sudah punya akun? <a href="<?= base_url(); ?>/login">Login</a></label>
                                </div>
                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <footer class="py-3 bg-primary mt-4">
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

        <!-- Script -->
        <!-- script popper -->
        <script src="<?= base_url() ?>popper/popper.js"></script>
        <script src="<?= base_url() ?>/bootstrap/js/bootstrap.min.js"></script>

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
            <?php if (session()->has("info")) { ?>
            Swal.fire({
                icon: 'info',
                title: 'Info',
                text: '<?= session("info") ?>'
            })
            <?php } ?>
        });
        </script>

        <script src="bootstrap/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
        <script src="bootstrap/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
    </body>

</html>