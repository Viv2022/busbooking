<?php
include('../authentication/connection.php'); 
$bus_id = $_POST['bus_id'];
$departure_time = $_POST['departure_time'];
$ticket_id = uniqid();
$sql = "INSERT INTO ticket (bus_id, Departure_time, ticket_id) VALUES ('$bus_id', '$departure_time', '$ticket_id')";
if ($conn->query($sql) === TRUE) {
    echo "<p>Booking successful!</p>";
    echo "<p>Ticket ID: $ticket_id</p>";
    header("location:../dash/index.php"); 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
