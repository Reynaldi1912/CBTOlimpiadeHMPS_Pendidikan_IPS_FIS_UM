<div class="container">
  <div class="row">
    <div class="col-8">
        @foreach($soals as $soal)
        <form action="{{route('answer.store')}}" method="post">
            @csrf
            <input type="hidden" name="exam_id" value="{{$id}}">
            <input type="hidden" name="id_question" value="{{$soal->question_id}}">
            <input type="hidden" name="question_type" value="{{$soal->question_type}}">
            <span>type : {{$soal->question_type}}</span>
            <h5>{{ $soal->question }}</h5>
            @if($soal->question_type == 'matching')  
                <table class="table">
                    <tbody>
                    @foreach($soal->jawaban as $option)
                        @if($option->type_matching == 'left')
                            <tr>
                                <input type="hidden" name="left_matching[]" value="{{$option->id}}">
                                <td>{{$option->option_text}}</td>
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
                        <span class="css-control-indicator"></span> {{ $option->option_text }} 
                    </label>
                    <br>
                @elseif($soal->question_type == 'complex_multiple_choice')
                <label class="css-control css-control-primary css-checkbox">
                    <input type="checkbox" class="css-control-input" name="complex_multiple_box[]" value="{{ $option->id}}" @if($existing_answer->contains('answer_question_option_id', $option->id)) checked @endif>
                    <span class="css-control-indicator"></span> {{ $option->option_text }}
                </label>
                <br>
                @endif
            @endforeach
        @endforeach

            <br>
            <div class="container">
                <div class="row">
                    <button class="btn btn-primary col-sm" type="button">Sebelumnya</button>
                    <button class="btn btn-secondary col-sm" type="button">Ragu - ragu</button>
                    <button class="btn btn-primary col-sm" type="button">Selanjutnya</button>
                </div>
            </div>
            <br><br>
        <button class="btn btn-success btn-block" type="submit">Simpan Jawaban</button>
    </form>
    </div>
    <div class="col-2"></div>
    <div class="col-2">
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Nomor Soal</h3>
            </div>
            <div class="block-content">
                {{ $soals->appends(['id'=>$soal->id])->links('vendor.pagination') }}
            </div>
            <footer class="footer">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <form action="{{route('pengerjaan.selesaikanUjian',$id)}}">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-block show_confirm_simpan_ujian">Selesaikan Ujian</button>
                            </form>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
  </div>
</div>

