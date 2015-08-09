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

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
              name="regForm" class="register-form" onsubmit="return(validateForm());">

            <!-- EMAIL -->
            <div class="field">
                <div class="col-left">
                    <label for="email">
                        Email
                        <em>*</em>
                    </label>
                </div>
                <div class="col-right">
                    <input type="email" id="email" name="email" maxlength="100"
                           onkeyup="resetError('email')" onchange="checkEmail(this)" required>
                    <span class="error" id="emailInUseErr"></span>
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
                    <input type="email" id="confirm-email" name="confirmEmail" maxlength="100"
                           onkeyup="resetError('email')" required>
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
                            <input type="password" id="password" name="password" maxlength="16"
                                   onkeyup="checkPasswordStrength(this.value)" required>
                        </div>
                        <div>
                            <input type="password" id="confirm-password" name="confirmPassword" maxlength="16"
                                   onkeyup="resetError('password')" required>
                            <span class="error" id="passwordErr"></span>
                        </div>
                    </div>
                    <div class="password-security">
                        <p>A sua password é segura?</p>
                        <span>Pouco segura</span>
                        <div id="password-level">
                            <div id="password-bar"></div>
                        </div>
                        <span>Muito segura</span>
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
                    <input placeholder="Nome" type="text" id="first-name" name="firstName" maxlength="100" required>
                    <input placeholder="Apelido" type="text" id="last-name" name="lastName" maxlength="100" required>
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
                    <input type="text" id="address" name="address" maxlength="100">
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
                        <input placeholder="Ex. 9999-999" type="text" maxlength="20"
                               id="postal-code" name="postalCode" onkeyup="resetError('postalCode')">
                        <input type="text" id="city" name="city" maxlength="100">
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
                    <select class="half" id="country" name="country" onkeyup="resetError('telephone')">
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
                    <input class="half" type="tel" id="nif" name="nif" maxlength="20"
                           onkeyup="resetError('nif')">
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
                    <input placeholder="Insira o número aqui" maxlength="50"
                           class="half" type="tel" id="telephone" name="telephone" onkeyup="resetError('telephone')">
                    <span class="error" id="telephoneErr"></span>
                </div>
            </div>

            <!-- SUBMIT BUTTON -->
            <div class="field">
                <div class="col-left">
                </div>
                <div class="col-right">
                    <input class="submit-button" type="submit" value="Registo">
                    <div id="main-error" class="error">
                        O formulário apresenta alguns erros
                    </div>

                    <?php
if (!$success) { ?>
                    <div class="server-error">
                        Ocorreu um erro. Volte a tentar mais tarde
                    </div>
                    <?php } ?>
                </div>
            </div>

        </form>

    </body>
</html>