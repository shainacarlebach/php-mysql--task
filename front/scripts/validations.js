'use strict;'
//check employee form 

function checkID(employeeForm) {
    if ($('#selectemployee').val() == "" || !$("#selectemployee")) {
        alert("Error: Id cannot be blank!");
        $('#selectemployee').focus();
        return false;
    }

    $('#selectemployee').filter(function () {
        return this.value.match(/^[1-9][0-9]?$|^100$/)
    }).addClass("inputError");
    console.log("Your input is valid! ");
    return true;
}

function checkForm(employeeForm) {

    if ($('#selectemployee').val() == "" || !$("#selectemployee")) {
        alert("Error: Id cannot be blank!");
        $('#selectemployee').focus();
        return false;
    }

    $('#selectemployee').filter(function () {
        return this.value.match(/^[1-9][0-9]?$|^100$/)
    }).addClass("inputError");


    if ($("#name").val() == "" || !$("#name")) {
        alert("Error: Name cannot be blank!");
        $("#name").focus();
        return false;
    }

    $("#name").filter(function () {
        return this.value.match(/^[a-zA-Z]+$/)
    }).addClass("inputError");


    if ($("#date").val() == "" || !$("#date")) {
        alert("Error: Date cannot be blank!");
        $("#name").focus();
        return false;
    }

    $("#date").filter(function () {
        return this.value.match(/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/);
    }).addClass("inputError");

    console.log("Your input is valid! ");
    return true;
}