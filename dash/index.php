<?php
session_start();
if(!isset($_SESSION['loggedIn']) && !$_SESSION['loggedIn']){
   header("location:../index.php");
}

?>
<?php 
require ('../authentication/connection.php');
$enroll = $_SESSION['displayname'];
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
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="eye"></ion-icon>
                        </span>
                        <span class="title">View Ticket</span>
                    </a>
                </li>

                <li>
                    <a href="#">
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
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">5</div>
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
                        <h2>Recent Travels</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Date</td>
                                <td>Source</td>
                                <td>Destination</td>
                                <td>Time</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>01-01-2023</td>
                                <td>IITA</td>
                                <td>Civil Line</td>
                                <td>6:00 Pm</td>
                            </tr>

                            <tr>
                                <td>15-01-2023</td>
                                <td>IITA</td>
                                <td>Railway Station</td>
                                <td>5:00pm</td>
                            </tr>

                            <tr>
                                <td>02-02-2023</td>
                                <td>IITA</td>
                                <td>Civil Line</td>
                                <td>6:00 Pm</td>
                            </tr>
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
