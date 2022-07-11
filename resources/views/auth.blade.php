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
                    <form method="POST">
                        <h3>Entrar</h3>
                        <input id="emailPersonal" type="text" placeholder="Email">
                        <input id="senhaPersonal" type="password" placeholder="Senha">
                        <input id="personalTrainerCad" type="submit" value="Entrar">
                    </form>
                </div>

                <div class="form signupForm">
                    <form method="POST">
                        <h3>Cadastro</h3>
                        <input id="emailAluno" type="text" placeholder="Email">
                        <input id="senhaAluno" type="password" placeholder="Senha">
                        <input id="confirmaSenhaAluno" type="password" placeholder="Confirme a senha">
                        <input id="alunoCad" type="submit" value="Cadastrar">
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
