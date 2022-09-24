<div class="modal fade" id="modal-edit-pertanyaan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header px-4">
                <h5 class="mb-0">Ubah Pertanyaan</h5>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" data-bs-target="#modal-edit-pertanyaan"></button>
            </div>
            <div class="modal-body px-4">
                <form method="post" id="form-edit-pertanyaan" spellcheck="false">
                    <input type="hidden" id="id_pertanyaan_edit" name="id_pertanyaan_edit">
                    <div class="mb-3">
                        <label class="col-form-label" style="font-weight: 600;">No. urut <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="no_urut_edit" id="no_urut_edit">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" style="font-weight: 600;">Unsur <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="unsur_edit" id="unsur_edit">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" style="font-weight: 600;">Pertanyaan <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="pertanyaan_edit" name="pertanyaan_edit" placeholder="Masukkan Pertanyaan" rows="4" style="resize: none;"></textarea>
                    </div>

                    <div class="mb-3 div-jawaban">
                        <label class="col-form-label mb-2 label-jawaban" style="font-weight: 600;">Pilih Jawaban <span class="text-danger">*</span></label>
                        <div class="row">
                            @foreach ($jawabans_chunk as $i => $jawaban_chunk)
                                <div class="col-lg-6 col-xs-12 mb-4">
                                    @foreach($jawaban_chunk as $jawaban_edit)
                                        <div class="w-100">
                                            <div class="form-check mb-2">
                                                <input type="checkbox" name="edit_jawaban[]" value="{{$jawaban_edit->id}}" class="form-check-input jawaban" id="jawaban_edit_{{$jawaban_edit->id}}">
                                        <label class="form-check-label" for="jawaban_{{$jawaban_edit->id}}">{{ $jawaban_edit->kode }} - {{ $jawaban_edit->jawaban }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" data-bs-dismiss="modal" data-bs-target="#modal-edit-pertanyaan" class="btn btn-danger me-3">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>