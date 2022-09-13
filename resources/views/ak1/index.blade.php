@extends('layouts.app')

@section('css')
<style>
    .nilai > div > label {
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid #999;
        width: 50px;
        height: 50px;
        cursor: pointer;
    }
    .nilai > .nilai-div:hover {
        background-color: #e7ebfc; 
    }
</style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0 card-title">AK1</h4>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" id="btn-isi-survey" data-bs-target="#modal-isi-survey">Isi Survey</button>
            
            {{-- Survey Question --}}
            @include('ak1.survey-question')
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="modal-isi-survey" aria-labelledby="modal-isi-survey" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header p-4">
                    <h5 class="mb-0 modal-title">Ajukan</h5>
                </div>
                <div class="modal-body p-4">
                    <form method="post" id="form-isi-survey">
                        <div class="mb-4">
                            <label for="" class="">Nama</label>
                            <input type="text" class="form-control" value="Contoh Nama">
                        </div>
                        <div class="mb-4">
                            <label for="" class="">Alamat</label>
                            <input type="text" class="form-control" value="Contoh alamat">
                        </div>
                        <div class="mb-4">
                            <label for="" class="">No. HP</label>
                            <input type="text" class="form-control" value="08320183028">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-danger me-3" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        const modal = new bootstrap.Modal('#modal-isi-survey');

        $('#form-isi-survey').on('submit', function(e) {
            e.preventDefault();

            modal.hide();

            $("#survey-question").prop('hidden', false);
            $('#btn-isi-survey').hide();

            // let nilaiKepuasan = $(`[name="nilai_kepuasan"]:checked`).val();
            // console.log(nilaiKepuasan)

        });  
        
        $('input[type=radio][name=nilai_kepuasan]').change(function() {
            $('div.nilai-div').removeClass('bg-primary text-white')
            $(this).parent('div').addClass('bg-primary text-white');
        });
    });
</script>
@endsection