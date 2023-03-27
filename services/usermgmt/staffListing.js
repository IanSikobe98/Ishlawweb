
var jwt = sessionStorage.getItem('tokenuse');
// sessionStorage.removeItem('tokenuse');
console.log(jwt);
//Fill files of tables
$(document).ready(function () {

    swal({
        title: "Checking...",
        text: "Please wait",
        icon: "images/ajaxloader.gif",
        iconHtml: 1500,
        showConfirmButton: false,
        allowOutsideClick: false,
            closeOnConfirm: false,
            showLoaderOnConfirm: true
    }
        // , function () {
        //     setTimeout(function () {
        //         swal("Ajax request finished!");
        //     }, 2000);
        // });

);

    $.ajax
    ({
        type: "POST",


        url: Usermngmt.fetchusers,
        dataType: 'json',
        async: false,
        beforeSend: function (xhr) {
            xhr.setRequestHeader ("Ulinzi", "Bearer " + jwt );
        },



        success: function (result) {
            console.log(result);
            console.log("DONE");

            var file = '';
            // var p =0
            console.log("successful");
            console.log(result);
            var responseCode = result.responseCode;
            if (responseCode === "00") {
                var data = result.responseBody;
                console.log("responseBody:");
                console.log(data);



            for(var i in data) {

                role = getRole(data[i].TeamId);
                if(data[i].TeamId !=5 ) {
                    file += '<tr class="warning">';


                    file += '<td>' +
                        data[i].firstName + '</td>';

                    file += '<td>' +
                        data[i].surname + '</td>';

                    file += '<td>' +
                        data[i].phoneNumber + '</td>';

                    file += '<td>' +
                        data[i].emailaddress + '</td>';

                    file += '<td>' +
                        data[i].dateCreated.split('T')[0] + '</td>';

                    file += '<td>' +
                        role + '</td>';

                    console.log(data[i].TeamId)
                    // file += '<td>' +
                    //     data[i].Approval + '</td>';
                    //
                    // file +='<td>' + '<button type="button" class="btn btn-success" onclick="return approval(\'' + "Accepted" + '\','+data[i].Rqid+');">Accept</button>'+
                    //     '<button type="button" class="btn btn-danger" onclick="return approval(\'' + "Rejected" + '\','+data[i].Rqid+');">Reject</button>'
                    //     +
                    //     '</td>';

                    file += '</tr>';
                }
            }

            // i =+i+1;
            // console.log(p);
            $('#exe').append(file);
            // $('#inboxno').append(p);
            swal({
                title: 'Sucesss!',
                text: 'Success in fetching Clients!',
                icon: 'success',
                button: 'Close',
                timer: 1000
            });

        }
            }
        ,


        error: function (x, e) {

            // for error handling
            if (x.status == 0) {
                swal({
                    title: 'Error!',
                    text: 'Error in fetching Clients!',
                    icon: 'error',
                    button: 'Close',
                });
                console.log('You are offline!! -  Please Check Your Network.');
            } else if (x.status == 404) {
                swal({
                    title: 'Error!',
                    text: 'Error in fetching Clients!',
                    icon: 'error',
                    button: 'Close',
                });
                console.log('Requested URL not found.');
            } else if (x.status == 500) {
                swal({
                    title: 'Error!',
                    text: 'Error in fetching Clients!',
                    icon: 'error',
                    button: 'Close',
                });
                console.log('Internal Server Error.');
            }
            else if (x.status == 400) {
                swal({
                    title: 'Error!',
                    text: 'Error in fetching Clients!',
                    icon: 'error',
                    button: 'Close',
                });
                console.log('Validation Error.');
            }
            else if (e == 'parsererror') {
                swal({
                    title: 'Error!',
                    text: 'Error in fetching Clients!',
                    icon: 'error',
                    button: 'Close',
                });
                console.log('Error. - Parsing JSON Request failed.');
            } else if (e == 'timeout') {
                swal({
                    title: 'Error!',
                    text: 'Error in fetching Clients!',
                    icon: 'error',
                    button: 'Close',
                });
                console.log('Request Time out.');
            } else {
                swal({
                    title: 'Error!',
                    text: 'Error in fetching Clients!',
                    icon: 'error',
                    button: 'Close',
                });
                console.log('Unknown Error. - ' + x.responseText);
            }
        }
    });

});



function getRole(roleid){
    //Fill files of tables
    // $( document ).ready(function() {
    var str = '';
    $.ajax
    ({

        type: 'GET',
        url: 'https://ishlaw_auth.ambience.co.ke/api/auth/v1/team/getAll',
        data:{id:roleid},
        async: false,


        // url: Messages.fetch,
        // dataType: 'json',
        // async: false,

        success: function (data){
            console.log(roleid);
            for(var i in data) {
                console.log("role id loop "+i +" "+roleid);
                if(roleid == data[i].id) {
                    console.log(data);
                    console.log("DONE");
                    console.log(data[i].name);
                    str = data[i].name;
                    console.log("Role Name is:" + str)
                    return str;
                }
            }
        },


        error: function (x, e) {

            // for error handling
            if (x.status == 0) {
                swal({
                    title: 'Error!',
                    text: 'Error in fetching Messsages!',
                    icon: 'error',
                    button: 'Close',
                });
                console.log('You are offline!! -  Please Check Your Network.');
            } else if (x.status == 404) {
                swal({
                    title: 'Error!',
                    text: 'Error in fetching Messsages!',
                    icon: 'error',
                    button: 'Close',
                });
                console.log('Requested URL not found.');
            } else if (x.status == 500) {
                swal({
                    title: 'Error!',
                    text: 'Error in fetching Messsages!',
                    icon: 'error',
                    button: 'Close',
                });
                console.log('Internal Server Error.');
            }
            else if (x.status == 400) {
                swal({
                    title: 'Error!',
                    text: 'Error in fetching Messsages!',
                    icon: 'error',
                    button: 'Close',
                });
                console.log('Validation Error.');
            }
            else if (e == 'parsererror') {
                swal({
                    title: 'Error!',
                    text: 'Error in fetching Messsages!',
                    icon: 'error',
                    button: 'Close',
                });
                console.log('Error. - Parsing JSON Request failed.');
            } else if (e == 'timeout') {
                swal({
                    title: 'Error!',
                    text: 'Error in fetching Messsages!',
                    icon: 'error',
                    button: 'Close',
                });
                console.log('Request Time out.');
            } else {
                swal({
                    title: 'Error!',
                    text: 'Error in fetching Messsages!',
                    icon: 'error',
                    button: 'Close',
                });
                console.log('Unknown Error. - ' + x.responseText);
            }
        }
    });
    return str;
    // });


}