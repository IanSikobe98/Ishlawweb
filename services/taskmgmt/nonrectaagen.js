// var script = document.createElement('script');
// script.src = "{https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js}";
// document.getElementsByTagName('head')[0].appendChild(script);
var data;
  $(document).ready(function() {
        $.ajax({
          url: Tasks.nonrecurring,
          type: 'GET',
          dataType: 'json',
          data: data,
          error: function() { console.log('boo! not working'); },

             beforeSend: function (xhr) {
    var jwt = jwtpo;
    console.log(jwtpo);


     
    xhr.setRequestHeader ("Authorization", "Bearer "+ jwt);
  },
          success: (data) => {
              console.log(data);
              var items = [];
              var student = '';
              var p = 0;
              for (var i in data) {

                  student += '<tr>';

                  student += '<td>NRD' +
                      data[i].tid + '</td>';

                  student += '<td>' +
                      data[i].title + '</td>';

                  student += '<td>' +
                      data[i].start + '</td>';


                  student += '<td>' +
                      data[i].Priority + '</td>';

                  student += '<td>' +
                      data[i].hotodo + '</td>';

                  student += '<td>' +
                      data[i].description + '</td>';

                  student += '<td>' +
                      data[i].status + '</td>';


                  student += '<td>' +
                      data[i].comment + '</td>';


                  student += '<td>' +
                      '<button id= "btn12' + p + '" onclick="fetchit(this.id)"  name=' + data[i].tid + ' value= ' + data[i].tid + '>' + 'edit' + '</button>' + '</td>';

                  student += '</tr>';
                  p++;
              }
              // $('#table').append(student);
              // $('#table').DataTable();

              // function() {

              }
          // }
        });
      // $('#table').DataTable();
      // $('#table').DataTable


  });