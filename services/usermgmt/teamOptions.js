$(document).ready(function () {

    $.ajax
    ({
        type: "GET",


        url: Usermngmt.fetchstaffoptions,
        dataType: 'json',
        async: false,
        // beforeSend: function (xhr) {
        //     xhr.setRequestHeader ("Authorization", "Basic " + jwt );
        // },


        success: function (data) {
            console.log(data);
            console.log("DONE");
            var items = [];

            var items2 = [];

            for(var i in data) {
                items.push(data[i].id);
                items2.push(data[i].name)
            }


            var str = ""
            for (var item of items) {
                str += "<option value='"+item+"'>" + items2[items.indexOf(item)] + "</option>"
            }

            document.getElementById("team").innerHTML = str;
            // swal({
            //     title: 'Sucesss!',
            //     text: 'Success in fetching Messsages!',
            //     icon: 'success',
            //     button: 'Close',
            //     timer: 1000
            // });

        }
        ,


        error: function (x, e) {

            // // for error handling
            // if (x.status == 0) {
            //     swal({
            //         title: 'Error!',
            //         text: 'Error in fetching Messsages!',
            //         icon: 'error',
            //         button: 'Close',
            //     });
            //     console.log('You are offline!! -  Please Check Your Network.');
            // } else if (x.status == 404) {
            //     swal({
            //         title: 'Error!',
            //         text: 'Error in fetching Messsages!',
            //         icon: 'error',
            //         button: 'Close',
            //     });
            //     console.log('Requested URL not found.');
            // } else if (x.status == 500) {
            //     swal({
            //         title: 'Error!',
            //         text: 'Error in fetching Messsages!',
            //         icon: 'error',
            //         button: 'Close',
            //     });
            //     console.log('Internal Server Error.');
            // }
            // else if (x.status == 400) {
            //     swal({
            //         title: 'Error!',
            //         text: 'Error in fetching Messsages!',
            //         icon: 'error',
            //         button: 'Close',
            //     });
            //     console.log('Validation Error.');
            // }
            // else if (e == 'parsererror') {
            //     swal({
            //         title: 'Error!',
            //         text: 'Error in fetching Messsages!',
            //         icon: 'error',
            //         button: 'Close',
            //     });
            //     console.log('Error. - Parsing JSON Request failed.');
            // } else if (e == 'timeout') {
            //     swal({
            //         title: 'Error!',
            //         text: 'Error in fetching Messsages!',
            //         icon: 'error',
            //         button: 'Close',
            //     });
            //     console.log('Request Time out.');
            // } else {
            //     swal({
            //         title: 'Error!',
            //         text: 'Error in fetching Messsages!',
            //         icon: 'error',
            //         button: 'Close',
            //     });
            //     console.log('Unknown Error. - ' + x.responseText);
            // }
        }
    });

});
// }



// setData();

