<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Worphyt Cadastro</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/registerstepscss/step1style.css') }}" >

    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/92e90f8568.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="main-container">
        <img class="logo" src="{{ asset('img/logo.png') }}" alt="logo">
        <div class="contents">
            <h1> Complete seu cadastro: </h1>
        </div>
        <form method="POST" action="">
            <div class="inputwhatsapp">
                <span>
                    <i class="fa-brands fa-whatsapp"></i>
                </span>
                <input type="text" name="whatsapp" placeholder="Whatsapp">
            </div>
            <div class="inputinstagram">
                <span>
                    <i class="fa-brands fa-instagram"></i>
                </span>
                <input type="text" name="instagram" placeholder="Instagram">
            </div>
            <div class="inputcref">
                <span>
                    <i class="fa-solid fa-id-card-clip"></i>
                </span>
                <input type="text" name="cref" placeholder="CREF">
            </div>
        </form>
        <button> <i class="fa-solid fa-arrow-right"></i> </button>
    </div>

</body>
</html>
