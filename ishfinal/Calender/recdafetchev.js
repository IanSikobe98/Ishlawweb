var script = document.createElement('script');
script.src = "{https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js}";
document.getElementsByTagName('head')[0].appendChild(script); 
$.getJSON('http://localhost/Admin/ishfinal/API/receve.php', function(data)  {
          console.log(data);
          var items = [];

          for(var i in data) {
            items.push(data[i].rrule);
                  }
console.log(items);

var dates=[];


var titles=[];
var id = [];
var prior =[];
var user = [];
var loc=[];
var descri = [];
var clino = [];
var dur = [];
var end =[];

// var status =[];





for (var i in items){
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
}
var cars =[dates,id,titles,prior,user,loc,descri,clino,dur,end];
console.log(cars);
console.log(dates);
console.log(cars[0][1][0]);
console.log(cars[1][1]);
console.log("hi");

// for(var i = 0; i < cars.length; i++) {
var car = cars[0];
var student = ''; 
var p=0;

var d = new Date(cars[9][j]);

var daco;

var current = new Date();
current = current.toLocaleDateString()
console.log(current);

for(var j = 0; j < car.length; j++) {
    var cube = car[j];
    for(var k = 0; k < cube.length; k++) {

// daco =convdate2(cars[8][j],dates[j][k]);

      if(daco =convdate2(cars[8][j],dates[j][k]) ==  true ){
       // console.log("cube[" + j + "][" + k + "] = " + dates[j][k].toLocaleDateString());
       // console.log("cube[" + j + "][" + k + "] = " + cars[1][j]);

       // console.log(" ");
       // console.log(" ");
       daco5 =condate3(dates[j][k]);
       daco6 =condate4(cars[8][j],dates[j][k]);



                            student += '<tr>'; 
                            student += '<td>RDE' +  p + 
                                cars[1][j] + '</td>'; 

                                student += '<td>' +  
                                cars[2][j] + '</td>'; 

                                student += '<td>' +  
                                cars[3][j] + '</td>';

                                student += '<td>' +  
                                cars[4][j] + '</td>'; 

                                student += '<td>' +  
                                cars[5][j] + '</td>'; 

                                student += '<td>' +  
                                cars[6][j] + '</td>';  


                                student += '<td>' +  
                                cars[7][j] + '</td>'; 

                          

                                student += '<td>' +  
                                daco5.toLocaleString() + '</td>';

                                student += '<td>' +  
                                daco6.toLocaleString() + '</td>';
    
                            

                            student += '<td>' +  
                                '<button id= "btn1345 '+p+'" onclick="fetchitre2(this.id)"  name='+ cars[1][j]+' value= '+ cars[1][j]+'>'+'edit'+'</button>' + '</td>';

                            student += '</tr>'; 


                          }
else{
  console.log("no dates");
}

p++;
    }
}
  $('#events').append(student); 
              
      });


function convdate2(str,str2) {


  str2 =str2.toLocaleString();

  var d = new Date(str2);
  var e = new Date(str2);
  
  // console.log(d);
  

   var start12 = new Date(str2);
    // console.log(start12);

 


// console.log(str.slice(0,2));


// console.log(str.slice(3, 5));


// console.log(str.slice(6,8));







var str1 = str.slice(0,2);
var str2 =  str.slice(3,5);
var str3 =  str.slice(6,8);


var str12 = parseInt(str1);
var str22 = parseInt(str2);
var str32 = parseInt(str3);

e.setHours(d.getHours()  - 3);
d.setHours(d.getHours()  - 3);
var start12 = e;
d.setHours(d.getHours() + str12 ,d.getMinutes()+ str22 ,d.getSeconds() + str32);
// console.log( "final");
// console.log(d);




// console.log(d);
// console.log(d.toLocaleDateString());
 var end2 = d;
   console.log(start12);
    console.log(end2);
// // d.setHours(d.getHours()  + 24);

//  var end1 = d;

// var getDateArray = function(start, end) {
//     var arr = new Array();
//     var dt = new Date(start);
//     while (dt <= end) {
//         arr.push(new Date(dt));
//         dt.setDate(dt.getDate() + 1);
//     }
//     return arr;
// }


// var res = getDateArray(start12, end1);
// console.log(res);
// console.log(d);
var current = new Date();
current = current.toLocaleDateString()
console.log(current);
if(end2.toLocaleDateString()>=current && start12.toLocaleDateString()<=current){
console.log("true")

  // console.log(end2)
  // console.log(current)
  return true;
}
else{
  console.log("false")
  // console.log(end2)
  // console.log(current)
  return false;
}


}

function condate3(str2) {


  str2 =str2.toLocaleString();

  var d = new Date(str2);
  var e = new Date(str2);
  
  // console.log(d);
  

   var start12 = new Date(str2);
    // console.log(start12);

e.setHours(d.getHours()  - 3);

var start12 = e;
console.log(start12);
 return start12;

}




function condate4(str,str2) {


  str2 =str2.toLocaleString();

  var d = new Date(str2);

  

   var start12 = new Date(str2);
    // console.log(start12);



// console.log(str.slice(0,2));


// console.log(str.slice(3, 5));


// console.log(str.slice(6,8));







var str1 = str.slice(0,2);
var str2 =  str.slice(3,5);
var str3 =  str.slice(6,8);


var str12 = parseInt(str1);
var str22 = parseInt(str2);
var str32 = parseInt(str3);


d.setHours(d.getHours()  - 3);

d.setHours(d.getHours() + str12 ,d.getMinutes()+ str22 ,d.getSeconds() + str32);
console.log( "final");






 var end2 = d;
 
    console.log(end2);


return end2;

}