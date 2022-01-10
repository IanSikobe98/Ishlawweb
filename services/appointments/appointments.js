//Fill files of tables
$( document ).ready(function() {

    $.ajax
    ({
        type: "GET",



        url: Appointments.fetch,
        dataType: 'json',
        async: false,




        success: function (data){
            console.log(data);
            console.log("DONE");

            var file = '';

            for(var i in data) {

                    file += '<tr class="warning">';


                    file += '<td>' +
                        data[i].Fname+' '+data[i].Sname + '</td>';

                    file += '<td>' +
                        data[i].Phone_number + '</td>';

                    file += '<td>' +
                        data[i].Email + '</td>';

                    file += '<td>' +
                        data[i].Message + '</td>';

                file += '<td>' +
                    data[i].Datetime.split(' ')[0] + '</td>';

                file += '<td>' +
                    data[i].Approval + '</td>';

                file +='<td>' + '<button type="button" class="btn btn-success" onclick="return approval(\'' + "Accepted" + '\','+data[i].Rqid+');">Accept</button>'+
                    '<button type="button" class="btn btn-danger" onclick="return approval(\'' + "Rejected" + '\','+data[i].Rqid+');">Reject</button>'
                    +
                    '</td>';

                    file += '</tr>';

            }
            $('#exe').append(file);


        }
    });

});


function approval(approval,id){
console.log(id);
    $.ajax
    ({
        type: 'POST',
        url: Appointments.approve,
        data:{approval: approval,id:id},
        success: function () {
            console.log("successful");

            swal({
                title: 'Success!',
                text: 'Appointment '+approval+' successfully!',
                icon: 'success',
                button: 'Close',
            });
            setTimeout(function(){
                document.location.reload();
            }, 2000);


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
