@extends('layouts.app-admin')

@section('title')
    Admin - Kuesioner
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Data Responden</h5>
    </div>
    <div class="card-body">
        <table id="table" class="table table-bordered table-hover" style="width: 100%;">
            <thead>
                <tr>
                    <th class="text-nowrap text-center" style="width: 50px;">No</th>
                    <th class="text-nowrap text-center">Nama</th>
                    <th class="text-nowrap text-center">NIK</th>
                    <th class="text-nowrap text-center">No HP</th>
                    <th class="text-nowrap text-center">Layanan</th>
                    <th class="text-nowrap text-center">Tanggal Survey</th>
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
                url : "{{ url('/admin/kuesioner/get-list') }}",
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
                {data: 'nama_responden', class: 'text-nowrap'},
                {data: 'nik', class: 'text-nowrap'},
                {data: 'no_hp', class: 'text-nowrap'},
                {data: 'layanan', class: 'text-nowrap', render: function(data, type, row) {
                    return row.layanan ? row.layanan.namalayanan : '-';
                }},
                {data: 'tanggal_survey', class: 'text-nowrap', render: function(data, type, row) {
                    return row.created_at;
                }},
                {"data": "action", "orderable": false, class: "text-center", render: function (data, type, row, meta) {
                    // return `
                    //     <div class="d-flex justify-content-center">
                    //         <button 
                    //             type="button" 
                    //             class="btn btn-sm btn-success btn-edit me-2 d-flex" 
                    //             data-id="${row.id}" 
                    //         >
                    //             Detail
                    //         </button> 
                    //     </div>    
                    // `;
                    let urlDetail = '{{ url('admin/kuesioner') }}' + '/' + row.id;
                    return `
                        <div class="d-flex justify-content-center">
                            <a 
                                href="${urlDetail}"
                                class="btn btn-sm btn-success d-flex" 
                            >
                                Detail
                            </a> 
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