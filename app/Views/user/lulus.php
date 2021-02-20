<!-- Add Modal -->
<div class="modal fade" id="lulusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informasi Kelulusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ml-2 mr-2 text-center">
                <div class="mb-5">
                    <h3 class="mb-0">Amri Lukman Muzaki</h3>
                    <small class="text-sm text-muted mb-0">24060118140108</small>
                </div>
                <div class="mb-5">
                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow mb-2" style="height:70px; width:70px">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <h2 class="text-uppercase ls-0">lulus</h2>
                </div>
                <div class="mb-4">
                    <a id="bukti" href="#!" class="btn btn-icon text-white bg-success pl-3 pr-3" type="button">
                        <div class="media align-items-center">
                            <span class="btn-inner--icon"><i class="fas fa-file-download"></i></span>
                            <div class="media-body ml-0 d-lg-block">
                                <span class="mb-0 text-sm pl-2 font-weight-bold">Download SK Kelulusan</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
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