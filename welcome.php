<?php

include 'connection.php';

if(isset($_POST['logout'])){
session_start();
session_destroy();
$email=$_COOKIE['email'];
$pass=$_COOKIE['pass'];
setcookie('email',$email, time()-1);
setcookie('pass',$pass, time()-1);
header('location: login');
}

if(isset($_GET['q']) && $_GET['q']!=''){
  $email=$_GET['q'];
  $sql="SELECT * FROM `user` WHERE Email='$email'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  $username=$row['FName'].' '.$row['LName'];
  $activity=$row['Last_Activity'];
  $today = date("Y-m-d H:i:s");
  $sql="UPDATE user SET Last_Activity='$today' WHERE Email='$email'";
  mysqli_query($conn,$sql);
}else{
  header("location: login");
}

?>
<!DOCTYPE html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@KevinPatel04</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <style type="text/css">
    .pacifico{
      font-family: 'Pacifico', cursive;
    }
    a.navbar-brand{
      font-family: 'Pacifico', cursive;
      font-size: 30px;
    }

    button.btn:hover i{
      color: white !important;
    }

    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  
  </head>
  <body class="d-flex flex-column h-100">
    <header class="mb-5">
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="https://www.github.com/KevinPatel04" style="color: #2268FF">@KevinPatel04</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" > Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://www.github.com/KevinPatel04">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form method="POST" class="form-inline mt-2 mt-md-0">
        <button class="btn btn-outline-success larger my-2 my-sm-0" name="logout" type="submit"><i class="fas fa-user text-success" style="color: red;"></i> Logout</button>
      </form>
    </div>
  </nav>
</header>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0 p-0">
  <div class="container">
    <h1 class="mt-5">Welcome <?=$username?>,</h1>
    <p>You have lastly loged-in on :: <?=$activity?></p>
    <p class="lead"> Lorem Ipsum is simply dummy text of the printing and typesetting
    industry. Lorem Ipsum has been the industry's standard dummy
    text ever since the 1500s, when an unknown printer took a galley
    of type and scrambled it to make a type specimen book. It has
    survived not only have centuries, but also the leap into electronic
    typesetting, remaining essentially unchanged. It was popularised in
    the 1960s with the release of Letraset sheets containing Lorem
    Ipsum passages, and more recently with desktop publishing
    software like Aldus PageMaker including versions of Lorem Ipsum.</p>
  </div>
</main>

<footer class="footer mt-auto py-3">
  <div class="container">
    <hr>
    <span class="text-muted float-right">&copy 2019:<a class="pacifico text-secondary" href="https://www.github.com/KevinPatel04"> @KevinPatel04 </a></span>
  </div>
</footer>
  <!-- Bootstrap core JavaScript-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/  nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
