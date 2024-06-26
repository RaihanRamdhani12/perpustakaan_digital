<div class="body flex-grow-1 px-3">
    <div class="container-lg">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <table id="myTablekategori" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>No Telpon</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($semua_member as $member): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $member['nama_lengkap'] ?></td>
                                <td><?= $member['email'] ?></td>
                                <td><?= $member['alamat'] ?></td>
                                <td><?= $member['no_telpon'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- script bootsrap -->
<script src="<?= base_url() ?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>popper/popper.js"></script>
<!-- script jquery -->
<script src="<?= base_url() ?>js/jq.js"></script>
<!-- script datatables -->
<script src="<?= base_url() ?>DataTables/datatables.min.js"></script>
<!-- script sweetalert -->
<script src="<?= base_url() ?>alert/alert.js"></script>

<script>
$(document).ready(function() {
    $('#myTablekategori').DataTable();
});
</script>