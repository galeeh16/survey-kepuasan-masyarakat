@extends('layouts.app-admin')

@section('title')
    Admin - Kuesioner
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Laporan Hasil Survey</h5>
    </div>
    <div class="card-body">

        <form method="post" id="form-filter" class="mb-5">
            <div class="mb-2">
                <b>Filter By :</b>
            </div>
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="mb-2">
                        <label class="col-form-label">Layanan</label>
                        <select name="layanan" id="layanan" class="form-select">
                            <option value="">ALL</option>
                            @foreach ($layanans as $layanan)
                                <option value="{{ $layanan->id }}">{{ $layanan->namalayanan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Tanggal Survey</label>
                        <div class="d-flex align-items-center">
                            <div class="position-relative">
                                <input type="text" class="form-control" id="date_from" name="date_from" autocomplete="off">
                                <div class="position-absolute" style="font-weight: 500; top: 6px; right: 12px; cursor: pointer; font-size: 18px; font-family: monospace; color: #9196a1;" onclick="resetDateFrom()">
                                    x
                                </div>
                            </div>
                            <div class="mx-3">s/d</div>
                            <div class="position-relative">
                                <input type="text" class="form-control" id="date_to" name="date_to" autocomplete="off"> 
                                <div class="position-absolute" style="font-weight: 500; top: 6px; right: 12px; cursor: pointer; font-size: 18px; font-family: monospace; color: #9196a1;" onclick="resetDateTo()">
                                    x
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

        <div class="d-flex justify-content-between mb-3">
            <button type="button" class="btn btn-success" id="btn-export-excel" style="align-self: baseline;">
                Export Excel
            </button>
        </div>

        <table id="table" class="table table-bordered table-hover" style="width: 100%;">
            <thead>
                <tr>
                    <th class="text-nowrap text-center" style="width: 50px;">No</th>
                    <th class="text-nowrap text-center">Nama</th>
                    <th class="text-nowrap text-center">Nilai</th>
                    <th class="text-nowrap text-center">NIK</th>
                    <th class="text-nowrap text-center">No HP</th>
                    <th class="text-nowrap text-center">Layanan</th>
                    <th class="text-nowrap text-center">Tanggal Survey</th>
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


    function resetDateFrom() {
        $('#date_from').datepicker('setDate', null);
    }

    function resetDateTo() {
        $('#date_to').datepicker('setDate', null);
    }

    function fetchData() {
        table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            ordering: false,
            searching: false,
            searchDelay: 500,
            deferRender: true,
            scrollX: true,
            language: {
                search: "", // buat ngilangin label tulisan search nya
                searchPlaceholder: "Cari nama, nik, no_hp..."
            },
            ajax: {
                url : "{{ url('/admin/kuesioner/get-list') }}",
                type: 'post',
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                data : function(d) {
                    return {
                        ...d,
                        page: parseInt( $('#table').DataTable().page.info().page + 1),
                        // search: $('input[name=search]').val(),
                        search: $('#table_filter input[type="search"]').val(),
                        layanan: $('#layanan').val(),
                        date_from: $('#date_from').val(),
                        date_to: $('#date_to').val(),
                    }
                }
            },
            columns: [
                {"data": "no", "orderable": false, class: "text-center", render: function (data, type, row, meta) {
	                return meta.row + meta.settings._iDisplayStart + 1;
                }},
                {data: 'nama_responden', class: 'text-nowrap'},
                {data: 'nilai', class: 'text-nowrap'},
                {data: 'nik', class: 'text-nowrap'},
                {data: 'no_hp', class: 'text-nowrap'},
                {data: 'namalayanan', class: 'text-nowrap'},
                {data: 'tanggal_survey', class: 'text-nowrap', render: function(data, type, row) {
                    return dateFormat(row.created_at);
                }},
                
            ],
            order: [[1, 'asc']],
        }).columns.adjust();

    }

    $(document).ready(function() {
        fetchData();

        $('input[name=search]').on('keyup', debounce(() => fetchData(), 300));

        
        $('#date_from, #date_to').datepicker('destroy').datepicker( {
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            onClose: function(dateText, inst) { 
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, inst.selectedDay));
            }
        });

        $('#form-filter').on('submit', function(e) {
            e.preventDefault();
            fetchData();
        });

        $('#btn-export-excel').on('click', function() {
            $.ajax({
                url: '{{ url('/admin/kuesioner/export-excel') }}',
                type: "post",
                headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
                beforeSend: function() {
                    showLoading()
                },
                xhr: function() {
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 2) {
                            if (xhr.status == 200) {
                                xhr.responseType = "blob";
                            } else {
                                xhr.responseType = "text";
                            }
                        }
                    };
                    return xhr;
                },
                data: {
                    nama_layanan: $('#layanan').val() == '' ? 'ALL' : $('#layanan :selected').text(),
                    date_from: $('#date_from').val() == '' ? '-' : $('#date_from').val(),
                    date_to: $('#date_to').val() == '' ? '-' : $('#date_to').val(),
                },
                success: function(data, status, xhr) {
                    swal.close();
                    var fileName = xhr.getResponseHeader('content-disposition').split('filename=')[1].split(';')[0];
                    var a = document.createElement('a');
                    var url = window.URL.createObjectURL(data);
                    a.href = url;
                    a.download = fileName.replace(/\"/g, '');
                    document.body.append(a);
                    a.click();
                    a.remove();
                    window.URL.revokeObjectURL(url);
                },
                error: function(xhr, stat, err) {
                    swal.close();
                    
                    if (xhr.status == 400 || xhr.status == 404) {
                        Swal.fire('', 'Gagal mendownload file', 'warning');
                    }
                }
            });
            // end ajax 
        });


    });
</script>
@endsection