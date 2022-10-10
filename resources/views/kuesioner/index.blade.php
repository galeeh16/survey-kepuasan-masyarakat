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
    <input type="hidden" name="id_layanan" id="id_layanan" value="{{ $id_layanan }}">

    <div class="card">
        <div class="card-header">
            <h4 class="mb-0 card-title">{{ $namalayanan }}</h4>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" id="btn-isi-survey" data-bs-target="#modal-isi-survey">Isi Survey</button>
            
            {{-- Survey Question --}}
            @include('kuesioner.survey-question')
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="modal-isi-survey" aria-labelledby="modal-isi-survey" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header px-4">
                    <h5 class="mb-0 modal-title">Isi Data</h5>
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" data-bs-target="#modal-isi-survey"></button>
                </div>
                <div class="modal-body p-4">
                    <form method="post" id="form-isi-data" spellcheck="false">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
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
                            </div>
                            <div class="col-lg-6 col-sm-12">
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
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-2">
                            <button type="button" class="btn btn-danger me-3" data-bs-dismiss="modal" data-bs-target="#modal-isi-survey">Batal</button>
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
    function addKuesioner() {
        let respondenData = $('#form-isi-data').serialize();
        let kuesionerData = $('#form-isi-survey').serialize();
        
        $.ajax({
            url: "{{ url('kuesioner/add-kuesioner') }}",
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            beforeSend: function() {
                showLoading();
            },
            data: respondenData + '&' + kuesionerData + '&id_layanan=' + $('#id_layanan').val(),
            success: function(response) {
                alertSuccess(response.message);
                $('#form-isi-data')[0].reset();
                $('#form-isi-survey')[0].reset();
                $("#survey-question").prop('hidden', true);
                $('#btn-isi-survey').show();
            },
            error: function(xhr, stat, err) {
                swal.close();
                if (xhr.status == 500) {
                    alertError(); 
                }
            }
        });
    }

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
        
        // $('input[type=radio][name=nilai_kepuasan]').change(function() {
        //     $('div.nilai-div').removeClass('bg-primary text-white')
        //     $(this).parent('div').addClass('bg-primary text-white');
        // });

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
                if (element[0].name== 'nilai_kepuasan') {
                    error.insertAfter(element.parents('.d-flex.nilai'));
                } else if (element.hasClass('answer')) {
                    error.insertAfter(element.parents('.soal'));
                } else {
                    error.insertAfter(element);   
                }
            }
        });

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
                    minlength: 10,
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
            messages: {
                nama_lengkap: {
                    required: 'Harap isi nama lengkap',
                    minlength: 'Nama lengkap minimal 3 karakter',
                    maxlength: 'Nama lengkap minimal 50 karakter'
                },
                jenis_kelamin: {
                    required: 'Harap pilih jenis kelamin' 
                },
                nik: {
                    required: 'Harap isi nik',
                    digits: 'Harap isi nik dengan digit',
                    minlength: 'Nik minimal 16 karakter',
                    maxlength: 'Nik maksimal 16 karakter'
                },
                no_hp: {
                    required: 'Harap isi nomor handphone',
                    digits: 'Harap isi nomor handphone dengan digit',
                    minlength: 'Nomor handphone minimal 10 karakter',
                    maxlength: 'Nomor handphone maksimal 16 karakter'
                },
                pendidikan: {
                    required: 'Harap isi pendidikan',
                    maxlength: 'Pendidikan maksimal 100 karakter' 
                },
                pekerjaan: {
                    required: 'Harap isi pekerjaan',
                    maxlength: 'Pekerjaan maksimal 50 karakter'
                }
            }
        });

        $('#form-isi-survey').validate({
            submitHandler: function(form) {
                addKuesioner();
            },
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