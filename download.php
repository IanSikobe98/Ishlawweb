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

// Get the file ID from the query string
$fileId = $_GET['id'];

// Prepare and execute the SQL statement to fetch the file from the database
$stmt = $conn->prepare("SELECT file_data, file_type, file_size, file_extension, custom_name FROM files WHERE id = ?");
$stmt->bind_param("i", $fileId);
$stmt->execute();
$stmt->bind_result($fileData, $fileType, $fileSize, $fileExtension, $customName);
$stmt->fetch();
$stmt->close();

// Set the appropriate headers for file download
header("Content-Type: " . $fileType);
header("Content-Length: " . $fileSize);
header("Content-Disposition: attachment; filename=\"" . $customName . "." . $fileExtension . "\"");

// Output the file data
echo $fileData;

// Close the database connection
$conn->close();
?>
