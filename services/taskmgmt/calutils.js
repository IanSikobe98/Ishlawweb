 function rptcon(str){
// const str = '20210219T200011.';
var str =str;

var str2 = str.slice(0, 8)

console.log(str2);
// expected output: "quick brown fox"
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
// expected output: "quick brown fox"
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
