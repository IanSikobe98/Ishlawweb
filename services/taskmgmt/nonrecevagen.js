  var data;
  $(document).ready(function() {
        $.ajax({
          url: Events.nonrecurring,
          type: 'GET',
          dataType: 'json',
          data: data,
          error: function() { console.log('boo! not working'); },
          // beforeSend: setHeader,

             beforeSend: function (xhr) {
    var jwt = jwtpo;
    // console.log("Authorization", "Bearer  " + jwt"");

     
    xhr.setRequestHeader ("Authorization", "Bearer "+ jwt);
  },
          success: (data) =>    {
          console.log(data);
          var items = [];
var student = ''; 
var p =0;
var daco;
          for(var i in data) {
            // items.push(data[i].rrule);
                  
// daco = data[i].start;
// daco = daco.split('-').join('/');
// daco = formatDate (daco);
// daco = daco.toLocaleString();

// var current = new Date();
// current = current.toLocaleString()
// console.log(current);

var start = getnonrec(data[i].start);
var end = getnonrec(data[i].end);


                            student += '<tr>'; 
                            
                            student += '<td>NRDE' +  
                                data[i].id + '</td>';

                                student += '<td>' +  
                                data[i].title + '</td>';

                                student += '<td>' +  
                                data[i].priority + '</td>';

                                student += '<td>' +  
                                data[i].user + '</td>';

                                student += '<td>' +  
                                data[i].location + '</td>';

                                student += '<td>' +  
                                data[i].description + '</td>';

                                 student += '<td>' +  
                                data[i].clino+ '</td>';

                                



                                student += '<td>' +  
                               start + '</td>';

                               student += '<td>' +  
                               end + '</td>';

                            student += '<td>' +  
                                '<button id= "btn132'+p+'" onclick="fetchit2(this.id)"  name='+ data[i].id+' value= '+ data[i].id+'>'+'edit'+'</button>' + '</td>';

                            student += '</tr>'; 
p++;
}
// console.log(data[i].id)
  $('#events').append(student); 

         }

        });
      });