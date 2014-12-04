<?php 
session_start();
mysqli_report(MYSQLI_REPORT_STRICT);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN"
            "http://www.w3.org/TR/REC-html40/strict.dtd">
<SCRIPT language=JavaScript>
	function verify(form){
		file = form.elements["datafile"];
		if((file.value != null)&& (file.value !="")){
			return confirm("Upload"+file.value+"?");
		}
		alert("Please provide a filename.");
		return false;
	}
	function confirmDelete(){
		return confirm("Are you sure you want to delete all information?");
	}
</SCRIPT>
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
	$_SESSION['password'] = $_POST['pass'];
	mysqli_report(MYSQLI_REPORT_STRICT);
		try{
			$moviesdb = new mysqli('localhost','uMoviesRoot',$_SESSION['password'],'uMovies');
			
			
			echo '<h3>Uploading Data File</h3>';
			echo '<form method="post" name="uploadForm" action= "upload.php" enctype= "multipart/form-data" onsubmit="return verify(this);">';
			echo '<label for="password">Data file</label>';
			echo '<input type="file" name="datafile" id="dataFile"/>';
			echo '<input type="submit" value="Upload" id="submit"/>';
			echo '<p id="out" style="display:block;clear:both;width:100%;margin:10px 0 0 0;text-align:left;color:#cd3700;"></p>';
			echo '</form>';
			echo '<h3>Deleting Information</h3>';
			echo '<form method = "post" name="deleteAll" action = "delete.php" onsubmit="return confirmDelete()" id="deleteAll"/>';
			echo '<input type="submit" value="Delete All" id="submit"/>';
			echo '</form>';
		}
		catch(Exception $e){
			echo '<h3>Incorrect Password!</h3>';
		}
	?>
</p>

