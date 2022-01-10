//Submit form function


function sendreload(urlpost,postid) {

    $.ajax
    ({
        type: 'POST',
        url: urlpost,
        data:$('#'+postid).serialize(),
        success: function () {

            // document.getElementById('myForm').style.display = 'none';
            console.log("successful");

            sessionStorage.setItem("submitsuccess", "true");
            // document.location.reload();
            alert("login sucessful")
        },
        error: function (x, e) {
            alert("login unsucessful")
            // for error handling
            if (x.status == 0) {
                console.log('You are offline!! -  Please Check Your Network.');
            } else if (x.status == 404) {
                console.log('Requested URL not found.');
            } else if (x.status == 500) {
                console.log('Internal Server Error.');
            }
            else if (x.status == 400) {
                console.log('Validation Error.');
            }
            else if (e == 'parsererror') {
                console.log('Error. - Parsing JSON Request failed.');
            } else if (e == 'timeout') {
                console.log('Request Time out.');
            } else {
                console.log('Unknown Error. - ' + x.responseText);
            }
        }
    });
    return false;
}


//Submit form function
function sendreloadnomodal(urlpost,postid) {

    $.ajax
    ({
        type: 'POST',
        url: urlpost,
        data:$('#'+postid).serialize(),
        success: function () {

            // document.getElementById('myForm').style.display = 'none';
            // console.log("successful");
            alert("Case Created");

            // sessionStorage.setItem("submitsuccess", "true");
            // document.location.reload();
        },
        error: function (x, e) {
            // for error handling
            if (x.status == 0) {
                console.log('You are offline!! -  Please Check Your Network.');
            } else if (x.status == 404) {
                console.log('Requested URL not found.');
            } else if (x.status == 500) {
                console.log('Internal Server Error.');
            } else if (e == 'parsererror') {
                console.log('Error. - Parsing JSON Request failed.');
            } else if (e == 'timeout') {
                console.log('Request Time out.');
            } else {
                console.log('Unknown Error. - ' + x.responseText);
            }
        }
    });
    return false;
}




function sendreloadnext(urlpost,postid,pagenext) {

    $.ajax
    ({
        type: 'POST',
        url: urlpost,
        data:$('#'+postid).serialize(),
        success: function () {

            // document.getElementById('myForm').style.display = 'none';
            // console.log("successful");

            sessionStorage.setItem("submitsuccess", "true");
            // document.location.reload();
            window.location.href = pagenext;
        },
        error: function (x, e) {
            alert("case creation unsuccessful")
            // for error handling
            if (x.status == 0) {
                console.log('You are offline!! -  Please Check Your Network.');
            } else if (x.status == 404) {
                console.log('Requested URL not found.');
            } else if (x.status == 500) {
                console.log('Internal Server Error.');
            }
            else if (x.status == 400) {
                console.log('Validation Error.');
            }

            else if (e == 'parsererror') {
                console.log('Error. - Parsing JSON Request failed.');
            } else if (e == 'timeout') {
                console.log('Request Time out.');
            } else {
                console.log('Unknown Error. - ' + x.responseText);
            }
        }
    });
    return false;
}





//reload page function
function formreload (){

    var reloading = sessionStorage.getItem("submitsuccess");

    if (reloading) {
        sessionStorage.removeItem("submitsuccess");
        document.getElementById('myModal').style.display = 'block';
            swal({
  title: 'Great!',
  text: 'Task Updated successfully!',
  icon: 'success',
  button: 'Close',
});

        document.getElementById('status').innerHTML = 'Tasks successfully saved';
        document.getElementById('status3').innerHTML = '.<br><br>';

        document.getElementById('status').style.color= 'green';
    }
}


function opencase(id){
    sessionStorage.removeItem("categoryid")
    sessionStorage.setItem("categoryid", id);
    window.location.href = "litigation.php";
}





function getMessageCount(){
    var jwt = sessionStorage.getItem('tokencount');
    sessionStorage.removeItem('tokencount');
    console.log(jwt);
//Fill files of tables
    $(document).ready(function () {

        $.ajax
        ({
            type: "GET",


            url: Messages.fetchcount,
            dataType: 'json',
            async: false,
            beforeSend: function (xhr) {
                xhr.setRequestHeader ("Authorization", "Basic " + jwt );
            },


            success: function (data) {
                console.log(data);
                console.log(data[0].unreadno);
                $('#inboxcount').append(data[0].unreadno);


            }

        });
    });
}


function sendreloadAuth(urlpost,postid) {
    var jwt = sessionStorage.getItem('token');
    // sessionStorage.removeItem('token');
    console.log(jwt);
    swal({
        title: "Checking...",
        text: "Please wait",
        icon: "images/ajaxloader.gif",
        iconHtml: 1500,
        showConfirmButton: false,
        allowOutsideClick: false
    }); $.ajax
    ({
        type: 'POST',
        url: urlpost,
        data:$('#'+postid).serialize(),
        beforeSend: function (xhr) {
            xhr.setRequestHeader ("Authorization", "Basic " + jwt );
        },
        success: function () {

            // document.getElementById('myForm').style.display = 'none';
            console.log("successful");

            sessionStorage.setItem("submitsuccess", "true");
            // document.location.reload();
            // alert("login sucessful")
            swal({
                title: 'Sucesss!',
                text: 'Success in composing Messsages!',
                icon: 'success',
                button: 'Close',
                timer: 1000
            });


        },
        error: function (x, e) {
            alert("login unsucessful")
            swal({
                title: 'Error!',
                text: 'Error in composing Messsages!',
                icon: 'error',
                button: 'Close',
            });
            // for error handling
            if (x.status == 0) {
                console.log('You are offline!! -  Please Check Your Network.');
            } else if (x.status == 404) {
                console.log('Requested URL not found.');
            } else if (x.status == 500) {
                console.log('Internal Server Error.');
            }
            else if (x.status == 400) {
                console.log('Validation Error.');
            }
            else if (e == 'parsererror') {
                console.log('Error. - Parsing JSON Request failed.');
            } else if (e == 'timeout') {
                console.log('Request Time out.');
            } else {
                console.log('Unknown Error. - ' + x.responseText);
            }
        }
    });
    return false;
}


function logout(){

    sessionStorage.clear();
    location.href = "logout.php";

}



function submitreload(urlpost,postid,request) {
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
        type: 'POST',
        url: urlpost,
        data:$('#'+postid).serialize(),
        success: function () {

            // document.getElementById('myForm').style.display = 'none';
            console.log("successful");

            // sessionStorage.setItem("submitsuccess", "true");
            // document.location.reload();
            // alert("login sucessful")
            swal({
                title: 'Sucesss!',
                text: 'Success in '+request +" !",
                icon: 'success',
                button: 'Close',
                timer: 1000
            });
        },
        error: function (x, e) {
            // alert("login unsucessful")
            swal({
                title: 'Error !',
                text: x.statusText,
                icon: 'error',
                button: 'Close',
            });
            // for error handling
            if (x.status == 0) {
                console.log('You are offline!! -  Please Check Your Network.');
            } else if (x.status == 404) {
                console.log('Requested URL not found.');
            } else if (x.status == 500) {
                console.log('Internal Server Error.');
            }
            else if (x.status == 400) {
                console.log('Validation Error.');
            }
            else if (e == 'parsererror') {
                console.log('Error. - Parsing JSON Request failed.');
            } else if (e == 'timeout') {
                console.log('Request Time out.');
            } else {
                console.log('Unknown Error. - ' + x.responseText);
            }
        }
    });
    return false;
}