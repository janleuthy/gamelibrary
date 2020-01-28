function checkInputVorname(checkVorname) {
    if(checkVorname.value.length < 2) {
        checkVorname.style.border = "2px solid red";
    }
    else {
        checkVorname.style.border = "2px solid green";
    }
}

function checkInputNachname(checkNachname) {
    if(checkNachname.value.length < 2) {
        checkNachname.style.border = "2px solid red";
    }
    else {
        checkNachname.style.border = "2px solid green";
    }
}

function checkInputUserName(checkUsername) {
    if(checkUsername.value.length < 4 || checkUsername.value.length > 20) {
        checkUsername.style.border = "2px solid red";
    }
    else {
        checkUsername.style.border = "2px solid green";
    }
}

function checkInputEmail(checkEmail) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(re.test(checkEmail.value)) {
        checkEmail.style.border = "2px solid green";
    }
    else {
        checkEmail.style.border = "2px solid red";
    }
}

function checkInputPassword(checkPassword) {
    var pw1 = document.getElementById("password");
    var pw2 = document.getElementById("password2");
    if(pw1.value.length != 0 && pw2.value.length!= 0){
        if(pw1.value != pw2.value){
            pw1.style.border = "2px solid red";
            pw2.style.border = "2px solid red";
        }
        else{
            pw1.style.border = "2px solid green";
            pw2.style.border = "2px solid green";
        }
    }
    if(checkPassword.value.length < 8 || checkPassword.value.length > 20) {
        checkPassword.style.border = "2px solid red";
    }
    else {
        checkPassword.style.border = "2px solid green";
    }
}

function checkInputNewGame(checkNewGame) {
    if(checkNewGame.value.length < 1 || checkNewGame.value.length > 40) {
        checkNewGame.style.border = "2px solid red";
    }
    else {
        checkNewGame.style.border = "2px solid green";
    }
}

function checkInputGameDescription(checkDescription) {
    if(checkDescription.value.length < 1 || checkDescription.value.length > 100) {
        checkDescription.style.border = "2px solid red";
    }
    else {
        checkDescription.style.border = "2px solid green";
    }
}

function checkInputPicture(checkInputPicture) {
    if(checkInputPicture.value.length < 1) {
        checkInputPicture.style.border = "2px solid red";
    }
    else {
        checkInputPicture.style.border = "2px solid green";
    }
}
