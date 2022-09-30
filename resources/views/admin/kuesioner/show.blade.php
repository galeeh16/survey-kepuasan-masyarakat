@extends('layouts.app-admin')

@section('title')
    Admin - Kuesioner Detail
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Kuesioner by <b>{{ $responden->nama_responden }}</b> (Layanan - {{ $responden->layanan?->namalayanan }})</h5>
    </div>
    <div class="card-body pb-5">
        <form method="post" id="form-isi-survey">
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
                                                value="{{$question->id}}_{{$answer->id}}"
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