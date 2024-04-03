<?php
include "config.php"; // Include your database connection configuration

// Fetch and display tickets from the database
$sql_query = "SELECT * FROM Tickets";
$result = $conn->query($sql_query);

if ($result->num_rows > 0) {
    echo "<h2>Tickets</h2>";
    echo "<table>";
    echo "<tr><th>Ticket ID</th><th>Seat Number</th><th>Price</th><th>Sales ID</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['idTickets'] . "</td>";
        echo "<td>" . $row['seat_number'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['Sales_idSales'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No tickets found.";
}

// Close the database connection
$conn->close();
?>
