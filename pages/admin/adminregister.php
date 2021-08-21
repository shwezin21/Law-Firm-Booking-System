<?php 
include('../function.php');
$name="";
$email="";
$error=array();
$connect = mysqli_connect('localhost','root','','justiceforyoudb');

if(isset($_POST['btnsignup']) )
{
  $name=$_POST['txtname'];
  $phnumber=$_POST['txtphnumber'];
  $email=$_POST['txtemail'];
  $age=$_POST['txtage'];
  $position = $_POST['txtposition'];
  $state=$_POST['txtstate'];
  $city=$_POST['txtcity'];
  $symbol=$_POST['txtsymbol'];
  $number=$_POST['txtnumber'];
  $nrc=$state.'/'.$city.$symbol.$number;
  $simpassword=$_POST['txtpassword'];
  $password=sha1($simpassword);
  $simconpassword=$_POST['txtconpassword'];
  $conpass=sha1($simconpassword);
  $education=$_POST['txteducation'];
  $salary=$_POST['txtsalary'];
  $jobexperience=$_POST['txtexperience'];
  $address=$_POST['txtaddress'];
  $adminid=AutoID('admin','adminid','admin_',6);

// -------------------------------------------
  $avatar = $_FILES['fileavatar']['name']; 
  if($avatar)
     {
      $folder= "assets/img/";
       $filename=$folder.$avatar;
        $check=copy($_FILES['fileavatar']['tmp_name'],$filename);
   }
      
   

 $slquery="SELECT * FROM admin
            WHERE ademail='$email'";
   $slresult=mysqli_query($connect, $slquery);
   $row =mysqli_num_rows($slresult);
if($row>0)
   {
    echo "<script>alert('Email already exists.Please fill another email.')</script>";
     array_push($error,"Email already exists.");
     
    
   } 
if($password!=$conpass)
       {
          echo "<script>alert('Passwords do not meet.Try again')</script>";
          array_push($error,"Password do not meet.Try again");

          
       }     
if(!$error)  
     {
      $insert = "INSERT INTO `admin`(`adminid`, `adname`, `adnrcnumber`, `adage`, `adphoneno`, `ademail`, `adaddress`, `adposition`, `adpassword`, `adconfirmpassword`, `adeducation`, `adsalary`, `adexperience`, `adavatar`) VALUES  ('$adminid','$name','$nrc','$age','$phnumber','$email','$address','$position', '$password',' $conpass','$education','$salary','$jobexperience','$filename')";
       $run = mysqli_query($connect,$insert);
         if ($run)
        {
          echo "<script>alert('Your account successfully created')
         window.location.assign('../signin.php')</script>";
        }
      else
       {
        echo mysqli_error($connect);
        }
     }
      

    }

  

 ?>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title>Justice For You</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    
    <!-- Favicons -->
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="../../assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../../assets/plugins/fontawesome/css/all.min.css">
    
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="../../assets/plugins/fancybox/jquery.fancybox.min.css">
    
    <!-- Main CSS -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.min.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

<script>function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
 <script>function myFunction1() {
  var x = document.getElementById("conpassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<script type="text/javascript">
var citiesByState = {
1: ["AHGHAYA","BAMANA","DAPHAYA","HAPANA","KAMANA","KAMATA","KAPATA","KHABADA","KHAPHANA","LAGANA","MAKANA","MAKATA","MAKHABA","MALANA","MAMANA","MANYANA","MASANA","NAMANA","PANADA","PATAAH","PAWANA","SABATA","SALANA","SAPABA","TANANA","WAMANA","YABAYA","YAKANA"],
2:["BALAKHA","DAMASA","LAKANA","MASANA","PHASANA","PHAYASA","YATANA"],
3: ["BAAHNA","BAGALA","BATHASA","KADANA","KAKAYA","KAMAMA","KASAKA","LABANA","LATHANA","MAWATA","PAKANA","PHAPANA","MAKHABA","SAKALA","THATAKA","WALAMA","YAYATHA"],
4: ["HAKHNA","HTATALA","HAKHANA","KAPALA","MATANA","MATAPA","PALAWA","PHALANA","SAMANA","MATAPA","PALAWA","PHALANA","SAMANA","TATANA","TAZANA","YAKHADA","YAZANA"],
5: ["AHTANA","AHYATA","BAMANA","BATALA","DAHANA","DAPAYA","HAMALA","HTAKHANA","KABALA","KALAHTA","KALANA","KALATA","KALAWA","KAMANA","KANANA","KATHANA","KHAOUNA","KHAOUTA","KHAPANA","KHATANA","LAHANA","MAKANA","MALANA","MAMANA","MAMATA","MAPATA","MATHANA","MAYANA","PALABA","PALANA","PASANA","PHAPANA","SAKANA","SALAKA","SAMAYA","TAMANA","TASANA","WALANA","WATHANA","YABANA","YAMAPA","YAOUNA"],
6: ["BAPANA","HTAWANA","KALAHAH","KATSANA","KATHANA","KAYAYA","KHAMAKA","LALANA","MAAHNA","MAAHYA","MAMANA","MATANA","PAKAMA","PALANA","PALATA","TATHAYA","THAYAKHA","YAPHANA"],
7: ["AHPHANA","AHTANA","DAOUNA","HTATAPA","KAKANA","KAPAKA","KATAKHA","KAWANA","LAPATA","MALANA","MANYANA","NATALA","NYALAPA","PAKHANA","PAKHATA","PAMANA","PATANA","PHAMANA","TANGANA","THAKANA","THANAPA","THAWANA","WAMANA","YAKANA","YATANA","ZAKANA"],
8: ["AHLANA","GAGANA","HTALANA","KAHTANA","KAMANA","KHAMANA","MABANA","MAHTANA","MAKANA","MALANA","MAMANA","MATANA","MATHANA","NAMANA","NGAPHANA","PAKHAKA","PAMANA","PAPHANA","SALANA","SAMANA","SAPAWA","SAPHAWA","SATAYA","TATAKA","THAYANA","YANAKHA","YASAKA"],
9: ["AHMAYA","AHMAZA","DAKHATHA","KAPATA","KASANA","KHAAHZA","KHAMAZA","LAWANA","MAAHMA","MAHTALA","MAKANA","MAKHANA","MALANA","MAMANA","MANAMA","MANATA","MATAYA","MATHANA","MAYATA","NAHTAKA","NGATHAYA","NGAZANA","NYAOUNA","OUTATHA","PABANA","PABATHA","PAKAKHA","PAMANA","PAOULA","PATHAKA","SAKANA","TAKANA","TAKATA","TATAOU","TATHANA"
,"THAPAKA","THASAANA","TAKANA","WATANA","YAMATHA","ZABATHA","ZAYATHA"],
10: ["BALANA","KAHTANA","KAMAYA","KHASANA","KHASANA","KHAZANA","LAMANA","MADANA","MALAMA","PAMANA","THAHTANA","THAPHAYA","YAMANA"],
11: ["AHMANA","BATHATA","GAMANA","GAPHANA","KATALA","KATANA","MAAHNA","MAAHTA","MAOUNA","MAMPANA","MATANA","PANAKA","PATANA","SATANA","TAKANA","TAPAWA","THATANA","YABANA","YATHATA"],
12: ["AHLANA","AHSANA","BAHANA","BATAHTA","DAGAMA","DAGANA","DAGASA","DAGATA","DAGAYA","DALANA","DAPANA","HTATAPA","KAKHAKA","KAMANA","KAMATA","KAMAYA","KATANA","KATATA","KHAYANA","LAKANA","LAMANA","LAMATA","LATHANA","LATHAYA","MABANA","MAGATA","MAYAKA","OUKAMA","OUKATA","PABATA","PAZATA","SAKAKHA","SAKANA","SAKHANA","SAMAHA","TAKANA","TAMANA","TATANA","TATATA","THAGAKA","THAKATA","THAKHANA","THALANA","YAKANA","YAPATHA"],
13: ["AHTANA","HAMANA","HAPANA","HAPATA","KAHANA","KAKANA","KAKHANA","KALADA","KALANA","KALATA","KAMANA","KATALA","KATANA","KATATA","KATHANA","KHALANA","KHAYANA","KHAYAHA","LAKANA","LAKHANA","LAKHATA","LALANA","LAYANA","MABANA","MAHAYA","MAHTANA","MAHTATA","MANATA","MANGANA","MAPANA","MAPATA","MAPHANA","MAPHATA","MASANA","MASATA","MATANA","MATATA","MAYAHTA","MAYANA","MAYATA","NAKHANA","NAKHATA","NAMATA","NAPHANA","NASANA","NATANA","NYAYANA","PALANA","PALATA","PAPAKA","PASANA","PASATA","PATAYA","PAWANA","PAYANA","PHAKHANA","SASANA","TAKANA","TAKHALA","TALANA","TAMANYA","TATANA","TAYANA","THANANA","THAPANA","YANGANA","YASANA"],
14: ["AHGAPA","AHMANA","AHMATA","BAKALA","DADAYA","DANANPHA","HAKAKA","HATHATA","KAKAHTA","KAKAHNA","KALANA","KAKHANA","KALANA","KAPANA","LAMANA","LAPATA","MAAHNA","MAAHPA","MAMAKA","MAMANA","NGAPATA","NGATHAKHA","NGAYAKA","NYATANA","PASALA","PATANA","PATHANA","PATHAYA","PHAPANA","THAPANA","WAKHAMA","YAKANA","YATHAYA","ZALANA"]
}

function makeSubmenu(value) {
if(value.length==0) document.getElementById("citySelect").innerHTML = "<option></option>";
else {
var citiesOptions = "";
for(cityId in citiesByState[value]) {
citiesOptions+="<option>"+citiesByState[value][cityId]+"</option>";
}
document.getElementById("citySelect").innerHTML = citiesOptions;
}
}
</script>
<style type="text/css">

/* Customize container */
.container
{
  background-color:rgba(0,0,0,0.01);
}

  
  .eyeicon
  {
    margin-top: -30px;
    margin-left: 630px;
  }
/* Responsive: Portrait tablets and up */
@media (max-width: 400px) { 
  .eyeicon
  {
    margin-top: -30px;
    margin-left: 300px;

  }
 
}
</style>
</head>
<?php include('../header.php') ?>
<body>
<div class="container">
    <h1 class="well">Sign Up</h1>
  <div class="col-lg-12 well">
  <div class="row">
        <form action= "adminregister.php" method="POST" enctype="multipart/form-data">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-6 form-group">
                <label>Name</label>
                <input type="text" placeholder="Enter Name Here.." class="form-control" name='txtname' required>
              </div>
              <div class="col-sm-6 form-group">
                <label>Age</label>
                <input type="number" placeholder="Enter Age Here.." class="form-control" name='txtage' min='18' required>
              </div>
            </div>  
            <div class="row">
              <div class="col-sm-6 form-group">
                <label>Education</label>
                <input type="text" placeholder="Enter education Here.." class="form-control" name='txteducation'>
              </div>    
              <div class="col-sm-6 form-group">
                 <label for = "inputfile">Upload Profile</label>
                   <input type = "file" name="fileavatar" id="inputfile" required>
              </div>  
            </div>        
            <div class="form-group">
              <label>Address</label>
              <textarea placeholder="Enter Address Here.." rows="3" class="form-control" name='txtaddress' required></textarea>
            </div>
               <label> NRC NUMBER </label>  
            <div class="row">
              <div class="col-sm-2 form-group">
                <select id="countrySelect" size="1" onchange="makeSubmenu(this.value)" name='txtstate' class="form-control">
                    <option value='1'>1/</option>
                    <option value='2'>2/</option>
                    <option value='3'>3/</option>
                    <option value='4'>4/</option>
                    <option value='5'>5/</option>
                    <option value='6'>6/</option>
                    <option value='7'>7/</option>
                    <option value='8'>8/</option>
                    <option value='9'>9/</option>
                    <option value='10'>10/</option>
                    <option value='11'>11/</option>
                    <option value='12'>12/</option>
                    <option value='13'>13/</option>
                    <option value='14'>14/</option>
                    </select>
              </div>  
              <div class="col-sm-4 form-group">
               <select id="citySelect" size="1" name='txtcity' class="form-control" >
                    <option>AHGHAYA</option>
                    <option>BAMANA</option>
                    <option>DAPHAYA</option>
                    <option>HAPANA</option>
                    <option>KAMANA</option>
                    <option>KAMATA</option>
                    <option>KAPATA</option>
                    <option>KHABADA</option>
                    <option>KHAPHANA</option>
                    <option>LAGANA</option>
                    <option>MAKANA</option>
                    <option>MAKATA</option>
                    <option>MAKHABA</option>
                    <option>MALANA</option>
                    <option>MAMANA</option>
                    <option>MANYANA</option>
                    <option>MASANA</option>
                    <option>NAMANA</option>
                    <option>PANADA</option>
                    <option>PATAAH</option>
                    <option>PAWANA</option>
                    <option>SABATA</option>
                    <option>SALANA</option>
                    <option>SAPABA</option>
                    <option>TANANA</option>
                    <option>WAMANA</option>
                    <option>YABAYA</option>
                    <option>YAKANA</option>
                  </select>
              </div>  
              <div class="col-sm-3 form-group">
                <select size="1" name='txtsymbol' class="form-control" >
                    <option value='(N)'>(N)</option>
                    <option value='(E)'>(E)</option>
                    <option value='(P)'>(P)</option>
                    <option value='(A)'>(A)</option>
                    <option value='(F)'>(F)</option>
                    <option value='(TH)'>(TH)</option>
                    <option value='(G)'>(G)</option>
                  </select>
              </div>   
               <div class="col-sm-3 form-group">
                <input type="text" placeholder="000000" class="form-control" name='txtnumber' pattern="[0-9]{6}" required="">
              </div>   
                  </div>
            <div class="row">
              <div class="col-sm-6 form-group">
                 <label for="inputsalary">Salary</label>
                       <select size="1" class='form-control' name='txtsalary' id="inputsalary">
                      <option value='2000'>$2000</option>
                      <option value='3000'>$3000</option>
                      <option value='3500'>$3500</option>
                      <option value='2500'>$2500</option>
                      <option value='4000'>$4000</option>
                      </select> 
              </div>   
              <div class="col-sm-6 form-group">
                <label>Position</label>
                <select size="1" class='form-control' name='txtposition' id="inputposition" required>
        <option value='Attorney'>Attorney</option>
        <option value='Lawyer'>Lawyer</option>
                </select>
              </div>  
            </div>
              <div class="form-group">
                <label for="password">Password</label>
        <input type = "password" class = "form-control" id="password" placeholder = "Enter your password" name='txtpassword' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
  <img src='../image/eyeicon.png'width='25px' height='25px' class='eyeicon' onclick='myFunction()'>
              </div> 
              <div class="form-group">
            <label for='password'>Confirm Password</label>
            <input type = "conpassword" class = "form-control" id="password" placeholder = "Enter your confirm password" name='txtconpassword' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
  <img src='../image/eyeicon.png'width='25px' height='25px' class='eyeicon' onclick='myFunction1()'>
          </div>                       
          <div class="form-group">
            <label>Phone Number</label>
            <input type="text" placeholder="Enter Phone Number Here.." class="form-control" name='txtphnumber' required="">
          </div>    
          <div class="form-group">
            <label>Email Address</label>
            <input type="text" placeholder="Enter Email Address Here.." class="form-control" name='txtemail' required>
          </div>  
          <div class="form-group">
            <label for="inputexperience">Job Experience</label>
                        <input type="text" class="form-control" id="inputexperience" name='txtexperience' placeholder="Enter Your job experience" required>
          </div>
          <button type="submit" name='btnsignup' class="btn btn-primary">Sign Up</button>       
          </div>
        </form> 
        </div>
  </div>
  </div>
</body>
<!-- jQuery -->
    <script src="../../assets/js/jquery.min.js"></script>
    
    <!-- Bootstrap Core JS -->
    <script src="../../assets/js/popper.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    
    <!-- Fancybox JS -->
    <script src="../../assets/plugins/fancybox/jquery.fancybox.min.js"></script>
    
    <!-- Custom JS -->
    <script src="../../assets/js/script.js"></script>
    
  </body>
<?php include('../footer.php') ?>
<!-- doccure/doctor-profile.html  30 Nov 2019 04:12:16 GMT -->
</html>