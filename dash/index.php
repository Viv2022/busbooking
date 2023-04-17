<?php
session_start();
if(!isset($_SESSION['loggedIn']) && !$_SESSION['loggedIn']){
   header("location:../index.php");
}

?>
<?php 
require ('../authentication/connection.php');
$enroll = $_SESSION['displayname'];
$role= $_SESSION['role'];
if ($role == "student") {
  $table_name = "student_ticket";
  $id_name = "student_id";
} elseif ($role == "faculty") {
  $table_name = "faculty_ticket";
  $id_name = "faculty_id";
}
$one_week_ago = date("Y-m-d", strtotime("-1 week"));
$user_id = $_SESSION['usernow'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
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
                    <a href="index.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="../booking/booking.php">
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

            <!-- ======================= Cards ================== -->
            <?php
            // Assuming you have already established a database connection
            $query = "SELECT COUNT(*) FROM bus WHERE role='$role'";
            $result = mysqli_query($conn, $query);
            $count = mysqli_fetch_array($result)[0];
            ?>
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $count; ?></div>
                        <div class="cardName">Buses Available</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="bus-sharp"></ion-icon>
                    </div>
                </div>

                
            </div>

            <!-- ================ Order Details List ================= -->

            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Bookings</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Ticket Id</td>
                                <td>Source</td>
                                <td>Destination</td>
                                <td>Date</td>
                            </tr>
                        </thead>
<tbody>
<?php
            $sql = "SELECT * FROM $table_name WHERE $id_name ='$user_id' AND date >= '$one_week_ago'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $sql2= "SELECT * FROM route WHERE route_id='".$row["route_id"]."'";
                    $result2=$conn->query($sql2);
                    $row1 = mysqli_fetch_array($result2, MYSQLI_ASSOC); 
                    $source=$row1['source'];
                    $destination=$row1['destination']; 
    echo "<tr><td>" . $row["ticket_id"] . "</td><td> $source</td><td>$destination</td><td>" . $row["date"] . "</td></tr>";
  }
} else {
  echo "<tr><td colspan='4'>No bookings found.</td></tr>";
}
echo "</table>";
?>
               </tbody>         
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Notifications</h2>
                    </div>

                    <table>
                        <tr>
                            <td>
                                <h4>There will be no service available on 7th march due to holi festival</h4>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
