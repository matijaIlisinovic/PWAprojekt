<?php
include 'connect.php';

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
        <form id="form" name="forma" method="post" action="unos.php" enctype="multipart/form-data">
            <label for="title">Title:<br>
                <input type="text" name="title" id="title" class="textIn"/>
            </label><br>
            <span id="titleError"></span><br>
            <label for="text">Text:<br>
                <input type="textarea" name="text" id="text" class="textIn area"/>
            </label><br>
            <span id="textError"></span><br>
            <label for="summary">Summary:<br>
                <input type="textarea" name="summary" id="summary" class="textIn area"/>
            </label><br>
            <span id="summaryError"></span><br>
            <label for="category">Category:
                <select name="category" id="category">
                <option disabled selected value="">select a category</option>
                    <option value="Movies">Movies</option>
                    <option value="Arts">Arts</option>
                    <option value="Gaming">Gaming</option>
                </select>
            </label><br>
            <span id="categoryError"></span><br>
            <label for="image">Image:
                <input type="file" name="image" accept=".jpg, .jpeg, .png" id="image"/>
            </label><br>
            <span id="imageError"></span><br>
            <label for="visible">
            <input type="checkbox" name="archive" value="archive"> archive
            </label><br><br><br>
            <button name="submit" type="submit" id="submit" value="Submit">Submit</button>
            <button name="reset" type="reset" value="Reset">Reset</button>
        </form>
        <footer>
            <span>Matija Ilišinović, milisinov@tvz.hr, 2022.</span>
        </footer>
        <script type="text/javascript" src="validation.js"></script>

    </body>
</html>
<?php
if(isset($_POST['submit'])){
$picture = $_FILES['image']['name'];
$title=$_POST['title'];
$about=$_POST['summary'];
$content=$_POST['text'];
$category=$_POST['category'];
$date=date('d.m.Y.');
if(isset($_POST['archive'])){
 $archive=1;
}else{
 $archive=0;
}
$target_dir = 'images/'.$picture;
move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir);

$query = "INSERT INTO news (date, title, summary, text, picture, category, 
archive ) VALUES ('$date', ?, ?, ?, '$picture', '$category', '$archive')";
#'$title', '$about', '$content'
$stmt = mysqli_stmt_init($dbc);
if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, 'sss', $title, $about, $content);
    mysqli_stmt_execute($stmt);
}
}
mysqli_close($dbc);

?>