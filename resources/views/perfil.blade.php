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
        <x-pack-navbar :user="$user"/>
        <div class="container">
            <div class="head">
                <h2>Dashboard</h2>
                <p>Perfil</p>
            </div>
            <div class="profile">
                <p>Seus dados</p>
{{--                <div class="card-cover">--}}
{{--                    <img src="{{ asset('img/capaoficial.png') }}" alt="coverphoto"/>--}}
{{--                </div>--}}
                <div class="card-info">
                    <div class="card-perfil">
                        <div class="infos">
                            <img src="{{ asset('img/user.png') }}" alt="profile">
                            <div>
                                <h3>{{ $user->name }}</h3>
                                <p><i class="fa-brands fa-instagram icon"></i>{{ $user->instagram }}</p>
                                <p><i class="fa-brands fa-whatsapp icon"></i>{{ $user->whatsapp }}</p>
                                <p><i class="fa-solid fa-id-card-clip icon"></i>{{ $user->cref }}</p>
                            </div>
                            <div>
                                <div class="prices">
                                    <p class="minorprice">R${{ $user->minorprice }}~</p>
                                    <p class="majorprice">R${{ $user->majorprice }}</p>
                                </div>
                                <div class="aula-experimental">
                                    <p>Aula experimental:</p>
                                    <p class="p-style">{{ $user->trialtime }}h</p>
                                </div>
                                <div class="tipo-atendimento">
                                    <p>Atendimento:</p>
                                    <p class="p-style">presencial e remoto</p>
                                </div>
                            </div>
                        </div>
                        <div class="button-edit">
                            <button onclick="document.getElementById('editmodal').style.display='block'"><i class="fa-solid fa-pen-to-square"></i>Editar Perfil</button>
                        </div>
                    </div>
                    @php $starPersonal = $user->stars; @endphp
                    <div class="contents">
                        <div class="rate">
                            @foreach(range(1,5) as $i)
                                <span class="fa-stack" style="width:1em">
                                    <i class="far fa-star fa-stack-1x"></i>
                                    @if($starPersonal >0)
                                        @if($starPersonal >0.5)
                                            <i class="fas fa-star fa-stack-1x"></i>
                                        @else
                                            <i class="fas fa-star-half fa-stack-1x"></i>
                                        @endif
                                    @endif
                                    @php $starPersonal--; @endphp
                                </span>
                            @endforeach
                        </div>
                        <h4>{{ number_format($user->stars, 1) }}</h4>
                        <div class="personaldescription">
                            <p>Meu trabalho como instrutora vem desde 2011 buscando sempre as melhores atualizações na área para complementar as aulas. Tenho experiência em trabalhar com treinamentos específicos para a necessidade e objetivo do aluno, de maneira que as aulas sejam prazerosas e com a melhor adesão possível.</p>
                        </div>
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
                                <h4> 13/07/2022 </h4>
                            </div>
                        </div>
                    </div>
                    <div class="description">
                        <p> Muito bom, chegou na hora. O Personal me tratou melhor que minha família. </p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>Idiomas</h3>
                    <button type="button">Adicionar Idioma</button>
                </div>
                <div class="card-footer">
                    @foreach($languages as $language)
                        @if($language)
                            <div class="box">
                                <a href="{{ route('delete.language', $language->id) }}"><i class="fa-solid fa-trash"></i></a>
                                <p>{{ $language->language }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>Especialidades</h3>
                    <button type="button">Adicionar Especialidade</button>
                </div>
                <div class="card-footer">
                    @foreach($specialties as $specialty)
                        @if($specialty)
                            <div class="box">
                                <a href=""><i class="fa-solid fa-trash"></i></a>
                                <p>{{ $specialty->specialty }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>Academias</h3>
                    <button type="button">Adicionar Academia</button>
                </div>
                <div class="card-footer">
                    @foreach($gyms as $gym)
                        @if($gym)
                            <div class="box">
                                <a href=""><i class="fa-solid fa-trash"></i></a>
                                <p>{{ $gym->gym }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>Bairros</h3>
                    <button type="button">Adicionar Bairro</button>
                </div>
                <div class="card-footer">
                    @foreach($regions as $region)
                        @if($region)
                            <div class="box">
                                <a href=""><i class="fa-solid fa-trash"></i></a>
                                <p>{{ $region->region }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>Pacotes Promocionais</h3>
                    <button type="button">Adicionar Pacote</button>
                </div>
                <div class="card-footer">
                    @foreach($packs as $pack)
                        @if($pack)
                            <div class="box">
                                <a href=""><i class="fa-solid fa-trash"></i></a>
                                <p>{{ $pack->hours }}h</p>
                                <p>-</p>
                                <p>R${{ $pack->pricepromotional }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <a href="{{ route('auth.logout') }}"><i class="fa-solid fa-right-from-bracket"></i> SAIR</a>
            <div style="display: none" id="editmodal" class="modal">
                <div class="modal-content">
                    <div class="modal-title">
                        <span onclick="document.getElementById('editmodal').style.display='none'">&times;</span>
                        <h2>EDITAR PERFIL</h2>
                    </div>
                    <form method="POST" action="/">
                        @csrf
                        <label for="formation">Formação</label>
                        <input type="text" id="formation" name="formation" placeholder="Altere sua formação">

                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" value="{{ $user->email }}">

                        <label for="address">Endereço</label>
                        <input type="text" id="adress" name="adress" placeholder="Altere seu endereço">

                        <label for="currentpassword">Senha atual</label>
                        <input type="password" id="currentpassword" name="currentpassword" placeholder="Digite sua senha atual">

                        <label for="newpassword">Senha nova</label>
                        <input type="password" id="newpassword" name="newpassword" placeholder="Digite sua nova senha">

                        <label for="confirmpassword">Confirmar senha</label>
                        <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirme sua nova senha">

                        <input type="submit" value="Salvar">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
