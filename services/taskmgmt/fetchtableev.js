// var script = document.createElement('script');
// script.src = "{https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js}";
// document.getElementsByTagName('head')[0].appendChild(script);
// $.getJSON(Events.recurring,


$(document).ready(function () {



    $.ajax
    ({
        type: "GET",


        url: Events.recurring,
        dataType: 'json',
        async: false,
        // beforeSend: function (xhr) {
        //     xhr.setRequestHeader ("Authorization", "Basic " + jwt );
        // },


        success: function (data) {
            console.log(data);
            var items = [];

            for (var i in data) {
                items.push(data[i].rrule);
            }
            console.log(items);

            var dates = [];


            var titles = [];
            var id = [];
            var prior = [];
            var user = [];
            var loc = [];
            var descri = [];
            var clino = [];
            var dur = [];
            var end = [];
            var clientName = [];

// var status =[];


            for (var i in items) {
                const rule = rrule.rrulestr(items[i])

                dates.push(rule.all());
// dates.push(data[i].title)
                titles.push(data[i].title);
                id.push(data[i].id);
                prior.push(data[i].priority);
                user.push(data[i].user);
                loc.push(data[i].location);
                descri.push(data[i].description);
                clino.push(data[i].clino);
                dur.push(data[i].duration);
                end.push(data[i].end);
                clientName.push(data[i].client_name)
            }
            var cars = [dates, id, titles, prior, user, loc, descri, clino, dur, end,clientName];
            console.log(cars);
            console.log(dates);
            console.log(cars[0][1][0]);
            console.log(cars[1][1]);
            console.log("hi");

// for(var i = 0; i < cars.length; i++) {
            var car = cars[0];
            var student = '';
            var p = 0;

            var d = new Date(cars[9][j]);

            var daco;
            for (var j = 0; j < car.length; j++) {
                var cube = car[j];
                for (var k = 0; k < cube.length; k++) {
                    console.log("cube[" + j + "][" + k + "] = " + dates[j][k].toLocaleDateString());
                    console.log("cube[" + j + "][" + k + "] = " + cars[1][j]);

                    console.log(" ");
                    console.log(" ");
                    daco = convdate99(cars[8][j], dates[j][k]);

                    daco2 = convdate101(dates[j][k]);


                    student += '<tr>';

                    student += '<td>' +
                        cars[2][j] + '</td>';


                    student += '<td>' +
                        cars[10][j] + '</td>';


                    student += '<td>' +
                        cars[6][j] + '</td>';


                    // student += '<td>' +
                    // cars[9][j] + '</td>';

                    student += '<td>' +
                        daco2.toLocaleString() + '</td>';

                    student += '<td>' +
                        daco.toLocaleString() + '</td>';

                    // student += '<td>' +
                    //     '<button id= "btn'+p+'" onclick="fetchitre2(this.id)"  name='+ cars[1][j]+' value= '+ cars[1][j]+'>'+'edit'+'</button>' + '</td>';

                    student += '</tr>';

                    p++;
                }
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


function convdate99(str,str2) {
// const str = '20210201';

  str2 =str2.toLocaleString();

  var d = new Date(str2);
  
  console.log(d);
  

   var start12 = new Date(str2);
    console.log(start12);

  // d.setHours(d.getHours() + 24,d.getMinutes()+ 12,d.getSeconds() + 10);


console.log(str.slice(0,2));
// expected output: "the lazy dog."

console.log(str.slice(3, 5));
// expected output: "quick brown fox"

console.log(str.slice(6,8));

// expected output: "dog."
//var res = str1.concat(str2);





var str1 = str.slice(0,2);
var str2 =  str.slice(3,5);
var str3 =  str.slice(6,8);
// var str4 = "-";

var str12 = parseInt(str1);
var str22 = parseInt(str2);
var str32 = parseInt(str3);

d.setHours(d.getHours()  - 3);

d.setHours(d.getHours() + str12 ,d.getMinutes()+ str22 ,d.getSeconds() + str32);
console.log( "final");
console.log(d);


// var res = str1.concat(str4);
// var res = res.concat(str2);
// var res = res.concat(str4);
// var res = res.concat(str3);



return d;
}






function convdate101(str2) {
// const str = '20210201';



  str2 =str2.toLocaleString();

  var d = new Date(str2);

  console.log(d);
  
d.setHours(d.getHours() - 3 );
console.log( "final");
console.log(d);


  
return d;
}




     
// var script = document.createElement('script');
// script.src = "{https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js}";
// document.getElementsByTagName('head')[0].appendChild(script);
// $.getJSON(Events.calnonrecurring ,



    $(document).ready(function () {



        $.ajax
        ({
            type: "GET",


            url: Events.calnonrecurring,
            dataType: 'json',
            async: false,
            // beforeSend: function (xhr) {
            //     xhr.setRequestHeader ("Authorization", "Basic " + jwt );
            // },


            // $.getJSON(Tasks.calnonrecurring,
            success:

                function (data) {
                    console.log(data);
                    var items = [];
                    var student = '';
                    var daco;
                    var daco2
                    for (var i in data) {
                        // items.push(data[i].rrule);
//  daco = data[i].start;
// daco = daco.split('-').join('/');
// daco = formatDate (daco);      
// daco = new Date(data[i].start);
// daco = daco.toLocaleString();       

// daco2 = new Date(data[i].start);
// daco2 = daco.toLocaleString();  

                        daco = getDate(data[i].start);
                        daco2 = getDate(data[i].end);

                        student += '<tr>';

                        student += '<td>' +
                            data[i].title + '</td>';

                        student += '<td>' +
                            data[i].client_name + '</td>';


                        student += '<td>' +
                            data[i].description + '</td>';



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

function getDate (input) {
var daco3 = new Date(input);
daco3 = daco3.toLocaleString();  
  
  return daco3;
}
