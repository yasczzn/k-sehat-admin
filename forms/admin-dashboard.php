<?php 
 
    session_start();
    
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
    }
    
    // include '../function/connection.php';

    // $sql = mysqli_query($conn, "SELECT * FROM vaccination v, patient p, vaccine_stock vs WHERE 
    // v.userRegNum = p.userRegNum AND v.vaccineID = vs.vaccineID");
    // $data = mysqli_fetch_array($sql); 

    // $userRegNum = "";
    // $vaccineID = "";
    // $date = "";

    // $errorMessage = "";
    // $successMessage = "";

    // if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    //     $userRegNum = $_POST['userRegNum'];
    //     $vaccineID = $_POST['vaccineID'];
    //     $date = $_POST['date'];

    //     do {
    //         if (empty($userRegNum) || empty($vaccineID) || empty($date)) {
    //             $errorMessage = "All the fields are required";
    //             break;
    //         }

    //         $sql = "INSERT INTO vaccination(userRegNum, vaccineID, date)".
    //                 "VALUES ('$userRegNum', '$vaccineID', '$date')";
    //         $result = $conn->query($sql);

    //         if (!$result) {
    //             $errorMessage = "Invalid query" . $conn->error;
    //             break;
    //         }

    //         $userRegNum = "";
    //         $vaccineID = "";
    //         $date = "";

    //         echo "<script>alert('Vaccination data submitted!')
    //         document.location = 'vaccination-table.php'</script>";

    //     } while (false);

    // }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin - Dashboard</title>

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
            <a class="navbar-brand" href="#">Keluarga Sehat Admin</a>
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
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Tables</div>
                            <a class="nav-link" href="patient-table.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-group"></i></div>
                                Patient Table
                            </a>
                            <a class="nav-link" href="vaccination-table.php">
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
                        <form action="" method="POST">
                            <?php echo '<h1 class="mt-4">Welcome back, admin '.$_SESSION['username'].'!</h1>'; ?>
                        </form>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>

                            <?php
                                if (!empty($errorMessage)) {
                                    echo "
                                    <div class='col-xl-3 col-md-6'>
                                        <div class='card bg-warning text-white mb-4'>
                                            <div class='card-body'$errorMessage</div>
                                            <button class='btn-close' data-bs-dismiss='alert'>Close</button>
                                        </div>
                                    </div>                                
                                    ";
                                }
                            ?>

                        <h3 class="text-center font-weight-light my-4">Vaccination Form</h3>
                        <form action="" method="POST" role="form" class="php-email-form">
                            <div class="form-floating mb-3 mx-3">
                                <select aria-label="ID" title="type-choice" type="text" class="form-control" name="userRegNum" required>
                                    <?php
                                        echo "<option value=$data[userRegNum]>$data[name]</option>";
                                        $query = mysqli_query($conn, "SELECT * FROM patient");
                                        while ($data = mysqli_fetch_array($query)){
                                            echo "<option value=$data[userRegNum]>$data[name]</option>";
                                        }
                                    ?>
                                </select>
                                <label for="inputPatientName">Patient Name</label>
                                <div class="validate"></div>
                            </div>
                            <div class="form-floating mb-3 mx-3">
                                <select aria-label="Type" title="type-choice" type="text" class="form-control" name="vaccineID" required>
                                    <?php
                                        echo "<option value=$data[vaccineID]>$data[vaccineType]</option>";
                                        $query = mysqli_query($conn, "SELECT * FROM vaccine_stock");
                                        while ($data = mysqli_fetch_array($query)){
                                            echo "<option value=$data[vaccineID]>$data[vaccineType]</option>";
                                        }
                                    ?>
                                </select>
                                <label for="inputVaccineType">Vaccine Type</label>
                                <div class="validate"></div>
                            </div>
                            <div class="form-floating mb-3 mx-3">
                                <input type="date" class="form-control form-control-user" name="date" value="<?php echo !empty($_POST['date']) ? $_POST['date'] : ''; ?>" placeholder="Vaccination Date" required>
                                <label for="inputVaccinationDate">Vaccination Date</label>
                                <div class="validate"></div>
                            </div>
                        <input type="submit" value="Submit" name="submit" class="btn btn-success btn-user ms-3"/>
                        <input type="button" value="Cancel" name="cancel" class="btn btn-danger btn-user"/>
                        <hr>
                    </form>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Putri Yasmina 2022-<?php echo date("Y");?></div>
                            <div>
                                <a href="#">Privacy Policy</a>
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
