<?php 
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin - Vaccination Table</title>

            <!-- Favicons -->
        <link href="../assets/img/keluargasehat.png" rel="icon">
        <link href="../assets/img/keluargasehat.png" rel="apple-touch-icon">

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../assets/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <div class="navbar-brand ps-3" >
                <img class="mr-auto" src="../assets/img/keluargasehat.png" alt="keluarga sehat logo"/>
                </div>
            <a class="navbar-brand" href="admin-dashboard.php">Keluarga Sehat Admin</a>
            <!-- Sidebar Toggle-->
            <button title="toggle" class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a title="dropdown" class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../function/logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Main</div>
                            <a class="nav-link" href="admin-dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Tables</div>
                            <a class="nav-link" href="patient-table.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-group"></i></div>
                                Patient Table
                            </a>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-shield-virus"></i></div>
                                Vaccination Table
                            </a>
                            <div class="sb-sidenav-menu-heading">Advance</div>
                            <a class="nav-link" href="user-table.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-md"></i></div>
                                Admin Settings
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION["username"]; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Vaccination Table</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="admin-dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Vaccination Table</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Vaccination Tables containing all vaccination event history at the health center.
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Vaccination Table
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th hidden>No</th>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Patient Name</th>
                                            <th>Date of Birth</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Vaccine Type</th>
                                            <th>Vaccination date</th>
                                            <th>Price</th>
                                            <th>Payment</th>
                                            <th>Payment Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th hidden>No</th>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Patient Name</th>
                                            <th>Date of Birth</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Vaccine Type</th>
                                            <th>Vaccination date</th>
                                            <th>Price</th>
                                            <th>Payment</th>
                                            <th>Payment Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                        </tr>
                                        <?php
                                            include '../function/connection.php';
                                            
                                            $no=1;
                                            $sql = "SELECT * FROM vaccination
                                            INNER JOIN patient ON vaccination.userRegNum = patient.userRegNum";

                                            $pulldata = mysqli_query($conn, $sql);
                                            while ($display = mysqli_fetch_array($pulldata)){
                                            echo "
                                            <tr>
                                                <td hidden>$no</td>
                                                <td>$display[nomor]</td>
                                                <td>$display[ID]</td>
                                                <td>$display[name]</td>
                                                <td>$display[doB]</td>
                                                <td>$display[gender]</td>
                                                <td>$display[email]</td>
                                                <td>$display[phoneNum]</td>
                                                <td>$display[address]</td>
                                                <td>$display[vaccineType]</td>
                                                <td>$display[vaccinationDate]</td>
                                                <td>$display[price]</td>
                                                <td>$display[payment]</td>
                                                <td><input type='checkbox' name='data.$no'/></td>
                                                <td>
                                                <a href='vaccination-edit.php?update=$display[nomor]' type='button' value='Update' class='btn btn-primary'>Update</a>
                                                <a href='?delete=$display[nomor]' onClick=\"return confirm('Proceed to delete data?');\">
                                                    <input type='button' value='delete' class='btn btn-danger btn-user'>
                                                </a>
                                                </td>
                                            </tr>";
                                        
                                            $no++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                                if(isset($_GET['delete'])){

                                    mysqli_query($conn, "DELETE FROM vaccination WHERE nomor='$_GET[delete]'");

                                    echo "<p><b> Data is successfully delete</b></p>";
                                    echo "<meta http-equiv=refresh content=2;URL='vaccination-table.php'>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Putri Yasmina 2022-<?php echo date("Y");?></div>
                            <div>
                                <a href="https://github.com/yasczzn">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="../assets/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/js/chart-area-demo.js"></script>
        <script src="../assets/js/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../assets/js/datatables-simple-demo.js"></script>
    </body>
</html>
