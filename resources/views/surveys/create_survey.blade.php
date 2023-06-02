<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Slash</title>

    <!-- Include jQuery and jQuery UI -->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @include('surveys.components.header')
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <style>
    #subCanvas {
        min-height: 200px;
        border: 1px solid #ccc;
        padding: 10px;
    }

    .draggable {
        cursor: move;
        padding: 5px;
        border: 1px solid #ccc;
        background-color: #f9f9f9;
        margin-bottom: 5px;
    }

    .droppable {
        min-height: 50px;

        margin-bottom: 10px;
    }

    .form-element {
        min-height: 50px;
        border: 1px dashed #ccc;
        padding: 5px;
        margin-bottom: 10px;
        margin: 2px;
        border-radius: 4px;
    }

    .hide {
        display: none;
    }

    .addnew {
        cursor: pointer;
    }

    .img-survey img {
        width: 100%;
    }
    </style>
</head>

<body>
    
    <div class="container my-md-5 my-3">
        <h1 class="d-flex">Sur <div class="text-gradient-primary">vey</div>
        </h1>
        <div class="row p-md-3 p-0 bg-gradient-primary border border-1 rounded-3 sha">
            <div class="col-lg-4 col-md-6 col-12 p-md-2 p-3">
                <div id="toolbox">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title text-danger" style="font-size: 14px;">
                                *โปรดคลิกลากกล่องด้านล่างไปยังแบบสำรวจเพื่อสร้างคำถาม
                            </div>
                            <div class="draggable mb-2 form-control btn-gradient-primary" draggable="true" id="text">
                                ข้อความ
                            </div>
                            <div class="draggable mb-2 form-control btn-gradient-primary" draggable="true"
                                id="textarea">
                                ข้อความขนาดใหญ่
                            </div>
                            <div class="draggable mb-2 form-control btn-gradient-primary" draggable="true" id="radio">
                                ตัวเลือกแบบ Radio
                            </div>
                            <div class="draggable mb-2 form-control btn-gradient-primary" draggable="true"
                                id="checkbox">
                                ตัวเลือกแบบ Checkbox
                            </div>
                            {{-- <div class="draggable mb-2" draggable="true" id="button">
                                Button
                                </div>   --}}
                            <div class="img-survey">
                                <img src="{{ asset('/assets/img/img-survey.jpg') }}" alt="img-survey">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-6 col-12 p-md-2 p-3">
                @if(isset($formUpdate))
                    {{-- in case this is updated form --}}
                    <form action="">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" id="editabletitle" type="title" onclick="editText('title');">{{ $form->form_name }}</h5>
                                <div class="droppable" id="Canvas"></div>
                            </div>
                        </div>

                    </form>
                @else
                    <form action="">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" id="editabletitle" type="title" onclick="editText('title');">แบบสำรวจ 1</h5>
                                <div class="droppable" id="Canvas"></div>
                            </div>
                        </div>

                    </form>
                @endif
                
                <br>
                <form action="{{ route('survey.store') }}" method="POST" id="dragdropsubmitform">
                    @csrf
                    <div class="text-end">
                        <button type="submit" class="btn btn-gradient-primary">สร้าง</button>
                    </div>
                    <div class="submitform hide">
                        <div class="title-wraper">
                            <input type="text" name="title" value="survey1">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('/assets/js/dragdrop.js') }}"></script>
</body>

</html>