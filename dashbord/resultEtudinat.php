<?php

session_start();
if (isset($_SESSION['matricule'])){
include("../connection.php");
	
if(isset($_SESSION['id'])){
    $sql3="select * from tabmoyenne m, tabetudiant e where m.idEtudiant=".$_SESSION['id']." and e.id =".$_SESSION['id'];
$res3=mysqli_query($connect,$sql3);
   }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <script>
function printPage() {
  window.print();
}
</script>
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

  <main class="dash-content">
  <div class="container-fluid">
                <div class="header d-flex justify-content-center align-items-center flex-column my-5">
          <span class="logo">
            <img src="assets/images/xxx.PNG" height="130"/>
          </span>

          <span  style="font-weight:500"> Ecole Polytechnique Sousse </span>
          <span style="font-weight:300"> Système de gestion des résultats des étudiants </span>


    

    </div>
    </main>

    <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Nom Etudiant : <span style="color:red;"><?php echo $_SESSION["nom"]?></span></h4>
                    <h4 class="card-title">Matricule : <span style="color:red;"><?php echo $_SESSION["matricule"]?></span></h4>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-striped">
                      <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Moyenne</th>
                                                <th scope="col">Résultat</th>
                                                <th scope="col">Mention</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i=1;
	                        while ($row=mysqli_fetch_assoc($res3)){
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $i ?></th>
                                                <?php if($row['image'] != null) { ?>
                                                <td><img src="../Photo/<?php echo $row['image'] ?>" height="100" width="100"></td>
                                            <?php } else { ?>
                                                 <td><img src="../Photo/xx.png" height="100" width="100"></td>
                                             <?php } ?>
                                                <td><?php echo $row["nomEtudiant"] ?></td>
                                                <td><?php echo $row["moy"] ?></td>
                                                <td><?php if ($row["moy"]>=10){
                                                    echo "admis";
                                                }
                                                    else {
                                                        echo "refusé";
                                                    
                                                } ?></td>
                                                <td><?php if ($row["moy"]>12 and $row["moy"]<14){
                                                    echo "assez bien";
                                                }
                                                else if ($row["moy"]>=10 and $row["moy"]<12) {
                                                    echo "passable";
                                                }    
                                                else if ($row["moy"]>14 and $row["moy"]<16) {
                                                        echo "bien";
                                                    }
                                                    else if ($row["moy"]>=16) {
                                                        echo "très bien";
                                                    }
                                                    else {
                                                        echo ("-");
                                                    }
                                                 ?></td>
                                                    
                                                
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
              
              <div class="container">
                    <div class="d-flex justify-content-center align-items-center">
                    <a href="../signoutetudiant.php"><button type="button" class="btn btn-danger btn-icon-text">
                            <i class="mdi mdi-logout btn-icon-prepend"></i> SignOut </button></a>
                    <button style="margin:15px" onclick="printPage()" type="button" class="btn btn-info btn-icon-text"> Print <i class="mdi mdi-printer btn-icon-append"></i>
                          </button>
                    </div>
              </div>

</body>
</html>
<?php
    }
else {
	header('location:../studentLog.php');
}
?>