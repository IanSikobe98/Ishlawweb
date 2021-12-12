//Submit form function

function sendreload(urlpost,postid) {

    $.ajax
    ({
        type: 'POST',
        url: urlpost,
        data:$('#'+postid).serialize(),
        success: function () {

            // document.getElementById('myForm').style.display = 'none';
            // console.log("successful");

         sessionStorage.setItem("submitsuccess", "true");
        document.location.reload();
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





//reload page function
function formreload (){

    var reloading = sessionStorage.getItem("submitsuccess");

    if (reloading) {
        sessionStorage.removeItem("submitsuccess");
            swal({
  title: 'Great!',
  text: 'Task Updated successfully!',
  icon: 'success',
  button: 'Close',
});                   

            }
    else{
    }
}
 






