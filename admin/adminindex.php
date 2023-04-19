<?php
session_start();
if(!isset($_SESSION['loggedIn']) && !$_SESSION['loggedIn']){
   header("location:../index.php");
}
?>
<?php
session_start();
include('../authentication/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Responsive Admin Dashboard | Korsat X Parmaga</title>

        <!-- ======= Styles ====== -->
        <link rel="stylesheet" href="../booking/booking.css">

       <!-- =========== Scripts =========  -->
        <script src="../booking/booking.js"></script>

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
                            <span class="title">Welcome, Ansh</span>
                        </a>
                    </li>

                    <li>
                        <a href="adminindex.php">
                            <span class="icon">
                                <ion-icon name="home-outline"></ion-icon>
                            </span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="addbus/addbus.php">
                            <span class="icon">
                                <ion-icon name="bus"></ion-icon>
                            </span>
                            <span class="title">Add Buses</span>
                        </a>
                    </li>

                    <li>
                        <a href="adddriver/adddriver.php">
                            <span class="icon">
                                <ion-icon name="person"></ion-icon>
                            </span>
                            <span class="title">Add Driver</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="addroute/addroute.php">
                            <span class="icon">
                                <ion-icon name="location"></ion-icon>
                            </span>
                            <span class="title">Insert Route</span>
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
                                <th>Departure From source</th>
                                <th>Source</th>
                                <th>Destination</th>
                                <th>Departure From Destination</th>
                                <th>Seats</th>
                                <th>Driver_ID</th>
                                <th>Role</th>
                                </tr>
                            </thead>
                        <tbody>
                            <?php
                           
                                $sql = "SELECT bus.role,bus.route_id,bus.bus_id, route.departure_src,route.source, route.destination,route.departure_dst, bus.seats, bus.driver_id FROM bus INNER JOIN route ON bus.route_id = route.route_id";
                            $result = $conn->query($sql);
                            if ($result!=false && $result->num_rows > 0) {
                            // Output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["bus_id"] . "</td>";
                                    echo "<td>" . $row["departure_src"] . "</td>";
                                    echo "<td>" . $row["source"] . "</td>";
                                    echo "<td>" . $row["destination"] . "</td>";
                                    echo "<td>" . $row["departure_dst"] . "</td>";
                                    echo "<td>" . $row["seats"] . "</td>";
                                    echo "<td>" . $row["driver_id"] . "</td>";
                                    echo "<td>" . $row["role"] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </tbody>
                    </table>
                      <h1>Driver List</h1><br><br> 
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Driver Name</th>
                                    <th>Driver ID</th>
                                    <th>Bus ID</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT driver.name, driver.driver_id, bus.bus_id ,driver.phone FROM bus INNER JOIN driver ON bus.driver_id = driver.driver_id";
                            $result = $conn->query($sql);
                            if ($result!=false && $result->num_rows > 0) {
                            // Output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["name"] . "</td>";
                                    echo "<td>" . $row["driver_id"] . "</td>";
                                    echo "<td>" . $row["bus_id"] . "</td>";
                                    echo "<td>" . $row["phone"] . "</td>";
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
   </body>
</html>
