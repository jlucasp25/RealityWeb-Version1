function showVehiclesModalBox() {
    var modal = document.getElementById('modalBox');
    modal.classList.add('fadeinAnimation');
    modal.style.display = "block";
}

function showLoginModalBox() {
    var modal = document.getElementById('modalBox');
    modal.classList.add('fadeinAnimation');
    modal.style.display = "block";
}

function exitModal() {
    var modal = document.getElementById('modalBox');
    modal.style.display = "none";
}

function showBookingsModalBox(date, block) {
    var titlephrase = document.getElementById('chosenDateTime');
    var choosenDate = document.getElementById('choosenDate');
    var choosenBlock = document.getElementById('choosenBlock');
    choosenDate.value = date;
    choosenBlock.value = block;
    titlephrase.innerHTML = 'Escolheu:<br><b>' + parseDate(date) + ' durante a ' + parseBlock(block) + '</b>';
    var modal = document.getElementById('modalBox');
    modal.style.display = "block";
}

function parseDate(date) {
    parts = date.split('-');
    return parts[2] + "/" + parts[1];
}

function parseBlock(block) {
    if (block == "MANHA")
        return "Manhã";
    else
        return "Tarde";
}

function parseState($state) {
    if ($state == "MARCADA")
        return "<b style=\"color:rgb(51, 204, 255)\">Marcada</b>";
    else if ($state == "FINALIZADA")
        return "<b style=\"color:rgb(51, 204, 51)\">Finalizada</b>";
    else if ($state == "OCORRENDO")
        return "<b style=\"color:rgb(255, 204, 0)\">Ocorrendo</b>";
    else
        return "<b style=\"color:rgb(255, 0, 0)\">Anulada</b>";
}

function checkEmptyInputsVehicle() {
    var brandBox = document.getElementById("brandBox");
    var modelBox = document.getElementById("modelBox");
    var plateBox = document.getElementById("plateBox");
    var isNotEmpty = true;
    if (brandBox.value.length == 0) {
        brandBox.style.borderColor = "red";
        isNotEmpty = false;
    } else {
        brandBox.style.borderColor = "";
    }
    if (modelBox.value.length == 0) {
        modelBox.style.borderColor = "red";
        isNotEmpty = false;
    } else {
        modelBox.style.borderColor = "";
    }
    if (plateBox.value.length == 0) {
        plateBox.style.borderColor = "red";
        isNotEmpty = false;
    } else {
        plateBox.style.borderColor = "";
    }

    return isNotEmpty;
}

function checkEmptyInputsLogin() {
    var userBox = document.getElementById("loginUserBox");
    var pswBox = document.getElementById("loginPasswordBox");
    var isNotEmpty = true;
    if (userBox.value.length == 0) {
        userBox.style.borderColor = "red";
        isNotEmpty = false;
    } else {
        userBox.style.borderColor = "";
    }
    if (pswBox.value.length == 0) {
        pswBox.style.borderColor = "red";
        isNotEmpty = false;
    } else {
        pswBox.style.borderColor = "";
    }
    return isNotEmpty;
}

function checkEmptyInputsRegister() {
    var nameBox = document.getElementById("registerNameBox");
    var unameBox = document.getElementById("registerUsernameBox");
    var pswBox = document.getElementById("registerPasswordBox");
    var emailBox = document.getElementById("registerEmailBox");
    var phoneBox = document.getElementById("registerPhoneBox");
    var isNotEmpty = true;
    if (nameBox.value.length == 0) {
        nameBox.style.borderColor = "red";
        isNotEmpty = false;
    } else {
        nameBox.style.borderColor = "";
    }
    if (unameBox.value.length == 0 || unameBox.value.includes(" ")) {
        unameBox.style.borderColor = "red";
        isNotEmpty = false;
    } else {
        unameBox.style.borderColor = "";
    }
    if (pswBox.value.length < 5) {
        pswBox.style.borderColor = "red";
        isNotEmpty = false;
    } else {
        pswBox.style.borderColor = "";
    }
    if (emailBox.value.length == 0 || !emailBox.includes("@")) {
        emailBox.style.borderColor = "red";
        isNotEmpty = false;
    } else {
        emailBox.style.borderColor = "";
    }
    if (phoneBox.value.length == 0) {
        phoneBox.style.borderColor = "red";
        isNotEmpty = false;
    } else {
        phoneBox.style.borderColor = "";
    }
    return isNotEmpty;
}