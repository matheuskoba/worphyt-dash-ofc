<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Worphyt Dashboard</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
        <link rel="stylesheet" type="text/css" href="{{ asset('css/welcomestyle.css') }}" >

        {{-- Fontawesome --}}
        <script src="https://kit.fontawesome.com/92e90f8568.js" crossorigin="anonymous"></script>
        {{-- Jquery --}}
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </head>
    <body>
        <x-pack-navbar :name="$name"/>
        <div class="container">
            <div class="title">
                <h2>Dashboard</h2>
                <p>Início</p>
            </div>
            <div class="all-services">
                <div class="t-header">
                    <p>Serviços</p>
                    <button onclick="document.getElementById('open-modal-add').style.display='block'"><i class="fa-solid fa-plus"></i></button>
                </div>
                <div class="list-services">
                    @foreach($services as $service)
                        <div class="service">
                            <div class="name-service">
                                <div class="price-name">
                                    <p>{{ $service->name }}</p>
                                    <h6>{{ $service->price }}</h6>
                                </div>
                                <span>{{ $service->description }}</span>
                            </div>
                            <div class="buttons-service">
                                <button onclick="document.getElementById('open-modal').style.display='block'"><i class="fa-solid fa-pen-to-square"></i></button>
                                <button><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div style="display: none" id="open-modal-add" class="modal">
                <div class="modal-content">
                    <div class="modal-title">
                        <span onclick="document.getElementById('open-modal-add').style.display='none'">&times;</span>
                        <h2>ADICIONAR SERVIÇO</h2>
                    </div>
                    <form method="POST" action="{{ route('createService') }}">
                        @csrf
                        <label for="nameservice">Nome do serviço</label>
                        <input type="text" id="nameservice" name="nameservice" placeholder="Digite o nome do serviço">

                        <label for="priceservice">Preço do serviço</label>
                        <input type="number" step="0.01" id="priceservice" name="priceservice" placeholder="Digite o preço do serviço">

                        <label for="descriptionservice">Descrição do serviço</label>
                        <input type="text" id="descriptionservice" name="descriptionservice" placeholder="Digite a descrição do serviço">

                        <input type="submit" value="Salvar">
                    </form>
                </div>
            </div>
            <div style="display: none" id="open-modal" class="modal">
                <div class="modal-content">
                    <div class="modal-title">
                        <span onclick="document.getElementById('open-modal').style.display='none'">&times;</span>
                        <h2>EDITAR SERVIÇO</h2>
                    </div>
                    <form method="POST" action="/">
                        @csrf
                        <label for="sname">Nome do serviço</label>
                        <input type="text" id="sname" name="servicename" placeholder="Digite o nome do serviço">

                        <label for="sprice">Preço do serviço</label>
                        <input type="number" id="sprice" name="pricename" placeholder="Digite o preço do serviço">

                        <label for="sdescription">Descrição do serviço</label>
                        <input type="text" id="sdescription" name="description" placeholder="Digite a descrição do serviço">

                        <input type="submit" value="Salvar">
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>
