<?php 
 
    session_start();
    
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
    }

    include '../function/connection.php';

    $sql = mysqli_query($conn, "SELECT * FROM vaccination v, patient p, WHERE 
    v.userRegNum = p.userRegNum AND nomor='$_GET[update]'");
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
        <title>Admin - Edit Vaccination</title>

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
                        <h1 class="mt-4">Edit Vaccination</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="admin-dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="vaccination-table.php">Vaccination Table</a></li>
                            <li class="breadcrumb-item active">Edit Vaccination</li>
                        </ol>
                       
                        <form action="" method="POST" role="form" class="php-email-form">
                            <div class="form-floating mb-3">
                                <input class="form-control form-control-user" value="<?php echo $data['nomor']; ?>" name="No" placeholder="No" readonly>
                                <label for="nomor">No</label>
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
                            <div class="form-floating mb-3">
                                <select aria-label="Status" title="type-choice" type="text" class="form-control" name="vaccineType" id="vaccineType" placeholder="Vaccine Type" onchange="priceTotal(this.value)"" required>
                                    <option value="Dosage 1" <?php if($data['patientStatus']== 'Dosage 1'){ echo 'selected'; }?>>Dosage 1</option>
                                    <option value="Dosage 2" <?php if($data['patientStatus']== 'Dosage 2'){ echo 'selected'; }?>>Dosage 2</option>
                                    <option value="Dosage 3" <?php if($data['patientStatus']== 'Dosage 3'){ echo 'selected'; }?>>Dosage 3</option>
                                    <option value="Booster 1" <?php if($data['patientStatus']== 'Booster 1'){ echo 'selected'; }?>>Booster 1</option>
                                    <option value="Booster 2" <?php if($data['patientStatus']== 'Booster 2'){ echo 'selected'; }?>>Booster 2</option>
                                    <option value="Booster 3" <?php if($data['patientStatus']== 'Booster 3'){ echo 'selected'; }?>>Booster 3</option>
                                </select>
                                <label for="inputStatus">Status</label>
                                <div class="validate"></div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control form-control-user" value="<?php echo date('Y-m-d', strtotime($data['vaccinationDate'])); ?>" id="vaccinationDate" required>
                                <label for="inputVaccinationDate">Vaccination Date</label>
                                <div class="validate"></div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control form-control-user" value="<?php echo $data['price']; ?>" name="price" id="price" placeholder="Price" readonly>
                                <label for="inputPrice">Price</label>
                                <div class="validate"></div>
                            </div>
                            <fieldset>
                                <legend class="form-floating mb-3">Please select a payment method</legend>
                                <div>
                                    <input type="radio" id="bca" name="bca" value="BCA" <?php if($data['payment']== 'bca'){ echo 'selected'; }?>>
                                    <label for="bca">BCA</label>
                                </div>
                                <div>
                                    <input type="radio" id="bsi" name="bsi" value="BSI" <?php if($data['payment']== 'bsi'){ echo 'selected'; }?>>
                                    <label for="bsi">BSI</label>
                                </div>
                                <div>
                                    <input type="radio" id="gopay" name="gopay" value="GoPay" <?php if($data['payment']== 'gopay'){ echo 'selected'; }?>>
                                    <label for="gopay">GoPay</label>
                                </div>
                                <div>
                                    <input type="radio" id="dana" name="dana" value="Dana" <?php if($data['payment']== 'dana'){ echo 'selected'; }?>>
                                    <label for="dana">Dana</label>
                                </div>
                            </fieldset>
                                <input type="submit" value="Update" name="update" class="btn btn-warning btn-user" />
                                <a href='vaccination-table.php'>
                                    <input type='button' value='Cancel' class='btn btn-danger btn-user'>
                                </a>
                            <hr>
                        </form>
                    </div>
                </main>

                <?php

                if (isset($_POST['update'])) {

                    mysqli_query($conn, "UPDATE patient SET 
                    nomor = '$_POST[nomor]',
                    userRegNum = '$_POST[userRegNum]', 
                    vaccineID = '$_POST[vaccineID]',    
                    vaccineDate = '$_POST[vaccineDate]' WHERE nomor =$_GET[update]");       
                    
                    echo "<script>alert('Vaccination data updated!')
                    document.location = 'vaccination-table.php'</script>";                                               
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

        <script>
            function priceTotal(val){
            var totalPrice;
            if(val == 'Dosage 1'){
            totalPrice = 45000;
            } else if(val == 'Dosage 2'){
            totalPrice = 50000;
            } else if(val == 'Dosage 3'){
            totalPrice = 55000;
            } else if(val == 'Booster 1'){
            totalPrice = 60000;
            } else if(val == 'Booster 2'){
            totalPrice = 65000;
            } else if(val == 'Booster 3'){
            totalPrice = 70000;
            }
            //display price
            var disPrice = document.getElementById('price');
            disPrice.value = totalPrice;

        }
        </script>

    </body>
</html>
