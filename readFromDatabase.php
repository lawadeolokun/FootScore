<?php
// Database connection parameters
$host = 'localhost';
$dbname = 'FootScore';
$username = 'root';
$password = 'root';

// Connect to the database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: Could not connect. " . $e->getMessage());
}

// Define the SQL DELETE statement
$sql = "DELETE FROM checkout WHERE productName = 'Manchester United Away Jersey'";

// Prepare the statement
$stmt = $pdo->prepare($sql);

// Execute the statement
try {
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo "Record deleted successfully.";
    } else {
        echo "No records found for deletion.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
