<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title><?= $judul?></title>

        <!-- Normalize or reset CSS with your favorite library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

        <!-- Load paper.css for happy printing -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <!-- Set page size here: A5, A4 or A3 -->
        <!-- Set also "landscape" if you need -->
        <style>
        @page {
            size: A4
        }

        h3 {
            font-family: Arial
        }

        .tabelpresensi {
            border-collapse: collapse;
            width: 75%;
            margin: 0 auto;
            /* Center the table */
        }

        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            font-size: 12px;
            /* Ukuran font disetel menjadi 12px */
        }

        th {
            /* background-color: #f2f2f2; */
            background-color: #008000;
            text-align: center;
            color: #ffff;
        }

        .tglth {
            background-color: #f2f2f2;
        }

        .hth {
            background-color: #138808;
        }

        .ith {
            background-color: #09C2D1;
        }

        .sth {
            background-color: #EE0885;
        }

        .tth {
            background-color: #EECB08;
        }

        @media print {
            body {
                size: landscape A4;
            }

            .page {
                padding: 10mm;
            }

            /* Ubah menjadi .page:not(:first-child) jika tidak ingin halaman pertama memiliki padding */
            .page+.page {
                page-break-before: always;
            }
        }



        .table-group-divider td {
            border-top: 2px solid #ddd;
        }
        </style>
    </head>

    <!-- Set "A5", "A4" or "A3" for class name -->
    <!-- Set also "landscape" if you need -->

    <body class="A4 landscape">

        <!-- Each sheet element should have the class "sheet" -->
        <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
        <section class="page">

            <!-- HEAD -->
            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <!-- <img src="" alt=""> -->
                    </div>
                    <div class="col-8">
                        <h3 class="align-middle" align="middle">
                            <b>
                                LAPORAN PEMINJAMAN BUKU
                                <br>
                                PERIODE <?= strtoupper($nm_bulan[$bulan])?> <?= $tahun?>
                                <br>
                            </b>
                        </h3>
                    </div>
                </div>
            </div>

            <hr>

            <table class="tabelpresensi table-hover table-striped mt-5 mx-auto">
                <!-- Added mx-auto -->
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Sampul</th>
                        <th>Judul Buku</th>
                        <th>Status</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Tanggal Pinjam</th>
                    </tr>

                </thead>
                <tbody class="table-group-divider">
                    <?php
$no = 1;

if (empty($data_cetak)) {
    echo "
    <tr class='text-warning'>
    <h5 class='text-warning'>Data belum ada...</h5>
    </tr>";
} else {
foreach ($data_cetak as $data) {
    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><img src="<?= base_url() ?>buku/<?= $data['sampul_buku'] ?>" alt="" width="50"></td>
                        <td><?= $data['judul'] ?></td>
                        <td><span class="badge bg-danger"><?= $data['status_peminjaman'] ?></span></td>
                        <td><?= $data['nama_lengkap'] ?></td>
                        <td><?= $data['email'] ?></td>
                        <td><?= $data['tanggal_peminjaman'] ?></td>

                    </tr>
                    <?php } } ?>
                    <!-- Data selanjutnya -->
                </tbody>
            </table>
        </section>

        <script>
        window.print();
        </script>
    </body>

</html>