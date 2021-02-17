<div class="modal fade show" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">Peringatan</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="far fa-trash-alt ni-3x"></i>
                    <h4 class="heading mt-4">Data yang sudah dihapus tidak bisa dikembalikan</h4>
                    <p>Anda yakin ingin menghapus data ini ?</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Kembali</button>
                <button type="button" class="btn btn-link text-white ml-auto">Hapus</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade show" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-success">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="fas fa-check-circle ni-3x"></i>
                    <h4 class="heading mt-4">berhasil menambahkan data</h4>
                </div>
            </div>
            <div class="modal-footer">
                <a href="<?= base_url('/operator/alumni/list') ?>">
                    <button type="button" class="btn btn-white">Kembali</button>
                </a>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Tambah Lagi</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade show" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-success">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="fas fa-check-circle ni-3x"></i>
                    <h4 class="heading mt-4">berhasil mengubah data</h4>
                </div>
            </div>
            <div class="modal-footer">
                <a href="<?= base_url('/operator/alumni/list') ?>">
                    <button type="button" class="btn btn-white">Kembali</button>
                </a>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Tambah Lagi</button>
            </div>
        </div>
    </div>
</div>