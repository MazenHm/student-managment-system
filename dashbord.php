<?php
	session_start();
    if (isset($_SESSION['e'])){
    include("../connection.php");


    $sql="select * from log_admin ";
    $res=mysqli_query($connect,$sql);

	$sql="select * from tabclasses";
	$res=mysqli_query($connect,$sql);

    $sql1="select * from tabclasses a, tabetudiant b where a.id=b.classeId";
	$res1=mysqli_query($connect,$sql1);

?>

<!doctype html>
<html lang="en">
<!-- Dashboard Page -->
<!-- Git push from vs code -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/spur.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="../js/chart-js-config.js"></script>
    <title>Système de notation des étudiants </title>
    <link rel="icon" type="image/x-icon" href="poly.png">

</head>

<body>
    <div class="dash">
        <div class="dash-nav dash-nav-dark">
            <header>
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <a href="dashbord.php" class="spur-logo"><img src="poly.png" height="80px" width="80px"></a>
            </header>
            <nav class="dash-nav-list">
                <a href="dashbord.php" class="dash-nav-item">
                    <i class="fas fa-home"></i> Dashboard </a>
                <div class="dash-nav-dropdown">
                    <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                        <i class="fa fa-university" aria-hidden="true"></i> Classes </a>
                    <div class="dash-nav-dropdown-menu">
                        <a href="addClasses.php" class="dash-nav-dropdown-item">créer des classes</a>
                    </div>
                    <div class="dash-nav-dropdown-menu">
                        <a href="manageClasses.php" class="dash-nav-dropdown-item">gérer les classes</a>
                    </div>
                </div>
                <div class="dash-nav-dropdown">
                    <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                        <i class="fa fa-users" aria-hidden="true"></i></i>Etudiants </a>
                        <div class="dash-nav-dropdown-menu">
                            <a href="addEtudiant.php" class="dash-nav-dropdown-item">créer des étudiants</a>
                        </div>
                        <div class="dash-nav-dropdown-menu">
                            <a href="manageEtudiant.php" class="dash-nav-dropdown-item">gérer des étudiants</a>
                        </div>
                </div>
                <div class="dash-nav-dropdown">
                    <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i> Résultat </a>
                        <div class="dash-nav-dropdown-menu">
                            <a href="addResult.php" class="dash-nav-dropdown-item">créer des résultats</a>
                        </div>
                        <div class="dash-nav-dropdown-menu">
                            <a href="manageResult.php" class="dash-nav-dropdown-item">gérer les résultat</a>
                        </div>
                </div>
            </nav>
        </div>
        <div class="dash-app">
            <header class="dash-toolbar">
                <a href="#!" class="menu-toggle">
                    <i class="fa fa-arrows-alt fa-flip-vertical" aria-hidden="true"></i>

                </a>
                
                <a href="#!" class="menu-toggle">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>

                </a>

                
                <div class="tools">
                    <a href="../logout.php" class="tools-item mx-5">
                        
                        <i class="fas fa-sign-out-alt mx-1"></i>
                        Logout
                    </a>
                    <div class="dropdown tools-item">
                        <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="profile.php">Profile</a>
                        </div>
                    </div>
                </div>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <div class="row dash-row">
                        <div class="col-xl-4">
                            <div class="stats stats-primary">

                            <?php 
                                $query = "select id from tabclasses order by id";
                                $query_run=mysqli_query($connect,$query);
                                $row=mysqli_num_rows($query_run);
                            ?>
                                <h3 class="stats-title">Nombre Des Classes</h3>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                        <i class="fa fa-university" aria-hidden="true"></i>
                                    </div>
                                    <div class="stats-data">
                                        <div class="stats-number"><?php echo $row ?></div>
                                        <div class="stats-change">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="stats stats-success ">
                            <?php 
                                $query = "select id from tabmoyenne order by id";
                                $query_run=mysqli_query($connect,$query);
                                $row=mysqli_num_rows($query_run);
                            ?>
                                <h3 class="stats-title"> Resultat Déclaré </h3>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                        <i class="fa fa-book" aria-hidden="true"></i>
                                    </div>
                                    <div class="stats-data">
                                        <div class="stats-number"><?php echo $row ?></div>
                                        <div class="stats-change">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="stats stats-danger">
                                <h3 class="stats-title"> Nombre Des Etudiants </h3>
                                <div class="stats-content">
                                <?php 
                                $query = "select id from tabetudiant order by id";
                                $query_run=mysqli_query($connect,$query);
                                $row=mysqli_num_rows($query_run);
                            ?>
                                    <div class="stats-icon">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                    </div>
                                    <div class="stats-data">
                                        <div class="stats-number"><?php echo $row ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="row">
                       
                      
                        <div class="col-lg-12">
                            <div class="card spur-card">
                                <div class="card-header">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-table"></i>
                                    </div>
                                    <div class="spur-card-title">tableaux des etudiants</div>
                                </div>
                                <div class="card-body card-body-with-dark-table">
                                    <table class="table table-dark table-in-card">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                                <th scope="col">Nom Etudiant</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Matricule</th>
                                                <th scope="col">Sexe</th>
                                                <th scope="col">Classe</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i=1;
	                        while ($row=mysqli_fetch_assoc($res1)){
                                        ?>
                                         <tr>
                                                <th scope="row"><?php echo $i ?></th>
                                                <td><?php echo $row["nomEtudiant"] ?></td>
                                                <td><?php echo $row["email"] ?></td>
                                                <td><?php echo $row["matricule"] ?></td>
                                                <td><?php echo $row["sexe"] ?></td>
                                               <td><?php echo $row["classeName"] ?></td>
                                             
                                            </tr>
                                            
                                            <?php
                                               $i++; }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="../js/spur.js"></script>
</body>

</html>

<?php
    }
else {
	header('location:../index.php');
}
?>