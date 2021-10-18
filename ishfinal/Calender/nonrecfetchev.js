var script = document.createElement('script');
script.src = "{https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js}";
document.getElementsByTagName('head')[0].appendChild(script); 
$.getJSON('http://localhost/Admin/API/nonrecev.php', function(data)  {
	  			console.log(data);
	  			var items = [];
var student = ''; 
var daco;
var daco2
	  			for(var i in data) {
	  				// items.push(data[i].rrule);
//  daco = data[i].start;
// daco = daco.split('-').join('/');
// daco = formatDate (daco);      
// daco = new Date(data[i].start);
// daco = daco.toLocaleString();       

// daco2 = new Date(data[i].start);
// daco2 = daco.toLocaleString();  

daco =getDate(data[i].start);
daco2 =getDate(data[i].end);

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
                                data[i].clino + '</td>';


                                student += '<td>' +  
                                daco + '</td>';

                                student += '<td>' +  
                                daco2 + '</td>';

                               

                                 

                            //     student += '<td>' +  
                            //     cars[1][j] + '</td>'; 
  
                            // student += '<td>' +  
                            //    dates[j][k].toLocaleDateString() + '</td>'; 

                            // student += '<td>' +  
                            //     '<button id= "btn'+p+'" onclick="myFunction(this.id)"  name='+ cars[1][j]+' value= '+ cars[1][j]+'>'+'edit'+'</button>' + '</td>';

                            student += '</tr>'; 

}
  $('#table').append(student); 

// onclick="myFunction()"

// }
// const rule = rrule.rrulestr(
//   "DTSTART:20210104\nFREQ=DAILY;INTERVAL=1;UNTIL=20210303\nEXDATE:20210203"
//   // "DTSTART;TZID=America/Denver:20181101T190000;\n"
//   // + "RRULE:FREQ=WEEKLY;BYDAY=MO,WE,TH;INTERVAL=1;COUNT=3"
// )
// console.log(rule.all());

		  // var str = ""
		  // for (var item of items) {
		  //   str += "<option>" + item + "</option>"
		  // }
		  // document.getElementById("policyid").innerHTML = str;
	  		
			

	    });

function getDate (input) {
var daco3 = new Date(input);
daco3 = daco3.toLocaleString();  
  
  return daco3;
}