<?php
  include 'aside.php'
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div>

          <!--/.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-files-o"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Tasks</span>
                <span class="info-box-number">
                  10
                  <small>%</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-window-close"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Not Started</span>
                <span class="info-box-number">13</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class=" fa fa-tasks"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">In progress</span>
                <span class="info-box-number">10</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Completed Tasks</span>
                <span class="info-box-number">20</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Your Tasks</h5>
                <div class="table-responsive">
                  <table class="table m-0" id="events">
                    <thead>
                    <tr>
                        <th>Activity</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
 <script type="text/javascript">
$(document).ready( function () {
    $('#events').DataTable({
      "pageLength": 5,
      "lengthMenu": [5,10, 25],
    });

} );
 </script>


<script type="text/javascript">

function getnonrec (input) {

var current = new Date(input);
current = current.toLocaleString()
console.log(current);
return current;
}

</script>
                    </tbody>

                  </table>
                
                </div>
<script src="services/cases/IndexCases.js"></script>
                <div class="card-footer clearfix">
                <a href="tasks.php" class="btn btn-sm btn-info float-left"> New Task</a>
                <a href="calendar.php" class="btn btn-sm btn-secondary float-right">View All Tasks</a>
              </div>
              <!-- /.card-header -->
              
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->      
             <div class="row">
          <!-- Left col -->






<div class="form-popup" id="myForm">
  <!-- action="services\taskmgmt\postservice\updatetasks.php" -->
  <form  id ="ianform2" method="POST" class="form-container" onsubmit="return sendreload(FormSubmit.agendapost,'ianform2');">
    <p><b>Update your task progress</b></p>
<label for="tid"><b>Task Id</b></label>
<div class="card-body">
            <div class="row">
       <div class="col-12 col-sm-6">
        <div class="form-group">
          <label for="descri"><b>Task ID</b></label>
    <input type="text" id="items" placeholder="Enter Task Id" value="" name="tid" readonly required>
  </div> <!-- form group -->
</div> <!-- col -->

<div class="col-12 col-sm-6">
                <div class="form-group">
    <label for="descri"><b>Title</b></label>
    <input type="text" id="title" placeholder="Update your task title" name="title" required>
  </div> <!-- form group -->
</div> <!-- col -->
</div> <!-- row -->
          <div class="row">
       <div class="col-12 col-sm-6">
        <div class="form-group">
          <label for="dueda">Due Date</label>
                 <input type="date" class="form-control" id="dueda" required="" name="start" placeholder="Enter file name">

  </div>
</div>
<div class="col-12 col-sm-6">
                <div class="form-group">

<label for="descri"><b>Task Description</b></label>
    <input type="text"  id="descri" placeholder="Update your task description" name="descri" >
</div>
</div>
</div>

<div class="row">
       <div class="col-12 col-sm-6">
        <div class="form-group">
    <label for="clino">Assigned To</label>
                  <input type="text" class="form-control select2" id="user" required="" name="user" readonly="" placeholder="Enter your name">
</div> <!-- form group -->
</div> <!-- col -->

<div class="col-12 col-sm-6">
<!--                <div class="form-group">-->
<!--    <label for="clino">Client Name</label>-->
<!--                  <input type="text" class="form-control select2" required="" id="cli" name="clino" placeholder="Enter Client's Name">-->
<!--</div> -->
    <!-- form group -->
</div> <!-- col -->
</div> <!-- row -->

<div class="row">
       <div class="col-12 col-sm-6">
<!--        <div class="form-group">-->
<!--           <label for="clino">How To</label>-->
<!--                  <input type="text" class="form-control select2"  id="hotodo" name="hotodo" placeholder="How To">-->
<!--</div>-->
           <!-- form group -->
</div> <!-- col -->

<div class="col-12 col-sm-6">
<!--                <div class="form-group">-->
<!--<label for="prior"><b>Task Priority</b></label>-->
<!--                  <select id="prior" name="prio"  required="" class="form-control select2" style="">-->
<!--                    -->
<!--                    <option value="High">High</option>-->
<!--                    <option value="Medium">Medium</option>-->
<!--                    <option value="Low">Low</option>-->
<!--                  </select> <br>-->
<!---->
<!--</div>-->
    <!-- form group -->
</div> <!-- col -->
</div> <!-- row -->

<div class="row">
       <div class="col-12 col-sm-6">
        <div class="form-group">
    <label for="prog"><b>Task Status</b></label>
                  <select id="prog" name="stat" required=""  class="form-control select2" style="">
                   
                    <option value="Not Started">Not Started</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                  </select> <br>
</div> <!-- form group -->
</div> <!-- col -->

<div class="col-12 col-sm-6">
<!--                <div class="form-group">-->
<!--                  <label for="clino">General Comments</label>-->
<!--                  <input type="text" class="form-control select2"  id="comment" name="comment" placeholder="Enter Company Remarks">-->
<!--</div> -->
    <!-- form group -->
</div> <!-- col -->
</div> <!-- row -->

<div class="row">
       <div class="col-12 col-sm-6">
        <div class="form-group">
              <label for="rpt">Repeat Frequency</label>
                  <select id="rpt" name="rpt"  class="form-control select2" style="" required="">
                    
                    <option value="Never">Never</option>
                    <option value="Daily">Daily</option>
                    <option value="Weekly">Weekly</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Yearly">Yearly</option>
                    <option value="Every Two Weeks">Every Two Weeks</option>
                    <option value="Weekdays">Weekdays</option>
                  </select> <br>    
</div> <!-- form group -->
</div> <!-- col -->

<div class="col-12 col-sm-6">
                <div class="form-group">
                   <label for="rptun">Repeat Until</label>
                   <input type="Date" class="form-control"  id="rptun" name="rptun" placeholder="Please Select Date"><br>
                 </div>
    </div> <!-- form group -->
</div> <!-- col -->
</div> <!-- row -->
<div class="row">
       <div class="col-12 col-sm-6">
        <div class="form-group">
          <button type="submit" name="submit" class="btn">Save</button>
</div></div>
<div class="col-12 col-sm-6">
                <div class="form-group">
                    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
 </div> <!-- col -->
</div> <!-- row -->
</div>
  </form>
</div>
  <div class="form-popup" id="myModal2">
    <!-- action="services\taskmgmt\postservice\updatetasks.php"  -->
  <form method="POST"  id ="ianform" class="form-container"
  onsubmit="return sendreload(FormSubmit.agendapost,'ianform');">
    <p><b>Update your task progress</b></p>
    <div class="card-body">
            <div class="row">
       <div class="col-12 col-sm-6">
        <div class="form-group">
<label for="tid"><b>Task Id</b></label>
    <input type="text" id="items1" placeholder="Enter Task Id" value="" name="tid" readonly required>
</div> <!-- form group -->
</div> <!-- col -->


<div class="col-12 col-sm-6">
                <div class="form-group">
    <label for="descri"><b>Title</b></label>
    <input type="text" id="title1" placeholder="Update your task title" name="title" required>
 </div> <!-- form group -->
</div> <!-- col -->
</div>

      <div class="row">
       <div class="col-12 col-sm-6">
        <div class="form-group">
              <label for="dueda">Due Date</label>
                 <input type="date" class="form-control" id="dueda1" required="" name="start" placeholder="Update your task progress" required="">
</div> <!-- form group -->
</div> <!-- col -->

<div class="col-12 col-sm-6">
                <div class="form-group">
<label for="descri"><b>Task Description</b></label>
    <input type="text"  id="descri1" placeholder="Update your task Description" name="descri" >
</div>
    <!-- form group -->
</div> <!-- col -->
</div>

<div class="row">
       <div class="col-12 col-sm-6">
        <div class="form-group">
    <label for="clino">Assigned To</label>
                  <input type="text" class="form-control select2" id="user1" name="user" readonly="" placeholder="Enter Client's Name">
</div> <!-- form group -->
</div> <!-- col -->

<div class="col-12 col-sm-6">
<!--                <div class="form-group">-->
<!--    <label for="clino">Client Name</label>-->
<!--                  <input type="text" class="form-control select2" id="clino" required="" name="clino" placeholder="Enter Client's Name">-->
<!--</div>-->
    <!-- form group -->
</div> <!-- col -->
</div>

<div class="row">
       <div class="col-12 col-sm-6">
<!--        <div class="form-group">-->
<!-- <label for="clino">How To</label>-->
<!--                  <input type="text" class="form-control select2"  id="hotodo1" name="hotodo" placeholder="How To">-->
<!--</div> -->
           <!-- form group -->
</div> <!-- col -->

<div class="col-12 col-sm-6">
<!--                <div class="form-group">-->
<!--<label for="prior"><b>Task Priority</b></label>-->
<!--                  <select id="prior1" name="prio"  class="form-control select2" style="" required="">-->
<!--                    -->
<!--                    <option value="High">High</option>-->
<!--                    <option value="Medium">Medium</option>-->
<!--                    <option value="Low">Low</option>-->
<!--                  </select> <br>-->
<!--</div> -->
    <!-- form group -->
</div> <!-- col -->
</div>

<div class="row">
       <div class="col-12 col-sm-6">
        <div class="form-group">
    <label for="prog"><b>Task Status</b></label>
                  <select id="prog1" name="stat"  class="form-control select2" style="" required="">
                    <option selected="selected">Select Task Status</option>
                    <option value="Not Started">Not Started</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                  </select> <br>
</div> <!-- form group -->
</div> <!-- col -->

<div class="col-12 col-sm-6">
<!--                <div class="form-group">-->
<!--<label for="clino">General Comments</label>-->
<!--                  <input type="text" class="form-control select2"  id="comment1" name="comment" placeholder="Enter Company Remarks">-->
<!--</div> -->
    <!-- form group -->
</div> <!-- col -->
</div>

<div class="row">
       <div class="col-12 col-sm-6">
        <div class="form-group">
              <label for="rpt">Repeat Frequency</label>
                  <select id="rpt1" name="rpt"  class="form-control select2" style="" required="">
                    
                    <option value="Never">Never</option>
                    <option value="Daily">Daily</option>
                    <option value="Weekly">Weekly</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Yearly">Yearly</option>
                    <option value="Every Two Weeks">Every Two Weeks</option>
                    <option value="Weekdays">Weekdays</option>
                  </select> <br>   
</div> <!-- form group -->
</div> <!-- col -->

<div class="col-12 col-sm-6">
                <div class="form-group">
               <label for="rptun">Repeat Until</label>
               <input type="Date" class="form-control" id="rptun1" name="rptun" placeholder="Please Select Date"><br>


</div> <!-- form group -->
</div> <!-- col -->
</div>

<div class="row">
       <div class="col-12 col-sm-6">
        <div class="form-group">
      <label for="rpt">Save</label>
                  <select id="save" name="save1"  class="form-control select2" style="" required="">
                    <option selected="selected">Select Save Option</option>
                    <option value="One-time">One-time</option>
                    <option value="Full-group">Full-group</option>
                  </select> <br>
</div> <!-- form group -->
</div> <!-- col -->
</div>
<div class="row">
       <div class="col-12 col-sm-6">
        <div class="form-group">
    <button type="submit" name="submit" class="btn">Save</button>
</div></div>
<div class="col-12 col-sm-6">
                <div class="form-group">
   <button type="button" class="btn cancel" onclick="closeForm2()">Close</button>

 </div> <!-- col -->
</div> <!-- row -->
</div>
  </form>
</div>
</div>

<div id="myModal" class="modal">

  <div class="modal-content">
    <span id="close" class="close">&times;</span>
    
    <h6 id = "status" style="color:green;"></h6>
      <h6 id = "status3" style="color:green;"></h6>
      
  </div>
  
</div>

</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
function closeForm2() {
  document.getElementById("myModal2").style.display = "none";
}
function closeForm3() {
  document.getElementById("myModal64").style.display = "none";
}
function closeForm4() {
  document.getElementById("myModal56").style.display = "none";
}
</script>

</body> 

</html>
              <!-- /.card-body -->

            </div>


    </section>

          <!-- Left col -->
          <div class="col-md-12">
            <!-- MAP & BOX panelE -->
            <div style="overflow-x:auto;" class="card">
              <div class="card-header">
                <h3 class="card-title">Your Agenda</h3>
              </div>
<style type="text/css">
 #table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#table td, #table th {
  border: 1px solid #ddd;
  padding: 6px;
}

#table tr:nth-child(even){background-color: #f2f2f2;}

#table tr:hover {background-color: #ddd;}

#table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
 }
</style>
<table  id="table">
            <thead>
                <tr>
        
        <th>Task</th>
        <th>Due Date</th>
        <th>Status</th>
        <th>Action</th>

        
                </tr>
            </thead>

<tbody>

</table>
<script type="text/javascript">

function getnonrec (input) {

var current = new Date(input);
current = current.toLocaleString()
console.log(current);
return current;
}
</script>
<!--</tbody>-->
<!-- <script type="text/javascript" src="ishfinal/Calender/recdafetchev.js"></script> -->




<script type="text/javascript">

$(document).ready( function () {
    $('#table').DataTable();


} );
 </script>
 
</form>
     <div class="card-footer clearfix">
                <i class="fas fa-plus"></i><a href="calendar.php"> View Office Events</a>
              </div>
            </div>
            </form>   

 
<div class="form-popup" id="myModal64">
  <form id="eventform"onsubmit="return sendreload(FormSubmit.agendapostev,'eventform');" method="POST" class="form-container">
    <p><b>Update Event progress</b></p>


<div class="card-body">
            <div class="row">
       <div class="col-12 col-sm-6">
        <div class="form-group">
<label for="tid"><b>Event Id</b></label>
    <input type="text" id="items3" placeholder="Enter Task Id" value="" name="eid" readonly required>
  </div> <!-- form group -->
</div> <!-- col -->

<div class="col-12 col-sm-6">
                <div class="form-group">
    <label for="descri"><b>Activity</b></label>
    <input type="text" id="title3" placeholder="Update your task title" name="title" required>
  </div> <!-- form group -->
</div> <!-- col -->
</div> <!-- row -->
          <div class="row">
       <div class="col-12 col-sm-6">
<!--        <div class="form-group">-->
<!--          <label for="prior"><b>Event Priority</b></label>-->
<!--                  <select id="prior3" name="prio"  required="" class="form-control select2" style="">-->
<!--                    <option selected="selected">Select Event Priority</option>-->
<!--                    <option value="High">High</option>-->
<!--                    <option value="Medium">Medium</option>-->
<!--                    <option value="Low">Low</option>-->
<!--                  </select> <br>-->
<!--  </div>-->
</div>
<div class="col-12 col-sm-6">
                <div class="form-group">
<label for="descri"><b>User</b></label>
    <input type="text"  id="user3" placeholder="Assigned To" name="user" required="" readonly="" >
</div>
</div>
</div>

<div class="row">
       <div class="col-12 col-sm-6">
<!--        <div class="form-group">-->
<!--     <label for="clino">location</label>-->
<!--                  <input type="text" class="form-control select2" id="loc3" required="" name="loc"  placeholder="Event Location" required="">-->
<!---->
<!--</div>-->
           <!-- form group -->
</div> <!-- col -->

<div class="col-12 col-sm-6">
                <div class="form-group">
    <label for="clino">Event Description</label>
                  <input type="text" class="form-control select2" required="" id="descri3" name="descri" placeholder="Update Event Description">
</div> <!-- form group -->
</div> <!-- col -->
</div> <!-- row -->

<div class="row">
       <div class="col-12 col-sm-6">
<!--        <div class="form-group">-->
<!--                         <label for="dueda"><b>Client</b></label>-->
<!--    <input type="text" id="clino3"placeholder="Client's Name" name="clino" required>-->
<!--</div>  form group --->
</div> <!-- col -->

<div class="col-12 col-sm-6">
                <div class="form-group">
<label for="dueda"><b>Color</b></label>
    <input type="text" id="col3"placeholder="Choose Event colour" name="color" required>
</div> <!-- form group -->
</div> <!-- col -->
</div> <!-- row -->

<div class="row">
       <div class="col-12 col-sm-6">
        <div class="form-group">
     <label for="dueda"><b>Start Time</b></label>
    <input type="datetime-local" class="form-control" id="start3"placeholder="Update your event start time" name="start" required>
</div> <!-- form group -->
</div> <!-- col -->

<div class="col-12 col-sm-6">
          <label for="dueda"><b>End Time</b></label>
    <input type="datetime-local" class="form-control" id="end3"placeholder="Update your event end time" name="end" >
</div> <!-- form group -->
</div> <!-- col -->
</div> <!-- row -->

<div class="row">
    <div class="col-12 col-sm-6">
        <div class="form-group">
            <label for="rpt">Repeat Frequency</label>
            <select id="rpt3" name="rpt"  class="form-control select2" style="" required="">
                
                <option value="Never">Never</option>
                <option value="Daily">Daily</option>
                <option value="Weekly">Weekly</option>
                <option value="Monthly">Monthly</option>
                <option value="Yearly">Yearly</option>
                <option value="Every Two Weeks">Every Two Weeks</option>
                <option value="Weekdays">Weekdays</option>
            </select> <br>
        </div> <!-- form group -->
    </div> <!-- col -->

    <div class="col-12 col-sm-6">
        <div class="form-group">
                   <label for="rptun">Repeat Until</label>
                   <input type="Date" class="form-control"  id="rptun3" name="rptun" placeholder="Please Select Date"><br>
</div> <!-- form group -->
</div> <!-- col -->

<div class="col-12 col-sm-6">
                <div class="form-group">
                     </div>
    </div> <!-- form group -->
</div> <!-- col -->
<div class="row">
       <div class="col-12 col-sm-6">
        <div class="form-group">
              <button type="submit" name="submit" class="btn">Save</button>
</div> <!-- form group -->
</div> <!-- col -->

<div class="col-12 col-sm-6">
                <div class="form-group">
                       <button type="button" class="btn cancel" onclick="closeForm3()">Close</button>
                     </div>
    </div> <!-- form group -->
</div> <!-- col -->


  </form>
</div>
</div>
   <div class="form-popup" id="myModal56">
  <form onsubmit="return sendreload(FormSubmit.agendapostev,'eventrecsubmit');" id ="eventrecsubmit"  method="POST" class="form-container">
    <p><b>Update your Event progress</b></p>


<div class="card-body">
            <div class="row">
       <div class="col-12 col-sm-6">
        <div class="form-group">
<label for="tid"><b>Event Id</b></label>
    <input type="text" id="items4" placeholder="Enter Task Id" value="" name="eid" readonly required>

  </div> <!-- form group -->
</div> <!-- col -->

<div class="col-12 col-sm-6">
                <div class="form-group">
    <label for="descri"><b>Activity</b></label>
    <input type="text" id="title4" placeholder="Update your task title" name="title" required>
  </div> <!-- form group -->
</div> <!-- col -->
</div> <!-- row -->
          <div class="row">
       <div class="col-12 col-sm-6">
<!--        <div class="form-group">-->
<!--<label for="prior"><b>Event Priority</b></label>-->
<!--                  <select id="prior4" name="prio"  required="" class="form-control select2" style="">-->
<!--                    <option selected="selected">Select Event Priority</option>-->
<!--                    <option value="High">High</option>-->
<!--                    <option value="Medium">Medium</option>-->
<!--                    <option value="Low">Low</option>-->
<!--                  </select> <br>-->
<!---->
<!--  </div>-->
</div>
<div class="col-12 col-sm-6">
                <div class="form-group">
<label for="descri"><b>User</b></label>
    <input type="text"  id="user4" placeholder="Assigned to" name="user"  readonly="">

</div>
</div>
</div>

<div class="row">
       <div class="col-12 col-sm-6">
<!--        <div class="form-group">-->
<!--     <label for="clino">location</label>-->
<!--                  <input type="text" class="form-control select2" id="loc4" required="" name="loc" placeholder="Enter your name">-->
<!---->
<!---->
<!--</div> -->
           <!-- form group -->
</div> <!-- col -->

<div class="col-12 col-sm-6">
                <div class="form-group">
     <label for="clino">Event Description</label>
                  <input type="text" class="form-control select2" required="" id="descri4" name="descri" placeholder="Update your task Description">

</div> <!-- form group -->
</div> <!-- col -->
</div> <!-- row -->

<div class="row">
       <div class="col-12 col-sm-6">
<!--        <div class="form-group">-->
<!--              <label for="dueda"><b>Client</b></label>-->
<!--    <input type="text" id="clino4"placeholder="Client Name" name="clino" required>-->
<!--</div>-->
           <!-- form group -->
</div> <!-- col -->

<div class="col-12 col-sm-6">
                <div class="form-group">
<label for="dueda"><b>Color</b></label>
    <input type="text" id="col4"placeholder="Choose event color" name="color" required>

</div> <!-- form group -->
</div> <!-- col -->
</div> <!-- row -->

<div class="row">
       <div class="col-12 col-sm-6">
        <div class="form-group">
    <label for="dueda"><b>Start Time</b></label>
    <input type="datetime-local" class="form-control" id="start4"  name="start" required>

</div> <!-- form group -->
</div> <!-- col -->

<div class="col-12 col-sm-6">
      <label for="dueda"><b>End Time</b></label>
    <input type="datetime-local" class="form-control" id="end4"  name="end" required> <!-- form group -->
</div> <!-- col -->
</div> <!-- row -->

<div class="row">
    <div class="col-12 col-sm-6">
        <div class="form-group">
            <label for="rpt">Repeat Frequency</label>
            <select id="rpt4" name="rpt"  class="form-control select2" style="" required="">
                
                <option value="Never">Never</option>
                <option value="Daily">Daily</option>
                <option value="Weekly">Weekly</option>
                <option value="Monthly">Monthly</option>
                <option value="Yearly">Yearly</option>
                <option value="Every Two Weeks">Every Two Weeks</option>
                <option value="Weekdays">Weekdays</option>
            </select> <br>
        </div> <!-- form group -->
    </div> <!-- col -->

    <div class="col-12 col-sm-6">
        <div class="form-group">

   <label for="rptun">Repeat Until</label>
                   <input type="Date" class="form-control"  id="rptun4" name="rptun" placeholder="Please Select Date"><br>
</div> <!-- form group -->
</div>
<div class="col-12 col-sm-6">
  <label for="rpt">Save</label>
                  <select id="save" name="save1"  class="form-control select2" style="" required="">
                    <option selected="selected">Select Save Option</option>
                    <option value="One-time">One-time</option>
                    <option value="Full-group">Full-group</option>
                  </select> <br>
</div> <!-- col -->

</div> <!-- col -->
<div class="row">
       <div class="col-12 col-sm-6">
        <div class="form-group">

  <button type="submit" name="submit" class="btn">Save</button>

</div> <!-- form group -->
</div>
<div class="col-12 col-sm-6">
  <button type="button" class="btn cancel" onclick="closeForm4()">Close</button>
</div> <!-- col -->


  </form>
</div>
            <!-- /.card -->

            <!-- TABLE: LATEST ORDERS -->            <!-- /.card -->

          <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            
            <!-- /.info-box -->
            
              <!-- /.info-box-content -->
            
            <!-- /.info-box -->
<div class="card-body pt-0">
                <!--The calendar -->
                
              </div>

    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->
        <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.css' rel='stylesheet' />
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.2.0/main.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.2.0/main.min.js'></script>
        <!-- <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/rrule@5.2.0/main.global.min.js'></script> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="tr.css"> -->

        <script    src='https://cdn.jsdelivr.net/npm/rrule@2.6.4/dist/es5/rrule.min.js'></script>
<script src="https://jakubroztocil.github.io/rrule/dist/es5/rrule-tz.min.js"></script>

<!-- the rrule-to-fullcalendar connector. must go AFTER the rrule lib -->
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/rrule@5.2.0/main.global.min.js'></script>
 <!-- <script type="text/javascript" src="http://localhost/ishfinal/Calender/modi.js"></script> -->








 <!-- Boootstrap and css links -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    




<!-- Calender Script(Very Important) -->
<script>


  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      selectable: true,
      initialView: 'dayGridMonth',
      
     
      dayMaxEvents: true,
      headerToolbar: {
       // left: 'prevYear,prev,next,nextYear today',
        //center: 'title',
        //right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },



eventDidMount: function(info) {

  console.log(info.event);

},



  eventSources: [
  Tasks.nonrecurring
  ]
  ,
 });
    calendar.render();
  });

    </script>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!--<script src="plugins/jquery/jquery.min.js"></script>-->
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>
<!--<script src="plugins/jquery/jquery.min.js"></script>-->
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="dist/js/demo.js"></script>
<script type="text/javascript">

  //Window on load function
  function hidefunc(){

      var reloading1 ='<?php if(isset($_COOKIE["loginsuccess"])){
          echo $_COOKIE["loginsuccess"];} ?>'
      document.cookie = "loginsuccess; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
      //var deletereload = '<?php //setcookie("loginsuccess", "", time() - 3600);?>//'
     var counter = sessionStorage.getItem("counter")
      if (reloading1 && counter == 0) {
          counter++
          sessionStorage.setItem("counter",counter);

          swal({
              title: 'Great!',
              text: 'Login Successful!',
              icon: 'success',
              button: 'Close'

          });

          // document.getElementById('myModal').style.display = 'block';
          // document.getElementById('status').innerHTML = 'Tasks successfully saved';
          // document.getElementById('status3').innerHTML = '.<br><br>';
          //
          // document.getElementById('status').style.color= 'green';
      }

      var reloading = sessionStorage.getItem("submitsuccess");

    if (reloading) {
        sessionStorage.removeItem("submitsuccess");
             swal({
  title: 'Great!',
  text: 'Activity updated successfully!',
  icon: 'success',
  button: 'Close',
});

            }


    var perm = '<?php if(isset($_COOKIE["addvis"])){
     echo $_COOKIE["addvis"];} ?>'

    var addcli = '<?php if(isset($_COOKIE["addcli"])){
     echo $_COOKIE["addcli"];} ?>'

     var viewcli = '<?php if(isset($_COOKIE["viewcli"])){
     echo $_COOKIE["viewcli"];} ?>'

      var cli = '<?php if(isset($_COOKIE["cli"])){
     echo $_COOKIE["cli"];} ?>'

          var viewvis = '<?php if(isset($_COOKIE["viewvis"])){
     echo $_COOKIE["viewvis"];} ?>'

      var vis = '<?php if(isset($_COOKIE["vis"])){
     echo $_COOKIE["vis"];} ?>'



      var fna = '<?php if(isset($_COOKIE["fna"])){
     echo $_COOKIE["fna"];} ?>'

     var sna = '<?php if(isset($_COOKIE["sna"])){
     echo $_COOKIE["sna"];} ?>'

     var role = '<?php if(isset($_COOKIE["role"])){
     echo $_COOKIE["role"];} ?>'

      var tokencount = '<?php if(isset($_COOKIE["resp"])){
          echo $_COOKIE["resp"];} ?>'
      sessionStorage.setItem('tokencount',tokencount);



      console.log(fna)
var fullna = fna.concat(" ");
document.getElementById("usern").innerHTML =fullna.concat(sna);
document.getElementById("role1").innerHTML = role;
    console.log(perm);

    if(perm =="addvisitors")
    {
      console.log("allowed")
document.getElementById("visit").style.display ="block";
      document.getElementById("visitadd").style.display ="block";

    }

    if(viewvis =="viewvisitors")
    {
      console.log("allowed")
document.getElementById("visit").style.display ="block";
      document.getElementById("visitvi").style.display ="block";

    }



        if(addcli =="addclients")
    {
      console.log("allowed")

     document.getElementById("client4").style.display ="block";
      document.getElementById("cliadd").style.display ="block";

    }

            if(viewcli =="viewclients")
    {
      console.log("allowed")

     document.getElementById("client4").style.display ="block";
      document.getElementById("viewedit").style.display ="block";

    }


      getMessageCount();
  }
  
</script>
 <script type="text/javascript" src="services/taskmgmt/fetchAsignees.js"></script>
<script type="text/javascript" src="modi.js"></script>
</body>
</html>
