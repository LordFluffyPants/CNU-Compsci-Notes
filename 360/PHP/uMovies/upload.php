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
error_reporting(E_ERROR | E_PARSE);
try {
	
	if(isset($_SESSION['password'])) {
		
			try {
				$mysqli = new mysqli('localhost','uMoviesRoot',$_SESSION['password'],'uMovies');
				if(!mysqli_connect_errno()) {
					if(is_file($_FILES['datafile']['tmp_name']) === true) {
						$file = fopen($_FILES['datafile']['tmp_name'],'r');
						
						$object = array();
						$object["errors"] = array();
						$object["movies"] = array();
						$object["movies"]["added"] = 0;
						$object["movies"]["excluded"] = 0;
						$object["actors"] = array();
						$object["actors"]["added"] = 0;
						$object["actors"]["excluded"] = 0;
						$object["actors"]["total"] = 0;
						$object["directors"] = array();
						$object["directors"]["added"] = 0;
						$object["directors"]["excluded"] = 0;
						$object["directors"]["total"] = 0;
						$object["directions"] = array();
						$object["directions"]["added"] = 0;
						$object["directions"]["excluded"] = 0;
						$object["performances"] = array();
						$object["performances"]["added"] = 0;
						$object["performances"]["excluded"] = 0;
						$object["performances"]["total"] = 0;
						$object["performances"]["last_added"] = "";
						$object["movies"]["last_added"] = "";
						$object["actors"]["last_added"] = "";
						$object["directors"]["last_added"] = "";
						$object["length"] = 0;
						while(!feof($file)) {
							$line = explode(", ",fgets($file));
							$type = $line[0];
							$name = $line[1];
							$attr = $line[2];
							$extra = $line[3];
							$object["directions"]["added"]++;
							
							$object["length"]++;
							if($type == 'movie') {
								//$sql = $mysqli->query("SELECT * FROM `movies` WHERE name = '$name'");
								$object["directions"]["movie"] = $attr;
								$object["performances"]["movie"] = $attr;
								
								/* this will stop multiple uploads **/
								$sql = "INSERT INTO `movies` (name,year) VALUES ('$name','$attr')";
								if (mysqli_query($mysqli, $sql) === TRUE) {
									try{
										$mysqli->query("INSERT INTO `movies` (name,year) VALUES ('$name','$attr')");
										$object["movies"]["last_added"] = $name;
										$object["movies"]["added"]++;
									} 
									catch (Exception $e) {
										$object['errors'][count($object['errors'])] = mysqli_error($mysqli);
									}
								} 
								else {
									$object["movies"]["excluded"]++;
								}
							} 
							elseif($type == 'actor' || $type == 'actress') {
								$sql = "INSERT INTO `actors` (name,gender) VALUES ('$attr','$gender')";
								$object["directions"]["actor"] = $attr;
								$object["performances"]["actor"] = $attr;
								$object["performances"]["role"] = $extra;
								if(mysqli_query($mysqli, $sql) === TRUE) {
									$gender = $type == 'actor' ? 'male' : 'female';
									try {
										$mysqli->query("INSERT INTO `actors` (name,gender) VALUES ('$attr','$gender')");
										$object["actors"]["last_added"] = $attr;
										$object["actors"]["added"]++;

										$sql = "INSERT INTO `performed_in` (actor,movie,role) VALUES ('$attr','$name','$extra')";
										if (mysqli_query($mysqli, $sql) === TRUE){
											$mysqli->query("INSERT INTO `performed_in` (actor,movie,role) VALUES ('$attr','$name','$extra')");
											$object["performances"]["added"]++;	
											$object["performances"]["last_added"] = $attr." in ".$name." with the role ".$extra;
										}
										else{
											$object["performances"]["excluded"]++;	
										}
										
									} catch(Exception $e) {
										$object['errors'][count($object['errors'])] = mysqli_error($mysqli);
									}
								} else {
									$sql = "INSERT INTO `performed_in` (actor,movie,role) VALUES ('$attr','$name','$extra')";
									$object["actors"]["excluded"]++;
									if (mysqli_query($mysqli, $sql) === TRUE){
											$mysqli->query("INSERT INTO `performed_in` (actor,movie,role) VALUES ('$attr','$name','$extra')");
											$object["performances"]["added"]++;	
											$object["performances"]["last_added"] = $attr." in ".$name." with the role ".$extra;
										}
										else{
											$object["performances"]["excluded"]++;	
										}
								}
								
							} 
							elseif($type == 'director') {
								$sql = "INSERT INTO `directors` (name) VALUES ('$attr')";
								$object["directions"]["director"] = $attr;
								if(mysqli_query($mysqli, $sql) === TRUE) {
									try {
										$mysqli->query("INSERT INTO `directors` (name) VALUES ('$attr')");
										$object["directors"]["last_added"] = $attr;
										$object["directors"]["added"]++;
										$mysqli->query("INSERT INTO `directed_by` (movie,director) VALUES ('$name','$attr')");
									} 
									catch(Exception $e) {
										$object['errors'][count($object['errors'])] = mysqli_error($mysqli);
									}
								} 
								else {
									$mysqli->query("INSERT INTO `directed_by` (movie,director) VALUES ('$name','$attr')");
									$object["directors"]["excluded"]++;
								}
							}
						}
						fclose($file);
						$object["movies"]["total"] = $object["movies"]["added"] + $object["movies"]["excluded"];
						echo "Total Movies in File:<b>".$object["movies"]["total"]."</b><br>";
						echo "Movies Added:<b>".$object["movies"]["added"]."</b><br>";
						echo "Movies Excluded:<b>".$object["movies"]["excluded"]."</b><br>";
						if (!($object["movies"]["last_added"] == "")){
							echo "The last Movie added was:<b>".$object["movies"]["last_added"]."</b><br>";
						}
						else{
							echo "The last Movie added was: No Movies were Uploaded<br>";
						}
						

						$object["actors"]["total"] = $object["actors"]["added"] + $object["actors"]["excluded"];
						echo "Total actors/actresses in File:<b>".$object["actors"]["total"]."</b><br>";
						echo "Actors Added:<b>".$object["actors"]["added"]."</b><br>";
						echo "Actors Excluded:<b>".$object["actors"]["excluded"]."</b><br>";
						if (!($object["actors"]["last_added"] == "")){
							echo "The last actor added was:<b>".$object["actors"]["last_added"]."</b><br>";
						}
						else{
							echo "The last actor added was: No Actors were uploaded<br>";
						}

						$object["directors"]["total"] = $object["directors"]["added"] + $object["directors"]["excluded"];
						echo "Total Directors in File:<b>".$object["directors"]["total"]."</b><br>";
						echo "Directors Added:<b>".$object["directors"]["added"]."</b><br>";
						echo "Directors Excluded:<b>".$object["directors"]["excluded"]."</b><br>";
						if (!($object["directors"]["last_added"] == "")){
							echo "The last director added was:<b>".$object["directors"]["last_added"]."</b><br>";
						}
						else{
							echo "The last director added was: No directors were uploaded<br>";
						}

						$object["performances"]["total"] = $object["performances"]["added"] + $object["performances"]["excluded"];
						echo "The total performances in File: <b>".$object["performances"]["total"]."</b><br>";
						echo "Performances Added:<b>".$object["performances"]["added"]."</b><br>";
						echo "Performances Excluded:<b>".$object["performances"]["excluded"]."</b><br>";
						if (!($object["performances"]["last_added"] == "")){
							echo "The last performance added was: ".$object["performances"]["last_added"];
						}
						else{
							echo "The last performance added was: No preformances were uploaded<br>";
						}
						
						//needs an echo out for last inserted
					}
				}
			} catch(Exception $e) {
				die('ERR_MYSQLI_ERROR\n'.var_dump($e));
			}
	}
}
catch(Exception $e){

}
?>
</p>