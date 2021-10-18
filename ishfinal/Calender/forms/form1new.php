<!DOCTYPE html>
<html>
<head>
	<title>form</title>
</head>
<body>


  <form method="POST" name="form" id="form" 
                                    action="ishtask.php" class="login100-form validate-form">
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
            <input class="input100" type="text" name="title" placeholder="Subject" required/>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-user"></span>
            </span>
          </div>

          <div class="wrap-input100 validate-input m-b-16" >Due Date
            <input class="input100" type="date" name="start" placeholder="Due Date" required/>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-user"></span>
            </span>
          </div>





                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Description No is required">
            <input class="input100" type="text" name="descri" placeholder="Task Description" required/>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-book"></span>
            </span>
          </div>




   <div class="wrap-input100"> Status</div>
          <div class="wrap-input100 validate-input m-b-16" data-validate = "Status is required">

                                                      <select class="input100" name="stat" required/>
                                                <!-- <option class="hidden"  selected disabled><b>Please select your Priority</b></option> -->
                                                <option >In progress</option>
                                                <option >Completed</option>
                                                <option >Not Completed</option>

                                                
                                                
                                            </select>
</div>
   <div class="wrap-input100"> Priority</div>
          <div class="wrap-input100 validate-input m-b-16" data-validate = "Repeat is required">

                                                      <select class="input100" name="prio" required/>
                                                <option class="hidden"  selected disabled><b>Please select your Priority</b></option>
                                                <option >High</option>
                                                <option >Medium</option>
                                                <option >Low</option>

                                                
                                                
                                            </select>
</div>


<div class="wrap-input100"> Please select Repeat Frequency</div>
          <div class="wrap-input100 validate-input m-b-16" data-validate = "Repeat is required">

                                                      <select class="input100" name="rpt" required/>
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
            <input class="input100" type="date" name="rptun" placeholder="Repeat Until" />
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-phone-handset"></span>
            </span>
          </div>

          <div class="wrap-input100 validate-input m-b-16" >
            <input class="input100" type="text" name="user" placeholder="Assigned to" />
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















            <!--<img src="hairnub.png">-->
            <br>CLIENT INVOLVED
          
          </span>

                    <div class="wrap-input100 validate-input m-b-16" >
            <input class="input100" type="text" name="clino" placeholder="Client Contact" />
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

</body>
</html>