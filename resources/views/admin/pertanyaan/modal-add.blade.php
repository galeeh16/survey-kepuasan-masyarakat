<div class="modal fade" id="modal-add-pertanyaan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header px-4">
                <h5 class="mb-0">Tambah Pertanyaan</h5>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" data-bs-target="#modal-add-pertanyaan"></button>
            </div>
            <div class="modal-body px-4">
                <form method="post" id="form-add-pertanyaan" spellcheck="false">
                    <div class="mb-3">
                        <label class="col-form-label" style="font-weight: 600;">No. urut <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="no_urut" id="no_urut">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" style="font-weight: 600;">Unsur <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="unsur" id="unsur">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" style="font-weight: 600;">Pertanyaan <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="pertanyaan" name="pertanyaan" placeholder="Masukkan Pertanyaan" rows="4" style="resize: none;"></textarea>
                    </div>

                    <div class="mb-3 div-jawaban">
                        <label class="col-form-label mb-2 label-jawaban" style="font-weight: 600;">Pilih Jawaban <span class="text-danger">*</span></label>
                        @php 
                            $total_bagi_dua = count($jawabans) / 2;
                        @endphp
                        @foreach ($jawabans as $i => $jawaban)
                            <div class="w-100">
                                @if($i <= $total_bagi_dua) 
                                    <div class="form-check mb-2">
                                        <input type="checkbox" name="jawaban[]" value="{{$jawaban->id}}" class="form-check-input jawaban" id="jawaban_{{$jawaban->id}}">
                                        <label class="form-check-label" for="jawaban_{{$jawaban->id}}">{{ $jawaban->kode }} - {{ $jawaban->jawaban }}</label>
                                    </div>
                                @else
                                    <div class="form-check mb-2">
                                        <input type="checkbox" name="jawaban[]" value="{{$jawaban->id}}" class="form-check-input jawaban" id="jawaban_{{$jawaban->id}}">
                                        <label class="form-check-label" for="jawaban_{{$jawaban->id}}">{{ $jawaban->kode }} - {{ $jawaban->jawaban }}</label>
                                    </div>
                                @endif
                            </div>
                        @endforeach

                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" data-bs-dismiss="modal" data-bs-target="#modal-add-pertanyaan" class="btn btn-danger me-3">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>