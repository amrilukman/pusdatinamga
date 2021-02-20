<!-- Add Modal -->
<div class="modal fade" id="notifModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Permintaan Perubahan Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ml-2 mr-2">
                <div class="row align-items-center mb-3">
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                            <i class="ni ni-hat-3"></i>
                        </div>
                    </div>
                    <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0 text-sm">Amri Lukman Muzaki</h4>
                        </div>
                        <p class="text-sm mb-0">24060118140108</p>
                    </div>
                </div>
                <form>
                    <div class="form-group form-row mb-3 my-0">
                        <div class="col-6">
                            <div class="form-group my-0">
                                <label for="jenisPerubahan" class="form-control-label">Jenis Perubahan :</label>
                                <input class="form-control form-control-muted" type="numeric" id="nisn" value="NISN">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group my-0">
                                <label for="nama" class="form-control-label">Berubah Menjadi :</label>
                                <input class="form-control form-control-muted" type="text" id="nama" value="24060118140109">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-control-label" for="alamat">Catatan</label>
                        <textarea class="form-control form-control-muted" id="alamat" rows="3" placeholder="None"></textarea>
                    </div>
                    <div class="mb-0">
                        <label for="bukti" class="form-control-label">KTP/SIM/KK/Kartu Pelajar/Bukti Lainnya :</label>
                        <br><a id="bukti" href="#!" class="btn btn-icon text-white bg-success pl-3 pr-3" type="button">
                            <div class="media align-items-center">
                                <span class="btn-inner--icon"><i class="fas fa-file-download"></i></span>
                                <div class="media-body ml-0 d-lg-block">
                                    <span class="mb-0 text-sm pl-2 font-weight-bold">Download</span>
                                </div>
                            </div>
                        </a>
                        <span class="text-sm text-muted">Kartu Pelajar.pdf</span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="<?= base_url('operator/siswa/edit') ?>" class="btn btn-icon text-white pl-3 pr-3" type="button" style="background-color: #1174EF">
                    <div class="media align-items-center">
                        <div class="media-body ml-0 d-lg-block">
                            <span class="mb-0 text-sm pr-2 font-weight-bold text-white">Edit Data</span>
                        </div>
                        <span class="btn-inner--icon"><i class="fas fa-arrow-right"></i></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>