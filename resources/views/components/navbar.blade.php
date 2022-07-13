<div>
    <header>
        <img class="logo" src="{{ asset('img/logo.png') }}" alt="logo">
        <nav class="">
            <div class="menus">
                <ul>
                    <li><a href="http://127.0.0.1:8000/dashboard"><i class="fa-solid fa-house"></i>Início</a></li>
                    <li><a href="http://127.0.0.1:8000/dashboard/agenda"><i class="fa-solid fa-calendar"></i>Agenda</a></li>
                    <li><a href="http://127.0.0.1:8000/dashboard/perfil"><i class="fa-solid fa-user"></i>Perfil</a></li>
                </ul>
            </div>

            <div class="profile">
                <p>{{ 'username' }} <img src="{{ asset('img/user.png') }}" alt="profile"></p>
            </div>
        </nav>
        <div class="toggle">
            <i style="color: white" class="fa-solid fa-bars open"></i>
        </div>
    </header>

    <script>
        $(document).ready(function(){
            $('.toggle').click(function(){
                $('nav').toggleClass('active')
            })
        })
    </script>
</div>
