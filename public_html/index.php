<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/data.js" type="text/javascript"></script>
        <script src="js/validations.js" type="text/javascript"></script>
        <title>Challenge FixeAds</title>
        <?php include 'includes/functions.php'; ?>
    </head>
    <body class="register-body">
        <div class="title1">Registe-se gratuitamente</div>
        <div class="title2">Registe-se de forma fácil e rápida. O registo é rápido e grátis</div>
        <form action="" name="regForm" class="register-form" method="post" onsubmit="return(validateForm());">
            <!-- EMAIL -->
            <div class="field">
                <div class="col-left">
                    <label for="email">
                        Email
                        <em>*</em>
                    </label>
                </div>
                <div class="col-right">
                    <input type="email" id="email" name="email" onchange="resetError('email')" >
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
                    <input type="email" id="confirm-email" name="confirmEmail" onchange="resetError('email')" >
                    <span class="error" id="emailErr"></span>
                </div>
            </div>

            <!-- PASSWORD -->
            <div class="field password">
                <div class="col-left">
                    <label for="password">
                        Password
                        <em>*</em>
                    </label>
                    <label for="confirm-password">
                        Confirmar Password
                        <em>*</em>
                    </label>
                </div>
                <div class="col-right">
                    <div>
                        <div>
                            <input type="password" id="password" name="password" onchange="resetError('password')">
                        </div>
                        <div>
                            <input type="password" id="confirm-password" name="confirmPassword" onchange="resetError('password')" >
                            <span class="error" id="passwordErr"></span>
                        </div>
                    </div>
                    <div class="password-security">
                        <p>A sua password é segura?</p>
                    </div>
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
                    <input placeholder="Nome" type="text" id="first-name" name="firstName" >
                    <input placeholder="Apelido" type="text" id="last-name" name="lastName" >
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
                    <input type="text" id="address" name="address">
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
                    <div>
                        <input placeholder="Ex. 9999-999" type="text"
                               id="postal-code" name="postalCode" onchange="resetError('postalCode')">
                        <input type="text" id="city" name="city">
                        <span class="error" id="postalCodeErr"></span>
                    </div>
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
                    <select class="half" id="country" name="country" onchange="resetError('telephone')">
                    </select>
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
                    <input class="half" type="tel" id="nif" name="nif" onchange="resetError('nif')">
                    <span class="error" id="nifErr"></span>
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
                    <input placeholder="Insira o número aqui"
                           class="half" type="tel" id="telephone" name="telephone" onchange="resetError('telephone')">
                           <span class="error" id="telephoneErr"></span>
                </div>
            </div>

            <!-- SUBMIT BUTTON -->
            <div class="field">
                <div class="col-left">
                </div>
                <div class="col-right">
                    <input class="submit-button" type="submit" value="Registo">
                </div>
            </div>

        </form>

    </body>
</html>