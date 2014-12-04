<?php
session_start();
mysqli_report(MYSQLI_REPORT_STRICT);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN"
            "http://www.w3.org/TR/REC-html40/strict.dtd">
<html>
<head>
<title>uMovies</title>
<style type="text/css">
@import url(uMovies.css);
</style>
</head>
<body>

<div id="links">
<a href="./">Home<span> Access the database of movies, actors and directors. Free to all!</span></a>
<a href="admin.html">Administrator<span> Administrator access. Password required.</span></a>
</div>


<div id="content">
<h1>uMovies&trade;</h1>
<p>
Welcome to <em>uMovies</em>, your destination for information on <a href="movies.php" title="access movies information">movies</a>, <a href="actors.php" title="access actors information">actors</a> and <a href="directors.php" title="access directors information">directors</a>.
</p>
<p>
	<h2 id="adminTitle">Administrator Access</h2>
<?php 
mysqli_report(MYSQLI_REPORT_STRICT);
try {
	$mysqli = new mysqli('localhost','uMoviesRoot',$_SESSION['password'],'uMovies');
	if(!mysqli_connect_errno()) {
		$mysqli->query("TRUNCATE TABLE actors");
		echo $mysqli->error;
		$mysqli->query("TRUNCATE TABLE directed_by");
		echo $mysqli->error;
		$mysqli->query("TRUNCATE TABLE directors");
		echo $mysqli->error;
		$mysqli->query("TRUNCATE TABLE movies");
		echo $mysqli->error;
		$mysqli->query("TRUNCATE TABLE performed_in");
		echo $mysqli->error;
		echo "<h3>All Tables Deleted</h3>";
	}
} 
catch(Exception $e) {
	echo "oops";
}
	echo '<form method = "submit" name="backToAdmin" action = "admin.html" id="return"/>';
	echo '<input type="submit" value="Return to Admin Page" id="submit"/>';
	echo '</form>';	
?>