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

        // url: Messages.fetch,
        // dataType: 'json',
        // async: false,

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




swal({
    title: "Checking...",
    text: "Please wait",
    icon: "images/ajaxloader.gif",
    iconHtml: 1500,
    showConfirmButton: false,
    allowOutsideClick: false
});
$(document).ready(function () {

    var jwt = sessionStorage.getItem('tokenuse');
    // sessionStorage.removeItem('token');
    console.log(jwt);

    var msgid = sessionStorage.getItem('messageid');
    var msgtype = sessionStorage.getItem('messagetype');
    var sendurl;
    if(msgtype == 'inbox'){
        sendurl = Messages.fetchinbox;
    }
    else if(msgtype == 'sent'){
        sendurl = Messages.fetchsent;
    }

    console.log(msgid);
//Fill files of tables
    $.ajax
    ({
        type: "GET",


        url: sendurl,
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
            var sender_name = '';
            var receiver_name= '';
            var comparisonvar = 0;



            for (var i in data) {
                if(msgtype =='inbox') {
                    comparisonvar = data[i].id;
                }
                if(msgtype =='sent') {
                    comparisonvar = data[i].broadcastId;
                }
                if(comparisonvar == msgid) {
                    name = getName(data[i].receiver_id);
                    sender_name = getName(data[i].sender_id);

                    if(msgtype =='inbox') {
                        receiver_name = getName(data[i].receiver_id);
                    }
                    else if(msgtype == 'sent'){
                        receiver_name = getReceivers(data[i].receiver_id);
                    }
                    console.log(name);



                    document.getElementById("From").value = "From: "+sender_name;
                    document.getElementById("To").value = "To: "+receiver_name ;
                    document.getElementById("Category").value = "Category: "+ data[i].Category;
                    document.getElementById("Subject").value = "Subject: "+data[i].subject;
                    document.getElementById("Compose").value = data[i].compose;
                                               
   $.getScript('https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js', function () 
{
    $('#Compose').summernote({
       toolbar: [
        ['style', ['bold', 'italic', 'underline']],
        ['font', ['fontsize', 'fontname']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['view', ['fullscreen']]
      ]
    });
    
      $('#Compose').summernote('disable')
  });
 
            


                    // file += '<tr class="warning">';
                    //
                    // file += '<td class="mailbox-name">' + 'FROM:' + sender_name + '</td>';
                    //
                    // file += '</tr>'
                    //
                    // file += '<tr class="warning">';
                    //
                    // file += '<td class="mailbox-name">' + 'TO:' + receiver_name + '</td>';
                    //
                    //
                    // file += '</tr>'
                    //
                    // file += '<tr class="warning">';
                    //
                    // file += '<td class="mailbox-subject"><b>'+ 'CATEGORY:' +
                    //     data[i].Category + '</b></td>';
                    //
                    // file += '</tr>'

                    // file += '<tr class="warning">';
                    //
                    //
                    // file += '<td class="mailbox-date">' + 'SUBJECT:'+
                    //     data[i].subject + '</td>';
                    //
                    // file += '</tr>'

                    file += '<tr class="warning">';

                    // file += '<td class="mailbox-date  align-items-center">' +
                    //     data[i].compose + '</td>';

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
            }
            $('#mailtable').append(file);

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
