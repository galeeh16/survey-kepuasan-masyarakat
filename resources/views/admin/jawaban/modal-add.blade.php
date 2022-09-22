<div class="modal fade" id="modal-add-jawaban">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header px-4">
                <h5 class="mb-0 modal-title">Tambah Jawaban</h5>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" data-bs-target="#modal-add-jawaban"></button>
            </div>
            <div class="modal-body px-4">
                <form method="post" id="form-add-jawaban" spellcheck="false">
                    <div class="mb-3">
                        <label class="col-form-label" style="font-weight: 600;">Kode <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="kode" id="kode">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" style="font-weight: 600;">Jawaban <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="jawaban" id="jawaban">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" style="font-weight: 600;">Nilai <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nilai" id="nilai">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" data-bs-dismiss="modal" data-bs-target="#modal-add-jawaban" class="btn btn-danger me-3">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>