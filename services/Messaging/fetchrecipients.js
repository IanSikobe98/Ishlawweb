
var script = document.createElement('script');script.src = "https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js";document.getElementsByTagName('head')[0].appendChild(script);
$.getJSON(Usermngmt.fetchusers, function(data)  {
    console.log(data);
    var items = [];

    var items2 = [];
    var items3 = [];


    for(var i in data) {
        items.push(data[i].id);
        items2.push(data[i].firstName);
        items3.push(data[i].secondName);
    }


    var str = ""
    for (var item of items) {
        // <option value="28325a2e-a21d-4759-9686-c7680d77cd48">anne</option>
        str += "<option value='"+item+"'>" + items2[items.indexOf(item)] + " "+ items3[items.indexOf(item)] +  "</option>"
    }
    document.getElementById("recipients").innerHTML = str;



});
