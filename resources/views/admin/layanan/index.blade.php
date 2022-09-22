@extends('layouts.app-admin')

@section('title')
    Admin - Layanan 
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Management Layanan</h5>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modal-add-layanan">Tambah Layanan</button>

            <table id="table" class="table table-bordered table-hover" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="text-nowrap text-center" style="width: 50px;">No</th>
                        <th class="text-nowrap text-center">Layanan</th>
                        <th class="text-nowrap text-center">Deskripsi</th>
                        <th class="text-nowrap text-center" style="width: 100px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

    @include('admin.layanan.modal-add')
    @include('admin.layanan.modal-edit')
@endsection

@section('script')
<script>
    var table;
    const modalAddLayanan = new bootstrap.Modal('#modal-add-layanan');
    const modalEditLayanan = new bootstrap.Modal('#modal-edit-layanan');

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
                url : "{{ url('/admin/layanan/get-list') }}",
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
                {data: 'namalayanan', class: 'text-nowrap'},
                {data: 'deskripsi', class: 'text-nowrap'},
                {"data": "action", "orderable": false, class: "text-center", render: function (data, type, row, meta) {
                    return `
                        <div class="d-flex justify-content-center">
                            <button 
                                type="button" 
                                class="btn btn-sm btn-success btn-edit me-2 d-flex" 
                                data-id="${row.id}" 
                                data-namalayanan="${row.namalayanan}" 
                                data-deskripsi="${row.deskripsi}"
                            >
                                Ubah
                            </button> 
                            <button 
                                type="button" 
                                class="btn btn-sm btn-danger btn-delete d-flex" 
                                data-id="${row.id}" 
                                data-namalayanan="${row.namalayanan}" 
                                data-deskripsi="${row.deskripsi}"
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

    function addLayanan() {
        $.ajax({
            url: '{{ url('/admin/layanan') }}',
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            beforeSend: function() {
                showLoading()
            },
            data: {
                nama_layanan: $('#nama_layanan').val(),
                deskripsi: $('#deskripsi').val(),
            },
            success: function(response) {
                swal.close();
                modalAddLayanan.hide();
                alertSuccess();
                $('#form-add-layanan')[0].reset();
                fetchData();
                
            },
            error: function(xhr, stat, err) {
                swal.close();
                if (xhr.status == 500) {

                }
            }
        });
    }

    function editLayanan() {
        $.ajax({
            url: '{{ url('/admin/layanan/edit') }}',
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            beforeSend: function() {
                showLoading()
            },
            data: {
                id: $('#id_edit').val(),
                nama_layanan: $('#nama_layanan_edit').val(),
                deskripsi: $('#deskripsi_edit').val(),
            },
            success: function(response) {
                swal.close();
                modalEditLayanan.hide();
                alertSuccess(response.message);
                $('#form-edit-layanan')[0].reset();
                fetchData();
                
            },
            error: function(xhr, stat, err) {
                swal.close();
                if (xhr.status == 500) {

                }
            }
        });
    }

    function deleteData(id) {
        $.ajax({
            url: "{{ url('admin/layanan/delete') }}",
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            beforeSend: function() {
                showLoading();
            },
            data: {
                id: id 
            },
            success: function(response) {
                swal.close();
                alertSuccess(response.message);
                fetchData();
            },
            error: function(xhr, stat, err) {
                console.log(err);
            }
        });
    }

    $(document).ready(function() {
        fetchData();

        $('#form-add-layanan').validate({
            submitHandler: function() {
                addLayanan();
            },
            rules: {
                nama_layanan: {
                    required: true,
                    minlength: 3
                },
                deskripsi: {
                    minlength: 3
                }
            }
        });


        $(document).on('click', '.btn-delete', function() {
            let nama_layanan = $(this).data('namalayanan');
            let id = $(this).data('id');

            Swal.fire({
                title: '',
                text: `Apakah anda yakin akan menghapus layanan ${nama_layanan}?`,
                icon: 'info',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                showCancelButton: true
            })
            .then(function(result) {
                if(result.isConfirmed) {
                    deleteData(id);
                }
            });
        });

        $(document).on('click', '.btn-edit', function() {
            let nama_layanan = $(this).data('namalayanan');
            let id = $(this).data('id');
            let deskripsi = $(this).data('deskripsi');

            $('#id_edit').val(id);
            $('#nama_layanan_edit').val(nama_layanan);
            $('#deskripsi_edit').val(deskripsi);

            modalEditLayanan.show();

        });

        $('#form-edit-layanan').validate({
            submitHandler: function() {
                editLayanan();
            },
            rules: {
                nama_layanan_edit: {
                    required: true,
                    minlength: 3
                },
                deskripsi_edit: {
                    minlength: 3
                }
            },
        });
    
    });  
</script> 
@endsection