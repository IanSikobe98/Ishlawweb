


function convdate32(str,str2,str78) {


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
// var current = new Date();
// current = current.toLocaleDateString()
// console.log(current);

var puta =str78.toLocaleDateString();

if(start12.toLocaleDateString()==puta){
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


