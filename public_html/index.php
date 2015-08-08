<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
        <title>Challenge FixeAds</title>
    </head>
    <body class="register-body">
       <div class="title1">Registe-se gratuitamente</div>
       <div class="title2">Registe-se de forma fácil e rápida. O registo é rápido e grátis</div>
        <form action="" class="register-form">
            <!-- EMAIL -->
            <div class="field">
                <div class="col-left">
                    <label for="email">
                        Email
                        <em>*</em>
                    </label>
                </div>
                <div class="col-right">
                    <input type="email" id="email">
                </div>
            </div>

            <!-- EMAIL CONFIRMATION -->
            <div class="field">
                <div class="col-left">
                    <label for="confirm-email">
                        Confirmar Email
                        <em>*</em>
                    </label>
                </div>
                <div class="col-right">
                    <input type="email" id="confirm-email">
                </div>
            </div>

            <!-- PASSWORD -->
            <div class="field">
                <div class="col-left">
                    <label for="password">
                        Password
                        <em>*</em>
                    </label>
                </div>
                <div class="col-right">
                    <input class="half" type="password" id="password">
                </div>
            </div>

            <!-- PASSWORD CONFIRMATION -->
            <div class="field">
                <div class="col-left">
                    <label for="confirm-password">
                        Confirmar Password
                        <em>*</em>
                    </label>
                </div>
                <div class="col-right">
                    <input class="half" type="password" id="confirm-password">
                </div>
            </div>

            <!-- NAME -->
            <div class="field">
                <div class="col-left">
                    <label for="first-name">
                        Nome
                        <em>*</em>
                    </label>
                </div>
                <div class="col-right col-half">
                    <input placeholder="Nome" type="text" id="first-name">
                    <input placeholder="Apelido" type="text" id="last-name">

                </div>

            </div>
            <!-- ADDRESS -->
            <div class="field">
                <div class="col-left">
                    <label for="address">
                        Rua / Nº
                    </label>
                </div>
                <div class="col-right">
                    <input type="text" id="address">
                </div>
            </div>

            <!-- POSTAL CODE - CITY -->
            <div class="field">
                <div class="col-left">
                    <label for="postal-code">
                        Código Postal / Localidade
                    </label>
                </div>
                <div class="col-right col-part">
                    <input placeholder="Ex. 9999-999" type="text" id="postal-code">
                    <input type="text" id="city">
                </div>
            </div>

            <!-- COUNTRY -->
            <div class="field">
                <div class="col-left">
                    <label for="country">
                        País
                    </label>
                </div>
                <div class="col-right">
                    <input class="half" type="select" id="country">
                </div>
            </div>

            <!-- NIF -->
            <div class="field">
                <div class="col-left">
                    <label for="nif">
                        NIF
                    </label>
                </div>
                <div class="col-right">
                    <input class="half" type="tel" id="nif">
                </div>
            </div>

            <!-- TELEPHONE -->
            <div class="field">
                <div class="col-left">
                    <label for="telephone">
                        Telefone
                    </label>
                </div>
                <div class="col-right">
                    <input placeholder="Insira o número aqui" class="half" type="tel" id="telephone">
                </div>
            </div>

          <!-- SUBMIT BUTTON -->
           <div class="field">
                <div class="col-left">
                </div>
                <div class="col-right">
                    <input class="submit-button" type="button" value="Registo">
                </div>
            </div>

        </form>

    </body>
</html>