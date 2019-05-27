
<?php

include 'connection.php';
if(isset($_POST['Signup'])){
  $email= strtolower($_POST['SetEmail']);
  $Password= $_POST['SetPassword'];  
  $Fname= ucfirst(strtolower($_POST['SetFname']));
  $Lname= ucfirst(strtolower($_POST['SetLname']));
  $result = mysqli_query($conn,"SELECT Email FROM user WHERE Email ='$email'");

  if(mysqli_num_rows($result)>0){
    header("location: register?q=4");
  }else{
    $today = date("Y-m-d H:i:s");
    $sql= "INSERT INTO `user` (`Email`,`Password`,`FName`,`LName`,`Last_Activity`) values ('$email','$Password','$Fname','$Lname','$today')";
    echo $sql;
    if(!mysqli_query($conn,$sql)){
      header("Location: register?q=2");
    }else{
      header("location: register?q=1");
    }
  }
  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Custom fonts for this template-->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <script type="text/javascript" href="./JS/index.js"></script>
  <!-- Custom styles for this template-->
  <link href="css/loginsystem.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">


  <?php
    if(isset($_GET['q']) && $_GET['q']!=""){
      if($_GET['q']=="1"){
          echo '<div class="m-5 justify-content-center alert alert-success" role="alert">
                <strong>Account Register Successfully!!</strong>
              </div>';
      }elseif ($_GET['q']=="2"){
          echo '<div class="m-5 justify-content-center alert alert-danger" role="alert">
                <strong>Error In Registration Try Again Later.</strong>
              </div>';
      }elseif ($_GET['q']=="4") {
          echo '<div class="m-5 justify-content-center alert alert-warning" role="alert">
                 <strong>Email ID Already Registered Try Again Using Different Email ID.</strong>
              </div>';
      }elseif ($_GET['q']=="3") {
          echo '<div class="m-5 justify-content-center alert alert-danger" role="alert">
                <strong>Password Mismatch</strong>
              </div>';
      }
    }
  ?>
  

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">

      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user needs-validation" id="registration" method="POST">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="SetFname" pattern="^[A-Za-z]*$" autocomplete="off" required class="form-control form-control-user" id="SetFname" placeholder="First Name" data-error="First Name can only expect alphabets [A-Z] or [a-z]">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="SetLname" autocomplete="off" required class="form-control form-control-user" id="SetLname" placeholder="Last Name">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" name="SetEmail" autocomplete="off" required class="form-control form-control-user" id="SetEmail" placeholder="Email Address">
                </div>
                <div class="form-group">
                    <input type="password" name="SetPassword" autocomplete="off" required class="form-control form-control-user" id="SetPassword" placeholder="Password">
                </div>
                <div class="float-right form-group custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customControlValidation1" onclick="myFunction()">
                  <label class="custom-control-label" for="customControlValidation1">Show Password</label>
                </div>
                <input type="submit" name="Signup" class="btn btn-primary btn-user btn-block" value="Register Account">
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="login">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<script>
function myFunction() {
  var x = document.getElementById("SetPassword");
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
