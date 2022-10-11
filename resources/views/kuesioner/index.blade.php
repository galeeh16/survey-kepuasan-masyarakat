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
    #scroll-down {
        position: fixed;
        bottom: 40%;
        right: 50%;
        width: 40px;
        height: 40px;
        opacity: 1;
        z-index: 99999;
        /* color: #607D8B; */
        cursor: pointer;
        line-height: 45px;
        text-align: center;
        border-radius: 5px;
        background-color: transparent;
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

    <section id="scroll-down" title="Scroll Down">
        <svg width="45" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            
            <path fill-rule="evenodd" clip-rule="evenodd" d="M2 16.08V7.91C2 4.38 4.271 2 7.66 2H16.33C19.72 2 22 4.38 22 7.91V16.08C22 19.62 19.72 22 16.33 22H7.66C4.271 22 2 19.62 2 16.08ZM12.75 14.27V7.92C12.75 7.5 12.41 7.17 12 7.17C11.58 7.17 11.25 7.5 11.25 7.92V14.27L8.78 11.79C8.64 11.65 8.44 11.57 8.25 11.57C8.061 11.57 7.87 11.65 7.72 11.79C7.43 12.08 7.43 12.56 7.72 12.85L11.47 16.62C11.75 16.9 12.25 16.9 12.53 16.62L16.28 12.85C16.57 12.56 16.57 12.08 16.28 11.79C15.98 11.5 15.51 11.5 15.21 11.79L12.75 14.27Z" fill="currentColor"></path>                            
        </svg>                        
    </section>
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

        // $(window).scroll(function(){
		// 	if ($(this).scrollTop() > 100) {
		// 		$('#scroll-down').fadeIn();
		// 	} else {
		// 		$('#scroll-down').fadeOut();
		// 	}
		// });

		$('#scroll-down').click(function(){
            console.log($(document).height())
			$('html, body').animate({scrollTop : $(document).height()}, 350);
			return false;
		});

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