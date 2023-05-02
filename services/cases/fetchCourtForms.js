 $(document).ready(function () {



        $.ajax
        ({
            type: "GET",


            url: Cases.fetchForm,
            dataType: 'json',
            async: false,
            // beforeSend: function (xhr) {
            //     xhr.setRequestHeader ("Authorization", "Basic " + jwt );
            // },



    // $.getJSON(Tasks.calnonrecurring,
            success:function(data) {
                   console.log(data);
                   var items = [];
                   var student = '';

                   var daco;
                   for (var i in data) {
                       // items.push(data[i].rrule);
                       // daco = data[i].start;
                       // daco = daco.split('-').join('/');
                       // daco = formatDate(daco);


                       student += '<tr>';


                       student += '<td>' +
                           data[i].Case_Number + '</td>';


                       // student += '<td>' +
                       //     daco + '</td>';

                       student += '<td>' +
                           data[i].atendee + '</td>';

                       student += '<td>' +
                           data[i].Client_Name + '</td>';


                       student += '<td>' +
                           data[i].Other_Advocates + '</td>';

                       student += '<td>' +
                           data[i].Nature_Of_Duty + '</td>';

                       student += '<td>' +
                           data[i].Orders_Made + '</td>';

                       student += '<td>' +
                           data[i].Next_Action + '</td>';

                       student += '<td>' +
                           data[i].Directions + '</td>';

                       student += '<td>' +
                           data[i].Date + '</td>';

                       //     student += '<td>' +
                       //     cars[1][j] + '</td>';

                       // student += '<td>' +
                       //    dates[j][k].toLocaleDateString() + '</td>';

                       // student += '<td>' +
                       //     '<button id= "btn'+p+'" onclick="myFunction(this.id)"  name='+ cars[1][j]+' value= '+ cars[1][j]+'>'+'edit'+'</button>' + '</td>';

                       student += '</tr>';

                   }
                   $('#myTable').append(student);

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


               }
	    });

    });
function formatDate (input) {
  var datePart = input.match(/\d+/g),
  year = datePart[0].substring(0), // get only two digits
  month = datePart[1], day = datePart[2];

  return month+'/'+day+'/'+year;
}
