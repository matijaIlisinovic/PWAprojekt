
<?php
if(isset($_POST["title"]) && isset($_POST["text"]) && isset($_POST["summary"]) 
&& isset($_POST["category"]) && isset($_POST["image"])){
	$title=$_POST["title"];
	$text=$_POST["text"];
	$summary=$_POST["summary"];
	$category=$_POST["category"];
	$img=$_POST["image"];	
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
                    <li>Home</li>
                    <li>Trending</li>
                    <li>Arts</li>
                    <li>Gaming</li>
                </ul>
            </nav>
        </header>
		<section>
		<?php
				echo "<h2>".ucfirst($category)."</h2>\n";
				echo "<h1>$title</h1>\n";
				echo "<p>$summary</p>\n";
				echo "<img src='images/$img' alt='no image'>\n";
				echo "<p>$text</p>\n";

			?>
		</section>
			

		<footer>
            <span>Matija Ilišinović, milisinov@tvz.hr, 2022.</span>
        </footer>
    </body>
</html>