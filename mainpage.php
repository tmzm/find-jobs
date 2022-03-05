<?php 
$pname ="";
error_reporting(0);
ini_set('display_errors', 0);
session_start();
$insert = $_SESSION['insert'];
$name = $_SESSION['name'];
$pname = $_SESSION['pname'];
$kind = $_SESSION['kind'];
error_reporting(0);
ini_set('display_errors', 0);

if(isset($_GET['log'])){
  if(!empty($name)){
    $_SESSION['name'] = "";
    $_SESSION['pname'] = "";
    $_SESSION['kind'] = "";
  }
  if(empty($name)){
  }
}

if(isset($_GET['login']) || isset($_GET['logup'])){
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
    <!-- ............. start ............. -->
<head>
<title> find jop - home page </title>
<?php include 'link.php'?>
</head>
<body>
  <!-- .......................sidebar ............................ -->


<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="bootstrap" viewBox="0 0 118 94">
    <title>Bootstrap</title>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
  </symbol>
  <symbol id="cv-cv" viewBox="0 0 16 16">
    <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z"/>
  </symbol>
  <symbol id="home" viewBox="0 0 16 16">
    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
  </symbol>
  <symbol id="job" viewBox="0 0 16 16">
    <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
    <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z"/> 
  </symbol>
  <symbol id="profile" viewBox="0 0 16 16">
    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>  
  </symbol>
  <symbol id="logout" viewBox="0 0 16 16">
    <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
  </symbol>
</svg>



<!-- .................. navbar ........................ -->

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100 align-items-center">
       <img src="images/find jops.png" width="110" class="me-2"> 
        <img src="images/<?php if(!empty($name)||!empty($pname)){echo $pname;} if(empty($pname) || $pname === "none"){echo "usericon.png";}?>" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong class="me-2" ><?php echo $name?></strong>
        <li class="nav-item ">
        <a href="mainpage.php" class="itim nav-link text-black" aria-current="page">
          <svg class="bi me-2" width="24" height="24"><use xlink:href="#home"/></svg>
          home
        </a>
      </li>
      
      <li class="nav-item  ">
      <a href="#" class="itim nav-link text-black">
          <svg class="bi me-2" width="24" height="24"><use xlink:href="#cv-cv"/></svg>
          explor CVs
        </a>
      </li>

      <li class="nav-item ">
      <a href="#" class="itim nav-link text-black">
          <svg class="bi me-2" width="24" height="24"><use xlink:href="#job"/></svg>
          explor jobs
        </a>
      </li>

      <li class="nav-item  itim <?php  if(empty($name)){echo " hide " ;}?>">
        <a class="nav-link text-black " onclick="fun()" href='mainpage.php?x=0'>
          <svg class="bi me-2" width="24" height="24"><use xlink:href="#logout"/></svg>
          log out
        </a>
      </li>
      
      <li class="nav-item  itim <?php  if(empty($name) || empty($kind)){echo " hide " ;}?> ">
      <a class="nav-link text-black  hover" onclick="cv()">
          <svg class="bi me-2" width="24" height="24"><use xlink:href="#<?php if($kind === "search"){ echo "cv-cv"; }elseif($kind === "hiring"){ echo "job"; }?>"/></svg>
          <?php if($kind === "search"){ echo "create or edite your cv"; }elseif($kind === "hiring"){ echo "create or edite your hiring"; }?>
        </a>
        </li>

        <li class="nav-item  flex-auto">
      <form class="d-flex">
        <input class="form-control me-2 rounded-pill" type="search" placeholder="Search" aria-label="Search">
      </form>
      </li>

      <form action="" method="GET">
        <li class="nav-item">
         <input type="submit" name="logup"class="btn btn-outline-dark rounded" value = "sign up">
        </li>
      </form>

      </ul>
    </div>
  </div>
</nav>

      <!-- .................. navbar ........................ -->


       <!-- ..................................... recent jops .................................. -->

      <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <!-- first slide-->
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
            <img src="images/online.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          <!-- second slide-->
          <div class="carousel-item" data-bs-interval="2000">
            <img src="images/online 2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          <!-- third slide-->
          <div class="carousel-item">
            <img src="images/online 3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
            </div>
           </div>
        </div>
        <!-- bottom of slides-->
        <button class="carousel-control-prev mb" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next mb" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>


<script>
  
  function cv(){
    window.location.assign("CVs.php");
  }
  function fun(x){
    <?php
    if (isset($_GET['x'])) {
    session_start();
    $pname = "none";
    $_SESSION['name'] = "";
    $_SESSION['pname'] = "none";
    $_SESSION['kind'] = "";
    }
    
    ?>
    window.location.assign("mainpage.php");
  }
</script>










 
      <!-- title -->
      <div class="padding-cj">
      



    


  <div class="<?php  if(!empty($name)){echo "hide " ;}?>container mx-auto">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">log in</h1>
        <p class="col-lg-10 fs-4">log in to enter your CV or your Hiring its Free, we here have ahuge number of CVs and Jobs you can explor it or create yours </p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-light" method="get">
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" name="passwords" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>
          <input class="w-100 btn btn-lg btn-primary" type="submit" name="submit" value="Sign in">
          <hr class="my-4">
          <small class="text-muted">By clicking Log in, you agree to the terms of use.</small>
        </form>
      </div>
    </div>
  </div>

  <?php
  include 'conn.php';
  if(isset($_GET['submit'])){

    empty($name);
  
  $sql = "SELECT id, firstname, lastname, email, passwords, cvjop, images FROM usres";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if($_GET['email'] === $row['email'] && $_GET['passwords'] === $row['passwords']){
      $firstname=$row['firstname'];
      $lastname=$row['lastname'];
      $kind = $row['cvjop'];
      $pname = $row['images'];
  
      $name = $firstname." ".$lastname;
      }
      }
      $email = $_GET['email'];
      session_start();
      $_SESSION['email'] = $email;
      $_SESSION['name'] = $name;
      $_SESSION['pname'] = $pname;
      $_SESSION['kind'] = $kind; 
      header("Refresh:0");  
    }
    }
    ?>

      <!-- ................................... what new ?? ........................................... -->
      <div class="container  py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="https://getbootstrap.com/docs/5.1/examples/heroes/bootstrap-themes.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3">Responsive left-aligned hero with image</h1>
        <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
      </div>
    </div>
  </div>


      <!-- ................................... what new ?? ........................................... -->
      <!-- ............................................................................................ -->

      <div class="display-5 fw-bold lh-1 mb-5 container mx-auto createcv" style="width: 400px;"> top Categories: </div>

      <div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col hover-card ">
    <div class="card shadow mb-5 bg-body rounded">
      <img src="images/bes.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Business</h5>
        <p class="card-text">Design your integrated business and manage it on this site, you can search for employees by browsing CV...</p>
      </div>
    </div>
  </div>
  <div class="col hover-card ">
    <div class="card shadow mb-5 bg-body rounded">
      <img src="images/JobDesign.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
  <div class="col hover-card ">
    <div class="card shadow mb-5 bg-body rounded">
      <img src="images/JobDesign.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
      </div>
    </div>
  </div>
  <div class="col hover-card ">
    <div class="card shadow mb-5 bg-body rounded">
      <img src="images/JobDesign.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
</div>

       <!-- ...................................... footer ............................................ -->
<hr>
<footer class="bd-footer py-5 mt-5">
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-3 mb-3 ">
        <a class="d-inline-flex align-items-center mb-2 link-dark text-decoration-none" href="/" aria-label="">
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
    <script>
    (function () {
    'use strict'
     var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
     tooltipTriggerList.forEach(function (tooltipTriggerEl) {
    new bootstrap.Tooltip(tooltipTriggerEl)
    })
    })()
</script>
</body>
<!-- ............. end ............. -->
</html>