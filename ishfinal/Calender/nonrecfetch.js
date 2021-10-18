var script = document.createElement('script');
script.src = "{https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js}";
document.getElementsByTagName('head')[0].appendChild(script); 
$.getJSON('http://localhost/ishfinal/API/nonrecta.php', function(data)  {
	  			console.log(data);
	  			var items = [];
var student = ''; 
	  			for(var i in data) {
	  				// items.push(data[i].rrule);
		              



                            student += '<tr>'; 
                            
                            student += '<td>' +  
                                data[i].tid + '</td>';

                                student += '<td>' +  
                                data[i].title + '</td>'; 

                                student += '<td>' +  
                                data[i].User + '</td>'; 

                                student += '<td>' +  
                                data[i].clino + '</td>';


                                student += '<td>' +  
                                data[i].start + '</td>';

                                student += '<td>' +  
                                data[i].Priority + '</td>'; 

                                student += '<td>' +  
                                data[i].status + '</td>'; 

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