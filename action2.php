
<?php

$dsn = "Driver={SQL Server};Server=311130-SQL01;Database=DataAnalysis";
$username = "sa";
$password = "bossman";

// Connect to the database
$conn = odbc_connect($dsn, $username, $password);

// Check if the connection was successful
if (!$conn) {
    exit("Connection failed: " . odbc_errormsg());
}

$name = $_POST["name"];
$message = $_POST["message"];
$priority = filter_input(INPUT_POST, "priority", FILTER_VALIDATE_INT);
$type = filter_input(INPUT_POST, "type", FILTER_VALIDATE_INT);
$terms = filter_input(INPUT_POST, "terms", FILTER_VALIDATE_BOOL);

$sql = "INSERT INTO DataAnalysis.dbo.message (name, body, priority, type)
VALUES ('$name', '$message', $priority, $type)";

$result = odbc_exec($conn, $sql);

if ($result) {
    echo "Data inserted successfully";
} else {
    echo "Error inserting data: " . odbc_errormsg($conn);
}

?>
