
<?php
include 'connect.php';

$registriranKorisnik="";
$msg="";
if(isset($_POST['firstname']) && isset($_POST['lastname']) 
&& isset($_POST['username']) && isset($_POST['pass'])){
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$lozinka = $_POST['pass'];
$hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
$razina = 0;


$sql = "SELECT username FROM users WHERE username = ?";
$stmt = mysqli_stmt_init($dbc);
if (mysqli_stmt_prepare($stmt, $sql)) {
 mysqli_stmt_bind_param($stmt, 's', $username);
 mysqli_stmt_execute($stmt);
 mysqli_stmt_store_result($stmt);
 }
if(mysqli_stmt_num_rows($stmt) > 0){
    $msg='Username taken!';
}else{
 $sql = "INSERT INTO users (firstname, lastname,username, password, rank)VALUES (?, ?, ?, ?, ?)";
 $stmt = mysqli_stmt_init($dbc);
 if (mysqli_stmt_prepare($stmt, $sql)) {
 mysqli_stmt_bind_param($stmt, 'ssssd', $firstname,$lastname, $username, $hashed_password, $razina);
 mysqli_stmt_execute($stmt);
 $registriranKorisnik = true;
 }
}
}
 if( $registriranKorisnik == true) {
 echo '<p>Korisnik je uspješno registriran!</p>';
 $registriranKorisnik ="";
 $_SESSION['reg']="";
 sleep(3);
 header("Location: index.php");
 } else {
 
 ?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="utf-8">
    </head>
 <section role="main" id="reg">
 <form enctype="multipart/form-data" action="" method="POST">
 <span id="porukaIme"></span>
 <label for="title">Firstname: </label><br>
 <input type="text" name="firstname" id="ime"><br><br>
 <span id="porukaPrezime"></span>
 <label for="about">Lastname: </label><br>
 <input type="text" name="lastname" id="prezime"><br><br>
 <span id="porukaUsername"></span>
 
 <label for="content">Username:</label><br>
 <?php echo '<span style="color:red;">'.$msg.'</span>'; ?>
 <input type="text" name="username" id="username"><br><br>
 <div class="form-item">
 <span id="porukaPass"></span>
 <label for="pphoto">Password: </label><br>
 <div class="form-field">
 <input type="password" name="pass" id="pass"><br><br>
 <span id="porukaPassRep" class="bojaPoruke"></span>
 <label for="pphoto">Verify password: </label><br>
 <input type="password" name="passRep" id="passRep"><br><br>
 
 <button type="submit" value="Prijava"id="slanje">Register</button>
 </form>
 
 </section>
 <script type="text/javascript">
 document.getElementById("slanje").onclick = function(event) {
 
 var slanjeForme = true;
 
 var poljeIme = document.getElementById("ime");
 var ime = document.getElementById("ime").value;
 if (ime.length == 0) {
 slanjeForme = false;
 poljeIme.style.border="1px dashed red";
 document.getElementById("porukaIme").innerHTML="<br>Name required!<br>";
 document.getElementById("porukaIme").style.color="red";
 } else {
 poljeIme.style.border="1px solid green";
 document.getElementById("porukaIme").innerHTML="";
 }

 var poljePrezime = document.getElementById("prezime");
 var prezime = document.getElementById("prezime").value;
 if (prezime.length == 0) {
 slanjeForme = false;
 poljePrezime.style.border="1px dashed red";
 
document.getElementById("porukaPrezime").innerHTML="<br>Lastname required!<br>";
 document.getElementById("porukaPrezime").style.color="red";
 } else {
 poljePrezime.style.border="1px solid green";
 document.getElementById("porukaPrezime").innerHTML="";
 }
 
 var poljeUsername = document.getElementById("username");
 var username = document.getElementById("username").value;
 if (username.length == 0) {
 slanjeForme = false;
 poljeUsername.style.border="1px dashed red";
 
document.getElementById("porukaUsername").innerHTML="<br>Username required!<br>";
 document.getElementById("porukaUsername").style.color="red";
 } else {
 poljeUsername.style.border="1px solid green";
 document.getElementById("porukaUsername").innerHTML="";
 }
 
 var poljePass = document.getElementById("pass");
 var pass = document.getElementById("pass").value;
 var poljePassRep = document.getElementById("passRep");
 var passRep = document.getElementById("passRep").value;
 if (pass.length == 0 || passRep.length == 0 || pass != passRep) {
 slanjeForme = false;
 poljePass.style.border="1px dashed red";
 poljePassRep.style.border="1px dashed red";
 document.getElementById("porukaPass").innerHTML="<br>Passwords don't match!<br>";
 document.getElementById("porukaPass").style.color="red";
 
document.getElementById("porukaPassRep").innerHTML="<br>Passwords don't match!<br>";
 document.getElementById("porukaPassRep").style.color="red";
 } else {
 poljePass.style.border="1px solid green";
 poljePassRep.style.border="1px solid green";
 document.getElementById("porukaPass").innerHTML="";
 document.getElementById("porukaPassRep").innerHTML="";
 }
 
 if (slanjeForme != true) {
 event.preventDefault();
 }
 
 };
 
 </script>
 <?php
 }
 
mysqli_close($dbc);
 ?>

</html>
