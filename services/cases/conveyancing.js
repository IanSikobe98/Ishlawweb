//Fill files of tables
$( document ).ready(function() {

$.ajax
  ({
    type: "GET",

  

    url: Cases.fetch,
    dataType: 'json',
    async: false,




    success: function (data){
    console.log(data);
    console.log("DONE");
        var categoryid = sessionStorage.getItem("categoryid");
        console.log(categoryid);





      var items = [];
var file = ''; 
var descip = '';
 var arr =[]
          for(var i in data) {
              if(data[i].FileCategoryId == categoryid) {
                  // sessionStorage.setItem("casename",data[i].case_number);
                  sessionStorage.setItem("location", data[i].physical_location);


                  file += '<tr>';

                  file += '<td>' + '<a href = "' + Filing.fetchspec + '" onclick="return setfiles(' + data[i].id + ');" >' +
                      data[i].case_number + '</a>' + '</td>';

                  // file += '<td>' +  '<a  id="mercym" >' +
                  //    data[i].case_number+'</a>'+ '</td>';

                  // file += '<td>' +
                  //     data[i].case_number + '</td>';

                  file += '<td>' +
                      data[i].client_id + '</td>';

                  file += '<td>' +
                      data[i].description + '</td>';

                  file += '<td>' +
                      data[i].status + '</td>';

                  file += '<td>' +
                      data[i].priority + '</td>';


                  // file += '<td>CS' +
                  //     data[i].description.split(', ').find(row => row.startsWith('{case:')).split(':')[1];

                  //     file += '<td>' +
                  //      data[i].description.split(', ').find(row => row.startsWith('parties:')).split(':')[1];
                  //     + '</td>';

                  //     file += '<td>' +
                  //      data[i].description.split(', ').find(row => row.startsWith('filer:')).split(':')[1];
                  //     + '</td>';


                  //     file += '<td>' +
                  //      data[i].description.split(', ').find(row => row.startsWith('status:')).split(':')[1];
                  //     + '</td>';


                  // file += '<td>' +
                  // data[i].createdAt.split('T')[0] + '</td>';

                  // file += '<td>' +
                  //  data[i].description.split(', ').find(row => row.startsWith('location:')).split(':')[1];
                  // + '</td>';

                  // file += '<td>' +
                  //  data[i].description.split(', ').find(row => row.startsWith('prior:')).split(':')[1].slice(0, -1);
                  // + '</td>';

                  // file += '<td>' +  '<a href="'+Filing.fetchspec+'" onclick="return setfiles('+data[i].id+');">' +
                  //  '<i class="fas fa-download"></i>'+ '</a>'+ '</td>';
                  //     file += '<td>' +
                  //     cars[1][j] + '</td>';

                  // student += '<td>' +
                  //    dates[j][k].toLocaleDateString() + '</td>';

                  // student += '<td>' +
                  //     '<button id= "btn'+p+'" onclick="myFunction(this.id)"  name='+ cars[1][j]+' value= '+ cars[1][j]+'>'+'edit'+'</button>' + '</td>';

                  file += '</tr>';


              }
}
  $('#ftable').append(file);
        // $( "setthings" ).on( "click", setfiles("12","ian") );

       }
});
// $( "#mercym" ).on( "click", function() {
//   console.log( $( this ).text() );
// });
});
// onclick="return setfiles('+data[i].id +','+data[i].case_number +');
// document.getElementById ("mercym").addEventListener ("click", setfiles.bind(12,45), false);



function setfiles(id){

    sessionStorage.removeItem("caseid");
    sessionStorage.removeItem("casename")
    sessionStorage.setItem("caseid", id);
    console.log(id);
    // sessionStorage.setItem("casename",name);
    // console.log(name);

}