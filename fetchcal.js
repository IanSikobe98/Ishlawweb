  function fetchitcal(id){
// var fired_button = $("button").val();

var fired_button = id ;

// alert(fired_button);
console.log(fired_button);
  
var script = document.createElement('script');
script.src = "{https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js}";
document.getElementsByTagName('head')[0].appendChild(script); 
$.getJSON('http://localhost/Admin/ishfinal/API/nonrecta.php', function(data)  {
          console.log(data);


          var items = [];
          var title =[];
          var dueda = [];
          var descri =[];
          var prog = [];
          var prior = [];
          var rpt =[];
          var rptun =[];
         var user =[];
          var  clino =[];
          var hotodo= [];
        var comment =[];



          for(var i in data) {
            if(data[i].tid==fired_button){
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
  







  modal.style.display ="block";


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


  document.getElementById("items").value= items[0] ;
  document.getElementById("title").value= title[0] ;
  document.getElementById("dueda").value= dueda[0] ;
  document.getElementById("descri").value= descri[0] ;
  document.getElementById("prog").value= prog[0] ;
  document.getElementById("prior").value= prior[0] ;
  document.getElementById("rpt").value= rpt[0] ;
document.getElementById("hotodo").value= hotodo[0] ;
  document.getElementById("comment").value= comment[0] ;
  document.getElementById("rptun").value= rptun[0] ;
  document.getElementById("user").value= user[0] ;
  document.getElementById("clino").value= clino[0] ;
   });




//   var modal = document.getElementById("myModal");
  







//   modal.style.display ="block";





//   document.getElementById("popti").value= fired_button ;
}


 function fetchitcalre(id,stda){
// var fired_button = $("button").val();

var fired_button = id;

// alert(fired_button);
console.log(fired_button);
  
var script = document.createElement('script');
// script.src = "{https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js}";
document.getElementsByTagName('head')[0].appendChild(script); 
$.getJSON('http://localhost/Admin/ishfinal/API/recta.php', function(data)  {
          console.log(data);


          var items = [];
          var title =[];
          var dueda = [];
          var descri =[];
          var prog = [];
          var prior = [];
          var rpt =[];
          var rptun =[];
         var user =[];
          var  clino =[];
          var hotodo= [];
  var comment =[];





console.log(stda);







var str = stda;
var resut = stda.replace("/", "");
var resut = resut.replace("/", "");





var str1 = resut.slice(0,2);
var str2 =  resut.slice(2,4);
var str3 =  resut.slice(4,8);
var str4 = "-";

var res = str3.concat(str4);
var res = res.concat(str2);
var res = res.concat(str4);
var res = res.concat(str1);
console.log( "final");
console.log(res);



          for(var i in data) {
            if(data[i].tno==fired_button){
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
  







  modal.style.display ="block";





  document.getElementById("items1").value= items[0] ;
  document.getElementById("title1").value= title[0] ;
  


document.getElementById("hotodo1").value= hotodo[0] ;
  document.getElementById("comment1").value= comment[0] ;

  document.getElementById("dueda1").value= res;
  document.getElementById("descri1").value= descri[0] ;
  document.getElementById("prog1").value= prog[0] ;
  document.getElementById("prior1").value= prior[0] ;
  document.getElementById("rpt1").value= rpt[0] ;

  

  rptun[0]=convdate(rptun[0]);
  console.log(rptun[0]);
  document.getElementById("rptun1").value= rptun[0] ;


  document.getElementById("user1").value= user[0] ;
  document.getElementById("clino1").value= clino[0] ;
   });




//   var modal = document.getElementById("myModal");
  







//   modal.style.display ="block";





//   document.getElementById("popti").value= fired_button ;
}

function fetchitcal2(id){
// var fired_button = $("button").val();

var fired_button = id ;

// alert(fired_button);
console.log(fired_button);
  
var script = document.createElement('script');
script.src = "{https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js}";
document.getElementsByTagName('head')[0].appendChild(script); 
$.getJSON('http://localhost/Admin/ishfinal/API/nonrecev.php', function(data)  {
          console.log(data);


          
           var title3 =[];
          var start3 = [];
          var col3 =[];
          var items3 = [];
          var end3 = [];
         var prior3 = [];
          var rpt3 =[];
          var rptun3 =[];
          var user3 =[];
          var loc3 =[];
          var descri3 =[];
          var clino3 =[];
          var dur3 = [];
          




          for(var i in data) {
            if(data[i].id==fired_button){
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

            
            
            

            
            

                  }
                }

// console.log();
var modal = document.getElementById("myModal64");
  







  modal.style.display ="block";

console.log(start3[0]);
var res = start3[0].replace(" ", "T");
console.log(res);
console.log(end3[0]);
var res2 = end3[0].replace(" ", "T");
console.log(res2);


  document.getElementById("title3").value= title3[0] ;
  document.getElementById("start3").value= res ;
  document.getElementById("col3").value= col3[0] ;
  document.getElementById("items3").value= items3[0] ;
  document.getElementById("end3").value= res2 ;
  document.getElementById("prior3").value= prior3[0] ;
  document.getElementById("rpt3").value= rpt3[0] ;
  document.getElementById("rptun3").value= rptun3[0] ;
  document.getElementById("user3").value= user3[0] ;
  document.getElementById("loc3").value= loc3[0] ;
  document.getElementById("descri3").value= descri3[0] ;
  document.getElementById("clino3").value= clino3[0] ;
  // document.getElementById("dur3").value= dur3[0] ;
  
   });




//   var modal = document.getElementById("myModal");
  







//   modal.style.display ="block";





//   document.getElementById("popti").value= fired_button ;
}


function fetchitcalre2(id,stda23){
// var fired_button = $("button").val();

var fired_button = id ;

// alert(fired_button);
console.log(fired_button);
  
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
var col = [];
var rpt=[];
var rptun =[];

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
col.push(data[i].color);
rpt.push(data[i].rpt);
rptun.push(data[i].rptun);
}
var cars =[dates,id,titles,prior,user,loc,descri,clino,dur,end,col,rpt,rptun];
console.log(cars);

var car = cars[0];
var p=0;

var darpt;
// var d = new Date(cars[9][j]);

// var daco;

// var current = new Date();
// current = current.toLocaleDateString()
// console.log(current);

for(var j = 0; j < car.length; j++) {
    var cube = car[j];
    for(var k = 0; k < cube.length; k++) {

// daco =convdate2(cars[8][j],dates[j][k]);

      if(daco =convdate32(cars[8][j],dates[j][k],stda23) ==  true && fired_button == cars[1][j]){
       // console.log("cube[" + j + "][" + k + "] = " + dates[j][k].toLocaleDateString());
       // console.log("cube[" + j + "][" + k + "] = " + cars[1][j]);

       // console.log(" ");
       // console.log(" ");
       var modal = document.getElementById("myModal56");
         modal.style.display ="block";

       daco5 =condate3(dates[j][k]);
       daco6 =condate4(cars[8][j],dates[j][k]);
       darpt = rptcon(cars[12][j]);

daco5 = daco5.toLocaleString('en-GB');
daco6 = daco6.toLocaleString('en-GB');


daco5 =stendcon(daco5);
daco6 =stendcon(daco6);

console.log(daco5);
console.log(daco6);

// var cars =[dates,id,titles,prior,user,loc,descri,clino,dur,end];
  document.getElementById("title4").value= cars[2][j] ;
  document.getElementById("start4").value=daco5;
  document.getElementById("col4").value= cars[10][j];
  document.getElementById("items4").value= cars[1][j];
  document.getElementById("end4").value= daco6;
  document.getElementById("prior4").value= cars[3][j] ;
  document.getElementById("rpt4").value= cars[11][j] ;
  document.getElementById("rptun4").value= darpt ;
  document.getElementById("user4").value= cars[4][j] ;
  document.getElementById("loc4").value= cars[5][j] ;
  document.getElementById("descri4").value= cars[6][j] ;
  document.getElementById("clino4").value= cars[7][j] ;
  // document.getElementById("dur3").value= cars[2][j] ;


                            // student += '<tr>'; 
                            // student += '<td>RDE' +  p + 
                            //     cars[1][j] + '</td>'; 

                            //     student += '<td>' +  
                            //     cars[2][j] + '</td>'; 

                            //     student += '<td>' +  
                            //     cars[3][j] + '</td>';

                            //     student += '<td>' +  
                            //     cars[4][j] + '</td>'; 

                            //     student += '<td>' +  
                            //     cars[5][j] + '</td>'; 

                            //     student += '<td>' +  
                            //     cars[6][j] + '</td>';  


                            //     student += '<td>' +  
                            //     cars[7][j] + '</td>'; 

                          

                            //     student += '<td>' +  
                            //     daco5.toLocaleString() + '</td>';

                            //     student += '<td>' +  
                            //     daco6.toLocaleString() + '</td>';
    
                            

                            // student += '<td>' +  
                            //     '<button id= "btn'+p+'" onclick="fetchitcalre2(this.id)"  name='+ cars[1][j]+' value= '+ cars[1][j]+'>'+'edit'+'</button>' + '</td>';

                            // student += '</tr>'; 


                          }
else{
  console.log("no dates");
}

p++;
    }
}
          
//           var title3 =[];
//           var start3 = [];
//           var col3 =[];
//           var items3 = [];
//           var end3 = [];
//           var prior3 = [];
//           var rpt3 =[];
//           var rptun3 =[];
//           var user3 =[];
//           var loc3 =[];
//           var descri3 =[];
//           var clino3 =[];
//           var dur3 = [];
          




//           for(var i in data) {
//             if(data[i].id==fired_button){
//             title3.push(data[i].title);
//             start3.push(data[i].start);
//             col3.push(data[i].color);
//             items3.push(data[i].id);
//             end3.push(data[i].end);
//             prior3.push(data[i].priority);
//             rpt3.push(data[i].rpt);
//             rptun3.push(data[i].rptun);
//             user3.push(data[i].user);
//             loc3.push(data[i].location);
//             descri3.push(data[i].description);
//             clino3.push(data[i].clino);
//             dur3.push(data[i].duration);

            
            
            

            
            

//                   }
//                 }

// // console.log();
// var modal = document.getElementById("myModal56");
  







//   modal.style.display ="block";

// console.log(start3[0]);
// var res = start3[0].replace(" ", "T");
// console.log(res);
// console.log(end3[0]);
// var res2 = end3[0].replace(" ", "T");
// console.log(res2);


//   document.getElementById("title3").value= title3[0] ;
//   document.getElementById("start3").value= res ;
//   document.getElementById("col3").value= col3[0] ;
//   document.getElementById("items3").value= items3[0] ;
//   document.getElementById("end3").value= res2 ;
//   document.getElementById("prior3").value= prior3[0] ;
//   document.getElementById("rpt3").value= rpt3[0] ;
//   document.getElementById("rptun3").value= rptun3[0] ;
//   document.getElementById("user3").value= user3[0] ;
//   document.getElementById("loc3").value= loc3[0] ;
//   document.getElementById("descri3").value= descri3[0] ;
//   document.getElementById("clino3").value= clino3[0] ;
  // document.getElementById("dur3").value= dur3[0] ;
  
   });




//   var modal = document.getElementById("myModal");
  







//   modal.style.display ="block";





//   document.getElementById("popti").value= fired_button ;
}





