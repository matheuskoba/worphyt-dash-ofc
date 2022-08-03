<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Entrar</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/authstyle.css') }}" >
    </head>
    <body id="body">
        <div class="container">
            <div class="bluebg">
                <div class="box signin">
                    <h2>Já tem cadastro?</h2>
                    <button id="signinBtn" class="signinBtn">Logar</button>
                </div>
                <div class="box signup">
                    <h2>Você não tem cadastro?</h2>
                    <button id="signupBtn" class="signupBtn">Cadastrar</button>
                </div>
            </div>
            <div id="formBx" class="formBx">
                <div class="form signinForm">
                    <form method="POST" action="{{ route('auth.login') }}">
                        @csrf
                        <img class="logo" src="{{ asset('img/logob.png') }}" alt="logo">
                        <h3>Entrar</h3>
                        <input id="email" name="email" type="email" placeholder="Email">
                        <input id="password" name="password" type="password" placeholder="Senha">
                        <input type="submit" value="Entrar">
                        <div class="remember">
                            <div>
                                <input type="checkbox" id="rememberme" name="rememberme">
                                <label for="rememberme">Lembrar-me</label>
                            </div>
                            <a href="/">Esqueci a senha</a>
                        </div>
                        @if($errors->all())
                            @foreach($errors->all() as $error)
                                <p style="color: red">{{ $error }}</p>
                            @endforeach
                        @endif
                    </form>
                </div>

                <div class="form signupForm">
                    <form method="POST" action="{{ route('auth.register') }}">
                        @csrf
                        <img class="logo" src="{{ asset('img/logob.png') }}" alt="logo">
                        <h3>Cadastro</h3>
                        <input id="nome" name="name" type="text" placeholder="Nome Completo">
                        <input id="email" name="email" type="text" placeholder="Email">
                        <input id="senha" name="password" type="password" placeholder="Senha">
                        <input id="confirmaSenha" name="confirmPassword" type="password" placeholder="Confirme a senha">
                        <div class="check">
                            <input type="checkbox" id="term" name="term" value="Term">
                            <label for="term"> Eu aceito os temos de privacidade</label>
                        </div>
                        <input id="cad" type="submit" value="Cadastrar">
                    </form>
                </div>
            </div>
        </div>
        <script>
            const signinBtn = document.getElementById('signinBtn');
            const signupBtn = document.getElementById('signupBtn');
            const formBx = document.getElementById('formBx');
            const body = document.getElementById('body');

            signupBtn.addEventListener('click', (event) => {
                formBx.classList.add("active");
                body.classList.add("active");
            });

            signinBtn.onclick = function(){
                formBx.classList.remove("active");
                body.classList.remove("active");
            }
        </script>
    </body>
</html>
