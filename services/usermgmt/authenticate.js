function authenticate(urlpost,postid) {

    $.ajax
    ({
        type: 'POST',
        url: urlpost,
        data:$('#'+postid).serialize(),
        success: function () {

            // document.getElementById('myForm').style.display = 'none';
            console.log("User authenticated");

            sessionStorage.setItem("loginsuccess", "true");
            window.location.href = "http://localhost/ishlawwebv10/index.php";
            // alert("login sucessful")
        },
        error: function (x, e) {

            // alert("Error in updating task")
            swal({
                title: 'Error!',
                text: 'Error in Login!',
                icon: 'error',
                button: 'Close',
            });
            // alert("login unsucessful")
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

