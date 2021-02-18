<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text"><strong>Success!</strong> Berhasil menambah data baru</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="form-group mb-3 my-0">
                        <label for="nisn" class="form-control-label">Judul Informasi :</label>
                        <input class="form-control" type="numeric" id="nisn" placeholder="Judul Informasi">
                    </div>
                    <div class="form-group mb-3 my-0">
                        <label for="nama" class="form-control-label">Link :</label>
                        <input class="form-control" type="text" id="nama" placeholder="https://exampel.com">
                    </div>
                    <div class="form-group mb-0">
                        <label class="form-control-label" for="alamat">Deskripsi</label>
                        <textarea class="form-control" id="alamat" rows="3" placeholder="Deskripsi"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" style="background-color: #1174EF">Tambah</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text"><strong>Success!</strong> Berhasil mengubah data</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="form-group mb-3 my-0">
                        <label for="nisn" class="form-control-label">Judul Informasi :</label>
                        <input class="form-control" type="numeric" id="nisn" placeholder="Judul Informasi" value="Jadwal Ujian AKhir Semester">
                    </div>
                    <div class="form-group mb-3 my-0">
                        <label for="nama" class="form-control-label">Link :</label>
                        <input class="form-control" type="text" id="nama" placeholder="https://exampel.com" value="https://google.drive.com">
                    </div>
                    <div class="form-group mb-0">
                        <label class="form-control-label" for="alamat">Deskripsi</label>
                        <?php $message = ("Tahun Ajaran 2021/2020"); ?>
                        <textarea class="form-control" id="alamat" rows="3" placeholder="Deskripsi"><?php echo htmlspecialchars($message); ?></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-warning">Edit</button>
            </div>
        </div>
    </div>
</div>