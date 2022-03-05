<?php
error_reporting(0);
ini_set('display_errors', 0);
session_start();

$name = $_SESSION['name'];
$pname = $_SESSION['pname'];
$kind = $_SESSION['kind'];

include 'variables.php';
include 'conn.php';

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

if(isset($_GET['send'])){

  

  if(isset($_GET['contact'])){
    $contact =$_GET['contact'];
  }
  if(isset($_GET['Field'])){
    $Field =$_GET['Field'];
  }
  if(isset($_GET['Descriptionself'])){
    $Descriptionself =$_GET['Descriptionself'];
  }
  if(isset($_GET['Education'])){
    $Education =$_GET['Education'];
  }
  if(isset($_GET['Programs'])){
    $Programs =$_GET['Programs'];
  }
  if(isset($_GET['Experience'])){
    $Experience =$_GET['Experience'];
  }
  if(isset($_GET['city'])){
    $city =$_GET['city'];
  }
  if(isset($_GET['Eyears'])){
    $Eyears =$_GET['Eyears'];
  }
    $covername = rand(1000,10000)."-".$_FILES["file"]["name"];
    $tname = $_FILES["file"]["tmp_name"];
    $uploads_dir = 'images';
    // TO move the uploaded file to specific location
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);

  $sql = "INSERT INTO cv(Eyears, Descriptionself, Programs, Field, Education, Experience, contact, city, email, images) VALUES ('$Eyears','$Descriptionself','$Programs','$Field','$Education','$Experience','$contact','$city','$email','$covername')";
  
  if (mysqli_query($conn, $sql)) {

   $insert = "ok";
   session_start();

   $_SESSION['insert'] = $insert;
   header("Location: mainpage.php");
   } else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
   
  

  
}
?>
<!DOCTYPE html>
<html lang="en">
    <!-- ............. start ............. -->
<head>
    <title> find jop - CV </title>
    <?php include 'link.php'?>
</head>
<body>
       <!-- ...................................... navbar ............................................ -->

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
    <!-- ............................................. create CV ................................... -->


<form class="row g-3 createcv mx-auto shadow-lg p-3 mb-5 bg-body rounded m-5" style="width: 700px;" action="" method="GET">
  
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Contact</label>
    <input type="text" name="contact" class="form-control" id="inputEmail4" required>
  </div>
  
  <div class="col-md-4">
    <label for="inputState" class="form-label">Field</label>
    <select id="inputState" name="Field" class="form-select" required>
      <option selected>Choose Field...</option>
      <optgroup label="Architecture and engineering">
       <option value="Architect" >Architect</option>
       <option value="Civil engineer" >Civil engineer</option>
       <option value="Landscape architect" >Landscape architect</option>
       <option value="Sustainable designer" >Sustainable designer</option>
       <option value="Biomedical engineer" >Biomedical engineer</option>
      </optgroup>
      <optgroup label="Arts, culture and entertainment">
       <option value="Singer/songwriter" >Singer/songwriter</option>
       <option value="Music producer" >Music producer</option>
       <option value="Art curator" >Art curator</option>
       <option value="Animator/video game designer" >Animator/video game designer</option>
       <option value="Filmmaker" >Filmmaker</option>
       <option value="Graphic designer" >Graphic designer</option>
       <option value="Fashion designer" >Fashion designer</option>
       <option value="Photographer" >Photographer</option>
      </optgroup>
      <optgroup label="Business, management and administration">
       <option value="Human resources manager" >Human resources manager</option>
       <option value="Marketing assistant" >Marketing assistant</option>
       <option value="Accountants" >Accountants</option>
       <option value="Secretary" >Secretary</option>
       <option value="Entrepreneur/small business owner" >Entrepreneur/small business owner</option>
       <option value="Real estate agent" >Real estate agent</option>
       <option value="Business development manager" >Business development manager</option>
      </optgroup>
      <optgroup label="Communications">
       <option value="Journalist" >Journalist</option>
       <option value="Copywriter" >Copywriter</option>
       <option value="Accountants" >Accountants</option>
       <option value="Communications manager" >Communications manager</option>
       <option value="Public relations specialist" >Public relations specialist</option>
       <option value="Meeting/event planner" >Meeting/event planner</option>
       <option value="Social media manager" >Social media manager</option>
       <option value="Brand manager" >Brand manager</option>
      </optgroup>
      <optgroup label="Community and social services">
       <option value="School counselor" >
         School counselor
        </option>
       <option value="Speech pathologist" >
         Speech pathologist
        </option>
       <option value="Rehabilitation counselor" >
         Rehabilitation counselor
        </option>
       <option value="Licensed clinical social worker" >
         Licensed clinical social worker
        </option>
       <option value="Child welfare social worker" >
         Child welfare social worker
        </option>
       <option value="Palliative and hospice care worker" >
         Palliative and hospice care worker
        </option>
      </optgroup>
      <optgroup label="Education">
       <option value="Special education teacher" >
       Special education teacher
        </option>
       <option value="School principal" >
       School principal
        </option>
       <option value="Superintendent" >
       Superintendent
       </option>
       <option value="College professor" >
       College professor
        </option>
       <option value="School librarian" >
       School librarian
        </option>
       <option value="Substitute teacher" >
       Substitute teacher
        </option>
      </optgroup>
      <optgroup label="Science and technology">
       <option value="Archeologist" >
       Archeologist
        </option>
       <option value="Software engineer" >
       Software engineer
        </option>
       <option value="Laboratory technician" >
       Laboratory technician
       </option>
       <option value="Microbiologist" >
       Microbiologist
        </option>
       <option value="Physicist" >
       Physicist
        </option>
      </optgroup>
      <optgroup label="Installation, repair and maintenance">
       <option value="Auto mechanic" >
       Auto mechanic
        </option>
       <option value="Landscaper and groundskeeper" >
       Landscaper and groundskeeper
        </option>
       <option value="Bicycle repairer" >
       Bicycle repairer
       </option>
       <option value="Wind turbine technician" >
       Wind turbine technician
        </option>
       <option value="Plumber" >
       Plumber
        </option>
      </optgroup>
      <optgroup label="Government">
       <option value="School cafeteria worker" >
       School cafeteria worker
        </option>
       <option value="Congressional staff" >
       Congressional staff
        </option>
       <option value="National park ranger" >
       National park ranger
       </option>
       <option value="Mail carrier" >
       Mail carrier
        </option>
       <option value="Elementary school teacher" >
       Elementary school teacher
        </option>
      </optgroup>
      <optgroup label="Health and medicine">
       <option value="Anesthesiologist" >
       Anesthesiologist
        </option>
       <option value="Dental assistant" >
       Dental assistant
        </option>
       <option value="Nurse" >
       Nurse
       </option>
       <option value="Veterinarian" >
       Veterinarian
        </option>
       <option value="Physical therapist" >
       Physical therapist
        </option>
      </optgroup>
      <optgroup label="Law and public policy">
       <option value="Lobbyist" >
       Lobbyist
        </option>
       <option value="Public administrator" >
       Public administrator
        </option>
       <option value="Paralegal" >
       Paralegal
       </option>
       <option value="Lawyer" >
       Lawyer
        </option>
       <option value="Labor relations specialist" >
       Labor relations specialist
        </option>
      </optgroup>
      <optgroup label="Sales">
       <option value="Sales associate" >
       Sales associate
        </option>
       <option value="sales development rep" >
       sales development rep
        </option>
       <option value="Account executive" >
       Account executive
       </option>
       <option value="Regional sales manager" >
       Regional sales manager
        </option>
       <option value="VP of sales" >
       VP of sales
        </option>
      </optgroup>
    </select>
  </div>
  
  <div class="col-12">
    <label for="inputAddress" class="form-label">About You</label>
    <input type="text" name="Descriptionself" class="form-control" id="inputAddress" required>
  </div>
  
  <div class="col-md-4">
    <label for="inputState" class="form-label">Education</label>
    <select id="inputState" name="Education" class="form-select" required>
       <option value="Pre-K/Elementary School" selected>Pre-K/Elementary School</option>
       <option value="Middle school">Middle school</option>
       <option value="High School">High School</option>
       <option value="Higher Education">Higher Education</option>
      </optgroup>
    </select>
  </div>
  
  <div class="col-md-4">
    <label for="inputState" class="form-label">programs</label>
    <select id="inputState" name="Programs" class="form-select" required>
      <option value="non" selected>NON</option>
      <optgroup label="MS programs">
       <option value="PowerPoint & Word">PowerPoint & Word</option>
       <option value="Excel">Excel</option>
       <option value="acces">acces</option>
       <option value="visual studio">visual studio</option>
      </optgroup>
      <optgroup label="Adobe">
       <option value="Photoshop">Photoshop</option>
       <option value="Ai">Ai</option>
       <option value="InDesign">InDesign</option>
       <option value="After effect">After effect</option>
      </optgroup>
    </select>
  </div>
  
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Experience</label>
    <input type="text" name="Experience" class="form-control" id="inputAddress2" placeholder="companys you worked for, freelance ..." required>
  </div>
  
  <div class="col-md-4">
    <label for="inputState" class="form-label">city</label>
  <select id="inputState" name="city" class="form-select" required>
    <optgroup label="A">
      <option value="Afghanistan">Afghanistan</option>
      <option value="Albania">Albania</option>
      <option value="Algeria">Algeria</option>
      <option value="Andorra">Andorra</option>
      <option value="Angola">Angola</option>
      <option value="Antigua and Barbuda">Antigua and Barbuda</option>
      <option value="Argentina">Argentina</option>
      <option value="Armenia">Armenia</option>
      <option value="Aruba">Aruba</option>
      <option value="Australia">Australia</option>
      <option value="Austria">Austria</option>
      <option value="Azerbaijan">Azerbaijan</option>
    </optgroup>
    <optgroup label="B">
      <option value="Bahamas">Bahamas</option>
      <option value="Bahrain">Bahrain</option>
      <option value="Bangladesh">Bangladesh</option>
      <option value="Barbados">Barbados</option>
      <option value="Belarus">Belarus</option>
      <option value="Belgium">Belgium</option>
      <option value="Belize">Belize</option>
      <option value="Benin">Benin</option>
      <option value="Bhutan">Bhutan</option>
      <option value="Bolivia">Bolivia</option>
      <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
      <option value="Botswana">Botswana</option>
      <option value="Brazil">Brazil</option>
      <option value="Brunei">Brunei</option>
      <option value="Bulgaria">Bulgaria</option>
      <option value="Burkina Faso">Burkina Faso</option>
      <option value="Burma">Burma</option>
      <option value="Burundi">Burundi</option>
    </optgroup>
    <optgroup label="C">
      <option value="Cambodia">Cambodia</option>
      <option value="Cameroon">Cameroon</option>
      <option value="Canada">Canada</option>
      <option value="Cabo Verde">Cabo Verde</option>
      <option value="Central African Republic">Central African Republic</option>
      <option value="Chad">Chad</option>
      <option value="Chile">Chile</option>
      <option value="China">China</option>
      <option value="Colombia">Colombia</option>
      <option value="Comoros">Comoros</option>
      <option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option>
      <option value="Congo, Republic of the">Congo, Republic of the</option>
      <option value="Costa Rica">Costa Rica</option>
      <option value="Cote d'Ivoire">Cote d'Ivoire</option>
      <option value="Croatia">Croatia</option>
      <option value="Cuba">Cuba</option>
      <option value="Curacao">Curacao</option>
      <option value="Cyprus">Cyprus</option>
      <option value="Czechia">Czechia</option>
    </optgroup>
    <optgroup label="D">
      <option value="Denmark">Denmark</option>
      <option value="Djibouti">Djibouti</option>
      <option value="Dominica">Dominica</option>
      <option value="Dominican Republic">Dominican Republic</option>
    </optgroup>
    <optgroup label="E">
      <option value="East Timor (see Timor-Leste)">East Timor (see Timor-Leste)</option>
      <option value="Ecuador">Ecuador</option>
      <option value="Egypt">Egypt</option>
      <option value="El Salvador">El Salvador</option>
      <option value="Equatorial Guinea">Equatorial Guinea</option>
      <option value="Eritrea">Eritrea</option>
      <option value="Estonia">Estonia</option>
      <option value="Ethiopia">Ethiopia</option>
    </optgroup>
    <optgroup label="F">
      <option value="Fiji">Fiji</option>
      <option value="Finland">Finland</option>
      <option value="France">France</option>
    </optgroup>
    <optgroup label="G">
      <option value="Gabon">Gabon</option>
      <option value="Gambia, The">Gambia, The</option>
      <option value="Georgia">Georgia</option>
      <option value="Germany">Germany</option>
      <option value="Ghana">Ghana</option>
      <option value="Greece">Greece</option>
      <option value="Grenada">Grenada</option>
      <option value="Guatemala">Guatemala</option>
      <option value="Guinea">Guinea</option>
      <option value="Guinea-Bissau">Guinea-Bissau</option>
      <option value="Guyana">Guyana</option>
    </optgroup>
    <optgroup label="H">
      <option value="Haiti">Haiti</option>
      <option value="Holy See">Holy See</option>
      <option value="Honduras">Honduras</option>
      <option value="Hong Kong">Hong Kong</option>
      <option value="Hungary">Hungary</option>
    </optgroup>
    <optgroup label="I">
      <option value="Iceland">Iceland</option>
      <option value="India">India</option>
      <option value="Indonesia">Indonesia</option>
      <option value="Iran">Iran</option>
      <option value="Iraq">Iraq</option>
      <option value="Ireland">Ireland</option>
      <option value="Israel">Israel</option>
      <option value="Italy">Italy</option>
    </optgroup>
    <optgroup label="J">
      <option value="Jamaica">Jamaica</option>
      <option value="Japan">Japan</option>
      <option value="Jordan">Jordan</option>
    </optgroup>
    <optgroup label="K">
      <option value="Kazakhstan">Kazakhstan</option>
      <option value="Kenya">Kenya</option>
      <option value="Kiribati">Kiribati</option>
      <option value="Korea, North">Korea, North</option>
      <option value="Korea, South">Korea, South</option>
      <option value="Kosovo">Kosovo</option>
      <option value="Kuwait">Kuwait</option>
      <option value="Kyrgyzstan">Kyrgyzstan</option>
    </optgroup>
    <optgroup label="L">
      <option value="Laos">Laos</option>
      <option value="Latvia">Latvia</option>
      <option value="Lebanon">Lebanon</option>
      <option value="Lesotho">Lesotho</option>
      <option value="Liberia">Liberia</option>
      <option value="Libya">Libya</option>
      <option value="Liechtenstein">Liechtenstein</option>
      <option value="Lithuania">Lithuania</option>
      <option value="Luxembourg">Luxembourg</option>
    </optgroup>
    <optgroup label="M">
      <option value="Macau">Macau</option>
      <option value="Macedonia">Macedonia</option>
      <option value="Madagascar">Madagascar</option>
      <option value="Malawi">Malawi</option>
      <option value="Malaysia">Malaysia</option>
      <option value="Maldives">Maldives</option>
      <option value="Mali">Mali</option>
      <option value="Malta">Malta</option>
      <option value="Marshall Islands">Marshall Islands</option>
      <option value="Mauritania">Mauritania</option>
      <option value="Mauritius">Mauritius</option>
      <option value="Mexico">Mexico</option>
      <option value="Micronesia">Micronesia</option>
      <option value="Moldova">Moldova</option>
      <option value="Monaco">Monaco</option>
      <option value="Mongolia">Mongolia</option>
      <option value="Montenegro">Montenegro</option>
      <option value="Morocco">Morocco</option>
      <option value="Mozambique">Mozambique</option>
    </optgroup>
    <optgroup label="N">
      <option value="Namibia">Namibia</option>
      <option value="Nauru">Nauru</option>
      <option value="Nepal">Nepal</option>
      <option value="Netherlands">Netherlands</option>
      <option value="New Zealand">New Zealand</option>
      <option value="Nicaragua">Nicaragua</option>
      <option value="Niger">Niger</option>
      <option value="Nigeria">Nigeria</option>
      <option value="North Korea">North Korea</option>
      <option value="Norway">Norway</option>
    </optgroup>
    <optgroup label="O">
      <option value="Oman">Oman</option>
    </optgroup>
    <optgroup label="P">
      <option value="Pakistan">Pakistan</option>
      <option value="Palau">Palau</option>
      <option value="Palestinian Territories">Palestinian Territories</option>
      <option value="Panama">Panama</option>
      <option value="Papua New Guinea">Papua New Guinea</option>
      <option value="Paraguay">Paraguay</option>
      <option value="Peru">Peru</option>
      <option value="Philippines">Philippines</option>
      <option value="Poland">Poland</option>
      <option value="Portugal">Portugal</option>
    </optgroup>
    <optgroup label="Q">
      <option value="Qatar">Qatar</option>
    </optgroup>
    <optgroup label="R">
      <option value="Romania">Romania</option>
      <option value="Russia">Russia</option>
      <option value="Rwanda">Rwanda</option>
    </optgroup>
    <optgroup label="S">
      <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
      <option value="Saint Lucia">Saint Lucia</option>
      <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
      <option value="Samoa">Samoa</option>
      <option value="San Marino">San Marino</option>
      <option value="Sao Tome and Principe">Sao Tome and Principe</option>
      <option value="Saudi Arabia">Saudi Arabia</option>
      <option value="Senegal">Senegal</option>
      <option value="Serbia">Serbia</option>
      <option value="Seychelles">Seychelles</option>
      <option value="Sierra Leone">Sierra Leone</option>
      <option value="Singapore">Singapore</option>
      <option value="Sint Maarten">Sint Maarten</option>
      <option value="Slovakia">Slovakia</option>
      <option value="Slovenia">Slovenia</option>
      <option value="Solomon Islands">Solomon Islands</option>
      <option value="Somalia">Somalia</option>
      <option value="South Africa">South Africa</option>
      <option value="South Korea">South Korea</option>
      <option value="South Sudan">South Sudan</option>
      <option value="Spain">Spain</option>
      <option value="Sri Lanka">Sri Lanka</option>
      <option value="Sudan">Sudan</option>
      <option value="Suriname">Suriname</option>
      <option value="Swaziland">Swaziland</option>
      <option value="Sweden">Sweden</option>
      <option value="Switzerland">Switzerland</option>
      <option value="Syria">Syria</option>
    </optgroup>
    <optgroup label="T">
      <option value="Taiwan">Taiwan</option>
      <option value="Tajikistan">Tajikistan</option>
      <option value="Tanzania">Tanzania</option>
      <option value="Thailand">Thailand</option>
      <option value="Timor-Leste">Timor-Leste</option>
      <option value="Togo">Togo</option>
      <option value="Tonga">Tonga</option>
      <option value="Trinidad and Tobago">Trinidad and Tobago</option>
      <option value="Tunisia">Tunisia</option>
      <option value="Turkey">Turkey</option>
      <option value="Turkmenistan">Turkmenistan</option>
      <option value="Tuvalu">Tuvalu</option>
    </optgroup>
    <optgroup label="U">
      <option value="Uganda">Uganda</option>
      <option value="Ukraine">Ukraine</option>
      <option value="United Arab Emirates">United Arab Emirates</option>
      <option value="United Kingdom">United Kingdom</option>
      <option value="Uruguay">Uruguay</option>
      <option value="Uzbekistan">Uzbekistan</option>
    </optgroup>
    <optgroup label="V">
      <option value="Vanuatu">Vanuatu</option>
      <option value="Venezuela">Venezuela</option>
      <option value="Vietnam">Vietnam</option>
    </optgroup>
    <optgroup label="Y">
      <option value="Yemen">Yemen</option>
    </optgroup>
    <optgroup label="Z">
      <option value="Zambia">Zambia</option>
      <option value="Zimbabwe">Zimbabwe</option>
    </optgroup>
  </select>
  </div>
  
  <div class="col-md-4">
    <label for="inputState" class="form-label">years of experience</label>
    <select id="inputState" name="Eyears" class="form-select">
      <option selected value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
    </select>
  </div>
  <div class="col-md-4">
  <label for="exampleInputPassword1" class="form-label ">Cover image</label>
        <input type="File" name="file" class="form-control mb-3" id="exampleInputPassword1">
  </div>
  <div class="col-12">
    <input type="submit" name="send" class="btn btn-primary" value="send">
  </div>

</form>

       <!-- ...................................... footer ............................................ -->
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