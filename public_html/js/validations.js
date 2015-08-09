"use strict";

function validateForm() {

    validateEmail();
    validatePassword();
    validatePostalCode();
    validateNif();
    validateTelephone();

    return false;
}

function resetError(element) {
    document.getElementById(element+'Err').style.display = 'none';
}

function setError(element, msg) {
    element.innerHTML = msg;
    element.style.display = 'block';
}

function validateEmail() {
    if (document.regForm.email.value !== document.regForm.confirmEmail.value) {
        var errorElement = document.getElementById('emailErr');
        setError(errorElement, 'Os emails não correspondem');
        document.regForm.confirmEmail.focus();
        return false;
    }
}

function validatePassword() {
    if (document.regForm.password.value !== document.regForm.confirmPassword.value) {
        var errorElement = document.getElementById('passwordErr');
        setError(errorElement, 'As passwords não correspondem');
        document.regForm.confirmPassword.focus();
        return false;
    }
}

function validatePostalCode() {
    var codeReg = /^[0-9]{4}-[0-9]{3}$/;
    if (document.regForm.postalCode.value && !codeReg.test(document.regForm.postalCode.value)) {
        var errorElement = document.getElementById('postalCodeErr');
        setError(errorElement, 'O código postal não é válido');
        document.regForm.postalCode.focus();
        return false;
    }
}

function validateTelephone() {
    var telRegex = /^[0-9]+$/;
    var country = document.regForm.country.value;

    if(country) {
        telRegex = new RegExp(countries[country].phoneRegex);
    }

    if (document.regForm.telephone.value && !telRegex.test(document.regForm.telephone.value)) {
        var errorElement = document.getElementById('telephoneErr');
        setError(errorElement, 'O telefone não é válido');
        document.regForm.telephone.focus();
        return false;
    }
}

function validateNif() {
    var nifReg = /^[0-9]{9}$/;
    if (document.regForm.nif.value && !nifReg.test(document.regForm.nif.value)) {
        var errorElement = document.getElementById('nifErr');
        setError(errorElement, 'O NIF não é válido');
        document.regForm.nif.focus();
        return false;
    }
}

function loadSelect() {
    var select = document.getElementById('country');
    var option;
    for (var key in countries) {
        option = document.createElement("option");
        option.value = key;
        option.textContent = countries[key].name;
        select.appendChild(option);
    }
}

(function initForm() {
    document.addEventListener("DOMContentLoaded", function() {
        loadSelect();
    });
})();
