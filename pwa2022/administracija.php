<?php
session_start();
include 'connect.php';
define('UPLPATH', 'images/');

$uspjesnaPrijava = false;
if (isset($_POST['prijava'])) {
    $prijavaImeKorisnika = $_POST['username'];
    $prijavaLozinkaKorisnika = $_POST['lozinka'];
    $sql = "SELECT username, password, rank FROM users
    WHERE username = ?";
    $stmt = mysqli_stmt_init($dbc);
    if (mysqli_stmt_prepare($stmt, $sql)) {
    mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    }
    mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, 
   $levelKorisnika);
    mysqli_stmt_fetch($stmt);
   
    if (password_verify($_POST['lozinka'], $lozinkaKorisnika) && 
    mysqli_stmt_num_rows($stmt) > 0) {
    $uspjesnaPrijava = true;
    if($levelKorisnika == 1) {
    $admin = true;
    }
    else {
    $admin = false;
    }
    $_SESSION['$username'] = $imeKorisnika;
    $_SESSION['$level'] = $levelKorisnika;
    } else {
    $uspjesnaPrijava = false;
    }
    
   }
   
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="utf-8">
        <style>
            a{
                text-decoration:none;
                color: inherit;
            }
        </style>
    </head>
    <body>
        <header>
            <div class="logo">RP Online</div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="kategorija.php?id=Movies">Movies</a></li>
                    <li><a href="kategorija.php?id=Arts">Arts</a></li>
                    <li><a href="kategorija.php?id=Gaming">Gaming</a></li>
                </ul>
            </nav>
        </header>
        <section id=reg>
            <?php
if (($uspjesnaPrijava == true && $admin == true) || 
(isset($_SESSION['$username'])) && $_SESSION['$level'] == 1) {
 $query = "SELECT * FROM news";
 $result = mysqli_query($dbc, $query);
 while($row = mysqli_fetch_array($result)) {

 
    echo '<form enctype="multipart/form-data" id ="form" action="" method="POST">
    <label for="title">Title:</label><br/>
    <input type="text" name="title" id="title" value="'.$row['title'].'"><br/>
    <span id="titleError"></span><br>

    <label for="about">Summary:</label><br/>
    <textarea name="about" id="summary" cols="30" rows="10">'.$row['summary'].'</textarea><br/>
    <span id="summaryError"></span><br>
    
    <label for="content">Text:</label><br/>
    <textarea name="content" id="text" cols="30" rows="10">'.$row['text'].'</textarea><br/>
    <span id="textError"></span><br>

    <label for="pphoto">Slika:</label><br/>
    <input type="file" class="input-text" id="image" value="'.$row['picture'].'" name="pphoto"/> <br/>
   <img src="'.UPLPATH.$row['picture'].'" width=100px> <span id="imageError"></span><br>

    <label for="category">Category:</label><br/>
    <select name="category" id="category" value="'.$row['category'].'">
    <option disabled selected value="">select a category</option>
    <option value="Movies">Movies</option>
    <option value="Arts">Arts</option>
    <option value="Gaming">Gaming</option>
    </select><br/>
    <span id="categoryError"></span><br>
    
    <label>Store in archive: <br/>';
    if($row['archive'] == 0) {
    echo '<input type="checkbox" name="archive" id="archive"/>';
    } else {
    echo '<input type="checkbox" name="archive" id="archive" checked/>';
    }
    echo '</label><br/>
    <input type="hidden" name="id" class="form-field-textual" 
   value="'.$row['id'].'">
    <button type="reset" value="Reset">Reset</button>
    <button type="submit" id="submit" name="update" value="Update"> 
   Update</button>
    <button type="submit" name="delete" value="Delete"> 
   Delete</button>
    </form>';
   }
} else if ($uspjesnaPrijava == true && $admin == false) {
 
    echo '<p>User ' . $imeKorisnika . ': login successful, no admin priviledges.</p>';
}else if (isset($_SESSION['$username']) && $_SESSION['$level'] == 0) {
    echo '<p>User ' . $_SESSION['$username'] . ': login successful, no admin priviledges.</p>';
     } else if ($uspjesnaPrijava == false) {
     ?>
    <form enctype="multipart/form-data" action="administracija.php" method="POST">
    <label for="username">Username:</label><br/>
    <input type="text" name="username" id="username"><br/>
    <span id="usernameError"></span><br>
    <label for="lozinka">Password:</label><br/>
    <input type="text" name="lozinka" id="lozinka"><br/>
    <span id="lozinkaError"></span><br>
    <button type="submit" id="prijava" name="prijava">Login</button>
     </form>

<?php
 }
 ?>
        </section>
        <footer>
            <span>Matija Ilišinović, milisinov@tvz.hr, 2022.</span>
        </footer>
        <script type="text/javascript" src="validation.js"></script>
    </body>
</html>
<?php
if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $query = "DELETE FROM news WHERE id=$id ";
    $result = mysqli_query($dbc, $query);
   }

   if(isset($_POST['update'])){
    $picture = $_FILES['pphoto']['name'];
    $title=$_POST['title'];
    $about=$_POST['about'];
    $content=$_POST['content'];
    $category=$_POST['category'];
    if(isset($_POST['archive'])){
     $archive=1;
    }else{
     $archive=0;
    }
    $target_dir = 'images/'.$picture;
    move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
    $id=$_POST['id'];
    $query = "UPDATE news SET title='$title', summary='$about', text='$content', 
    picture='$picture', category='$category', archive='$archive' WHERE id=$id ";
    $result = mysqli_query($dbc, $query);
    }
    

mysqli_close($dbc);
?>