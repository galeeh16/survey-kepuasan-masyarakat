@extends('layouts.app-admin')

@section('title')
    Admin - Kuesioner Detail
@endsection

@section('content')
<div class="d-flex justify-content-end mb-4">
    <a href="{{ url('admin/kuesioner') }}" class="btn btn-dark d-flex align-items-center">
        <svg width="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    
            <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
            <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                
        </svg>                            
        <div class="ms-1">Kembali</div>
    </a>
</div>
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Kuesioner by <b>{{ $responden->nama_responden }}</b> (Layanan - {{ $responden->layanan?->namalayanan }})</h5>
    </div>
    <div class="card-body pb-5">
        <form method="post" id="form-edit-kuesioner">
            <input type="hidden" name="id_responden" id="id_responden" value="{{ $responden->id }}">
            <input type="hidden" name="_method" value="PUT">
            
            <div class="row">
                <div class="col-12">  
                    <div class="mb-4">
                        @foreach($questions as $q => $question)
                            <div class="mb-4">
                                <div>{{ $question->no_urut }}. {{ $question->pertanyaan }}</div>
                                <div class="mt-2 soal">
                                    @foreach ($question->answers as $a => $answer)
                                        <div class="form-check mb-2">
                                            <input 
                                                class="form-check-input answer" 
                                                type="radio" 
                                                name="answers[{{$question->id}}]" 
                                                id="answer{{$answer->id}}{{$question->id}}" 
                                                value="{{$question->id}}_{{$answer->id}}_{{$responden->kuesioners[$q]->id}}"
                                                {{ ($responden->kuesioners[$q]->id_jawaban == $answer->id) ? "checked" : "" }}
                                            >
                                            <label class="form-check-label" for="answer{{$answer->id}}{{$question->id}}">
                                                {{-- {{ $answer->kode }}. {{ $answer->jawaban }} --}}
                                                {!! ($responden->kuesioners[$q]->id_jawaban == $answer->id) ? '<b class="text-success">'. $answer->kode . '. ' . $answer->jawaban .'</b>' :  $answer->kode . '. ' . $answer->jawaban !!}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
    
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    function editKuesioner() {
        let id = $('#id_responden').val();
        let kuesionerData = $('#form-edit-kuesioner').serialize();

        $.ajax({
            url: "{{ url('/admin/kuesioner') }}" + "/" + id,
            type: 'put',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            beforeSend: function() {
                showLoading();
            },
            data: kuesionerData,
            success: function(response) {
                // alertSuccess(response.message);
                Swal.fire({
                    title: '',
                    text: response.message,
                    icon: 'success' 
                })
                .then(val => {
                    if (val.isConfirmed) {
                        window.location.href = "{{ url('admin/kuesioner') }}";
                    }
                });
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
        
        $.validator.setDefaults({
            debug: true,
            ignore: [],
            highlight: function(element) {
                $(element).closest('.form-control').addClass('is-invalid');
            },
            unhighlight: function(element) {
                $(element).closest('.form-control').removeClass('is-invalid');
            },
            errorPlacement: function(error, element) {
                if (element.hasClass('answer')) {
                    error.insertAfter(element.parents('.soal'));
                } else {
                    error.insertAfter(element);   
                }
            }
        });

        $('#form-edit-kuesioner').validate({
            submitHandler: function(form) {
                editKuesioner();
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