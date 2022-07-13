<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Worphyt Dashboard</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/perfilstyle.css') }}" >

    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/92e90f8568.js" crossorigin="anonymous"></script>
    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </head>
    <body>
        <x-pack-navbar/>
        <div class="container">
            <div class="head">
                <h2>Dashboard</h2>
                <p>Perfil</p>
            </div>
            <div class="profile">
                <p>Seus dados</p>
                <div class="card-profile">
                    <div class="card-header">
                        <img src="{{ asset('img/user.png') }}" alt="profile">
                        <h3>Raulisson Vinicius</h3>
                        <p>Bacharel em Educação Física</p>
                        <p>raulissonvalbuquerque@gmail.com</p>
                        <p>Brasília - DF</p>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                        <i class="fa-regular fa-star"></i>
                        <h4> 3.5 </h4>

                            <a href="{{ route('auth.logout') }}"><i class="fa-solid fa-right-from-bracket"></i> SAIR</a>

                    </div>
                </div>
                <div class="card-container">
                    <p>Suas avaliações</p>
                    <div class="card-body">
                        <div class="image">
                            <img src="{{ asset('img/user.png') }}" alt="profile">
                        </div>
                        <div class="info">
                            <h3> Lucas Oliveira </h3>
                            <div class="rate">
                                <h4> 3.5 </h4>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half-stroke"></i>
                                <i class="fa-regular fa-star"></i>
                                <h4> 13/07/2022 <h4>
                            </div>
                        </div>
                    </div>
                    <div class="description">
                        <p> Muito bom, chegou na hora. O Personal me tratou melhor que minha família. </p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
