<div class="container">
  <div class="row">
    <div class="col-2">
        {{ $soals->links('vendor.pagination') }}
    </div>
    <div class="col-2"></div>
    <div class="col-8">
        @foreach($soals as $soal)
            <span>type : {{$soal->question_type}}</span>
            <h5>{{ $soal->question }}</h5>
            @if($soal->question_type == 'matching')  
                <table class="table">
                    <tbody>
                        @foreach($soal->jawaban as $option)
                            @if($option->type_matching == 'left')
                                <tr>
                                    <td>{{$option->option_text}}</td>
                                    <td>
                                        <select name="right_option" class="form-control">
                                        @foreach($soal->jawaban->where('type_matching', 'right') as $option_right)
                                            <option value="{{ $option_right->id }}">{{ $option_right->option_text }}</option>
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
                        <input type="radio" class="css-control-input" name="radio-group2">
                        <span class="css-control-indicator"></span> {{ $option->option_text }} 
                    </label>
                    <br>
                @elseif($soal->question_type == 'complex_multiple_choice')
                <label class="css-control css-control-primary css-checkbox">
                    <input type="checkbox" class="css-control-input">
                    <span class="css-control-indicator"></span> {{ $option->option_text }}
                </label>
                <br>
                @endif
            @endforeach
        @endforeach

        <br>
        <button class="btn btn-success btn-block">Simpan Jawaban</button>
    </div>
  </div>
</div>

