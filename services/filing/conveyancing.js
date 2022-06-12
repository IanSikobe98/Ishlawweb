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
            var arr =[];


            var caseid = sessionStorage.getItem("caseid");
            console.log(caseid);
            var casedata  =  getcasedata(caseid);

            console.log(casedata);

            // console.log(caseid);
            // console.log(caseid);
            for(var i in data) {
                if(data[i].FolderId == caseid)
                {

                    file += '<tr>';

                    // file += '<td>' +
                    //     caseid + '</td>';
                    file += '<td>' +
                        casedata[0] + '</td>';

                    file += '<td>' +
                        data[i].name + '</td>';

                    file += '<td>' +
                        data[i].description.split(', ').find(row => row.startsWith('{filer:')).split(':')[1].slice(0, -1);

                    file += '<td>' +
                        data[i].createdAt.split('T')[0] + '</td>';

                    file += '<td>' +
                        casedata[1] + '</td>';





                    // file += '<td>' +
                    //       data[i].name + '</td>';








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


function getcasedata(id){
    var casedata =[]
    $.ajax
    ({
        type: "GET",



        url: Cases.fetch,
        dataType: 'json',
        async: false,




        success: function (data){
            console.log(data);
            console.log("DONE");
            console.log(id)



            for(var i in data) {
                if(data[i].id == id)
                {
                    casedata.push(data[i].case_number);
                    casedata.push(data[i].physical_location);


                }
            }
        }

    });
    return casedata;
}
