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
        <x-pack-navbar/>
        <div class="container">
            <div class="title">
                <h2>Dashboard</h2>
                <p>Início</p>
            </div>
            <div class="all-services">
                <p>Serviços</p>
                <div class="list-services">
                    <div class="service">
                        <div class="name-service">
                            <div class="price-name">
                                <p>Emagrecimento (Iniciante)</p>
                                <h6>R$ 59,90</h6>
                            </div>
                            <span>Treino voltado para perda rápida de peso para iniciantes</span>
                        </div>
                        <div class="buttons-service">
                            <button onclick="document.getElementById('open-modal').style.display='block'"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                    <div class="service">
                        <div class="name-service">
                            <div class="price-name">
                                <p>Hipertrofia (Iniciante)</p>
                                <h6>R$ 59,90</h6>
                            </div>
                            <span>Treino voltado para ganho rápido de massa magra para iniciantes</span>
                        </div>
                        <div class="buttons-service">
                            <button onclick="document.getElementById('open-modal').style.display='block'"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                    <div class="service">
                        <div class="name-service">
                            <div class="price-name">
                                <p>Especial Idosos</p>
                                <h6>R$ 59,90</h6>
                            </div>
                            <span>Treino voltado para idosos que precisem de acompanhamento especial na realização de atividades fisicas</span>
                        </div>
                        <div class="buttons-service">
                            <button onclick="document.getElementById('open-modal').style.display='block'"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div style="display: none" id="open-modal" class="modal">
                <div class="modal-content">
                    <div class="modal-title">
                        <span onclick="document.getElementById('open-modal').style.display='none'">&times;</span>
                        <h2>EDITAR SERVIÇO</h2>
                    </div>
                    <form>
                        <label for="sname">Nome do serviço</label>
                        <input type="text" id="sname" name="servicename" placeholder="Digite o nome do serviço ex. hipertrofia (iniciante)">

                        <label for="sprice">Preço do serviço</label>
                        <input type="number" id="sprice" name="pricename" placeholder="Digite o preço do serviço ex. 59,90">

                        <label for="sdescription">Descrição do serviço</label>
                        <input type="text" id="sdescription" name="description" placeholder="Digite a descrição do serviço">

                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>
