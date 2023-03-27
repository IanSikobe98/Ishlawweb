var jwt = sessionStorage.getItem('tokenuse')
var viewAsignees = sessionStorage.getItem('viewasignees');
var userid = sessionStorage.getItem('userid');
console.log("viewAsignees");
console.log(viewAsignees);
console.log("userid");
console.log(userid);
var script = document.createElement('script');script.src = "https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js";document.getElementsByTagName('head')[0].appendChild(script);
if(viewAsignees =="true"){
    var url = Usermngmt.fetchusers
}
else{
    var url = Usermngmt.fetchuser
}

$.ajax
({
    type: 'POST',
    url: url,
    data: JSON.stringify({"id":userid}),
    async: false,
    contentType: "application/json",


    beforeSend: function (xhr) {
        xhr.setRequestHeader ("Ulinzi", "Bearer " + jwt );
    },
    success: function (data) {
        console.log("successful");
        console.log(data);
        var responseCode = data.responseCode;
        if (responseCode === "00") {
            var responseBody = data.responseBody;
            console.log("responseBody:");
            console.log(responseBody);

            // swal({
            //     title: 'Success!',
            //     text: 'Appointment '+approval+' successfully!',
            //     icon: 'success',
            //     button: 'Close',
            // });
            // setTimeout(function(){
            //     document.location.reload();
            // }, 2000);


            if (viewAsignees == "false") {
                var str = ""
                str += "<option value='" + responseBody.id + "'>" + responseBody.firstName + " " + responseBody.surname + "</option>"
                document.getElementById("user").innerHTML = str;

            }
            else {


                var items = [];

                var items2 = [];
                var items3 = [];


                for (var i in responseBody) {
                    items.push(responseBody[i].id);
                    items2.push(responseBody[i].firstName);
                    items3.push(responseBody[i].surname);
                }


                var str = ""
                for (var item of items) {
                    // <option value="28325a2e-a21d-4759-9686-c7680d77cd48">anne</option>
                    str += "<option value='" + item + "'>" + items2[items.indexOf(item)] + " " + items3[items.indexOf(item)] + "</option>"
                }
                document.getElementById("user").innerHTML = str;
            }
        }
    },
    error: function (x, e) {

        // for error handling
        if (x.status == 0) {
            swal({
                title: 'Error!',
                text: 'Error in fetching Recipients!',
                icon: 'error',
                button: 'Close',
            });
            console.log('You are offline!! -  Please Check Your Network.');
        } else if (x.status == 404) {
            swal({
                title: 'Error!',
                text: 'Error in fetching Recipients!',
                icon: 'error',
                button: 'Close',
            });
            console.log('Requested URL not found.');
        } else if (x.status == 500) {
            swal({
                title: 'Error!',
                text: 'Error in fetching Recipients!',
                icon: 'error',
                button: 'Close',
            });
            console.log('Internal Server Error.');
        }
        else if (x.status == 400) {
            swal({
                title: 'Error!',
                text: 'Error in fetching Recipients!',
                icon: 'error',
                button: 'Close',
            });
            console.log('Validation Error.');
        }
        else if (e == 'parsererror') {
            swal({
                title: 'Error!',
                text: 'Error in fetching Recipients!',
                icon: 'error',
                button: 'Close',
            });
            console.log('Error. - Parsing JSON Request failed.');
        } else if (e == 'timeout') {
            swal({
                title: 'Error!',
                text: 'Error in fetching Recipients!',
                icon: 'error',
                button: 'Close',
            });
            console.log('Request Time out.');
        } else {
            swal({
                title: 'Error!',
                text: 'Error in fetching Recipients!',
                icon: 'error',
                button: 'Close',
            });
            console.log('Unknown Error. - ' + x.responseText);
        }
    }
});




// $.postJSON(Usermngmt.fetchusers, function(data)  {
//     console.log(data);
//     var items = [];
//
//     var items2 = [];
//     var items3 = [];
//
//
//     for(var i in data) {
//         items.push(data[i].id);
//         items2.push(data[i].firstName);
//         items3.push(data[i].secondName);
//     }
//
//
//     var str = ""
//     for (var item of items) {
//         // <option value="28325a2e-a21d-4759-9686-c7680d77cd48">anne</option>
//         str += "<option value='"+item+"'>" + items2[items.indexOf(item)] + " "+ items3[items.indexOf(item)] +  "</option>"
//     }
//     document.getElementById("recipients").innerHTML = str;
//
//
//
// });
