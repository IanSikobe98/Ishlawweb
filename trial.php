<div class="container">
<table class="table table-stiped" id="data">
                <thead>
                	<tr>
                	<th>Emp Id</th>	
                     <th>Emp</th>
                     <th>Data</th>


                	</tr>


                </thead>
                <tbody id="data">
                  
                </tbody>



              </table>
          </div>
                                <script type="text/javascript">
                     
                     fetch('http://dummy.restapiexample.com/api/v1/employees').then(

                      res =>{

                        res.json().then(

                          data =>{

                            console.log(data);

                            if(data.length >0){



                              var temp= "";

                              data.forEach((u)=>{


                                temp += "<tr>";
                                temp += "<td>"+ u.id + "</td>"
                                temp +="<td>" +u.employee_name + "</td>";
                                temp +="<td>" +u.employee_salary + "</td></tr>";
                              })

                              document.getElementById("data").innerHTML="temp";
                            }
                          }


                          )



                      }
                      );


                  </script>