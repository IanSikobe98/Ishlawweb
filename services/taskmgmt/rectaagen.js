// var script = document.createElement('script');
// script.src = "{https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js}";
// document.getElementsByTagName('head')[0].appendChild(script);
// $.getJSON(Tasks.recurring,
var data;
// $(document).ready(function() {
    $(document).ready(function () {



        $.ajax
        ({
            type: "GET",


            url: Tasks.recurring,
            dataType: 'json',
            async: false,
            beforeSend: function (xhr) {
                var jwt = jwtpo;
                console.log(jwtpo);



                xhr.setRequestHeader ("Authorization", "Bearer "+ jwt);
            },



            // $.getJSON(Tasks.calnonrecurring,
            success:function(data) {
            console.log(data);
            var items = [];

            for (var i in data) {
                items.push(data[i].rrule);
            }
            console.log(items);

            var dates = [];

            var titles = [];
            var tid = [];
            var status = [];
            var prior = [];
            var descri = [];
            var hotodo = [];
            var comment = [];


            for (var i in items) {
                const rule = rrule.rrulestr(items[i])

                dates.push(rule.all());
// dates.push(data[i].title)
                titles.push(data[i].title);
                tid.push(data[i].tno);
                status.push(data[i].status);
                prior.push(data[i].Priority);
                descri.push(data[i].description);
                hotodo.push(data[i].hotodo);
                comment.push(data[i].comment);

            }
            var cars = [dates, titles, tid, status, prior, descri, hotodo, comment];
            console.log(cars);
            console.log(dates);
            console.log(cars[0][1][0]);
            console.log(cars[1][1]);
            console.log("hi");

// for(var i = 0; i < cars.length; i++) {
            var car = cars[0];
            var student = '';
            var p = 0;

            var current = new Date();
            current = current.toLocaleDateString()
            console.log(current);


            for (var j = 0; j < car.length; j++) {
                var cube = car[j];
                for (var k = 0; k < cube.length; k++) {
                    if (current == dates[j][k].toLocaleDateString()) {

                        console.log("cube[" + j + "][" + k + "] = " + dates[j][k].toLocaleDateString());
                        console.log("cube[" + j + "][" + k + "] = " + cars[1][j]);

                        console.log(" ");
                        console.log(" ");
                        student += '<tr>';
                        // student += '<td>RD' + p +
                        //     cars[2][j] + '</td>';

                        student += '<td>' +
                            cars[1][j] + '</td>';


                        student += '<td>' +
                            current + '</td>';

                        student += '<td>' +
                            cars[4][j] + '</td>';

                        student += '<td>' +
                            cars[6][j] + '</td>';


                        student += '<td>' +
                            cars[5][j] + '</td>';

                        student += '<td>' +
                            cars[3][j] + '</td>';


                        student += '<td>' +
                            cars[7][j] + '</td>';


                        // student += '<td>' +
                        // cars[4][j] + '</td>';

                        // student += '<td>' +
                        // cars[3][j] + '</td>';


                        // student += '<td>' +
                        //    dates[j][k].toLocaleDateString() + '</td>';

                        student += '<td>' +
                            '<button id= "btn' + p + '" onclick="fetchitre(this.id)"  name=' + cars[2][j] + ' value= ' + cars[2][j] + '>' + 'edit' + '</button>' + '</td>';

                        student += '</tr>';


                    } else {
                        console.log("no dates");

                    }


                    p++;
                }
            }
            $('#table').append(student);


            $('#table').DataTable();
            // $('#table').DataTable

        }
      });

});