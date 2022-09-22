@extends('layouts.app-admin')

@section('title')
    Admin - Pertanyaan
@endsection

@section('content')
   <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Management Pertanyaan</h5>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-4">Tambah Pertanyaan</button>

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

@section('script')
<script>
    var table;
    // const modalAddLayanan = new bootstrap.Modal('#modal-add-layanan');
    // const modalEditLayanan = new bootstrap.Modal('#modal-edit-layanan');

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
    });
</script>
@endsection