'use strict';

function validateForm() {
    var success = true;
    success = validateEmail() && success;
    success = validatePassword() && success;
    success = validatePostalCode() && success;
    success = validateNif() && success;
    success = validateTelephone() && success;

    return success;
}

function resetError(element) {
    window.setTimeout(function () {
        document.getElementById(element + 'Err').style.display = 'none';
        document.getElementById('main-error').style.display = 'none';
    }, 100);
}

function setError(id, msg) {
    var errorElement, mainErrorElement;
    errorElement = document.getElementById(id);
    errorElement.innerHTML = msg;
    errorElement.style.display = 'block';
    mainErrorElement = document.getElementById('main-error');
    mainErrorElement.style.display = 'block';
}

function checkEmail(element) {
    getRequest(
        'includes/checkEmail.php',
        onAJAXSuccess,
        onAJAXError,
        element.value
    );
    return false;
}

function onAJAXSuccess(response) {
    response = response.replace(/(\r\n|\n|\r)/gm, "");
    if (response === 'EMAIL_IN_USE') {
        setError('emailErr', 'O email introduzido já está em uso');
        document.regForm.email.focus();
    }
}

function onAJAXError(error) {
    // something went wrong
    console.log(error);
}

function validateEmail() {
    if (document.regForm.email.value !== document.regForm.confirmEmail.value) {
        setError('emailErr', 'Os emails não correspondem');
        document.regForm.confirmEmail.focus();
        return false;
    }
    return true;
}

function validatePassword() {
    if (document.regForm.password.value !== document.regForm.confirmPassword.value) {
        setError('passwordErr', 'As passwords não correspondem');
        document.regForm.confirmPassword.focus();
        return false;
    }
    return true;
}

function validatePostalCode() {
    var codeReg = /^[0-9]{4}-[0-9]{3}$/;
    if (document.regForm.postalCode.value && !codeReg.test(document.regForm.postalCode.value)) {
        setError('postalCodeErr', 'O código postal não é válido');
        document.regForm.postalCode.focus();
        return false;
    }
    return true;
}

function validateTelephone() {
    var telRegex = /^[0-9]+$/;
    var index = document.regForm.country.selectedIndex;
    telRegex = new RegExp(countries[index].phoneRegex);

    if (document.regForm.telephone.value && !telRegex.test(document.regForm.telephone.value)) {
        setError('telephoneErr', 'O telefone não é válido');
        document.regForm.telephone.focus();
        return false;
    }
    return true;
}

function validateNif() {
    var nifReg = /^[0-9]{9}$/;
    if (document.regForm.nif.value && !nifReg.test(document.regForm.nif.value)) {
        setError('nifErr', 'O NIF não é válido');
        document.regForm.nif.focus();
        return false;
    }
    return true;
}

function loadSelect() {
    var select = document.getElementById('country');
    var option, key;
    for (key in countries) {
        option = document.createElement("option");
        option.value = countries[key].name;
        option.label = countries[key].name;
        select.appendChild(option);
    }
}

// helper function for cross-browser request object
function getRequest(url, success, error, data) {
    var req = false;
    try {
        // most browsers
        req = new XMLHttpRequest();
    } catch (e) {
        // IE
        try {
            req = new ActiveXObject("Msxml2.XMLHTTP");
        } catch(e) {
            // try an older version
            try {
                req = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                return false;
            }
        }
    }
    if (!req) return false;
    if (typeof success !== 'function') success = function () {};
    if (typeof error!== 'function') error = function () {};
    req.onreadystatechange = function(){
        if(req.readyState === 4) {
            return req.status === 200 ?
                success(req.responseText) : error(req.status);
        }
    };
    req.open("GET", url + '?email=' + data, true);
    req.send();
    return req;
}

(function initForm() {
    document.addEventListener("DOMContentLoaded", function() {
        loadSelect();
    });
})();
