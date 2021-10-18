<!DOCTYPE html>
<html>
<head>
	<title>Calendar</title>

	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	   <!--Calender Links-->
        <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.css' rel='stylesheet' />
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.2.0/main.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.2.0/main.min.js'></script>
        <!-- <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/rrule@5.2.0/main.global.min.js'></script> -->


 <!-- Boootstrap and css links -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="tr.css">

        <script    src='https://cdn.jsdelivr.net/npm/rrule@2.6.4/dist/es5/rrule.min.js'></script>
<script src="https://jakubroztocil.github.io/rrule/dist/es5/rrule-tz.min.js"></script>

<!-- the rrule-to-fullcalendar connector. must go AFTER the rrule lib -->
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/rrule@5.2.0/main.global.min.js'></script>
 <script type="text/javascript" src="modi.js"></script>


<!-- Calender Script(Very Important) -->
<script>


  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      selectable: true,
      initialView: 'dayGridMonth',
      editable:true,
      
     
      dayMaxEvents: true,
      headerToolbar: {
        left: 'prevYear,prev,next,nextYear today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },



// eventDidMount: function(info) {

//   console.log(info.event);

// },

      eventDidMount: function(info) {
        var tooltip = new Tooltip(info.el, {
          title: info.event.extendedProps.title,
          placement: 'top',
          trigger: 'hover',
          container: 'body'
        });
      },

  eventSources: [
    'http://localhost/ishfinal/API/nonrecta.php',
    'http://localhost/ishfinal/API/recta.php',
  ]
  ,
 });
    calendar.render();
  });

    </script>

<style type="text/css">

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}


.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button5 {border-radius: 50%;}



.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close,.close2 {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close,.close2:hover,
.close,.close2:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}








</style>

<style>

  /*
  i wish this required CSS was better documented :(
  https://github.com/FezVrasta/popper.js/issues/674
  derived from this CSS on this page: https://popper.js.org/tooltip-examples.html
  */

  .popper,
  .tooltip {
    position: absolute;
    z-index: 9999;
    background: #FFC107;
    color: black;
    width: 150px;
    border-radius: 3px;
    box-shadow: 0 0 2px rgba(0,0,0,0.5);
    padding: 10px;
    text-align: center;
  }
  .style5 .tooltip {
    background: #1E252B;
    color: #FFFFFF;
    max-width: 200px;
    width: auto;
    font-size: .8rem;
    padding: .5em 1em;
  }
  .popper .popper__arrow,
  .tooltip .tooltip-arrow {
    width: 0;
    height: 0;
    border-style: solid;
    position: absolute;
    margin: 5px;
  }

  .tooltip .tooltip-arrow,
  .popper .popper__arrow {
    border-color: #FFC107;
  }
  .style5 .tooltip .tooltip-arrow {
    border-color: #1E252B;
  }
  .popper[x-placement^="top"],
  .tooltip[x-placement^="top"] {
    margin-bottom: 5px;
  }
  .popper[x-placement^="top"] .popper__arrow,
  .tooltip[x-placement^="top"] .tooltip-arrow {
    border-width: 5px 5px 0 5px;
    border-left-color: transparent;
    border-right-color: transparent;
    border-bottom-color: transparent;
    bottom: -5px;
    left: calc(50% - 5px);
    margin-top: 0;
    margin-bottom: 0;
  }
  .popper[x-placement^="bottom"],
  .tooltip[x-placement^="bottom"] {
    margin-top: 5px;
  }
  .tooltip[x-placement^="bottom"] .tooltip-arrow,
  .popper[x-placement^="bottom"] .popper__arrow {
    border-width: 0 5px 5px 5px;
    border-left-color: transparent;
    border-right-color: transparent;
    border-top-color: transparent;
    top: -5px;
    left: calc(50% - 5px);
    margin-top: 0;
    margin-bottom: 0;
  }
  .tooltip[x-placement^="right"],
  .popper[x-placement^="right"] {
    margin-left: 5px;
  }
  .popper[x-placement^="right"] .popper__arrow,
  .tooltip[x-placement^="right"] .tooltip-arrow {
    border-width: 5px 5px 5px 0;
    border-left-color: transparent;
    border-top-color: transparent;
    border-bottom-color: transparent;
    left: -5px;
    top: calc(50% - 5px);
    margin-left: 0;
    margin-right: 0;
  }
  .popper[x-placement^="left"],
  .tooltip[x-placement^="left"] {
    margin-right: 5px;
  }
  .popper[x-placement^="left"] .popper__arrow,
  .tooltip[x-placement^="left"] .tooltip-arrow {
    border-width: 5px 0 5px 5px;
    border-top-color: transparent;
    border-right-color: transparent;
    border-bottom-color: transparent;
    right: -5px;
    top: calc(50% - 5px);
    margin-left: 0;
    margin-right: 0;
  }

</style>


</head>
<body>

  <button class="button button5" onclick="notetask()"><i class="fa fa-plus" aria-hidden="true"></i>
New Task</button>
<div id='calendar'></div>
 <div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close" id="close2">&times;</span>

 <form method="POST" name="form" id="form" 
                                    action="forms/ishedit.php" class="login100-form validate-form">
          <span class="login100-form-title p-b-55">
              <div class="login-logo">
    
  </div>
            <!--<img src="hairnub.png">-->
            <br>NEW TASK
          
          </span>
                  

          <div class="wrap-input100 validate-input m-b-16" >
            <span class="txt1">
              Fill in task details here
              <BR>
              <BR>
              </span>
<H3>TASK INFORMATION</H3>
          </div>


          <div class="wrap-input100 validate-input m-b-16" >
            <input class="input100" type="text" name="title" id ="title" placeholder="Subject" required/>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-user"></span>
            </span>
          </div>

          <div class="wrap-input100 validate-input m-b-16" >Due Date
            <input class="input100" type="date" id ="dueda" name="start" placeholder="Due Date" required/>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-user"></span>
            </span>
          </div>





                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Description No is required">
            <input class="input100" type="text" id ="descri" name="descri" placeholder="Task Description" required/>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-book"></span>
            </span>
          </div>




   <div class="wrap-input100"> Status</div>
          <div class="wrap-input100 validate-input m-b-16" data-validate = "Status is required">

                                                      <select id ="prog"

                                                      class="input100" name="stat" required/>
                                                <!-- <option class="hidden"  selected disabled><b>Please select your Priority</b></option> -->
                                                <option >In progress</option>
                                                <option >Completed</option>
                                                <option >Not Completed</option>

                                                
                                                
                                            </select>
</div>
   <div class="wrap-input100"> Priority</div>
          <div class="wrap-input100 validate-input m-b-16" data-validate = "Repeat is required">

                                                      <select id ="prior" class="input100" name="prio" required/>
                                                <option class="hidden"  selected disabled><b>Please select your Priority</b></option>
                                                <option >High</option>
                                                <option >Medium</option>
                                                <option >Low</option>

                                                
                                                
                                            </select>
</div>


<div class="wrap-input100"> Please select Repeat Frequency</div>
          <div class="wrap-input100 validate-input m-b-16" data-validate = "Repeat is required">

                                                      <select id ="rpt" class="input100" name="rpt" required/>
                                                <option class="hidden"  selected disabled><b>Please select your Repeat frequency</b></option>
                                                <option >Never</option>
                                                <option >Daily</option>
                                                <option >Weekly</option>
                                                <option >Every Weekday</option>
                                                <option >Every Two weeks</option>
                                                <option >Monthly on first Thursday</option>
                                                <option >Monthly</option>
                                                <option >Yearly</option>
                                                
                                                
                                            </select>
</div>







          <div class="wrap-input100 validate-input m-b-16" >Repeat Until
            <input id ="rptun" class="input100" type="date" name="rptun" placeholder="Repeat Until" />
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-phone-handset"></span>
            </span>
          </div>

          <div class="wrap-input100 validate-input m-b-16" >
            <input id ="user" class="input100" type="text" name="user" placeholder="Assigned to" />
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-phone-handset"></span>
            </span>
          </div>

        <!--             <div class="wrap-input100 validate-input m-b-16" >
            <input class="input100" type="text" name="user[]" placeholder="Assigned to" />
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-phone-handset"></span>
            </span>
          </div> -->




                    <div class="wrap-input100 validate-input m-b-16" >
            <input id ="items" class="input100" type="text" name="tid" placeholder="id" readonly/>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-phone-handset"></span>
            </span>
          </div>




<!-- <div class="wrap-input100"> Save</div>
          <div class="wrap-input100 validate-input m-b-16" data-validate = "Repeat is required">

                                                      <select class="input100" name="save1" required/>
                                                <option class="hidden"  selected disabled><b>SAVE FREQUENCY</b></option>
                                                <option >One-time</option>
                                                <option >Full-group</option>

                                                
                                                
                                            </select>
</div> -->










            <!--<img src="hairnub.png">-->
            <br>CLIENT INVOLVED
          
          </span>

                    <div class="wrap-input100 validate-input m-b-16" >
            <input id ="clino" class="input100" type="text" name="clino" placeholder="Client Contact" />
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-user"></span>
            </span>
          </div>
             <!--        <div class="wrap-input100 validate-input m-b-16" >
            <input class="input100" type="text" name="matter" placeholder="Client Matter" />
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-user"></span>
            </span>
          </div> -->

  <!--        <div class="contact100-form-checkbox m-l-4">
            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
            <label class="label-checkbox100" for="ckb1">
              Remember me
            </label>
          </div> -->
          
          <div class="container-login100-form-btn p-t-25">
            <button name ="send" type="submit" id="send" data-submit="...Sending" class="login100-form-btn">
              SAVE TASK ENTRY
            </button>

          </div>
<!--            <div class="wrap-input100"><br><br></div>
                    <div class="container-login100-form-btn p-t-25">
            <button name ="menu" type="submit" id="myBtn" class="login100-form-btn">
              MAIN MENU
            </button>

          </div> -->
          <div class="wrap-input100"><br><br></div>
                               
<div class="wrap-input100">
  <h6 id = "status1" style="color:green;"></h6>


</div>
                                    <!--  <div class="wrap-input100">  -->   
                                        <!-- <h6 id = "status" style="color:red;"></h6> -->
                                    </div>

          <div class="text-center w-full p-t-42 p-b-22">
          
          </div>



          <!-- <div class="text-center w-full p-t-115">
            <span class="txt1">
              Not a member?
            </span>

            <a class="txt1 bo1 hov1" href="#">
              Sign up now             
            </a> -->
          </div>

        </form>

  </div>
</div>


        <table id='table'> 
            <!-- HEADING FORMATION -->
            <tr> 
                <th>Id</th> 
                <th>Activity</th> 
                <th>Priority</th> 
                <th>Status</th> 
                <th>Action</th> 


<!--                 <th>user</th> 
                <th>loc</th> 
                <th>descri</th> 
                <th>clino</th> 
                <th>matter</th> 
                <th>end</th> 
                <th>durattion</th> 
                <th>display</th> 
                <th><button>trial</button></th> -->
            </tr> 
</body>
 <script type="text/javascript" src="modi.js"></script>

 <!-- <script  src='recfetch.js'></script> -->
 <!-- <script  src='recfetchev.js'></script> -->
  <!-- <script  src='recdafetch.js'></script> -->
  <!-- <script  src='recdafetchev.js'></script> -->




    <script  src='nonrecdafetch.js'></script>

    <script type="text/javascript">
 function fetchit(id){
// var fired_button = $("button").val();

var fired_button = document.getElementById(id).value ;

// alert(fired_button);
console.log(fired_button);
  
var script = document.createElement('script');
script.src = "{https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js}";
document.getElementsByTagName('head')[0].appendChild(script); 
$.getJSON('http://localhost/ishfinal/API/daynoreta.php', function(data)  {
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

                  }
                }

// console.log();
var modal = document.getElementById("myModal");
  







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

  document.getElementById("rptun").value= rptun[0] ;
  document.getElementById("user").value= user[0] ;
  document.getElementById("clino").value= clino[0] ;
   });




//   var modal = document.getElementById("myModal");
  







//   modal.style.display ="block";





//   document.getElementById("popti").value= fired_button ;
}

</script>


</html>