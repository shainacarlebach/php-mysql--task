"use strict";
var employeeModule = function () {
//function to operate CRUD with ajax
    return {

        getEmployee: function (user, callemployee) {
            
            $.ajax({
                url: 'back/api/getemployeeApi.php',
                data: { employeeArray: user },
                type: 'GET',
                cache: false,
                success: function (employeeresult) {
                    callemployee(JSON.parse(employeeresult));
                },
                error: function (jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = ' could not connect to server!.'
                    }
                }
            });
        },
        getAll: function (user, createtableemployees) {
            $.ajax({
                url: 'back/api/employeeApi.php',
                data: { employeeArray: user },
                type: 'GET',
                cache: false,
                success: function (employeeresult) {
                    createtableemployees(JSON.parse(employeeresult));
                },
                error: function (jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = ' could not connect to server!.'
                    }
                }
            });
        },
        createEmployee: function (user, showresponse) {

            $.ajax({
                url: 'back/api/employeeApi.php',
                data: { employeeArray: user },
                type: 'POST',
                cache: false,
                success: function (newemployee) {
                    showresponse(newemployee);
                },
                error: function (jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = ' could not connect to server!.'
                    }
                }
            });
        },
        deleteEmployee: function (user, showresponse) {
            let check = confirm("Are you sure you want to delete this employee?")
            if (check === true) {

                $.ajax({
                    url: 'back/api/employeeApi.php',
                    data: { employeeArray: user },
                    type: 'DELETE',
                    cache: false,
                    success: function (newemployee) {
                        showresponse(newemployee);
                    },
                    error: function (jqXHR, exception) {
                        var msg = '';
                        if (jqXHR.status === 0) {
                            msg = ' could not connect to server!.'
                        }
                    }
                });
            }
        },
        updateEmployee: function (user, showresponse) {

            $.ajax({
                url: 'back/api/employeeApi.php',
                data: { employeeArray: user },
                type: 'PUT',
                cache: false,
                success: function (newemployee) {
                    showresponse(newemployee);
                },
                error: function (jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = ' could not connect to server!.'
                    }
                }
            });
        }

    }
};

