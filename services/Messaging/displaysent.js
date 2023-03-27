var jwt = sessionStorage.getItem('tokenuse');
function getName(id){
    //Fill files of tables
    // $( document ).ready(function() {
    var str = '';
    $.ajax
    ({

        type: 'POST',
        url: Usermngmt.fetchuser,
        data: JSON.stringify({id:id}),
        async: false,
        contentType: "application/json",


        // url: Messages.fetch,
        // dataType: 'json',
        // async: false,
        beforeSend: function (xhr) {
            xhr.setRequestHeader ("Ulinzi", "Bearer " + jwt );
        },

        success: function (data){
            console.log(data);
            console.log("DONE");
            console.log("successful");
            console.log(data);
            var responseCode = data.responseCode;
            if(responseCode==="00") {
                var responseBody = data.responseBody;
                console.log(responseBody.firstName);
                console.log(responseBody.surname);
                str = responseBody.firstName.concat(' ');
                str = str.concat(responseBody.surname);
                return str;
            }
            else{
                str = "Unknown"
                return str;
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

function getReceivers(ids){
    var receivers = ids;
    var receiverarrays = receivers.split(",");
    var receiverNames = '';
    var receiverName = '';
    for(i=0;i<receiverarrays.length;i++) {
    console.log(receiverarrays[i]);
        receiverName = getName(receiverarrays[i]);
        console.log(receiverName);
        receiverNames = receiverNames.concat(receiverName);
        if(i+1 != receiverarrays.length){
            receiverNames =receiverNames.concat(",")
        }
    }
console.log(receiverNames);
    return receiverNames;
}





swal({
    title: "Checking...",
    text: "Please wait",
    icon: "images/ajaxloader.gif",
    iconHtml: 1500,
    showConfirmButton: false,
    allowOutsideClick: false
});
// function setData(myFunction) {
var jwt = sessionStorage.getItem('tokenuse');
// sessionStorage.removeItem('token');
console.log(jwt);
//Fill files of tables

$(document).ready(function () {

    $.ajax
    ({
        type: "GET",


        url: Messages.fetchsent,
        dataType: 'json',
        async: false,
        beforeSend: function (xhr) {
            xhr.setRequestHeader ("Authorization", "Basic " + jwt );
        },


        success: function (data) {
            console.log(data);
            console.log("DONE");

            var file = '';

            var name = '';

            for (var i in data) {
                name = getReceivers(data[i].receiver_id);
                console.log(name);
                console.log("pandemic");

                file += '<tr class="warning" onclick="return navigate('+data[i].broadcastId+')">';

                file += '<td class="mailbox-name">'+'TO:'+'<a href="mail.php">'+ name + '</td>';


                file += '<td class="mailbox-subject"><b>' +
                    data[i].Category + '</b></td>';



                file += '<td class="mailbox-date">' +
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
            $('#exe').append(file);

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
// }



// setData();



function navigate(id){
    sessionStorage.removeItem('messageid');
    sessionStorage.setItem('messageid',id);

    sessionStorage.removeItem('messagetype');
    sessionStorage.setItem('messagetype','sent');
    location.href = 'mail.php';
}