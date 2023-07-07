  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js"></script>
  <style>
    .sortable-list {
      list-style-type: none;
      padding: 10px;
      border: 1px solid #ccc;
    }
    #sortable-clues li {
        pointer-events: none;
    }

    .sortable-item {
      background-color: #f4f4f4;
      padding: 10px;
      margin-bottom: 10px;
      cursor: move;
    }
    .sortable-item.highlight {
      background-color: #c0c0c0;
    }
    .matching-container .matching-column .sortable-list {
      min-height: 200px;
    }
    .matching-container .matching-column .form-group {
      margin-bottom: 10px;
    }
  </style>

  <div class="row soal">
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
        <form action="{{route('answer.store')}}" id="answerForm" method="post">
            @csrf
            <div class="question @if($index !== 0) d-none @endif" data-question-number="{{$index}}">
                <input type="hidden" name="exam_id" value="{{$id}}">
                <input type="hidden" name="id_question" value="{{$soal->question_id}}">
                <input type="hidden" name="question_type" value="{{$soal->question_type}}">
                <span >Tipe Soal: 

                    @php
                        if($soal->question_type == 'multiple_choice' || $soal->question_type == 'true_or_false'){
                            echo 'Pilihan Ganda';
                        } elseif($soal->question_type == 'matching'){
                            echo 'Menjodohkan';
                        } elseif($soal->question_type == 'complex_multiple_choice'){
                            echo 'Pilihan Ganda Kompleks';
                        } elseif($soal->question_type == 'long_desc' || $soal->question_type == 'short_desc'){
                            echo 'Uraian';
                        }
                    @endphp
                </span>
            </div>
            <h5>
                <?php
                    echo $soal->question;
                ?>
            </h5>
            @if($soal->question_type == 'long_desc')
            <Textarea class="form-control" name="answer" rows="5" >@if($existing_answer->where('id_exam_question',$soal->question_id)->first() != null){{$existing_answer->where('id_exam_question',$soal->question_id)->first()->answer_desc}}@endif</Textarea>
            @endif
            @if($soal->question_type == 'short_desc')
            <Textarea class="form-control" name="answer" rows="5" maxlength="200">@if($existing_answer->where('id_exam_question',$soal->question_id)->first() != null){{$existing_answer->where('id_exam_question',$soal->question_id)->first()->answer_desc}}@endif</Textarea>
            @endif
            @if($soal->question_type == 'matching')  
            <div class="container">
                <div class="matching-container row">
                    <div class="matching-column col">
                    <h4>Clue</h4>
                        <ul id="sortable-clues" class="sortable-list">
                            @php
                                $i = 1;
                            @endphp
                            @foreach($soal->jawaban as $option)
                                @if($option->type_matching == 'left')
                                    <input type="hidden" name="left_matching[]" value="{{$option->id}}">
                                    <li class="sortable-item" draggable="false">
                                        @php
                                            echo $i++ .". ".$option->option_text
                                        @endphp
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="matching-column mt-5 col">
                    <h5>Jawaban urut dari atas (1,2 dan seterusnya)</h5>
                        @if($existing_answer->where('id_exam_question',$soal->question_id)->isNotEmpty())
                            @php    
                            $data_ = json_decode($existing_answer->where('id_exam_question',$soal->question_id), true);

                            $answerRightOptionIds = [];
                            foreach ($data_ as $item) {
                                $answerRightOptionIds[] = $item['answer_right_option_id'];
                            }
                            $matchingValue = implode(',', $answerRightOptionIds);
                            @endphp
                            <input type="hidden" name="matching" class="jawaban-input" value="{{$matchingValue}}">
                        @else
                            <input type="hidden" name="matching" class="jawaban-input">
                        @endif
                        <div id="matching-answers" class="sortable-list" onchange="updateAnswers();">
                        @if($existing_answer->where('id_exam_question',$soal->question_id)->isNotEmpty())
                            @php
                                $data = json_decode($existing_answer->where('id_exam_question',$soal->question_id), true);
                                $values = array_values($data);
                            @endphp
                            @foreach($values as $data)
                            <li class="sortable-item" draggable="true" data-id="{{ $data['answer_right_option_id'] }}">
                                {{ $option->where('id', $data['answer_right_option_id'])->pluck('option_text')->first() }}
                            </li>
                        @endforeach
                        @endif
                        </div>
                    </div>
                </div>
                <div class="row mt-4 matching_option">
                    <div class="col-md-12">
                    <ul id="sortable-options" class="sortable-list">
                        @if($existing_answer->where('id_exam_question',$soal->question_id)->isEmpty())
                            @foreach($soal->jawaban as $option)
                                @if($option->type_matching == 'right')
                                    <li class="sortable-item" draggable="true" data-id="{{ $option->id }}">
                                    {{ $option->option_text }}
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                    </div>
                </div>
            </div>
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
            <input type="hidden" name="txtPage" id="txtPage">
            <input type="hidden" name="txtNoHalaman" id="txtNoHalaman">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12 d-flex justify-content-between">
                    <input type="hidden" id="txtStatus" name="txtStatus">
                    @if ($soals->onFirstPage())
                        <a class="btn btn-primary disabled" href="#"><i class="si si-action-undo"></i> Sebelumnya</a>
                    @else
                        <a class="btn btn-primary" onclick="goToPreviousPage()"><i class="si si-action-undo"></i> Sebelumnya</a>
                    @endif
                    @if ($soals->hasMorePages())
                        <a class="btn btn-primary" onclick="goToNextPage()"><i class="si si-action-redo"></i> Selanjutnya</a>
                    @endif
                </div>
            </div>
            <hr>
            <div class="container">
                <div class="row justify-content-end">
                </div>
            </div>
    </form>
    </div>
  </div>

  <script>
    $(document).ready(function() {
        // Mengubah ukuran semua gambar menjadi lebar 300px dan tinggi 300px
        $(".soal img").css({
        'max-width': "300px",
        'max-height': "200px"
        });
    });
</script>
@livewireScripts
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Mendapatkan nomor halaman saat ini dari parameter URL
        var urlParams = new URLSearchParams(window.location.search);
        var currentPage = parseInt(urlParams.get('page'));
        // Mengatur nilai default 1 jika parameter page tidak ada
        if (isNaN(currentPage) || currentPage <= 0) {
            currentPage = 1;
        }
        document.getElementById('txtNoHalaman').value = currentPage;
    });

function goToPreviousPage() {
  document.getElementById('txtStatus').value = '0';
  document.getElementById('txtPage').value = 'prev';
  document.getElementById('answerForm').submit();
}

function goToNextPage() {
  document.getElementById('txtStatus').value = '0';
  document.getElementById('txtPage').value = 'next';
  document.getElementById('answerForm').submit();
}

</script>

<script>
    $(document).ready(function() {
        var sortableClues = new Sortable(document.getElementById('sortable-clues'), {
        group: 'matching',
        animation: 150,
        filter: '.sortable-item',
        onEnd: function(evt) {
            updateAnswers();
        }
        });

        var sortableAnswers = new Sortable(document.getElementById('matching-answers'), {
        group: 'matching',
        animation: 150,
        draggable: '.sortable-item',
        onEnd: function(evt) {
            updateAnswers();
        }
        });

        var sortableOptions = new Sortable(document.getElementById('sortable-options'), {
        group: 'matching',
        animation: 150,
        draggable: '.sortable-item',
        onEnd: function(evt) {
            checkAnswer(evt.item.innerText);
        }
        });

        function updateAnswers() {
            var answers = [];
            $('#matching-answers li').each(function() {
                var optionId = $(this).data('id'); // Ambil ID dari opsi jawaban
                answers.push(optionId);
            });
            $('.jawaban-input').each(function(index) {
                $(this).val(answers || ''); // Setel nilai input dengan ID opsi jawaban atau kosong jika tidak ada
            });
        }
        
        
        function checkAnswer(option, optionId) {
            var answer = $('#matching-answers li:empty').first();
            if (answer.length > 0) {
                answer.text(option);
                answer.attr('data-id', optionId); // Set data-id attribute

                var answers = []; // Updated answers array
                $('#matching-answers li').each(function() {
                var optionId = $(this).data('id');
                answers.push(optionId);
                });

                $('.jawaban-input').each(function(index) {
                $(this).val(answers || ''); // Set value of jawaban[] input
                });
            }
        }
        $('#matching-answers').on('DOMSubtreeModified', function() {
            updateAnswers(); // Panggil fungsi updateAnswers() ketika ada perubahan dalam anak-anak elemen #matching-answers
        });
    });

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
