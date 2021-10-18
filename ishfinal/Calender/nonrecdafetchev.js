var script = document.createElement('script');
script.src = "{https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js}";
document.getElementsByTagName('head')[0].appendChild(script); 
$.getJSON('http://localhost/Admin/API/daynonrecev.php', function(data)  {
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

                                

                                

                                // student += '<td>' +  
                                // data[i].status + '</td>'; 

                                



                            //     student += '<td>' +  
                            //     cars[1][j] + '</td>'; 
  
                            // student += '<td>' +  
                            //    dates[j][k].toLocaleDateString() + '</td>'; 

                            student += '<td>' +  
                                '<button id= "btn12'+p+'" onclick="fetchit2(this.id)"  name='+ data[i].id+' value= '+ data[i].id+'>'+'edit'+'</button>' + '</td>';

                            student += '</tr>'; 
p++;
}
console.log(data[i].id)
  $('#events').append(student); 


	  		
			

	    });


function getnonrec (input) {

var current = new Date(input);
current = current.toLocaleString()
console.log(current);
return current;
}

