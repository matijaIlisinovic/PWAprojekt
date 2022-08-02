<?php
include 'connect.php';
define('UPLPATH', 'images/');
$id=$_GET['id'];
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
                    <li><a  href="index.php">Home</a></li>
                    <li><a  href="kategorija.php?id=Movies">Movies</a></li>
                    <li><a  href="kategorija.php?id=Arts">Arts</a></li>
                    <li><a  href="kategorija.php?id=Gaming">Gaming</a></li>
                </ul>
            </nav>
        </header>
        <section class="details">
            <?php
$query = "SELECT * FROM news WHERE id=".$id;
$result = mysqli_query($dbc, $query);
 $i=0;
 while($row = mysqli_fetch_array($result)) {
 echo '<h2>'.$row['category'].'</h2>';
 echo '<article>';
 echo '<img src="' . UPLPATH . $row['picture'] . '"/>';
 echo '<h3>'.$row['title'].'</h3>';
 echo '<p><i>'.$row['summary'].'</i></p>';
 echo '<p>'.$row['text'].'</p>';
 echo '<div style="clear:both"></div>';
 echo '</article>';
 }?> 
        </section>
        <footer>
            <span>Matija Ilišinović, milisinov@tvz.hr, 2022.</span>
        </footer>
    </body>
</html>
<?php
mysqli_close($dbc);
?>