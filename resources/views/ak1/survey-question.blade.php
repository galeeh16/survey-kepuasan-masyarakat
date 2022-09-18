<div hidden id="survey-question">
    <form method="post" id="form-isi-survey">
        <div class="row">
            <div class="col-12">
                <div class="mb-3">Seberapa puas dengan pelayanan kami?</div>

                <div class="mb-2">Nilai</div>

                <div class="d-flex nilai">
                    <div class="nilai-div">
                        <input type="radio" id="nilai1" name="nilai_kepuasan" value="1" style="display: none;" hidden>
                        <label for="nilai1" data-value="1">1</label>
                    </div>
                    <div class="nilai-div">
                        <input type="radio" id="nilai2" name="nilai_kepuasan" value="2" style="display: none;" hidden>
                        <label for="nilai2" data-value="2">2</label>
                    </div>
                    <div class="nilai-div">
                        <input type="radio" id="nilai3" name="nilai_kepuasan" value="3" style="display: none;" hidden>
                        <label for="nilai3" data-value="3">3</label>
                    </div>
                    <div class="nilai-div">
                        <input type="radio" id="nilai4" name="nilai_kepuasan" value="4" style="display: none;" hidden>
                        <label for="nilai4" data-value="4">4</label>
                    </div>
                    <div class="nilai-div">
                        <input type="radio" id="nilai5" name="nilai_kepuasan" value="5" style="display: none;" hidden>
                        <label for="nilai5" data-value="5">5</label>
                    </div>
                    <div class="nilai-div">
                        <input type="radio" id="nilai6" name="nilai_kepuasan" value="6" style="display: none;" hidden>
                        <label for="nilai6" data-value="6">6</label>
                    </div>
                    <div class="nilai-div">
                        <input type="radio" id="nilai7" name="nilai_kepuasan" value="7" style="display: none;" hidden>
                        <label for="nilai7" data-value="7">7</label>
                    </div>
                    <div class="nilai-div">
                        <input type="radio" id="nilai8" name="nilai_kepuasan" value="8" style="display: none;" hidden>
                        <label for="nilai8" data-value="8">8</label>
                    </div>
                    <div class="nilai-div">
                        <input type="radio" id="nilai9" name="nilai_kepuasan" value="9" style="display: none;" hidden>
                        <label for="nilai9" data-value="9">9</label>
                    </div>
                    <div class="nilai-div">
                        <input type="radio" id="nilai10" name="nilai_kepuasan" value="10" style="display: none;" hidden>
                        <label for="nilai10" data-value="10">10</label>
                    </div>
                </div>


                <div class="mt-5 mb-4">
                    @php 
                        $no = 1;
                    @endphp 
                    @foreach($questions as $q => $question)
                        <div class="mb-4">
                            <div>{{ $loop->iteration }}. {{ $question->pertanyaan }}</div>
                            <div class="mt-2">
                                @foreach ($question->answers as $a => $answer)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="answers[{{$question->id}}]" id="answer{{$answer->id}}" value="{{$answer->id}}">
                                        <label class="form-check-label" for="answer{{$answer->id}}">
                                            {{ $answer->kode }}. {{ $answer->jawaban }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mb-4">
                    <label class="col-form-label">Isi Saran : </label>
                    <textarea name="saran" id="saran"rows="5" class="form-control"></textarea>
                </div>

                <button type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</div>