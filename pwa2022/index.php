<?php
include 'connect.php';
define('UPLPATH', 'images/');
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
        <section>
            <h2>Movies</h2>
            <?php
$query = "SELECT * FROM news WHERE archive=0 AND category='Movies' LIMIT 4";
$result = mysqli_query($dbc, $query);
 $i=0;
 while($row = mysqli_fetch_array($result)) {
 echo '<article>';
 echo '<img src="' . UPLPATH . $row['picture'] . '">';
 echo '<h3>'.'<a href="clanak.php?id='.$row['id'].'">'.$row['title'].'</a></h3>';
 echo '<p>'.$row['summary'].'</p>';
 echo '<div style="clear:both"></div>';
 echo '</article>';
 }?> 
        </section>
        <section>
            <h2>Arts</h2>
            <?php
$query = "SELECT * FROM news WHERE archive=0 AND category='Arts' LIMIT 4";
$result = mysqli_query($dbc, $query);
 $i=0;
 while($row = mysqli_fetch_array($result)) {
 echo '<article>';
 echo '<img src="' . UPLPATH . $row['picture'] . '">';
 echo '<h3>'.'<a href="clanak.php?id='.$row['id'].'">'.$row['title'].'</a></h3>';
 echo '<p>'.$row['summary'].'</p>';
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