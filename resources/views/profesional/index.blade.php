<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Worphyt Dashboard</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
        <link rel="stylesheet" type="text/css" href="{{ asset('css/professional.css') }}" >

        {{-- Fontawesome --}}
        <script src="https://kit.fontawesome.com/92e90f8568.js" crossorigin="anonymous"></script>
        {{-- Jquery --}}
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </head>
    <body>
        <x-pack-navbar :user="$user"/>
        <div class="container">
           <div class="title">
                <h2>Lista de profissionais</h2>
           </div>
           <div class="card">
                <form class="filter" method="POST" action="{{ route('professional.filter') }}">
                    @csrf
                    <div class="filterName">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" />
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <hr>
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Especialidade</th>
                            <th>Menor Preço</th>
                            <th>Maior Preço</th>
                            <th>Avaliação</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($professionals as $professional)
                            <tr>
                                <td>{{ $professional->name }}</td>
                                <td>{{ $professional->specialty }}</td>
                                <td>R$ {{ number_format($professional->minorprice,2,',','.') }}</td>
                                <td>R$ {{ number_format($professional->majorprice,2,',','.') }}</td>
                                <td>{{ $professional->stars }} <i class="fa-solid fa-star"></i></td>
                                <td><a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
           </div>
        </div>
    </body>
</html>
