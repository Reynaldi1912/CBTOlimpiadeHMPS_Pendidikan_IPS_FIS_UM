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

<meta name="csrf-token" content="{{ csrf_token() }}" />

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
        <form id="answerForm" method="post" data-question-type="{{$soal->question_type}}">
            <div class="question @if($index !== 0) d-none @endif" data-question-number="{{$index}}">
                <input type="hidden" name="exam_id" id="exam_id" value="{{$id}}">
                <input type="hidden" name="id_question" id="id_question" value="{{$soal->question_id}}">
                <input type="hidden" name="question_type" id="question_type" value="{{$soal->question_type}}">
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
            <Textarea class="form-control" name="answer" onchange="updateAnswer('ld');" rows="5" >@if($existing_answer->where('id_exam_question',$soal->question_id)->first() != null){{$existing_answer->where('id_exam_question',$soal->question_id)->first()->answer_desc}}@endif</Textarea>
            @endif
            @if($soal->question_type == 'short_desc')
            <Textarea class="form-control" name="answer" onchange="updateAnswer('sd');" rows="5" maxlength="200">@if($existing_answer->where('id_exam_question',$soal->question_id)->first() != null){{$existing_answer->where('id_exam_question',$soal->question_id)->first()->answer_desc}}@endif</Textarea>
            @endif

            @if($soal->question_type == 'matching')
                <table class="table">
                    <tbody>
                    @foreach($soal->jawaban as $option)
                        @if($option->type_matching == 'left')
                            <tr>
                                <td style="width:30%">
                                    <input type="hidden" name="left_matching[]" value="{{$option->id}}">
                                    <?php
                                        echo $option->option_text;
                                    ?>
                                </td>
                                <td style="width:70%">
                                    <select class="form-control" name="right_option[]" onchange="updateAnswer('matching');">
                                        <?php
                                        $options = $soal->jawaban->where('type_matching', 'right')->toArray();

                                        shuffle($options);
                                        ?>

                                        @foreach($options as $option_right)
                                            @if($existing_answer->where('answer_question_option_id', $option->id)->isNotEmpty() && $existing_answer->where('answer_question_option_id', $option->id)->first()->answer_right_option_id == $option_right['id'])
                                                <option value="{{ $option_right['id'] }}" selected>{{ $option_right['option_text'] }}</option>
                                            @else
                                                <option value="{{ $option_right['id'] }}">{{ $option_right['option_text'] }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </td>

                            </tr>
                            @endif
                    @endforeach
                    </tbody>
                </table>  
            

                </div>
            </div>

            @endif

            @foreach($soal->jawaban as $option)
                @if($soal->question_type == 'true_or_false' || $soal->question_type == 'multiple_choice')
                    <label class="css-control css-control-primary css-radio">
                        <input type="radio" class="css-control-input" name="multiple_choice" onchange="updateAnswer('tot_mc');" value="{{ $option->id}}" @if($existing_answer->contains('answer_question_option_id', $option->id)) checked @endif>
                        <span class="css-control-indicator"></span>
                        <?php
                            echo strip_tags($option->option_text, "<img>");
                        ?> 
                    </label>
                    <br>
                @elseif($soal->question_type == 'complex_multiple_choice')
                <label class="css-control css-control-primary css-checkbox">
                    <input type="checkbox" class="css-control-input" name="complex_multiple_box" onchange="updateAnswer('cmc');" value="{{ $option->id}}" @if($existing_answer->contains('answer_question_option_id', $option->id)) checked @endif>
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
                        <a href="{{ $soals->previousPageUrl() }}" class="btn btn-primary"><i class="si si-action-undo"></i> Sebelumnya</a>
                    @endif
                    <div class="form-check btn btn-block btn-secondary" style="width: 15%" data-toggle="buttons">
                        <div class=" ml-10" >
                            <input class="form-check-input d-flex justify-content-center align-items-center" type="checkbox" id="ragu" autocomplete="off" onchange="updateAnswer('{{$soal->question_type}}')"> Ragu - Ragu
                        </div>
                    </div>
                    @if ($soals->hasMorePages())
                        <a href="{{ $soals->nextPageUrl() }}" class="btn btn-primary"><i class="si si-action-redo"></i> Selanjutnya</a>
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

@livewireScripts
<script>

    $(document).ready(function() {
        // Mengubah ukuran semua gambar menjadi lebar 300px dan tinggi 300px
        $(".soal img").css({
        'max-width': "100px",
        'max-height': "100px"
        });
    });

    function updateAnswer(type) {
        var answer = null;
        var left = null;
        var ragu = 0;

        console.log(type);
        if (type === 'ld' || type === 'long_desc') {
            var textareaElement = document.querySelector('textarea[name="answer"]');
            answer = textareaElement.value;
        } else if (type === 'sd' || type === 'long_desc') {
            var textareaElement = document.querySelector('textarea[name="answer"]');
            answer = textareaElement.value;
        } else if (type === 'tot_mc' || type === 'true_or_false' || type === 'multiple_choice') {
            var selectedRadio = document.querySelector('input[name="multiple_choice"]:checked');
            if (selectedRadio) {
            answer = selectedRadio.value;
            }
        } else if (type === 'cmc' || type === 'complex_multiple_choice') {
            var checkboxes = document.querySelectorAll('input[name="complex_multiple_box"]:checked');
            if (checkboxes.length > 0) {
            answer = [];
            checkboxes.forEach(function(checkbox) {
                answer.push(checkbox.value);
            });
            }
        }else if(type == 'matching'){
            var selectedOptions = document.querySelectorAll('select[name="right_option[]"]');
            var selectedLeftOptions = document.querySelectorAll('input[name="left_matching[]"]');
            answer = [];
            left = [];

            selectedLeftOptions.forEach(function(element) {
                left.push(element.value);
            });

            selectedOptions.forEach(function(option) {
                answer.push(option.value);
            });
        }
    
        // console.log('Left:', left);
        // console.log('Answer:', answer);
        
        var examId = document.getElementById('exam_id').value;
        var questionId = document.getElementById('id_question').value;
        var question_type = document.getElementById('question_type').value;
        var checkbox = document.getElementById('ragu');

        if (checkbox.checked == true) {
            ragu = 1;
        }
        // console.log('ragu:', ragu);


        // Data yang akan dikirimkan dalam body request
        var data = {
            question_type: question_type,
            exam_id: examId,
            id_question: questionId,
            type: type,
            answer: answer,
            ragu: ragu,
            left: left
        };

        $.ajax({
            url: '/answer',
            type: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            data: JSON.stringify(data),
            success: function(data) {
                console.log(data);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }


    function setRagu() {
        document.getElementById("txtStatus").value = "1";
    }

    function setSimpan() {
        document.getElementById("txtStatus").value = "0";
    }

</script>

<script>
    $('[data-toggle="buttons"] .btn').on('click', function () {
    // toggle style
    $(this).toggleClass('btn-success btn-danger active');
    
    // toggle checkbox
    var $chk = $(this).find('[type=checkbox]');
    $chk.prop('checked',!$chk.prop('checked'));
    
    return false;
});
</script>