<div class="modal fade show" id="MultipleDelete" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-success">
            <div class="py-4 px-3 text-center">
                <i class="fas fa-check-circle ni-5x"></i>
                <h4 class="heading mt-4">Berhasil Menghapus Data</h4>
                <a onclick="window.location.reload()" type="button" class="btn btn-secondary text-dark mt-3">OK</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade show" id="EditKelulusan" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-success">
            <div class="py-4 px-3 text-center">
                <i class="fas fa-check-circle ni-5x"></i>
                <h4 class="heading mt-4">Berhasil Mengubah Status Siswa</h4>
                <a onclick="window.location.reload()" type="button" class="btn btn-secondary text-dark mt-3">OK</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade show" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">Peringatan</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-4 px-3 text-center">
                    <i class="fas fa-exclamation-triangle ni-4x mt-0 text-white"></i>
                    <h4 class="heading mt-4">Reset Data Kelulusan</h4>
                    <p>Data tersimpan dalam Data Alumni</p>
                </div>
            </div>
            <div class="modal-footer pb-0">
                <button type="button" class="btn btn-white" data-dismiss="modal">Kembali</button>
                <a id="btn-reset" true type="button" href="#" class="btn btn-link text-white ml-auto">Hapus</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade show" id="MinimalEditAlert" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
            <div class="py-4 px-3 text-center">
                <i class="fas fa-times ni-5x"></i>
                <h4 class="heading mt-4">Tidak Ada Data yang Diubah</h4>
                <p>Pilih minimal satu data</p>
                <button type="button" class="btn btn-secondary btn-white" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade show" id="MinimalAlert" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
            <div class="py-4 px-3 text-center">
                <i class="fas fa-times ni-5x"></i>
                <h4 class="heading mt-4">Tidak Ada Data yang Dihapus</h4>
                <p>Pilih minimal satu data</p>
                <button type="button" class="btn btn-secondary btn-white" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>

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
                <a id="btn-delete" true type="button" href="#" class="btn btn-link text-white ml-auto">Hapus</button>
            </div>
        </div>
    </div>
</div>