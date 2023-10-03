<?php 
 
    session_start();
    
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
    }

    include '../function/connection.php';

    $sql = mysqli_query($conn, "SELECT * FROM patient WHERE userRegNum='$_GET[update]'");
    $data = mysqli_fetch_array($sql);   

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin - Edit Patient</title>

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
                        <h1 class="mt-4">Edit Patient</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="admin-dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="patient-table.php">Patient Table</a></li>
                            <li class="breadcrumb-item active">Edit Patient</li>
                        </ol>
                       
                        <form action="" method="POST" role="form" class="php-email-form">
                            <div class="form-floating mb-3">
                                <input type="hidden" class="form-control form-control-user" value="<?php echo $data['userRegNum']; ?>" name="userRegNum" placeholder="User Registration Number" readonly>
                                <label for="userRegNum">User Registration Number</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control form-control-user" value="<?php echo $data['ID']; ?>" name="ID" placeholder="ID" required>
                                <label for="inputID">ID</label>
                                <div class="validate"></div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control form-control-user" value="<?php echo $data['name']; ?>" name="name" placeholder="Name" required>
                                <label for="inputName">Name</label>
                                <div class="validate"></div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control form-control-user" value="<?php echo $data['doB']; ?>" name="doB" placeholder="Date of Birth" required>
                                <label for="inputDoB">Date of Birth</label>
                                <div class="validate"></div>
                            </div>
                            <div class="form-floating mb-3">
                                <select aria-label="Gender" title="gender-choice" type="text" class="form-control" name="gender" placeholder="Gender" required>
                                    <option value="male" <?php if($data['gender']== 'male'){ echo 'selected'; }?>>male</option>
                                    <option value="female" <?php if($data['gender']== 'female'){ echo 'selected'; }?>>female</option>
                                </select>
                                <label for="inputGender">Gender</label>
                                <div class="validate"></div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control form-control-user" value="<?php echo $data['email']; ?>" name="email" placeholder="Email" required>
                                <label for="inputEmail">Email</label>
                                <div class="validate"></div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control form-control-user" value="<?php echo $data['phoneNum']; ?>" name="phoneNum" placeholder="Phone Number" required>
                                <label for="inputPhoneNum">Phone Number</label>
                                <div class="validate"></div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control form-control-user" value="<?php echo $data['address']; ?>" name="address" placeholder="Address" required>
                                <label for="inputAddress">Address</label>
                                <div class="validate"></div>
                            </div>
                        <input type="submit" value="Update" name="update" class="btn btn-warning btn-user" />
                        <a href='patient-table.php'>
                            <input type='button' value='Cancel' class='btn btn-danger btn-user'>
                        </a>
                        <hr>
                        </form>
                    </div>
                </main>

                <?php

                    if (isset($_POST['update'])) {
                        $userRegNum = $_POST['userRegNum'];
                        $ID = $_POST['ID'];
                        $name = $_POST['name'];
                        $doB = $_POST['doB'];
                        $gender = $_POST['gender'];
                        $email = $_POST['email'];
                        $phoneNum = $_POST['phoneNum'];
                        $address = $_POST['address'];

                        do {                    
                            $update = "UPDATE patient SET userRegNum='$userRegNum', ID='$ID', name='$name', 
                                    doB='$doB', gender='$gender', email='$email', phoneNum='$phoneNum',
                                    address ='$address' WHERE userRegNum =$_GET[update]";
                            $result = mysqli_query($conn, $update);
            
                            if ($result) {
                                echo "<script>alert('Patient data updated!')
                                document.location = 'patient-table.php'</script>"; 
                            } else {
                                $errorMessage = "Invalid query" . $conn->error;
                                break;
                            }   
                                                                
                        } while (false);
                    }    

                ?>

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
        <script src="../assets/js/datatables-demo.js"></script>
    </body>
</html>
