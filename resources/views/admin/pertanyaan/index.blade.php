@extends('layouts.app-admin')

@section('css')
<style>
    label.error {
        font-weight: 500;
    }
</style>
@endsection

@section('title')
    Admin - Pertanyaan
@endsection

@section('content')
   <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Management Pertanyaan</h5>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modal-add-pertanyaan">Tambah Pertanyaan</button>

            <table id="table" class="table table-bordered table-hover" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="text-nowrap text-center" style="width: 50px;">No</th>
                        <th class="text-nowrap text-center">Pertanyaan</th>
                        <th class="text-nowrap text-center" style="width: 100px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div> 

@endsection

@section('modal')
    @include('admin.pertanyaan.modal-edit')
    @include('admin.pertanyaan.modal-add')
@endsection

@section('script')
<script>
    var table;
    var modalAddPertanyaan = new bootstrap.Modal(document.querySelector('#modal-add-pertanyaan'), {
        keyboard: true
    });
    var modalEditPertanyaan = new bootstrap.Modal(document.querySelector('#modal-edit-pertanyaan'), {
        keyboard: true
    });

    function addPertanyaan() {
        let dataForm = $('#form-add-pertanyaan').serialize();

        $.ajax({
            url: "{{ url('admin/pertanyaan') }}",
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            beforeSend: function() {
                showLoading();
            },
            data: dataForm,
            success: function(response) {
                alertSuccess(response.message);
                $('#form-add-pertanyaan')[0].reset();
                modalAddPertanyaan.hide();
                fetchData();
            },
            error: function(xhr, stat, err) {
                swal.close();
                if (xhr.status == 500) {
                    alertError(); 
                }
            }
        });
    }

    function getDataditPertanyaan(id) {
        $.ajax({
            url: "{{ url('admin/pertanyaan') }}" + '/' + id,
            type: 'get',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            beforeSend: function() {
                showLoading();
            },
            success: function(response) {
                swal.close();
                $('#pertanyaan_edit').val(response.pertanyaan.pertanyaan);
                $('#id_pertanyaan_edit').val(id);

                $('[name^="edit_jawaban"]').each(function() {
                    let value = parseInt($(this).val());
                    if (response.jawaban.includes(value)) {
                        $(this).prop('checked', true);
                    }
                });
                modalEditPertanyaan.show();
            },
            error: function(xhr, stat, err) {
                swal.close();
                if (xhr.status == 500) {
                    alertError(); 
                }
            }
        });
    }

    function updatePertanyaan() {
        let dataForm = $('#form-edit-pertanyaan').serialize();
        let id = $('#id_pertanyaan_edit').val();

        $.ajax({
            url: "{{ url('admin/pertanyaan') }}" + '/' + id,
            type: 'put',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            beforeSend: function() {
                showLoading();
            },
            data: dataForm,
            success: function(response) {
                alertSuccess(response.message);
                $('#form-edit-pertanyaan')[0].reset();
                modalEditPertanyaan.hide();
                fetchData();
            },
            error: function(xhr, stat, err) {
                swal.close();
                if (xhr.status == 500) {
                    alertError(); 
                }
            }
        });
    }

    function deletePertanyaan(id) {
        $.ajax({
            url: "{{ url('admin/pertanyaan') }}" + '/' + id,
            type: 'delete',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            beforeSend: function() {
                showLoading();
            },
            success: function(response) {
                alertSuccess(response.message);
                fetchData();
            },
            error: function(xhr, stat, err) {
                swal.close();
                if (xhr.status == 500) {
                    alertError(); 
                }
            }
        });
    }

    function fetchData() {
        table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            searching: false,
            deferRender: true,
            scrollX: true,
            ajax: {
                url : "{{ url('/admin/pertanyaan/get-list') }}",
                type: 'post',
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                data : function(d) {
                    return {
                        ...d,
                        page: parseInt( $('#table').DataTable().page.info().page + 1),
                        search: $('input[name=search]').val()
                    }
                }
            },
            columns: [
                {"data": "no", "orderable": false, class: "text-center", render: function (data, type, row, meta) {
	                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                {data: 'pertanyaan', class: 'text-nowrap'},
                {"data": "action", "orderable": false, class: "text-center", render: function (data, type, row, meta) {
                    return `
                        <div class="d-flex justify-content-center">
                            <button 
                                type="button" 
                                class="btn btn-sm btn-success btn-edit me-2 d-flex" 
                                data-id="${row.id}" 
                                data-pertanyaan="${row.pertanyaan}" 
                            >
                                Ubah
                            </button> 
                            <button 
                                type="button" 
                                class="btn btn-sm btn-danger btn-delete d-flex" 
                                data-id="${row.id}" 
                                data-pertanyaan="${row.pertanyaan}" 
                            >
                                Hapus
                            </button>
                        </div>    
                    `;
                    
                }},
            ],
            order: [[1, 'asc']],
        }).columns.adjust();

    }

    $(document).ready(function() {
        fetchData();

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
                 if (element.hasClass('jawaban')) {
                    error.insertBefore(element.parents('.div-jawaban'));
                } else {
                    error.insertAfter(element);   
                }
            }
        });

        $('#form-add-pertanyaan').validate({
            submitHandler: function(form) {
                addPertanyaan();
            },
            rules: {
                pertanyaan: {
                    required: true,
                    maxlength: 255
                },
            },
            messages: {
                pertanyaan: {
                    required: 'Harap isi pertanyaan.',
                    maxlength: 'Maksimal length 255.'
                },
            }
        });

        $('[name^="jawaban"]').each(function() {
            $(this).rules('add', {
                required: true,
                messages: {
                    required: "Harap pilih jawaban.",
                }
            });
        });

        $(document).on('click', '.btn-edit', function() {
            let id = $(this).data('id');
            getDataditPertanyaan(id);
        });


        $('#form-edit-pertanyaan').validate({
            submitHandler: function(form) {
                updatePertanyaan();
            },
            rules: {
                pertanyaan_edit: {
                    required: true,
                    maxlength: 255
                },
            },
            messages: {
                pertanyaan_edit: {
                    required: 'Harap isi pertanyaan.',
                    maxlength: 'Maksimal length 255.'
                },
            }
        });

        $('[name^="edit_jawaban"]').each(function() {
            $(this).rules('add', {
                required: true,
                messages: {
                    required: "Harap pilih jawaban.",
                }
            });
        });

        $(document).on('click', '.btn-delete', function() {
            let id = $(this).data('id');

            Swal.fire({
                title: '',
                text: 'Apakah anda yakin akang menghapus pertanyaan ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            })
            .then(result => {
                if (result.isConfirmed) {
                    deletePertanyaan(id);
                }
            })
            .catch(swal.noop);

        });
        
    });
</script>
@endsection