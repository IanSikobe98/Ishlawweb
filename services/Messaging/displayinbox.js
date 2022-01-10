// function setData(myFunction) {

swal({
    title: "Checking...",
    text: "Please wait",
    icon: "images/ajaxloader.gif",
    iconHtml: 1500,
    showConfirmButton: false,
    allowOutsideClick: false
});
var jwt = sessionStorage.getItem('tokenuse');
// sessionStorage.removeItem('tokenuse');
console.log(jwt);
//Fill files of tables
    $(document).ready(function () {



        $.ajax
        ({
            type: "GET",


            url: Messages.fetchinbox,
            dataType: 'json',
            async: false,
            beforeSend: function (xhr) {
                xhr.setRequestHeader ("Authorization", "Basic " + jwt );
            },


            success: function (data) {
                console.log(data);
                console.log("DONE");

                var file = '';
                var p =0


                for (i in data) {

                    console.log("pandemic");

                    if(data[i].Status == 'Unread') {
                        file += '<tr class="table-active" onclick="return navigate('+data[i].id+')">';
                        p=p+1;
                    }
                    else{
                        file += '<tr onclick="return navigate('+data[i].id+')">';
                    }
                    //
                    // file += '<td class="mailbox-name"><a href="mail.php">' +
                    //     name + '</td>';


                    file += '<td class="mailbox-subject"><b>' +
                        data[i].Category + '</b></td>';

                    // file  +='<td class="mailbox-attachment"></td>'

                    file += '<td class="mailbox-name">' +
                        data[i].subject + '</td>';


                    //
                    // file += '<td>' +
                    //     data[i].Message + '</td>';
                    //
                    // file += '<td>' +
                    //     data[i].Datetime.split(' ')[0] + '</td>';

                    // file += '<td>' +
                    //     data[i].Approval + '</td>';
                    //
                    // file +='<td>' + '<button type="button" class="btn btn-success" onclick="return approval(\'' + "Accepted" + '\','+data[i].Rqid+');">Accept</button>'+
                    //     '<button type="button" class="btn btn-danger" onclick="return approval(\'' + "Rejected" + '\','+data[i].Rqid+');">Reject</button>'
                    //     +
                    //     '</td>';

                    file += '</tr>';

                }

                // i =+i+1;
                console.log(p);
                $('#exe').append(file);
                $('#inboxno').append(p);
                swal({
                    title: 'Sucesss!',
                    text: 'Success in fetching Messsages!',
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

    });


function navigate(id){
    sessionStorage.removeItem('messageid');
    sessionStorage.setItem('messageid',id);

    sessionStorage.removeItem('messagetype');
    sessionStorage.setItem('messagetype','inbox');
    readMsg(id);
    var jwt = sessionStorage.getItem('tokenuse');
    // sessionStorage.removeItem('tokenuse');
    sessionStorage.setItem('token',jwt);
    location.href = 'mail.php';
}



function readMsg(id){
    var Status = 'Read';
    var jwt = sessionStorage.getItem('tokenuse');
    // sessionStorage.removeItem('tokenuse');
    console.log(id);
    $.ajax
    ({
        type: 'POST',
        url: 'http://localhost/Ishlawwebv10/services/Messaging/UpdateMsgStatus.php',
        data:{Status: Status,id:id},

        beforeSend: function (xhr) {
            xhr.setRequestHeader ("Authorization", "Basic " + jwt );
        },
        success: function () {
            console.log("successful");

            // swal({
            //     title: 'Success!',
            //     text: 'Appointment '+approval+' successfully!',
            //     icon: 'success',
            //     button: 'Close',
            // });
            // setTimeout(function(){
            //     document.location.reload();
            // }, 2000);


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
}