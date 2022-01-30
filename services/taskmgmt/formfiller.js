 function fetchit(id){
// var fired_button = $("button").val();

var fired_button = document.getElementById(id).value ;

// alert(fired_button);
console.log(fired_button);
  
// var script = document.createElement('script');
// script.src = "{https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js}";
// document.getElementsByTagName('head')[0].appendChild(script);
// $.getJSON(Tasks.nonrecurring,
     var data;
     $(document).ready(function () {



         $.ajax
         ({
             type: "GET",


             url: Tasks.nonrecurring,
             dataType: 'json',
             async: false,
             beforeSend: function (xhr) {
                 var jwt = jwtpo;
                 console.log(jwtpo);



                 xhr.setRequestHeader ("Authorization", "Bearer "+ jwt);
             },



             // $.getJSON(Tasks.calnonrecurring,
             success:function(data) {
                 console.log(data);


                 var items = [];
                 var title = [];
                 var dueda = [];
                 var descri = [];
                 var prog = [];
                 var prior = [];
                 var rpt = [];
                 var rptun = [];
                 var user = [];
                 var clino = [];
                 var hotodo = [];
                 var comment = [];


                 for (var i in data) {
                     if (data[i].tid == fired_button) {
                         items.push(data[i].tid);
                         title.push(data[i].title);
                         dueda.push(data[i].start);
                         descri.push(data[i].description);
                         prog.push(data[i].status);
                         prior.push(data[i].Priority);
                         rpt.push(data[i].rpt);
                         rptun.push(data[i].rpun);
                         user.push(data[i].User);
                         clino.push(data[i].clino);
                         hotodo.push(data[i].hotodo);
                         comment.push(data[i].comment);


                     }
                 }

// console.log();
                 var modal = document.getElementById("myForm");


                 modal.style.display = "block";


//             items.push(data[i].tid);
//             title.push(data[i].title);
//             dueda.push(data[i].start);
//             descri.push(data[i].description);
//             prog.push(data[i].status);
//             prior.push(data[i].Priority);
//             rpt.push(data[i].rpt);
//             rptun.push(data[i].rpun);
//             user.push(data[i].User);
//             clino.push(data[i].clino)
                 console.log(clino[0]);

                 document.getElementById("items").value = items[0];
                 document.getElementById("title").value = title[0];
                 document.getElementById("dueda").value = dueda[0];
                 document.getElementById("descri").value = descri[0];
                 document.getElementById("prog").value = prog[0];
                 document.getElementById("prior").value = prior[0];
                 document.getElementById("rpt").value = rpt[0];

                 document.getElementById("rptun").value = rptun[0];
                 document.getElementById("user").value = user[0];
                 document.getElementById("cli").value = clino[0];
                 document.getElementById("hotodo").value = hotodo[0];
                 document.getElementById("comment").value = comment[0];

             },

             error: function (x, e) {

                 // alert("Error in updating task")
                 swal({
                     title: 'Error!',
                     text: 'Error in updating Activity!',
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

     });


//   var modal = document.getElementById("myModal");
  







//   modal.style.display ="block";

}
 function fetchitre(id){
// var fired_button = $("button").val();

var fired_button = document.getElementById(id).value ;

// alert(fired_button);
console.log(fired_button);
  
// var script = document.createElement('script');
// script.src = "{https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js}";
// document.getElementsByTagName('head')[0].appendChild(script);
// $.getJSON(Tasks.recurring,

     var data;
     $(document).ready(function () {


         $.ajax
         ({
             type: "GET",


             url: Tasks.recurring,
             dataType: 'json',
             async: false,
             beforeSend: function (xhr) {
                 var jwt = jwtpo;
                 console.log(jwtpo);


                 xhr.setRequestHeader("Authorization", "Bearer " + jwt);
             },


             // $.getJSON(Tasks.calnonrecurring,
             success: function (data) {
                 console.log(data);


                 var items = [];
                 var title = [];
                 var dueda = [];
                 var descri = [];
                 var prog = [];
                 var prior = [];
                 var rpt = [];
                 var rptun = [];
                 var user = [];
                 var clino = [];
                 var hotodo = [];
                 var comment = [];


                 // var todayTime = new Date();

                 // var month = todayTime .getMonth() + 1;

                 // var day = todayTime .getDate();

                 // var year = todayTime .getFullYear();

                 //  var current= year + "-0" + month + "-0" + day;

                 //  console.log(current);


                 var d = new Date();
                 var m = d.getMonth() + 1;
                 var da = d.getDate();


                 var m1 = ('0' + m).slice(-2);
                 var da1 = ('0' + da).slice(-2);
                 console.log(m1);
                 console.log(da);

// document.getElementById("demo").innerHTML=((9)+"-"+(d.getMonth())+"-"+(d.getFullYear()));
                 var current = ((d.getFullYear()) + "-" + (m1) + "-" + (da1));


                 for (var i in data) {
                     if (data[i].tno == fired_button) {
                         items.push(data[i].tno);
                         title.push(data[i].title);
                         dueda.push(data[i].start);
                         descri.push(data[i].description);
                         prog.push(data[i].status);
                         prior.push(data[i].Priority);
                         rpt.push(data[i].rpt);
                         rptun.push(data[i].rpun);
                         user.push(data[i].User);
                         clino.push(data[i].clino);
                         hotodo.push(data[i].hotodo);
                         comment.push(data[i].comment);


                     }
                 }

// console.log();
                 var modal = document.getElementById("myModal2");


                 modal.style.display = "block";


                 // items.push(data[i].tno);
                 // title.push(data[i].title);
                 // dueda.push(data[i].start);
                 // descri.push(data[i].description);
                 // prog.push(data[i].status);
                 // prior.push(data[i].Priority);
                 // rpt.push(data[i].rpt);
                 // rptun.push(data[i].rpun);
                 // user.push(data[i].User);
                 // clino.push(data[i].clino);


                 document.getElementById("items1").value = items[0];
                 document.getElementById("title1").value = title[0];


                 // dueda[0]=convdate(dueda[0]);
                 console.log(current);
                 document.getElementById("dueda1").value = current;
                 document.getElementById("descri1").value = descri[0];
                 document.getElementById("prog1").value = prog[0];
                 document.getElementById("prior1").value = prior[0];
                 document.getElementById("rpt1").value = rpt[0];


                 rptun[0] = convdate(rptun[0]);
                 document.getElementById("rptun1").value = rptun[0];
                 document.getElementById("hotodo1").value = hotodo[0];
                 document.getElementById("comment1").value = comment[0];


                 document.getElementById("user1").value = user[0];
                 document.getElementById("clino1").value = clino[0];
             },

             error: function (x, e) {

                 // alert("Error in updating task")
                 swal({
                     title: 'Error!',
                     text: 'Error in updating Activity!',
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

     });


//   var modal = document.getElementById("myModal");
  







//   modal.style.display ="block";





//   document.getElementById("popti").value= fired_button ;
}

function fetchit2(id){


var fired_button2 = document.getElementById(id).value ;


console.log(fired_button2);
  
// var script = document.createElement('script');
// script.src = "{https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js}";
// document.getElementsByTagName('head')[0].appendChild(script);
// $.getJSON(Events.nonrecurring,

    var data;
    $(document).ready(function () {


        $.ajax
        ({
            type: "GET",


            url: Events.nonrecurring,
            dataType: 'json',
            async: false,
            beforeSend: function (xhr) {
                var jwt = jwtpo;
                console.log(jwtpo);


                xhr.setRequestHeader("Authorization", "Bearer " + jwt);
            },


            // $.getJSON(Tasks.calnonrecurring,
            success: function (data) {
                console.log(data);


                var title3 = [];
                var start3 = [];
                var col3 = [];
                var items3 = [];
                var end3 = [];
                var prior3 = [];
                var rpt3 = [];
                var rptun3 = [];
                var user3 = [];
                var loc3 = [];
                var descri3 = [];
                var clino3 = [];
                var dur3 = [];


                console.log(fired_button2);
                console.log(document.getElementById(id).value);


                for (var i in data) {
                    if (data[i].id == fired_button2) {
                        title3.push(data[i].title);
                        start3.push(data[i].start);
                        col3.push(data[i].color);
                        items3.push(data[i].id);
                        end3.push(data[i].end);
                        prior3.push(data[i].priority);
                        rpt3.push(data[i].rpt);
                        rptun3.push(data[i].rptun);
                        user3.push(data[i].user);
                        loc3.push(data[i].location);
                        descri3.push(data[i].description);
                        clino3.push(data[i].clino);
                        dur3.push(data[i].duration);

                        console.log(col3);


                    }
                }


                var modal = document.getElementById("myModal64");


                modal.style.display = "block";

                console.log(start3[0]);
                var res = start3[0].replace(" ", "T");
                console.log(res);
                console.log(end3[0]);
                var res2 = end3[0].replace(" ", "T");
                console.log(res2);


                document.getElementById("title3").value = title3[0];
                document.getElementById("start3").value = res;
                document.getElementById("col3").value = col3[0];
                document.getElementById("items3").value = items3[0];
                document.getElementById("end3").value = res2;
                document.getElementById("prior3").value = prior3[0];
                document.getElementById("rpt3").value = rpt3[0];
                document.getElementById("rptun3").value = rptun3[0];
                document.getElementById("user3").value = user3[0];
                document.getElementById("loc3").value = loc3[0];
                document.getElementById("descri3").value = descri3[0];
                document.getElementById("clino3").value = clino3[0];

            },

            error: function (x, e) {

                // alert("Error in updating task")
                swal({
                    title: 'Error!',
                    text: 'Error in updating Activity!',
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
   });




}


function fetchitre2(id){


var fired_button = document.getElementById(id).value ;


console.log(fired_button);
  
// var script = document.createElement('script');
// script.src = "{https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js}";
// document.getElementsByTagName('head')[0].appendChild(script);
// $.getJSON(Events.recurring,


    var data;
    $(document).ready(function () {


        $.ajax
        ({
            type: "GET",


            url: Events.recurring,
            dataType: 'json',
            async: false,
            beforeSend: function (xhr) {
                var jwt = jwtpo;
                console.log(jwtpo);


                xhr.setRequestHeader("Authorization", "Bearer " + jwt);
            },


            // $.getJSON(Tasks.calnonrecurring,
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
                var col = [];
                var rpt = [];
                var rptun = [];


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
                    col.push(data[i].color);
                    rpt.push(data[i].rpt);
                    rptun.push(data[i].rptun);
                }
                var cars = [dates, id, titles, prior, user, loc, descri, clino, dur, end, col, rpt, rptun];
                console.log(cars);

                var car = cars[0];
                var p = 0;

                var darpt;
                console.log(fired_button);

                for (var j = 0; j < car.length; j++) {
                    var cube = car[j];
                    for (var k = 0; k < cube.length; k++) {


                        if (daco = convdate2(cars[8][j], dates[j][k]) == true && fired_button == cars[1][j]) {

                            var modal = document.getElementById("myModal56");
                            modal.style.display = "block";

                            daco5 = condate3(dates[j][k]);
                            daco6 = condate4(cars[8][j], dates[j][k]);
                            darpt = rptcon(cars[12][j]);

                            daco5 = daco5.toLocaleString('en-GB');
                            daco6 = daco6.toLocaleString('en-GB');


                            daco5 = stendcon(daco5);
                            daco6 = stendcon(daco6);

                            console.log(daco5);
                            console.log(daco6);


                            document.getElementById("title4").value = cars[2][j];
                            document.getElementById("start4").value = daco5;
                            document.getElementById("col4").value = cars[10][j];
                            document.getElementById("items4").value = cars[1][j];
                            document.getElementById("end4").value = daco6;
                            document.getElementById("prior4").value = cars[3][j];
                            document.getElementById("rpt4").value = cars[11][j];
                            document.getElementById("rptun4").value = darpt;
                            document.getElementById("user4").value = cars[4][j];
                            document.getElementById("loc4").value = cars[5][j];
                            document.getElementById("descri4").value = cars[6][j];
                            document.getElementById("clino4").value = cars[7][j];
                        } else {
                            console.log("no dates");
                        }

                        p++;
                    }
                }

            },

            error: function (x, e) {

                // alert("Error in updating task")
                swal({
                    title: 'Error!',
                    text: 'Error in updating Activity!',
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
    });




}

function rptcon(str){
var str =str;

var str2 = str.slice(0, 8)

console.log(str2);
var str3 = str.slice(0, 4)
var str4 = str.slice(4, 6)
var str5 = str.slice(6, 8)

console.log(str3);
console.log(str4);
console.log(str5);
var str6 = (str3+"-"+str4+"-"+str5)
console.log(str6);
return str6;
}


function stendcon(str){
  var str =str;

var str2 = str.slice(0, 8)

console.log(str2);
var str3 = str.slice(0, 2)
var str4 = str.slice(3, 5)
var str5 = str.slice(6, 10)
var str7 = str.slice(12, 21)

console.log(str3);
console.log(str4);
console.log(str5);
console.log(str7);
var str6 = (str5+"-"+str4+"-"+str3+"T"+str7)
console.log(str6);

return str6;
}

function convdate(str) {
// const str = '20210201';



console.log(str.slice(0,4));
// expected output: "the lazy dog."

console.log(str.slice(4, 6));
// expected output: "quick brown fox"

console.log(str.slice(6,8));

// expected output: "dog."
//var res = str1.concat(str2);

var str1 = str.slice(0,4);
var str2 =  str.slice(4,6);
var str3 =  str.slice(6,8);
var str4 = "-";

var res = str1.concat(str4);
var res = res.concat(str2);
var res = res.concat(str4);
var res = res.concat(str3);
console.log( "final");
console.log(res);


return res;
}

