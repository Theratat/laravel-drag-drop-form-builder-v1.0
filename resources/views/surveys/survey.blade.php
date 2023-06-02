@include('surveys.components.header')
<div class="container my-md-5 my-3">
    <div class="row p-md-3 p-0 bg-gradient-primary border border-1 rounded-3 sha bg-survey">
        <div
            class="col-md-8 col-12 mx-auto my-md-4 my-5 bg-white p-3 rounded-3 border-gradient-primary animate__animated animate__zoomIn">
            <form action="{{route('survey.storeresult')}}" method="POST">
                <div class="bg-gradient-primary rounded-3 p-4 mb-3">
                    <h2 class="text-white m-0 text-center">
                        {{$title}}แบบสำรวจความพึงพอใจ
                    </h2>
                </div>
                @csrf
                <input type="text" name="form_id" value="{{$id}}" hidden>

                @foreach($fields as $field)
                @if($field->field_type == 'text')
                {{-- generate text --}}
                <div class="form-group mb-3 animate__animated">
                    <label for="field{{$field->id}}" class="my-2">{{$field->field_label}}</label>
                    <input type="text" class="form-control" id="field{{$field->id}}" name="data[{{$field->id}}]">
                </div>

                @elseif($field->field_type == 'textarea')
                {{-- generate textarea --}}
                <div class="form-group mb-3 animate__animated">
                    <label for="field{{$field->id}}" class="my-2">{{$field->field_label}}</label>
                    <textarea class="form-control" id="field{{$field->id}}" rows="3"
                        name="data[{{$field->id}}]"></textarea>
                </div>

                @elseif($field->field_type == 'checkbox')
                {{-- generate checkbox --}}
                <div class="animate__animated">
                    <label class="mt-3 my-2">{{$field->field_label}}</label><br>
                    <div class="d-flex flex-md-row flex-column">
                        @foreach(json_decode($field->field_option_json) as $option)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="field{{$field->id}}" value="{{$option}}"
                                name="data[{{$field->id}}][]">
                            <label class="form-check-label" for="field{{$field->id}}" class="my-2">{{$option}}</label>
                        </div>
                        @endforeach
                    </div>
                </div>

                @elseif($field->field_type == 'radio')
                {{-- generate radio --}}
                <div class="animate__animated">
                    <label class="my-2">{{$field->field_label}}</label><br>
                    <div class="d-flex flex-md-row flex-column">
                        @foreach(json_decode($field->field_option_json) as $option)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="field{{$field->id}}" value="{{$option}}"
                                name="data[{{$field->id}}]">
                            <label class="form-check-label" for="field{{$field->id}}">{{$option}}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                @endforeach
                <div class="text-center">
                    <button type="submit" class="btn btn-gradient-primary2 mt-3">ส่งแบบสำรวจ</button>
                </div>
            </form>
        </div>
    </div>
</div>