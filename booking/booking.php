<?php
session_start();
if(!isset($_SESSION['loggedIn']) && !$_SESSION['loggedIn']) {
    header("location:../booking/booking.php");
}

?>

<?php 
require ('../authentication/connection.php');
$enroll = $_SESSION['displayname'];
$role= $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="en">
   <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Responsive Admin Dashboard | Korsat X Parmaga</title>

        <!-- ======= Styles ====== -->
        <link rel="stylesheet" href="booking.css">
       <!-- =========== Scripts =========  -->
        

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </head>

    <body>
        <!-- =============== Navigation ================ -->
        <div class="container">
            <div class="navigation">
                <ul>
                    <li>
                        <a href="#">
                            <span class="icon">
                                <ion-icon name="person-circle"></ion-icon>
                            </span>
                            <span class="title">Welcome, <?php echo $_SESSION['displayname']; ?></span>
                        </a>
                    </li>

                    <li>
                        <a href="../dash/index.php">
                            <span class="icon">
                                <ion-icon name="home-outline"></ion-icon>
                            </span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="booking.php">
                            <span class="icon">
                                <ion-icon name="ticket"></ion-icon>
                            </span>
                            <span class="title">Book Ticket</span>
                        </a>
                    </li>

                    <li>
                        <a href="../view/view.php">
                            <span class="icon">
                                <ion-icon name="eye"></ion-icon>
                            </span>
                            <span class="title">View Ticket</span>
                        </a>
                    </li>

                    <li>
                        <a href="../cancel/cancel.php">
                            <span class="icon">
                                <ion-icon name="ban-outline"></ion-icon>
                            </span>
                            <span class="title">Cancel Ticket</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <span class="icon">
                                <ion-icon name="help-outline"></ion-icon>
                            </span>
                            <span class="title">Help</span>
                        </a>
                    </li>                   

                    <li>
                        <a href="../logout/logout.php">
                            <span class="icon">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </span>
                            <span class="title">Sign Out</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- ========================= Main ==================== -->
            <div class="main">
                <div class="topbar">
                    <div class="toggle">
                        <ion-icon name="menu-outline"></ion-icon>
                    </div>    
                </div>

                <div class="details">
                      <h1>Bus Schedule</h1><br><br> 
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Bus ID</th>
                                    <th>Departure from source</th>
                                    <th>Source</th>
                                    <th>Departure from destination</th>
                                    <th>Destination</th>
                                    <th>Seats</th>
                                    <th>Book</th>
                                </tr>
                            </thead>
                        <tbody>
<?php
session_start();
                            $sql = "SELECT bus.bus_id,route.route_id, route.departure_src,route.departure_dst,route.source, route.destination, bus.seats FROM bus INNER JOIN route ON bus.route_id = route.route_id WHERE bus.role='$role'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            // Output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["bus_id"] . "</td>";
                                    echo "<td>" . $row["departure_src"] . "</td>";
                                    echo "<td>" . $row["source"] . "</td>";
                                    echo "<td>" . $row["departure_dst"] . "</td>";
                                    echo "<td>" . $row["destination"] . "</td>";
                                    echo "<td>" . $row["seats"] . "</td>";
                                    echo "<td>
                                    <form action='booking_ticket.php' method='POST'>
                                    <input type='hidden' name='bus_id' value='" . $row["bus_id"] . "'>
                                    <input type='hidden' name='user' value='" . $row["seats"] . "'>
                                    <input type='hidden' name='route_id' value='" . $row["route_id"] . "'>
                                    <button type='submit'>Book</button>
                                    </form>                                    
                                    </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<script src="booking.js"></script>
   </body>
</html>
