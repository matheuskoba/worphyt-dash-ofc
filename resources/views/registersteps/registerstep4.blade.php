<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Worphyt Cadastro</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/registerstepscss/step4style.css') }}" >

        {{-- Fontawesome --}}
        <script src="https://kit.fontawesome.com/92e90f8568.js" crossorigin="anonymous"></script>
        {{-- JQUERY --}}
        <script src="https://code.jquery.com/jquery-2.2.3.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="main-container">
            <img class="logo" src="{{ asset('img/logo.png') }}" alt="logo">
            <form method="POST" action="">
                <div>
                    <label>
                        <input type="checkbox" class="hidden" name="experimental" checked="checked" />
                        <i class="fa fa-toggle-on"></i>
                        Aula Experimental
                    </label>
                </div>
                <div id="report">
                    <div class="experimental">
                        <div class="box-input">
                            <span>
                                <i class="fa-regular fa-clock"></i>
                            </span>
                            <input type="text" name="time" placeholder="Tempo de aula">
                        </div>
                        <i class="fa-solid fa-trash"></i>
                    </div>
                </div>
                <div>
                    <p>Especialidades</p>
                    <i class="fa-solid fa-plus"></i>
                </div>
                <div class="contents">
                    <div class="inputcref box-input">
                            <span>
                                <i class="fa-solid fa-dumbbell"></i>
                            </span>
                        <input type="text" name="specialty" placeholder="Especialidade">
                    </div>
                    <i class="fa-solid fa-trash"></i>
                </div>
                <button> <i class="fa-solid fa-arrow-right"></i> </button>
            </form>
        </div>
        <script>
            $("input:checkbox:not(:checked)").each(function() {
                var column = "#report ." + $(this).attr("name");
                $(column).hide();
            });
            $("input:checkbox").click(function() {
                var column = "#report ." + $(this).attr("name");
                $(this).next('i.fa').toggleClass('fa-toggle-on fa-toggle-off');
                $(column).toggle();
            });
        </script>
    </body>
</html>
