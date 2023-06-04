<?php
// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ishfinal";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the files data from the database
$sql = "SELECT id, custom_name, filing_date, file_extension, original_file_name FROM clients";
$result = $conn->query($sql);

$data = array(); // Initialize an array to hold the fetched data
if ($result->num_rows > 0) {
   $data = array();
    
    while ($row = $result->fetch_assoc()) {

      
        $fileId = $row['id'];
        $customName = $row['custom_name'];
        
        $filingDate = $row['filing_date'];
        $fileExtension = $row['file_extension'];
        //$originalFileName = $row['original_file_name'];

        // Build the download link with a download icon
        $downloadLink = "<a href='downloadClient.php?id=" . $fileId . "'><i class='fas fa-download'></i></a>";


         // Add the file details to the data array
        $data[] = array(
            $customName,
            //$personFiling,
            $filingDate,
            //$originalFileName,
            $downloadLink
        );
    }

echo json_encode(array("data" => $data));

} else {
   echo json_encode(array("data" => []));
}

// Close the database connection
$conn->close();

?>
