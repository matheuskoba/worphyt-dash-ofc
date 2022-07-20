<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Worphyt Cadastro</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/registerstepscss/step3style.css') }}" >

    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/92e90f8568.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="main-container">
        <img class="logo" src="{{ asset('img/logo.png') }}" alt="logo">
            <form method="POST" action="">
                <div class="contents">
                    <div class="inputminorprice">
                        <span>
                            <i class="fa-solid fa-brazilian-real-sign"></i>
                        </span>
                        <input type="text" name="minorprice" placeholder="Menor preço">
                    </div>
                    <h1>~</h1>
                    <div class="inputmajorprice">
                        <span>
                            <i class="fa-solid fa-brazilian-real-sign"></i>
                        </span>
                        <input type="text" name="majorprice" placeholder="Maior preço">
                    </div>
                </div>
                <h1>Pacotes promocionais
                    <i class="fa-solid fa-plus"></i>
                </h1>
                <div class="contents">
                    <div class="inputhourclass">
                        <span>
                            <i class="fa-solid fa-clock"></i>
                        </span>
                        <input type="text" name="hourclass" placeholder="Hora aula">
                    </div>
                    <div class="inputprice">
                        <span>
                            <i class="fa-solid fa-brazilian-real-sign"></i>
                        </span>
                        <input type="text" name="price" placeholder="Preço">
                    </div>
                    <i class="fa-solid fa-trash"></i>
                </div>
            </form>
        <button> <i class="fa-solid fa-arrow-right"></i> </button>
    </div>
</body>
</html>
