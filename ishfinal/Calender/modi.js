// Get the modal
var modal = document.getElementById("myModal");
var modal2 = document.getElementById("myModal2");
var modal3 = document.getElementById("myModal3");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var span2 = document.getElementById("close1");
var span3 = document.getElementById("close2");
// When the user clicks the button, open the modal 
// btn.onclick = function() {
//   modal.style.display = "block";
// }

var tbtn = document.getElementById("taskbtn");
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
	// var modal = document.getElementById("myModal");
  modal.style.display = "none";
  // modal2.style.display = "none";
}

span2.onclick = function() {
	// var modal = document.getElementById("myModal");
  // modal.style.display = "none";
  modal2.style.display = "none";
}

span3.onclick = function() {
  // var modal = document.getElementById("myModal");
  // modal.style.display = "none";
  modal3.style.display = "none";
}

// tbtn.onclick = function(){
// 	modal.style.display ="block";
// }



 function notetask(){
 	var modal = document.getElementById("myModal");
	modal.style.display ="block";
}

 function notetask2(){
  var modal = document.getElementById("myModal");
  modal3.style.display ="block";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
  	// var modal = document.getElementById("myModal");
    modal.style.display = "none";
    // document.getElementById("myModal2").style.display = "none";
  }

    if (event.target == modal2) {
  	// var modal = document.getElementById("myModal");
    modal2.style.display = "none";
    // document.getElementById("myModal2").style.display = "none";
  }

      if (event.target == modal3) {
    // var modal = document.getElementById("myModal");
    modal3.style.display = "none";
    // document.getElementById("myModal2").style.display = "none";
  }
}


function flagEvent(event, element) {
    element.addClass('event-on-' + event.start.format('YYYY-MM-DD'))
           .css('display', 'none');
}