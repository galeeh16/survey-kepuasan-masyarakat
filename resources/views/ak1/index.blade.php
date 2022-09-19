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
    label.error {
        font-weight: 500;
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
                <div class="modal-header px-4">
                    <h5 class="mb-0 modal-title">Isi Data</h5>
                </div>
                <div class="modal-body p-4">
                    <form method="post" id="form-isi-data" spellcheck="false">
                        <div class="mb-3">
                            <label class="col-form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Masukkan Nama Lengkap" maxlength="50">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-select">
                                <option value="1">Laki - Laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">NIK</label>
                            <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukkan NIK" maxlength="16">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">No. HP</label>
                            <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Masukkan Nomor Handphone" maxlength="16">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Pendidikan</label>
                            <input type="text" name="pendidikan" id="pendidikan" class="form-control" placeholder="Masukkan Pendidikan" maxlength="100">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Pekerjaan</label>
                            <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" placeholder="Masukkan Pekerjaan" maxlength="50">
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

        // $('#form-isi-survey').on('submit', function(e) {
        //     e.preventDefault();

        //     modal.hide();

        //     $("#survey-question").prop('hidden', false);
        //     $('#btn-isi-survey').hide();

        //     // let nilaiKepuasan = $(`[name="nilai_kepuasan"]:checked`).val();
        //     // console.log(nilaiKepuasan)

        // });  
        
        $('input[type=radio][name=nilai_kepuasan]').change(function() {
            $('div.nilai-div').removeClass('bg-primary text-white')
            $(this).parent('div').addClass('bg-primary text-white');
        });

        $.validator.setDefaults({
            debug: true,
            ignore: [],
            highlight: function(element) {
                $(element).closest('.form-control').addClass('is-invalid');
                $(element).siblings('.select2-container').find('.select2-selection').addClass('is-invalid');
            },
            unhighlight: function(element) {
                $(element).closest('.form-control').removeClass('is-invalid');
                $(element).siblings('.select2-container').find('.select2-selection').removeClass('is-invalid');
            },
            errorPlacement: function(error, element) {
                // if (element.hasClass('select-dua') || element.hasClass('select2-without-search')) {
                //     error.insertAfter(element.siblings('.select2'));
                // } 

                if (element[0].name== 'nilai_kepuasan') {
                    error.insertAfter(element.parents('.d-flex.nilai'));
                } else if (element.hasClass('answer')) {
                    error.insertAfter(element.parents('.soal'));
                } else {
                    error.insertAfter(element);   
                }
                // console.log(element)
            }
        });

        $('#btn-isi-survey').hide();
                $("#survey-question").prop('hidden', false);

        $("#form-isi-data").validate({
            submitHandler: function(form) {
                modal.hide();
                $('#btn-isi-survey').hide();
                $("#survey-question").prop('hidden', false);
            },
            rules: {
                nama_lengkap: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                jenis_kelamin: {
                    required: true 
                },
                nik: {
                    required: true,
                    digits: true,
                    minlength: 16,
                    maxlength: 16
                },
                no_hp: {
                    required: true,
                    digits: true,
                    minlength: 11,
                    maxlength: 16
                },
                pendidikan: {
                    required: true,
                    maxlength: 100 
                },
                pekerjaan: {
                    required: true,
                    maxlength: 50
                }
            },
        });

        $('#form-isi-survey').validate({
            submitHandler: function(form) {
                console.log('sdsusdadsadsa');
            },
            rules: {
                nilai_kepuasan: {
                    required: true
                },
            },
            messages: {
                nilai_kepuasan: {
                    required: 'Harap isi nilai kepuasan.'
                },
                
            }
        });

        $('[name^="answers"]').each(function() {
            $(this).rules('add', {
                required: true,
                messages: {
                    required: "Harap pilih jawaban.",
                }
            });
        });


    });
</script>
@endsection