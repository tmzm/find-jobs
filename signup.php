<?php
error_reporting(0);
ini_set('display_errors', 0);
if(isset($_GET['login']) || isset($_GET['logup'])){
  empty($name);
  empty($insert);
  empty($email);
  empty($kind);
  if(isset($_GET['login'])){
    header ("location: signin.php");
  }
  if(isset($_GET['logup'])){
    header ("location: signup.php");
  }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>find jop - sign up</title>
    <?php include 'link.php'?>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100 align-items-center">
        <img src="images/<?php if(!empty($name)||!empty($pname)){echo $pname;} if(empty($pname)){echo "usericon.png";}?>" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong class="me-2" ><?php echo $name?></strong>
      <li class="nav-item flex-auto">
      <form class="d-flex">
        <input class="form-control me-2 rounded-pill" type="search" placeholder="Search" aria-label="Search">
      </form>
      </li>

      <form action="" method="GET">
        <li class="nav-item padding-fif">
         <input type="submit" name="login" class="btn btn-secondary rounded-pill" value = "log in">
        </li>
      </form>
      <form action="" method="GET">
        <li class="nav-item">
         <input type="submit" name="logup"class="btn btn-outline-dark rounded-pill" value = "sign up">
        </li>
      </form>

      </ul>
    </div>
  </div>
</nav>

    <h1 class="mx-auto sign-up shadow " style="width: 200px;">sign up</h1>

    <!-- .................... phpmyadmin ........................ -->
    <!-- .................... phpmyadmin ........................ -->

    <div class="mx-auto shadow-lg p-3 mb-5 bg-body rounded padding-subm" style="width: 500px;">
      <form action="" method="POST" enctype="multipart/form-data">
        <label for="exampleInputEmail1" class="form-label">First Name</label>
        <input type="text" name="firstname" class="form-control mb-3" id="exampleInputEmail1" required>
        <label for="exampleInputEmail1" class="form-label">Last Name</label>
        <input type="text" name="lastname" class="form-control mb-3" id="exampleInputEmail1" required>
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control mb-3" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="passwords" class="form-control mb-3" id="exampleInputPassword1" required>
        <div class="form-floating">
         <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="kind">
          <option selected value="search">search for jop</option>
          <option value="hiring">hiring someone</option>
         </select>
          <label for="floatingSelect">you search for jop or hiring ??</label>
        </div>
        <label for="exampleInputPassword1" class="form-label m-3">profile image <h6>(optional)<h6></label>
        <input type="File" name="file" class="form-control mb-3" id="exampleInputPassword1">
        <input type="submit" name="submit" class="btn btn-primary" value="submit">
      </form>
      <?php
include 'conn.php';
include 'variables.php';

if(isset($_POST['submit'])){

    if(isset($_POST['email'])){
      $email =$_POST['email'];
    }
    if(isset($_POST['passwords'])){
      $passwords =$_POST['passwords'];
    }
    if(isset($_POST['firstname'])){
      $firstname =$_POST['firstname'];
    }
    if(isset($_POST['lastname'])){
      $lastname =$_POST['lastname'];
    }
    if(isset($_POST['kind'])){
      $kind = filter_input(INPUT_POST, 'kind');
    }
    if(!empty($_FILES["file"]["name"])){
      $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
      $tname = $_FILES["file"]["tmp_name"];
      $uploads_dir = 'images';
      // TO move the uploaded file to specific location
      move_uploaded_file($tname, $uploads_dir.'/'.$pname);
    }else{
      $pname="none";
    }
    
    
    $sql = "SELECT id, email FROM usres";
    $result = $conn->query($sql);
    if ($result->num_rows >= 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        if($email === $row['email']){
          echo 'email used before | ';
          $conset = " ";
        }
      }
      if(empty($conset)){
      $sql = "INSERT INTO usres(firstname, lastname, email, passwords, cvjop, images) VALUES ('$firstname','$lastname','$email','$passwords','$kind','$pname')";
    
      if (mysqli_query($conn, $sql)) {
        $name = $firstname." ".$lastname;
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
        $_SESSION['pname'] = $pname;
        $_SESSION['kind'] = $kind;
        header("Location: mainpage.php");
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      }
    }

    
}

?>
    </div>


    <footer class="bd-footer py-5 mt-5 bg-light">
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-3 mb-3">
        <a class="d-inline-flex align-items-center mb-2 link-dark text-decoration-none" href="/" aria-label="Bootstrap">
          <img src='images/c-logo.png' width="70">
          <span class="fs-3">creative id</span>
        </a>
        <ul class="list-unstyled small text-muted">
          <li class="mb-2">Designed and built with all the love in the world by the <h6>creative id team</h6> to more information <a href="https://facebook.com/creativeidtm" class ="under-line">facebook</a>.</li>
          <li class="mb-2">contact on <a href="https://github.com/twbs/bootstrap/blob/main/LICENSE" class="under-line">whatsapp</a>
        </ul>
      </div>
      <div class="col-6 col-lg-2 offset-lg-1 mb-3">
        <h5>Links</h5>
        <ul class="list-unstyled">
          <li class="mb-2">Home</li>
          <li class="mb-2">Docs</li>
          <li class="mb-2">Examples</li>
          <li class="mb-2">Themes</li>
          <li class="mb-2">Blog</li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 mb-3">
        <h5>Guides</h5>
        <ul class="list-unstyled">
          <li class="mb-2">Getting started</li>
          <li class="mb-2">Starter template</li>
          <li class="mb-2">Webpack</li>
          <li class="mb-2">Parcel</li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 mb-3">
        <h5>Projects</h5>
        <ul class="list-unstyled">
          <li class="mb-2">find jobs</li>
          <li class="mb-2">Icons</li>
          <li class="mb-2">RFS</li>
          <li class="mb-2">npm starter</li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 mb-3">
        <h5>Community</h5>
        <ul class="list-unstyled">
          <li class="mb-2">Issues</li>
          <li class="mb-2">Discussions</li>
          <li class="mb-2">Corporate sponsors</li>
          <li class="mb-2">Open Collective</li>
          <li class="mb-2">Slack</li>
          <li class="mb-2">Stack Overflow</li>
        </ul>
      </div>
    </div>
  </div>
</footer>



    <!-- ............. dont touch ............. -->
    <script src="bootstrap.bundle.min.js"></script>
    <script src="js.js"></script>
</body>
<!-- ............. end ............. -->
</html>


<!--


<div class="mx-auto" style="width: 200px;">
  Centered element
</div>


-->