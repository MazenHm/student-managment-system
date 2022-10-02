

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" />
    <meta name="theme-color" content="#000000" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Work Sans" rel="stylesheet" />
    <link rel="shortcut icon" href="dashbord/assets/images/logo.png" />

    <title>Login</title>
  </head>

  <body>
    <div class="wrapper-view">
      <div class="card">
        <div class="header">
          <span class="logo">
            <img src="assets/img/logo.PNG" width="120px" height="120px" />
          </span>

          <span> Ecole Polytechnique Sousse </span>
          <span> Students Results Management System </span>
        </div>
        <div class="view mt-3">
          <span class="text-gray d-flex align-items-center justify-content-center"> Search Your Result Polytechnicien </span>
          <form action="authentificationEtudiant.php" method="post">
          <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1){
                        echo "<div class='alert alert-danger my-3'>matricule ou mot de passe incorrect!!</div>";
                      }
                        if($err==2){
                        echo "<div class='alert alert-danger my-3'>champ vide!!</div>";
                      }
                      }
                
                ?>
            <div class="form-group mt-3">
              <label>Matricule</label>
              <input class="form-control" type="text" placeholder="20LGL02" name="matricule"/>
            </div>
            <div class="form-group mt-3">
              <label>Password</label>
    
              <input class="form-control" type="password" placeholder="password" name="password"/>
            </div>

            <div class="d-flex justify-content-center link w-100 mt-4">
              <button class="btn-srms" type="submit">
                <span> Sign in </span>
                <i class="fa fa-check"></i>
              </button>
            </div>
            
          </form>
        </div>
        <div class="footer-card">Are you an Admin?<a href="index.php"> LogIn</a></div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyuBtaZAFTK1JW4JgnkAC392TXHVMA3B"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
