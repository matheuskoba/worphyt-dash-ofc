<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Worphyt Cadastro</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/registerstepscss/step6style.css') }}" >

        {{-- Fontawesome --}}
        <script src="https://kit.fontawesome.com/92e90f8568.js" crossorigin="anonymous"></script>
        {{-- JQUERY --}}
        <script src="http://code.jquery.com/jquery-1.5.2rc1.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="main-container">
            <img class="logo" src="{{ asset('img/logo.png') }}" alt="logo">
            <form method="POST" action="">
                <div class="box">
                    <p>Academias</p>
                    <button type="button" id="add"><i class="fa-solid fa-plus"></i></button>
                </div>
                <div id="buildyourform">

                </div>
                <button> <i class="fa-solid fa-arrow-right"></i> </button>
            </form>
        </div>
    <script>
        $(document).ready(function() {
        $("#add").click(function() {
        var lastField = $("#buildyourform div:last");
        var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
        var fieldWrapper = $("<div class=\"fieldwrapper\" id=\"field" + intId + "\"/>");
        fieldWrapper.data("idx", intId);
        var fName = $("<div class=\"contents\"><div class=\"inputcref box-input\"><span><i class=\"fa-solid fa-dumbbell\"></i></span><input type=\"text\" name=\"gym\" placeholder=\"Nome da Academia\"></div></div>");
        var removeButton = $("<button id=\"remove\"><i class=\"fa-solid fa-trash\"></i></button>");
        removeButton.click(function() {
            $(this).parent().remove();
        });
        fieldWrapper.append(fName);
        fieldWrapper.append(removeButton);
        $("#buildyourform").append(fieldWrapper);
    });
});
    </script>

    </body>
</html>
