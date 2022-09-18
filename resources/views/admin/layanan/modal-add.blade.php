<div class="modal fade" id="modal-add-layanan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header px-4">
                <h5 class="mb-0">Tambah Layanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body px-4">
                <form method="post" id="form-add-layanan" spellcheck="false">
                    <div class="mb-3">
                        <label class="col-form-label">Nama Layanan</label>
                        <input type="text" name="nama_layanan" id="nama_layanan" class="form-control" placeholder="Masukkan Nama Layanan">
                    </div>
                    <div class="mb-4">
                        <label class="col-form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" style="resize: none;" placeholder="Masukkan Deskripsi"></textarea>
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