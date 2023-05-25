  <div class="row">
    <div class="col-sm-3">
        <div class="block">
            <div class="block-header block-header-default text-center">
                <h3 class="block-title">Nomor Soal</h3>
            </div>
            <div class="block-content">
                {{ $soals->links('vendor.pagination', ['existing_question' => $existing_question , 'soal' => $list_soal , 'id'=>$id]) }}
            </div>
        </div>
    </div>
    <div class="col-sm-9">
        @foreach($soals as $index => $soal)
        <form action="{{route('answer.store')}}" method="post">
            @csrf
            <div class="question @if($index !== 0) d-none @endif" data-question-number="{{$index}}">
                <input type="hidden" name="exam_id" value="{{$id}}">
                <input type="hidden" name="id_question" value="{{$soal->question_id}}">
                <input type="hidden" name="question_type" value="{{$soal->question_type}}">
                <span >type : {{$soal->question_type}}</span>
            </div>
            <h5>
                <?php
                    echo $soal->question;
                ?>
            </h5>
            @if($soal->question_type == 'long_desc')
            <Textarea class="form-control" name="answer" rows="5" maxlength="200">@if($existing_answer->where('id_exam_question',$soal->question_id)->first() != null){{$existing_answer->where('id_exam_question',$soal->question_id)->first()->answer_desc}}@endif</Textarea>
            @endif
            @if($soal->question_type == 'short_desc')
            <Textarea class="form-control" name="answer" rows="5" maxlength="200">@if($existing_answer->where('id_exam_question',$soal->question_id)->first() != null){{$existing_answer->where('id_exam_question',$soal->question_id)->first()->answer_desc}}@endif</Textarea>
            @endif
            @if($soal->question_type == 'matching')  
                <table class="table">
                    <tbody>
                    @foreach($soal->jawaban as $option)
                        @if($option->type_matching == 'left')
                            <tr>
                                <input type="hidden" name="left_matching[]" value="{{$option->id}}">
                                <td>
                                    <?php
                                        echo $option->option_text;
                                    ?>
                                </td>
                                <td>
                                    <select class="form-control" name="matching[]">
                                        @foreach($soal->jawaban->where('type_matching', 'right') as $option_right)
                                            @if($existing_answer->where('answer_question_option_id', $option->id)->isNotEmpty() && $existing_answer->where('answer_question_option_id', $option->id)->first()->answer_right_option_id == $option_right->id)
                                                <option value="{{ $option_right->id }}" selected>{{ $option_right->option_text }}</option>
                                            @else
                                                <option value="{{ $option_right->id }}">{{ $option_right->option_text }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>  
            @endif

            @foreach($soal->jawaban as $option)
                @if($soal->question_type == 'true_or_false' || $soal->question_type == 'multiple_choice')
                    <label class="css-control css-control-primary css-radio">
                        <input type="radio" class="css-control-input" name="multiple_choice" value="{{ $option->id}}" @if($existing_answer->contains('answer_question_option_id', $option->id)) checked @endif>
                        <span class="css-control-indicator"></span>
                        <?php
                            echo strip_tags($option->option_text, "<img>");
                        ?> 
                    </label>
                    <br>
                @elseif($soal->question_type == 'complex_multiple_choice')
                <label class="css-control css-control-primary css-checkbox">
                    <input type="checkbox" class="css-control-input" name="complex_multiple_box[]" value="{{ $option->id}}" @if($existing_answer->contains('answer_question_option_id', $option->id)) checked @endif>
                    <span class="css-control-indicator"></span> 
                    <?php
                        echo strip_tags($option->option_text, "<img>");
                    ?>
                </label>
                <br><br>
                @endif
            @endforeach
        @endforeach

            <br>
            <div class="container">
                <div class="row text-center">
                </div>
            </div>
            <hr>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12 d-flex justify-content-between">
                    <input type="hidden" id="txtStatus" name="txtStatus">
                    @if ($soals->onFirstPage())
                        <a class="btn btn-primary disabled" href="#"><i class="si si-action-undo"></i> Sebelumnya</a>
                    @else
                        <a class="btn btn-primary" href="{{ $soals->previousPageUrl() }}"><i class="si si-action-undo"></i> Sebelumnya</a>
                    @endif
                    @if ($soals->hasMorePages())
                        <a class="btn btn-primary" href="{{ $soals->nextPageUrl() }}"><i class="si si-action-redo"></i> Selanjutnya</a>
                    @endif
                </div>
            </div>
            <hr>
            <div class="container">
                <div class="row justify-content-end">
                    <button class="btn btn-secondary mr-5" onclick="setRagu()" type="submit">Ragu - ragu</button>
                    <button class="btn btn-success" onclick="setSimpan()" type="submit">Simpan Jawaban</button>
                </div>
            </div>
    </form>
    </div>
  </div>

<script>
    function setRagu() {
        document.getElementById("txtStatus").value = "1";
    }

    function setSimpan() {
        document.getElementById("txtStatus").value = "0";
    }
</script>
<script>
    var currentQuestion = 0;
    var totalQuestions = {{$soals->count()}};

    function showQuestion(questionNumber) {
        var questions = document.getElementsByClassName('question');
        for (var i = 0; i < questions.length; i++) {
            questions[i].classList.add('d-none');
        }
        questions[questionNumber].classList.remove('d-none');
    }

    function showNextQuestion() {
        if (currentQuestion < totalQuestions - 1) {
            currentQuestion++;
            showQuestion(currentQuestion);
        }
    }

    function showPreviousQuestion() {
        if (currentQuestion > 0) {
            currentQuestion--;
            showQuestion(currentQuestion);
        }
    }

    showQuestion(currentQuestion);

    document.getElementById('next-btn').addEventListener('click', function () {
        showNextQuestion();
    });

    document.getElementById('prev-btn').addEventListener('click', function () {
        showPreviousQuestion();
    });

    // Tambahkan event listener untuk tombol navigasi pagination Laravel
    var paginationLinks = document.getElementsByClassName('page-link');
    for (var i = 0; i < paginationLinks.length; i++) {
        paginationLinks[i].addEventListener('click', function () {
            var questionNumber = this.getAttribute('data-question-number');
            currentQuestion = parseInt(questionNumber);
            showQuestion(currentQuestion);
        });
    }
</script>
