
var script = document.createElement('script');script.src = "https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js";document.getElementsByTagName('head')[0].appendChild(script); 
$.getJSON(Cases.fetch, function(data)  {
	  			console.log(data);
	  			var items = [];

	  			var items2 = [];

	  			for(var i in data) {
	  				items.push(data[i].id);
	  				items2.push(data[i].case_number)
		              }


		  var str = ""
		  for (var item of items) {
		    str += "<option value='"+item+"'>" + items2[items.indexOf(item)] + "</option>"
		  }
		  document.getElementById("case").innerHTML = str;
	  		
			

	    });
