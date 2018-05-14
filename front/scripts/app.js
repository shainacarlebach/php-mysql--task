//let's get started! 
"use strict";

$('document').ready(function () {

    //click on get employee by id to get info @ one employee 
    $("#getemployee").click(function (e) {
        e.preventDefault();
        if (checkID(document.forms[0])) {
            let employeemodule = new employeeModule();
            let user = {
                employee_id: $("#selectemployee").val(),
                employee_name: $("#name").val(),
                startingDate: $("#date").val()
            }
            employeemodule.getEmployee(user, function (result) {
                console.log(result);
                for (var i in result) {
                    console.log(result["0"].employee_name);
                    $("#name").val(result["0"].employee_name);
                    $("#date").val(result["0"].startingDate);

                    if (result === "This employee doesn't exist!") {
                        alert(result);
                    }
                }
            });
        }
    }),
        //get all employees in table    
        $("#getall").click(function (e) {
            e.preventDefault();

            let employeemodule = new employeeModule();
            let user = {
                employee_id: $("#selectemployee").val(),
                employee_name: $("#name").val(),
                startingDate: $("#date").val()
            }
            employeemodule.getAll(user, function (data) {
                console.log(data);

                var html = "<table border='1px solid' padding='5px' border-spacing='5px' width='100%'>";
                for (var i = 0; i < data.length; i++) {
                    html += "<tr padding='5px' border-spacing='5px'>";
                    html += "<th>" + "Employee ID:" + "</th>";
                    html += "<th>" + "Employee Name:" + "</th>";
                    html += "<th>" + "Starting date:" + "</th>";
                    html += "</tr>";
                    html += "<tr padding='5px' border-spacing='5px'>";
                    html += "<td>" + data[i].employee_id + "</td>";
                    html += "<td>" + data[i].employee_name + "</td>";
                    html += "<td>" + data[i].startingDate + "</td>";
                    html += "</tr>";


                }
                html += "</table>";
                $("#datatable").html(html);
            });

        }),
        //create a new employee
        $("#createemployee").click(function (e) {
            e.preventDefault();
            if (checkForm(document.forms[0])) {
                let employeemodule = new employeeModule();
                let user = {
                    employee_id: $("#selectemployee").val().trim(),
                    employee_name: $("#name").val().trim(),
                    startingDate: $("#date").val()
                }
                employeemodule.createEmployee(user, function (response) {
                    alert($.trim(response));

                });
            }
        }),
        //delete an employee
        $("#delete").click(function (e) {
            e.preventDefault();
            if (checkForm(document.forms[0])) {
                let employeemodule = new employeeModule();
                let user = {
                    employee_id: $("#selectemployee").val().trim(),
                    employee_name: $("#name").val().trim(),
                    startingDate: $("#date").val()
                }
                employeemodule.deleteEmployee(user, function (response) {
                    alert($.trim(response));

                });
            }
        }),
        //update an employee        
        $("#update").click(function (e) {
            e.preventDefault();
            if (checkForm(document.forms[0])) {
                let employeemodule = new employeeModule();
                let user = {
                    employee_id: $("#selectemployee").val().trim(),
                    employee_name: $("#name").val().trim(),
                    startingDate: $("#date").val()
                }
                employeemodule.updateEmployee(user, function (response) {
                    alert($.trim(response));

                });
            }
        });

});