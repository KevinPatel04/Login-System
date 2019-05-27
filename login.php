<?php

include 'connection.php';
if(isset($_POST['Login']) && isset($_POST['Email']) && isset($_POST['Password'])){
        $Pass= $_POST['Password'];
        $Email=$_POST['Email'];
        $sql= "SELECT * from `user` where Email='$Email'";
        //echo $sql; 
        $result= mysqli_query($conn, $sql);
        //echo "<br>$sql:: ".$sql;
        if(mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)){
              if($row['Email']==$Email && $row['Password']== $Pass){
                if(isset($_POST['Remember'])){
                  if($_POST['Remember']==1){
                    setcookie('email',$Email,time()+(7*60*60*24));  //remember's email for 1 week
                    setcookie('pass',$Pass,time()+(7*60*60*24));    //remember's password for 1 week
                  }
                }
                session_start();
                $_SESSION['admin']=$Email;
                header("location: login?q=success");
                header("Location: Welcome?q=$Email");
                }else{
                  header("Location: login?q=error");
                }
            }
    }else{
      header("location: login?q=warning");
    }
  }
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <style type="text/css">
    .alert{
      text-align: center;
    }
  </style>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Custom fonts for this template-->
    
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- Custom styles for this template-->
  <link href="css/loginsystem.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container p-4 mt-2">

    <?php
      if(isset($_GET['q']) && $_GET['q']!=""){
        if($_GET['q']=="success"){
          echo '<div class="justify-content-center alert alert-success" role="alert">
          Loged-in Successfully!!
          </div>';
        }elseif ($_GET['q']=="error"){
          echo '<div class="justify-content-center alert alert-danger" role="alert">
          Password Mismatch / Incorrect Password.
          </div>';
        }elseif ($_GET['q']=="warning") {
          echo '<div class="justify-content-center alert alert-warning" role="alert">
          Email ID Not Found Try Again Using Different Email ID.
          </div>';
       }
      }
    ?>

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-4">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" name="form" method="POST">
                    <div class="form-group">
                      <input type="email" id="Email" name="Email" class="form-control form-control-user" autocomplete="off" required aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" id="Password" name="Password" class="form-control form-control-user" autocomplete="off" required placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control float-left custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" value="1" name="Remember" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                      <div class="float-right custom-control small custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="ControlValidation" onclick="myFunction()">
                        <label class="custom-control-label" for="ControlValidation">Show Password</label>
                      </div>
                    </div><br><br>
                    <input type="submit" name="Login" class="btn btn-primary btn-user btn-block" value="Login">
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="register">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
//For Remembering the user
if(isset($_COOKIE['email']) && isset($_COOKIE['pass']))
if($_COOKIE['email']!='' && $_COOKIE['pass']!=''){   
  $email=$_COOKIE['email'];
  $pass=$_COOKIE['pass'];
  echo "<script>
    document.getElementById('Email').value='$email';
    document.getElementById('Password').value='$pass';
    </script>";
}
?>

<script>
function myFunction() {
  var x = document.getElementById("Password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

  <!-- Bootstrap core JavaScript-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/  nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
