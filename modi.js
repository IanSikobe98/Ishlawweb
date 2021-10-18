// Get the modal
// var modal = document.getElementById("myModal");
var modal2 = document.getElementById("myModal2");
// var modal3 = document.getElementById("myModal3");

// Get the button that opens the modal
// var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];
var span2 = document.getElementById("close");
// var span3 = document.getElementById("close2");
// When the user clicks the button, open the modal 
// btn.onclick = function() {
//   modal.style.display = "block";
// }

// var tbtn = document.getElementById("taskbtn");
// When the user clicks on <span> (x), close the modal
// span.onclick = function() {
	// var modal = document.getElementById("myModal");
  // modal.style.display = "none";
  // modal2.style.display = "none";
// }

span2.onclick = function() {
	var modal2 = document.getElementById("myModal");
  // modal.style.display = "none";
  // modal2.style.display = "none";
   modal2.style.visibility = "hidden";
}

// span3.onclick = function() {
//   // var modal = document.getElementById("myModal");
//   // modal.style.display = "none";
//   modal3.style.display = "none";
// }

// tbtn.onclick = function(){
// 	modal.style.display ="block";
// }

 function notetask(){
 	var modal2 = document.getElementById("myModal2");
	// modal2.style.display ="block";
  modal2.style.visibility = "visible";
}

//  function notetask2(){
//   var modal = document.getElementById("myModal");
//   modal3.style.display ="block";
// }
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {


    if (event.target == modal2) {
  	// var modal = document.getElementById("myModal");
    modal2.style.visibility = "hidden";
    // document.getElementById("myModal2").style.display = "none";
  }


}


