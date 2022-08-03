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
                                    <p class="p-style">{{ $user->trialtime ?? 0 }}h</p>
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
                    <button onclick="addinputlang()" type="button">Adicionar Idioma</button>
                </div>
                <div class="card-footer">
                    <div class="card-itens" id="itenslang">
                        @forelse($languages as $language)
                            <div class="box">
                                <a href="{{ route('delete.language', $language->id) }}"><i class="fa-solid fa-trash"></i></a>
                                <p>{{ $language->language }}</p>
                            </div>
                        @empty
                            <div>
                                <p>Nenhum idioma cadastrado, insira pelo menos seu idioma nativo.</p>
                            </div>
                        @endforelse
                    </div>
                    <form style="display: none" id="formAddLanguage" method="POST" action="{{ route('add.language') }}">
                        @csrf
                        <div class="form">
                            <div class="input">
                                <input type="text" placeholder="Idioma" name="language">
                            </div>
                            <div class="buttons">
                                <button onclick="removeinputlang()" type="button">Cancelar</button>
                                <button type="submit">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>Especialidades</h3>
                    <button onclick="addinputspec()" type="button">Adicionar Especialidade</button>
                </div>
                <div class="card-footer">
                    @forelse($specialties as $specialty)
                        <div class="box">
                            <a href="{{ route('delete.specialty', $specialty->id) }}"><i class="fa-solid fa-trash"></i></a>
                            <p>{{ $specialty->specialty }}</p>
                        </div>
                    @empty
                        <div>
                            <p>Nenhuma especialidade cadastrada, insira pelo menos uma.</p>
                        </div>
                    @endforelse
                    <form style="display: none" id="formAddSpecialty" method="POST" action="{{ route('add.specialty') }}">
                        @csrf
                        <div class="form">
                            <div class="input">
                                <input type="text" placeholder="Especialidade" name="specialty">
                            </div>
                            <div class="buttons">
                                <button onclick="removeinputspec()" type="button">Cancelar</button>
                                <button>Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>Academias</h3>
                    <button onclick="addinputgym()" type="button">Adicionar Academia</button>
                </div>
                <div class="card-footer">
                    @forelse($gyms as $gym)
                        <div class="box">
                            <a href="{{ route('delete.gym', $specialty->id) }}"><i class="fa-solid fa-trash"></i></a>
                            <p>{{ $gym->gym }}</p>
                        </div>
                    @empty
                        <div>
                            <p>Nenhuma academia cadastrada.</p>
                        </div>
                    @endforelse
                    <form style="display: none" id="formAddGym" method="POST" action="{{ route('add.gym') }}">
                        @csrf
                        <div class="form">
                            <div class="input">
                                <input type="text" placeholder="Academia" name="gym">
                            </div>
                            <div class="buttons">
                                <button onclick="removeinputgym()" type="button">Cancelar</button>
                                <button>Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>Bairros</h3>
                    <button onclick="addinputreg()" type="button">Adicionar Bairro</button>
                </div>
                <div class="card-footer">
                    @forelse($regions as $region)
                        <div class="box">
                            <a href="{{ route('delete.region', $region->id) }}"><i class="fa-solid fa-trash"></i></a>
                            <p>{{ $region->region }}</p>
                        </div>
                    @empty
                        <div>
                            <p>Nenhuma regiao cadastrada.</p>
                        </div>
                    @endforelse
                    <form style="display: none" id="formAddRegion" method="POST" action="{{ route('add.region') }}">
                        @csrf
                        <div class="form">
                            <div class="input">
                                <input type="text" placeholder="Região" name="region">
                            </div>
                            <div class="buttons">
                                <button onclick="removeinputreg()" type="button">Cancelar</button>
                                <button>Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>Pacotes Promocionais</h3>
                    <button onclick="addinputpack()" type="button">Adicionar Pacote</button>
                </div>
                <div class="card-footer">
                    @forelse($packs as $pack)
                        <div class="box">
                            <a href="{{ route('delete.pack', $pack->id) }}"><i class="fa-solid fa-trash"></i></a>
                            <p>{{ $pack->hours }}h</p>
                            <p>-</p>
                            <p>R${{ $pack->pricepromotional }}</p>
                        </div>
                    @empty
                        <div>
                            <p>Nenhuma promoção cadastrada</p>
                        </div>
                    @endforelse
                    <form style="display: none" id="formAddPack" method="POST" action="{{ route('add.pack') }}">
                        @csrf
                        <div class="form">
                            <div class="inputs">
                                <div class="input">
                                    <input type="number" placeholder="Horas" name="hour">
                                </div>
                                <div class="input">
                                    <input type="number" step="0.01" placeholder="Preço" name="price">
                                </div>
                            </div>
                            <div class="buttons">
                                <button onclick="removeinputpack()" type="button">Cancelar</button>
                                <button>Salvar</button>
                            </div>
                        </div>
                    </form>
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
        <script>
            function addinputlang(){
                document.getElementById('formAddLanguage').style.display = "block";
                document.getElementById('itenslang').style.display = "none";
            }
            function removeinputlang(){
                document.getElementById('formAddLanguage').style.display = "none";
                document.getElementById('itenslang').style.display = "block";
            }
            function addinputspec(){
                document.getElementById('formAddSpecialty').style.display = "block";
            }
            function removeinputspec(){
                document.getElementById('formAddSpecialty').style.display = "none";
            }
            function addinputgym(){
                document.getElementById('formAddGym').style.display = "block";
            }
            function removeinputgym(){
                document.getElementById('formAddGym').style.display = "none";
            }
            function addinputreg(){
                document.getElementById('formAddRegion').style.display = "block";
            }
            function removeinputreg(){
                document.getElementById('formAddRegion').style.display = "none";
            }
            function addinputpack(){
                document.getElementById('formAddPack').style.display = "block";
            }
            function removeinputpack(){
                document.getElementById('formAddPack').style.display = "none";
            }
        </script>
{{--        <script>--}}
{{--            $(document).ready(function(){--}}

{{--                const form = '#formAddLanguage';--}}

{{--                $(form).on('submit', function(event){--}}
{{--                    event.preventDefault();--}}

{{--                    const url = $(this).attr('data-action');--}}

{{--                    $.ajax({--}}
{{--                        url: url,--}}
{{--                        method: 'POST',--}}
{{--                        data: new FormData(this),--}}
{{--                        dataType: 'JSON',--}}
{{--                        contentType: false,--}}
{{--                        cache: false,--}}
{{--                        processData: false,--}}
{{--                        success:function(response)--}}
{{--                        {--}}
{{--                            document.getElementById('formAddLanguage').style.display = "none";--}}
{{--                            document.getElementById('itenslang').style.display = "block";--}}
{{--                            $(form).trigger("reset");--}}
{{--                            alert(response.success)--}}
{{--                        },--}}
{{--                        error: function(response) {--}}
{{--                        }--}}
{{--                    });--}}
{{--                });--}}
{{--            });--}}
{{--        </script>--}}
    </body>
</html>
