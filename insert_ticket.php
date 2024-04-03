<?php
include "config.php"; // Include your database connection configuration

// Retrieve user input from the form
$idTickets = $_POST['idTickets'];
$seat_number = $_POST['seat_number'];
$price = $_POST['price'];
$Sales_idSales = $_POST['SalesID']; // Adjust the name to match the form field

// Validate input for 'idTickets' and 'Sales_idSales'
if (!is_numeric($idTickets) || !is_int($idTickets + 0) || !is_numeric($Sales_idSales) || !is_int($Sales_idSales + 0)) {
    echo "Error: Invalid input for Ticket ID or Sales ID";
} else {
    // Construct and execute the SQL query using prepared statements
    $sql_query = "INSERT INTO tickets (idTickets, seat_number, price, Sales_idSales) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql_query);
    $stmt->bind_param("issi", $idTickets, $seat_number, $price, $Sales_idSales);

    if ($stmt->execute()) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
