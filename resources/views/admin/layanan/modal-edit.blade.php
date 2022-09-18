<div class="modal fade" id="modal-edit-layanan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header px-4">
                <h5 class="mb-0">Ubah Layanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body px-4">
                <form method="post" id="form-edit-layanan" spellcheck="false">
                    <input type="hidden" name="id_edit" id="id_edit">
                    <div class="mb-3">
                        <label class="col-form-label">Nama Layanan</label>
                        <input type="text" name="nama_layanan_edit" id="nama_layanan_edit" class="form-control" placeholder="Masukkan Nama Layanan">
                    </div>
                    <div class="mb-4">
                        <label class="col-form-label">Deskripsi</label>
                        <textarea name="deskripsi_edit" id="deskripsi_edit" class="form-control" rows="4" style="resize: none;" placeholder="Masukkan Deskripsi"></textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-danger me-2">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>