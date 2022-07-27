<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Worphyt Cadastro</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/registerstepscss/step2style.css') }}" >
        <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
        {{-- Fontawesome --}}
        <script src="https://kit.fontawesome.com/92e90f8568.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="main-container">
            <form method="POST" action="{{ route('personalprofile') }}">
                @csrf
                <img class="logo" src="{{ asset('img/logo.png') }}" alt="logo">
                <div class="contents">
                    <img id="img" src="{{ asset('img/user.png') }}" alt="profile">
                    <label><p>Editar Foto</p></label>
                    <input type="file" class="form-control" name="image" onchange="readURL(this);">
                    <textarea type="text" name="description" placeholder="Descrição"></textarea>
                </div>
                <button type="submit"><i class="fa-solid fa-arrow-right"></i></button>
            </form>
            @if($errors->all())
                @foreach($errors->all() as $error)
                    <p style="color: red">{{ $error }}</p>
                @endforeach
            @endif
        </div>
    </body>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                $('#img').attr('src', e.target.result).width(70).height(70);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</html>
