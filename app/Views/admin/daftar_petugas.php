<div class="body flex-grow-1 px-3">
    <div class="container-lg">
        <div class="row">
            <button type="button" class="btn btn-primary mb-3" style="width: 200px" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                <i class="fa-solid fa-square-plus"></i> Tambah Petugas
            </button>
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
                                <th>Password</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($semua_petugas as $petugas): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $petugas['nama_lengkap'] ?></td>
                                <td><?= $petugas['email'] ?></td>
                                <td><?= $petugas['alamat'] ?></td>
                                <td><?= $petugas['no_telpon'] ?></td>
                                <td><?= $petugas['password'] ?></td>
                                <td><?= $petugas['role'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-success mr-2" id="btn-edit-petugas"
                                        data-bs-toggle="modal" data-bs-target="#editPetugas"
                                        data-id_role="<?= $petugas['id_role'] ?>"
                                        data-nama_lengkap="<?= $petugas['nama_lengkap'] ?>"
                                        data-email="<?= $petugas['email'] ?>" data-alamat="<?= $petugas['alamat'] ?>"
                                        data-no_telpon="<?= $petugas['no_telpon'] ?>"
                                        data-role="<?= $petugas['role'] ?>" data-password="<?= $petugas['password'] ?>">
                                        Edit</i>
                                    </button>
                                    <button type="button" class="btn btn-danger"
                                        onclick="hapusPetugas('<?= $petugas['id_role'] ?>', '<?= $petugas['nama_lengkap'] ?>')">
                                        Hapus</i>
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.row-->

        <!-- /.row-->
    </div>
</div>

<!-- Modal Tambah Kategori-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Petugas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url() ?>proses_tambah_petugas">
                    <div class="mb-3">
                        <label for="input" class="form-label">Role</label>
                        <input type="email" class="form-control" name="role" value="petugas" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama_lengkap">
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">No Telpon</label>
                        <input type="text" class="form-control" name="no_telpon">
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" name="alamat"></textarea>
                            <label for="floatingTextarea">Alamat</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Password</label>
                        <input type="text" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit Petugas-->
<div class="modal fade" id="editPetugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url() ?>proses_edit_petugas">
                    <input type="hidden" name="id_role" id="id_role">
                    <div class="mb-3">
                        <label for="input" class="form-label">Role</label>
                        <input type="email" class="form-control" name="role" id="role" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap">
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">No Telpon</label>
                        <input type="text" class="form-control" name="no_telpon" id="no_telpon">
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="alamat"
                                name="alamat"></textarea>
                            <label for="floatingTextarea">Alamat</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Password</label>
                        <input type="text" class="form-control" name="password" id="password">
                    </div>
                    <button type="submit" class="btn btn-success w-100">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap -->
<script src="<?= base_url() ?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>popper/popper.js"></script>

<!-- script jquery -->
<script src="<?= base_url() ?>js/jq.js"></script>

<!-- script datatables -->
<script src="<?= base_url() ?>DataTables/datatables.min.js"></script>

<!-- script sweeetalert -->
<script src="<?= base_url() ?>alert/alert.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css"> -->

<script>
$(document).ready(function() {
    $('#myTablekategori').DataTable();
});
</script>
<!-- script sweetalert -->
<script src="<?= base_url() ?>sweetalert/alert.js"></script>
<!-- script edit kategori buku -->
<script>
$(document).on('click', '#btn-edit-petugas', function() {
    $('.modal-body #id_role').val($(this).data('id_role'));
    $('.modal-body #nama_lengkap').val($(this).data('nama_lengkap'));
    $('.modal-body #alamat').val($(this).data('alamat'));
    $('.modal-body #email').val($(this).data('email'));
    $('.modal-body #no_telpon').val($(this).data('no_telpon'));
    $('.modal-body #role').val($(this).data('role'));
    $('.modal-body #password').val($(this).data('password'));
})
</script>
<!-- script hapus buku -->
<script>
function hapusPetugas(id_role, nama_lengkap) {
    Swal.fire({
        title: "Apa anda yakin?",
        text: "Data Petugas Dengan Nama : " + nama_lengkap + " ini akan terhapus!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya",
        cancelButtonText: "Batal"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '<?= base_url() ?>hapus_petugas/' + id_role;
        }
    });
}
</script>