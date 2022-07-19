<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Worphyt Cadastro</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/registerstepscss/step4style.css') }}" >

    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/92e90f8568.js" crossorigin="anonymous"></script>

</head>
<body>
<div class="main-container">
    <img class="logo" src="{{ asset('img/logo.png') }}" alt="logo">
    <form method="POST" action="">
        <div>
            <p>Aula experimental</p>
            <i class="fa-solid fa-toggle-off"></i>
        </div>
        <div class="inputexperimental">
                <span>
                    <i class="fa-regular fa-clock"></i>
                </span>
            <input type="text" name="time" placeholder="Tempo de aula">
            <i class="fa-solid fa-trash"></i>
        </div>
        <div>
            <p>Especialidades</p>
            <i class="fa-solid fa-plus"></i>
        </div>
        <div class="inputcref">
                <span>
                    <i class="fa-solid fa-dumbbell"></i>
                </span>
            <input type="text" name="specialty" placeholder="Especialidade">
            <i class="fa-solid fa-trash"></i>
        </div>
    </form>
    <button> <i class="fa-solid fa-arrow-right"></i> </button>
</div>

</body>
</html>
