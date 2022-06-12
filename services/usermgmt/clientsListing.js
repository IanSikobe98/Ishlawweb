
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
        allowOutsideClick: false

    });

    $.ajax
    ({
        type: "GET",


        url: Usermngmt.fetchusers,
        dataType: 'json',
        async: false,
        beforeSend: function (xhr) {
            xhr.setRequestHeader ("Authorization", "Basic " + jwt );
        },


        success: function (data) {
            console.log(data);
            console.log("DONE");

            var file = '';
            // var p =0


            for(var i in data) {
                if (data[i].TeamId == 5) {
                    file += '<tr class="warning">';


                    file += '<td>' +
                        data[i].firstName + '</td>';

                    file += '<td>' +
                        data[i].secondName + '</td>';

                    file += '<td>' +
                        data[i].phoneNumber + '</td>';

                    file += '<td>' +
                        data[i].emailAddress + '</td>';

                    file += '<td>' +
                        data[i].createdAt.split('T')[0] + '</td>';

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
