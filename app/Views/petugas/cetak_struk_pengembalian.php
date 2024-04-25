<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Struk</title>
        <link rel="shortcut icon" href="<?= base_url() ?>img/logo2" type="image/x-icon">
        <link rel="stylesheet" href="<?= base_url() ?>css/struk.css">
    </head>

    <body>
        <div class="invoice">
            <div class="invoice-content">
                <div class="invoice-header">
                    <div class="logo">
                        <img src="<?= base_url() ?>img/logo2.png" width="70" alt="">
                    </div>
                    <div class="invoice-no_order">
                        <span>Invoice number : </span>
                    </div>
                </div>

                <h4 style="text-align: center; color:#4d4d4d;">Bukti Transaksi</h4>

                <div class="invoice-body">
                    <table class="table-invoice">
                        <tr>
                            <th>Nama Lengkap</th>
                            <td><?= $nama_lengkap ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?= $email ?></td>
                        </tr>
                        <tr>
                            <th>Buku Dipinjam</th>
                            <td><?= $judul_buku ?></td>
                        </tr>
                    </table>

                    <table class="table-invoice">
                        <tr>
                            <th>Tanggal Pengembalian</th>
                            <td><?= $tanggal_pengembalian ?></td>
                        </tr>
                    </table>

                    <table class="tb_byr">
                        <tr>
                            <th class="tb_heading">Pengembalian</th>
                            <th class="tb_heading">Hari Keterlambatan</th>
                            <th class="tb_heading">Denda</th>
                        </tr>
                        <tr>
                            <td><?= $total_pengembalian ?> Buku</td>
                            <td><?= $hari_keterlambatan ?> Hari</td>
                            <td><?= $hari_keterlambatan ?> x 2000</td>
                        </tr>
                        <tr>
                            <th colspan="2" class="ub">Total</th>
                            <td class="ub-col"><?= $total_denda ?></td>
                        </tr>
                        <tr>
                            <th colspan="2" class="ub">Nominal Bayar</th>
                            <td class="ub-col"><?= $uang_dibayarkan ?></td>
                        </tr>
                        <tr>
                            <th colspan="2" class="ub">Uang kembali</th>
                            <td class="ub-col"><?= $uang_kembalian ?></td>
                        </tr>
                    </table>

                    <div class="ket">
                        <p><span>Keterangan : </span></p>
                    </div>

                    <div class="invoice-footer">
                        <h3 class="foot_logo"><span>Perpustakaan</span> Online</h3>
                        <p>Terima kasih telah .</p>
                    </div>

                </div>
            </div>

            <div class="printbtn" id="btnPrint">
                <img src="<?= base_url() ?>img/logocetak.png" width="48" alt="print icon">
                <span>Cetak Struk</span>
            </div>

            <a href="<?= base_url() ?>daftar_peminjam" class="btn-back">Kembali</a>
        </div>

        <script>
        let print = document.getElementById('btnPrint');
        print.addEventListener('click', function() {
            return window.print();
        });
        </script>
    </body>

</html>