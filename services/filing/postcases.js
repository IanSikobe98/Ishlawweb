              const form = document.getElementById('exe');
              form.addEventListener('submit', function (e) {
                e.preventDefault();
                // var selectedFile = document.getElementById('myFile').files[0];

                // var filedBy = document.getElementById('by').value;
                var clientName = document.getElementById('client').value;
                var caseNumber = document.getElementById('case').value;
                var status = document.getElementById('stat').value;
                var parties = document.getElementById('parties').value;
                var prio = document.getElementById('priority').value;
                // var loc = document.getElementById('location').value;
                // var fileName = selectedFile.name;
                var description = "";
                var version = "";
                var folderId = document.getElementById('cat').value;
                var data = new FormData;
                var data2 = new FormData;
                // data.append("document", selectedFile);
                data.append("name", clientName);
                // data.append("description", `{case: ${caseNumber}, parties: ${parties}, filer: ${filedBy}, status: ${status}, location: ${loc}, prior: ${prio}}`);
                data.append("version", 1);
                data.append("FolderId", folderId);


                data.append("case_number", caseNumber);
                data.append("status", status );
                data.append("priority", prio );
                data.append("description", parties);



for (var pair of data.entries()) {
    console.log(pair[0]+ ', ' + pair[1]); 
}

for (var pair of data2.entries()) {
    console.log(pair[0]+ ', ' + pair[1]); 
}
                




                // make API call to submit file
                fetch(Cases.fetch, {
                  method: 'POST',
                  body: data
                }).then(function (response) {
                  if(response.status === 200){
                    alert("File upload successful");
                  }
                  else{
                    alert("unsuccessful")
                  }
                })
              })