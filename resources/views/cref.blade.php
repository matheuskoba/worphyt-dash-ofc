<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro CREF</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/crefstyle.css') }}" >
    </head>
    <body>
    <div class="container">
        <img class="logo" src="{{ asset('img/logo.png') }}" alt="logo">
        <div class="">
            <h3 style="color: white;">Informe o seu CREF ativo para continuar:</h3>
        </div>
        <form method="POST" action="{{ route('addcref') }}">
            @csrf
            <div>
                <input id="cref" type="text" name="cref" maxlength="11" placeholder="Digite aqui o seu CREF" />
            </div>
            <div>
                <p>Exemplo: 000000-G/DF</p>
                <div class="checkcref">
                    <input type="checkbox" id="activecref" name="activecref" required>
                    <label for="activecref">Estou ciente que preciso ter meu cref ativo e regularizado.</label><br>
                </div>
                <input type="checkbox" id="formation" name="formation" required>
                <label for="formation">Declaro que sou <b>Bacharel em Educação Física.</b></label>
            </div>
            <div>
                <button type="submit"><i class="fa-solid fa-angle-right"></i></button>
            </div>
        </form>
        @if($errors->all())
            @foreach($errors->all() as $error)
                <p style="color: red">{{ $error }}</p>
            @endforeach
        @endif
    </div>

    <script src="https://kit.fontawesome.com/92e90f8568.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
