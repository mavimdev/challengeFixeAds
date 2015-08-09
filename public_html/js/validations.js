'use strict';

var emailInUse = false;

/* validation of the form on submit */
function validateForm() {
    var success = true;
    checkEmail(document.regForm.email);
    success = validateEmail() && success;
    success = validatePassword() && success;
    success = validatePostalCode() && success;
    success = validateNif() && success;
    success = validateTelephone() && success;
    success = !emailInUse && success;
    return success;
}

/* reset the error when the user change the input data */
function resetError(element) {
    window.setTimeout(function () {
        document.getElementById(element + 'Err').style.display = 'none';
        document.getElementById('main-error').style.display = 'none';
    }, 100);
}

/* set a error on a field with a message */
function setError(id, msg) {
    var errorElement, mainErrorElement;
    errorElement = document.getElementById(id);
    errorElement.innerHTML = msg;
    errorElement.style.display = 'block';
    mainErrorElement = document.getElementById('main-error');
    mainErrorElement.style.display = 'block';
}

/* check if the email is already in use, using a AJAX call */
function checkEmail(element) {
    getRequest(
        'includes/checkEmail.php',
        onAJAXSuccess,
        onAJAXError,
        element.value
    );
}

/* AJAX success callback */
function onAJAXSuccess(response) {
    response = response.replace(/(\r\n|\n|\r)/gm, "");
    if (response === 'EMAIL_IN_USE') {
        emailInUse = true;
        setError('emailInUseErr', 'O email introduzido já está em uso');
    } else {
        emailInUse = false;
        resetError('emailInUse');
    }
}

/* AJAX error callback */
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

// load the options for the country select
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

// helper function for cross-browser request object - AJAX call
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

/* to draw the password strength graphic */
function checkPasswordStrength(password) {
    resetError('password'); // reset the error message
    var percent = calculatePasswordStrength(password);
    document.getElementById('password-bar').style.width = percent + '%';
}

/* password strength meter algorithm */
/* the algorithm will use 4 sets: lowercase letters, uppercase letters, numbers and symbols.
* I will consider that the maximum strength will use 16 digits with characters of the 4 sets. */
function calculatePasswordStrength(password) {
    var maxStrength = 16*4;
    var total, percent;
    var set = {
        lowerLetters: 'abcdefghijklmnopqrstuvwxyz',
        upperLetters: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
        numbers: '0123456789',
        symbols: '!&%/()=?^*+][#><;:,._-|'
    };
    // to count each type of digits (lowers, uppers, numbers and symbols)
    var l=0, u=0, n=0, s=0;

    password = password.split('');
    for (var i=0; i<password.length; i++) {
        if(set.lowerLetters.indexOf(password[i]) !== -1) {
            l++;
        } else if (set.upperLetters.indexOf(password[i]) !== -1) {
            u++;
        } else if (set.numbers.indexOf(password[i]) !== -1) {
            n++;
        } else {
            s++;
        }
    }

    var factor=0;
    if (l > 0) {
        factor++;
    }
    if (u > 0) {
        factor++;
    }
    if (n > 0) {
        factor++;
    }
    if (s > 0) {
        factor++;
    }

    total = password.length * factor;
    percent = total / maxStrength * 100;
    return parseInt(percent, 10);
}

/* initialization on start */
(function initForm() {
    document.addEventListener("DOMContentLoaded", function() {
        loadSelect();
    });
})();
