<?php
	session_start();
    if (isset($_SESSION['e'])){
    include("../connection.php");

    $id=$_GET['id'];

    $sql="select * from log_admin ";
    $res=mysqli_query($connect,$sql);

	$id=$_GET['id'];
    $sql1="select * from tabclasses where id='$id'";
    $res1=mysqli_query($connect,$sql1);
    $row1=mysqli_fetch_assoc($res1);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="shortcut icon" href="assets/images/logo.png" />
  </head>
  <body>
    <div class="container-scroller">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
          <a class="sidebar-brand brand-logo"  href="dashbord.php"><img src="assets/images/xxx.png" alt="logo"/></a>
        </div>
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="../Photo/<?php echo $_SESSION['image'] ?>" alt="profile" />
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex flex-column pr-3">
                <span class="font-weight-medium mb-2"><?php echo $_SESSION['e'] ?></span>
              </div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="dashbord.php">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <span class="nav-link" href="#">
              <span class="menu-title">Classes</span>
            </span>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-book-open-variant menu-icon"></i>
              <span class="menu-title">Classes</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="addClasse.php">Ajout Classes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="manageClasse.php">Manage Classes</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <span class="nav-link" href="#">
              <span class="menu-title">Etudiant</span>
            </span>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basiccc" aria-expanded="false" aria-controls="ui-basiccc">
              <i class="mdi mdi-account-multiple menu-icon"></i>
              <span class="menu-title">Etudiant</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basiccc">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="addEtudiant.php">Ajout Etudiant</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="manageEtudiant.php">Manage Etudiant</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <span class="nav-link" href="#">
              <span class="menu-title">Résultat</span>
            </span>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basicc" aria-expanded="false" aria-controls="ui-basicc">
              <i class="mdi mdi-checkbox-marked-outline menu-icon"></i>
              <span class="menu-title">Résultat</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basicc">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="addResult.php">Declare Résultat</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="manageResult.php">Manage Résultat</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item sidebar-actions">
            <div class="nav-link">
              <div class="mt-4">
                
                <ul class="mt-4 pl-0">
                  <a href="../signout.php"><li class="mdi mdi-logout mr-2">Sign Out</li></a>
                </ul>
              </div>
            </div>
          </li>
        </ul>
      </nav>
      <div class="container-fluid page-body-wrapper">
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles light"></div>
            <div class="tiles dark"></div>
          </div>
        </div>
        <nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
            <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="dashbord.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
            <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
              <i class="mdi mdi-menu"></i>
            </button>
            <ul class="navbar-nav">
              
             
              <li class="nav-item nav-search border-0 ml-1 ml-md-3 ml-lg-5 d-none d-md-flex">
                <form class="nav-link form-inline mt-2 mt-md-0">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-magnify"></i>
                      </span>
                    </div>
                  </div>
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right ml-lg-auto">
              
              <li class="nav-item nav-profile dropdown border-0">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
                  <img class="nav-profile-img mr-2" alt="" src="../Photo/<?php echo $_SESSION['image'] ?>" />
                  <span class="profile-name"><?php echo $_SESSION['e'] ?></span>
                </a>
                <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
                  <a class="dropdown-item" href="#">
                    <i class="mdi mdi-cached mr-2 text-success"></i> Profile </a>
                  <a class="dropdown-item" href="../signout.php">
                    <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>
        
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Modification Du Classe</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#"></a></li>
                  <li class="breadcrumb-item active" aria-current="page"></li>
                </ol>
              </nav>
            </div>
            <div class="row">
        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"></h4>
                    <p class="card-description"></p>
                    <form class="forms-sample" action="manageClassesEdit2.php" method="post">
                    <input type="hidden" value="<?php echo $row1['id']?>" class="form-control" id="section" name="id" id="inputAddress" placeholder="Ex:2LGL">

                      <div class="form-group">
                        <label for="exampleInputName1">Classe</label>
                        <input name="nom" value="<?php echo $row1['classeName']?>" type="text" class="form-control" id="exampleInputName1" placeholder="Name" />
                      </div>
                      <div class="form-group">
                      <label for="exampleFormControlSelect1">Section</label>
                      <select value="<?php echo $row1['section']?>" name="section" class="form-control form-control-lg" id="exampleFormControlSelect1">
                      <option>Select Section</option>  
                      <option>Génie Informatique</option>
                        <option>Génie Civile</option>
                        <option>Génie Mécanique</option>
                        <option>Génie Eléctrique</option>
                        <option>Génie Industrielle</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Niveau</label>
                      <select name="niveau" class="form-control form-control-lg" id="exampleFormControlSelect1">
                      <option>Select Niveau</option>  
                      <option>Licence</option>
                        <option>Préparatoire</option>
                        <option>Master</option>
                        <option>Ingénierie</option>
                        
                      </select>
                    </div>

                      <div class="form-group">
                        <label for="exampleInputPassword4">Grade</label>
                        <input type="text" value="<?php echo $row1['grade']?>" name="grade" class="form-control" id="exampleInputPassword4" placeholder="ex:1ère année" />
                      </div>
                      <input type="submit" class="btn btn-primary mr-2">
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
              <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"></span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a href="" target="_blank"></a></span>
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"></span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a href="" target="_blank"></a></span>
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"></span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a href="" target="_blank"></a></span>
            </div>
          </footer>
              </div>
                </div>
              </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/vendors/flot/jquery.flot.js"></script>
    <script src="assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="assets/vendors/flot/jquery.flot.stack.js"></script>
    <script src="assets/vendors/flot/jquery.flot.pie.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
   
  </body>
</html>
<?php
    }
else {
	header('location:../index.php');
}
?>