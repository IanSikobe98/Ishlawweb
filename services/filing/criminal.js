//Fill files of tables
$( document ).ready(function() {

$.ajax
  ({
    type: "GET",

  

    url: Filing.fetch,
    dataType: 'json',
    async: false,




    success: function (data){
    console.log(data);
    console.log("DONE");

      var items = [];
var file = ''; 
var descip = '';
 var arr =[]
          for(var i in data) {
            if(data[i].FolderId == "1")
            {

                            file += '<tr>'; 
                            
                            file += '<td>' +  
                                data[i].name + '</td>';

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


                                file += '<td>' +  
                                data[i].createdAt.split('T')[0] + '</td>'; 

                                // file += '<td>' + 
                                //  data[i].description.split(', ').find(row => row.startsWith('location:')).split(':')[1];
                                // + '</td>'; 

                                // file += '<td>' + 
                                //  data[i].description.split(', ').find(row => row.startsWith('prior:')).split(':')[1].slice(0, -1);
                                // + '</td>';

                                file += '<td>' +  '<a href="'+Filing.fetchdoc+data[i].id+'/document">' +
                                '<i class="fas fa-download"></i>'+ '</a>'+ '</td>';  
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

       }
});

});
