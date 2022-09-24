@extends('layouts.app-admin')

@section('title')
    Admin - Jawaban 
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Management Jawaban</h5>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modal-add-jawaban">Tambah Jawaban</button>

            <table id="table" class="table table-bordered table-hover" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="text-nowrap text-center" style="width: 50px;">No</th>
                        <th class="text-nowrap text-center">Kode</th>
                        <th class="text-nowrap text-center">Jawaban</th>
                        <th class="text-nowrap text-center">Nilai</th>
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
    @include('admin.jawaban.modal-add')
    @include('admin.jawaban.modal-edit')
@endsection

@section('script')
<script>
    var table;
    const modalAddJawaban = new bootstrap.Modal('#modal-add-jawaban');
    const modalEditJawaban = new bootstrap.Modal('#modal-edit-jawaban');

    function fetchData() {
        table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            ordering: false,
            searching: false,
            deferRender: true,
            scrollX: true,
            ajax: {
                url : "{{ url('/admin/jawaban/get-list') }}",
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
                {data: 'kode', class: 'text-nowrap'},
                {data: 'jawaban', class: 'text-nowrap'},
                {data: 'nilai', class: 'text-nowrap'},
                {"data": "action", "orderable": false, class: "text-center", render: function (data, type, row, meta) {
                    return `
                        <div class="d-flex justify-content-center">
                            <button 
                                type="button" 
                                class="btn btn-sm btn-success btn-edit me-2 d-flex" 
                                data-id="${row.id}" 
                                data-kode="${row.kode}" 
                                data-jawaban="${row.jawaban}" 
                                data-nilai="${row.nilai}" 
                            >
                                Ubah
                            </button> 
                            <button 
                                type="button" 
                                class="btn btn-sm btn-danger btn-delete d-flex" 
                                data-id="${row.id}" 
                                data-jawaban="${row.jawaban}" 
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

    function addJawaban() {
        let dataForm = $('#form-add-jawaban').serialize();

        $.ajax({
            url: "{{ url('admin/jawaban') }}",
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
                $('#form-add-jawaban')[0].reset();
                modalAddJawaban.hide();
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

    function editJawaban() {
        let dataForm = $('#form-edit-jawaban').serialize();

        $.ajax({
            url: "{{ url('admin/jawaban') }}" + "/" + $('#id_edit').val(),
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
                $('#form-edit-jawaban')[0].reset();
                modalEditJawaban.hide();
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

    function deleteJawaban(id) {

        $.ajax({
            url: "{{ url('admin/jawaban') }}" + "/" + id,
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

        $('#form-add-jawaban').validate({
            submitHandler: function(form) {
                addJawaban();
            },
            rules: {
                kode: {
                    required: true,
                    maxlength: 22
                },
                jawaban: {
                    required: true,
                    maxlength: 22
                },
                nilai: {
                    required: true,
                    number: true
                },
            },
            messages: {
                kode: {
                    required: 'Harap isi kode',
                },
                jawaban: {
                    required: 'Harap isi jawaban'
                },
                nilai: {
                    required: 'Harap isi nilai',
                    number: 'Harap isi numeric'
                },
            }
        });

        // Button edit onclick handler 
        $(document).on('click', '.btn-edit', function(e) {
            $('#form-edit-jawaban')[0].reset();

            $('#id_edit').val($(this).data('id'));
            $('#kode_edit').val($(this).data('kode'));
            $('#jawaban_edit').val($(this).data('jawaban'));
            $('#nilai_edit').val($(this).data('nilai'));

            modalEditJawaban.show();            
        });

        $('#form-edit-jawaban').validate({
            submitHandler: function(form) {
                editJawaban();
            },
            rules: {
                kode_edit: {
                    required: true,
                    maxlength: 22
                },
                jawaban_edit: {
                    required: true,
                    maxlength: 22
                },
                nilai_edit: {
                    required: true,
                    number: true
                },
            },
            messages: {
                kode_edit: {
                    required: 'Harap isi kode',
                },
                jawaban_edit: {
                    required: 'Harap isi jawaban'
                },
                nilai_edit: {
                    required: 'Harap isi nilai',
                    number: 'Harap isi numeric'
                },
            }
        });

        // Button delete onclick event handler 
        $(document).on('click', '.btn-delete', function() {
            let jawaban = $(this).data('jawaban');
            let id = $(this).data('id');

            Swal.fire({
                title: '',
                text: `Apakah anda yakin akan menghapus jawaban ${jawaban}?`,
                icon: 'warning',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                showCancelButton: true
            })
            .then(function(result) {
                if(result.isConfirmed) {
                    deleteJawaban(id);
                }
            });
        });
    });
</script>
@endsection